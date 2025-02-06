<?php

/*
<COPYRIGHT>

    Copyright © 2016-2025, Canyon GBS LLC. All rights reserved.

    Advising App™ is licensed under the Elastic License 2.0. For more details,
    see https://github.com/canyongbs/advisingapp/blob/main/LICENSE.

    Notice:

    - You may not provide the software to third parties as a hosted or managed
      service, where the service provides users with access to any substantial set of
      the features or functionality of the software.
    - You may not move, change, disable, or circumvent the license key functionality
      in the software, and you may not remove or obscure any functionality in the
      software that is protected by the license key.
    - You may not alter, remove, or obscure any licensing, copyright, or other notices
      of the licensor in the software. Any use of the licensor’s trademarks is subject
      to applicable law.
    - Canyon GBS LLC respects the intellectual property rights of others and expects the
      same in return. Canyon GBS™ and Advising App™ are registered trademarks of
      Canyon GBS LLC, and we are committed to enforcing and protecting our trademarks
      vigorously.
    - The software solution, including services, infrastructure, and code, is offered as a
      Software as a Service (SaaS) by Canyon GBS LLC.
    - Use of this software implies agreement to the license terms and conditions as stated
      in the Elastic License 2.0.

    For more information or inquiries please visit our website at
    https://www.canyongbs.com or contact us via email at legal@canyongbs.com.

</COPYRIGHT>
*/

namespace AdvisingApp\Notification\Notifications\Channels;

use AdvisingApp\IntegrationAwsSesEventHandling\Settings\SesSettings;
use AdvisingApp\Notification\Actions\MakeOutboundDeliverable;
use AdvisingApp\Notification\DataTransferObjects\EmailChannelResultData;
use AdvisingApp\Notification\Enums\EmailMessageEventType;
use AdvisingApp\Notification\Enums\NotificationChannel;
use AdvisingApp\Notification\Enums\NotificationDeliveryStatus;
use AdvisingApp\Notification\Exceptions\NotificationQuotaExceeded;
use AdvisingApp\Notification\Models\EmailMessage;
use AdvisingApp\Notification\Models\OutboundDeliverable;
use AdvisingApp\Notification\Notifications\Attributes\SystemNotification;
use AdvisingApp\Notification\Notifications\Contracts\HasAfterSendHook;
use AdvisingApp\Notification\Notifications\Contracts\HasBeforeSendHook;
use AdvisingApp\Notification\Notifications\Contracts\OnDemandNotification;
use App\Features\MessagesAndMessageEvents;
use App\Models\Tenant;
use App\Models\User;
use App\Settings\LicenseSettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Channels\MailChannel as BaseMailChannel;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use ReflectionClass;
use Symfony\Component\Mime\Email;
use Throwable;

class MailChannel extends BaseMailChannel
{
    public function send($notifiable, Notification $notification): void
    {
        [$recipientId, $recipientType] = match (true) {
            $notifiable instanceof Model => [$notifiable->getKey(), $notifiable->getMorphClass()],
            $notifiable instanceof AnonymousNotifiable && $notification instanceof OnDemandNotification => $notification->identifyRecipient(),
            default => [null, 'anonymous'],
        };

        $emailMessage = MessagesAndMessageEvents::active()
            ? new EmailMessage([
                'notification_class' => $notification::class,
                'content' => $notification->toMail($notifiable)->toArray(),
                'recipient_id' => $recipientId,
                'recipient_type' => $recipientType,
            ])
            : null;

        $deliverable = app(MakeOutboundDeliverable::class)->execute($notification, $notifiable, NotificationChannel::Email);

        if ($notification instanceof HasBeforeSendHook) {
            $notification->beforeSend(
                notifiable: $notifiable,
                deliverable: $deliverable,
                message: $emailMessage,
                channel: NotificationChannel::Email
            );
        }

        $deliverable->save();

        if ($emailMessage) {
            $emailMessage->save();
        }

        $tenant = Tenant::current();
        $tenantMailConfig = $tenant?->config->mail;

        $notificationReflection = new ReflectionClass($notification);
        $isSystemNotification = filled($notificationReflection->getAttributes(SystemNotification::class));

        try {
            if (
                (! ($tenantMailConfig?->isDemoModeEnabled ?? false))
                || ($isSystemNotification && $tenantMailConfig?->isExcludingSystemNotificationsFromDemoMode)
            ) {
                $message = $notification->toMail($notifiable)
                    ->withSymfonyMessage(function (Email $message) use ($deliverable, $tenant, $emailMessage) {
                        $settings = app(SesSettings::class);

                        if (filled($settings->configuration_set)) {
                            $message->getHeaders()->addTextHeader(
                                'X-SES-CONFIGURATION-SET',
                                $settings->configuration_set
                            );
                        }

                        $message->getHeaders()->addTextHeader(
                            'X-SES-MESSAGE-TAGS',
                            implode(', ', [
                                "outbound_deliverable_id={$deliverable->getKey()}",
                                ...($emailMessage ? ["app_message_id={$emailMessage->getKey()}"] : []),
                                ...($tenant ? ['tenant_id=' . $tenant->getKey()] : []),
                            ]),
                        );
                    });

                // TODO: Change this to check the $emailMessage instead of the $deliverable
                $quotaUsage = $isSystemNotification ? 0 : $this->determineQuotaUsage($message, $deliverable);

                throw_if($quotaUsage && (! $this->canSendWithinQuotaLimits($quotaUsage)), new NotificationQuotaExceeded());

                $result = new EmailChannelResultData(
                    success: false,
                );

                try {
                    // TODO: Find a way to get the SES Message ID attached to the deliverable/message. We will probably need to get it through the MessageSent event
                    $sentMessage = $this->mailer->mailer($message->mailer ?? null)->send(
                        $this->buildView($message),
                        array_merge($message->data(), $this->additionalMessageData($notification)),
                        $this->messageBuilder($notifiable, $notification, $message)
                    );
                } catch (Throwable $exception) {
                    $sendingException = $exception;
                }

                if ($sentMessage ?? null) {
                    $result->success = true;
                    $result->recipients = $sentMessage->getEnvelope()->getRecipients();
                }
            } else {
                $result = new EmailChannelResultData(
                    success: true,
                );

                $quotaUsage = 0;
            }

            try {
                if ($result->success) {
                    $deliverable->update([
                        'delivery_status' => (
                            ($tenantMailConfig?->isDemoModeEnabled ?? false)
                            && ((! $isSystemNotification) || (! $tenantMailConfig?->isExcludingSystemNotificationsFromDemoMode))
                        )
                            ? NotificationDeliveryStatus::BlockedByDemoMode
                            : NotificationDeliveryStatus::Dispatched,
                        'quota_usage' => $quotaUsage,
                    ]);

                    if ($emailMessage) {
                        $emailMessage->quota_usage = $quotaUsage;

                        $emailMessage->events()->create([
                            'type' => (
                                ($tenantMailConfig?->isDemoModeEnabled ?? false)
                                && ((! $isSystemNotification) || (! $tenantMailConfig?->isExcludingSystemNotificationsFromDemoMode))
                            )
                                ? EmailMessageEventType::BlockedByDemoMode
                                : EmailMessageEventType::Dispatched,
                            'payload' => $result->toArray(),
                            'occurred_at' => now(),
                        ]);

                        $emailMessage->save();
                    }
                } else {
                    $deliverable->update([
                        'delivery_status' => NotificationDeliveryStatus::DispatchFailed,
                    ]);

                    if ($emailMessage) {
                        $emailMessage->events()->create([
                            'type' => EmailMessageEventType::FailedDispatch,
                            'payload' => $result->toArray(),
                            'occurred_at' => now(),
                        ]);
                    }
                }

                // Consider dispatching this as a seperate job so that it can be encapsulated to be retried if it fails, but also avoid changing the status of the deliverable if it fails.
                if ($notification instanceof HasAfterSendHook) {
                    $notification->afterSend($notifiable, $deliverable, $result, $emailMessage);
                }
            } catch (Throwable $exception) {
                report($exception);
            }

            if ($sendingException ?? null) {
                throw $sendingException;
            }
        } catch (NotificationQuotaExceeded $exception) {
            $deliverable->update(['delivery_status' => NotificationDeliveryStatus::RateLimited]);

            if ($emailMessage) {
                $emailMessage->events()->create([
                    'type' => EmailMessageEventType::RateLimited,
                    'payload' => [],
                    'occurred_at' => now(),
                ]);
            }
        } catch (Throwable $exception) {
            $deliverable->update([
                'delivery_status' => NotificationDeliveryStatus::DispatchFailed,
            ]);

            if ($emailMessage) {
                $emailMessage->events()->create([
                    'type' => EmailMessageEventType::FailedDispatch,
                    'payload' => [],
                    'occurred_at' => now(),
                ]);
            }

            throw $exception;
        }
    }

    protected function determineQuotaUsage(MailMessage $message, OutboundDeliverable $deliverable): int
    {
        $usage = ($deliverable->recipient instanceof User) ? 0 : 1;

        $recipientCcEmails = [
            ...$message->cc,
            ...$message->bcc,
        ];

        if ($recipientCcEmails) {
            $usage += (count($recipientCcEmails) - User::query()
                ->whereIn('email', $recipientCcEmails)
                ->count());
        }

        return $usage;
    }

    protected function canSendWithinQuotaLimits(int $usage): bool
    {
        $licenseSettings = app(LicenseSettings::class);

        $resetWindow = $licenseSettings->data->limits->getResetWindow();

        // TODO: Change this to use the MailMessage model instead of the OutboundDeliverable model
        $currentQuotaUsage = OutboundDeliverable::query()
            ->where('channel', NotificationChannel::Email)
            ->whereBetween('created_at', [$resetWindow['start'], $resetWindow['end']])
            ->sum('quota_usage');

        return ($currentQuotaUsage + $usage) <= $licenseSettings->data->limits->emails;
    }
}
