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

namespace AdvisingApp\Engagement\Notifications;

use AdvisingApp\Engagement\Models\Engagement;
use AdvisingApp\Notification\Enums\NotificationChannel;
use AdvisingApp\Notification\Models\Contracts\NotifiableInterface;
use AdvisingApp\Notification\Notifications\Messages\MailMessage;
use App\Models\NotificationSetting;
use App\Models\User;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class EngagementFailedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Engagement $engagement
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return MailMessage::make()
            ->settings($this->resolveNotificationSetting($notifiable))
            ->subject('The following engagement failed to be delivered.')
            ->line("The engagement with the following contents was unable to be delivered to {$this->engagement->recipient->display_name}.")
            ->line('Subject: ' . ($this->engagement->subject ?? 'n/a'))
            ->line('Body: ' . $this->engagement->getBody());
    }

    public function toDatabase(object $notifiable): array
    {
        $engagementType = match ($this->engagement->channel) {
            NotificationChannel::Email => 'Email',
            NotificationChannel::Sms => 'SMS',
            default => ''
        };

        $morph = str($this->engagement->recipient->getMorphClass());

        return FilamentNotification::make()
            ->danger()
            ->title('Engagement Delivery Failed')
            ->body("Your engagement {$engagementType} failed to be delivered to {$morph} {$this->engagement->recipient->display_name}.")
            ->getDatabaseMessage();
    }

    private function resolveNotificationSetting(NotifiableInterface $notifiable): ?NotificationSetting
    {
        return $notifiable instanceof User ? $this->engagement->createdBy->teams()->first()?->division?->notificationSetting?->setting : null;
    }
}
