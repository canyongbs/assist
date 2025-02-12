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

namespace AdvisingApp\Engagement\Models;

use AdvisingApp\Audit\Models\Concerns\Auditable as AuditableTrait;
use AdvisingApp\Engagement\Actions\GenerateEngagementBodyContent;
use AdvisingApp\Engagement\Models\Contracts\HasDeliveryMethod;
use AdvisingApp\Engagement\Observers\EngagementObserver;
use AdvisingApp\Notification\Enums\NotificationChannel;
use AdvisingApp\Notification\Models\Contracts\CanTriggerAutoSubscription;
use AdvisingApp\Notification\Models\Contracts\Subscribable;
use AdvisingApp\Notification\Models\EmailMessage;
use AdvisingApp\Notification\Models\SmsMessage;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\StudentDataModel\Models\Concerns\BelongsToEducatable;
use AdvisingApp\StudentDataModel\Models\Contracts\Educatable;
use AdvisingApp\StudentDataModel\Models\Scopes\LicensedToEducatable;
use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\Timeline\Models\Contracts\ProvidesATimeline;
use AdvisingApp\Timeline\Models\Timeline;
use AdvisingApp\Timeline\Timelines\EngagementTimeline;
use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use League\HTMLToMarkdown\HtmlConverter;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property-read Educatable $recipient
 *
 * @mixin IdeHelperEngagement
 */
#[ObservedBy([EngagementObserver::class])]
class Engagement extends BaseModel implements Auditable, CanTriggerAutoSubscription, ProvidesATimeline, HasDeliveryMethod, HasMedia
{
    use AuditableTrait;
    use BelongsToEducatable;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'engagement_batch_id',
        'subject',
        'body',
        'recipient_id',
        'recipient_type',
        'scheduled_at',
        'dispatched_at',
        'channel',
    ];

    protected $casts = [
        'body' => 'array',
        'scheduled_at' => 'datetime',
        'dispatched_at' => 'datetime',
        'channel' => NotificationChannel::class,
    ];

    // TODO Consider changing this relationship if we ever needed to timeline something else where records might be shared across entities
    public function timelineRecord(): MorphOne
    {
        return $this->morphOne(Timeline::class, 'timelineable');
    }

    public function timeline(): EngagementTimeline
    {
        return new EngagementTimeline($this);
    }

    public static function getTimelineData(Model $forModel): Collection
    {
        return $forModel->orderedEngagements()->with(['latestEmailMessage', 'latestSmsMessage', 'batch'])->get();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->user();
    }

    public function emailMessages(): MorphMany
    {
        return $this->morphMany(
            related: EmailMessage::class,
            name: 'related',
            type: 'related_type',
            id: 'related_id',
            localKey: 'id',
        );
    }

    public function latestEmailMessage(): MorphOne
    {
        return $this->morphOne(EmailMessage::class, 'related')->latestOfMany();
    }

    public function smsMessages(): MorphMany
    {
        return $this->morphMany(
            related: SmsMessage::class,
            name: 'related',
            type: 'related_type',
            id: 'related_id',
            localKey: 'id',
        );
    }

    public function latestSmsMessage(): MorphOne
    {
        return $this->morphOne(SmsMessage::class, 'related')->latestOfMany();
    }

    public function recipient(): MorphTo
    {
        return $this->morphTo(
            name: 'recipient',
            type: 'recipient_type',
            id: 'recipient_id',
        );
    }

    public function engagementBatch(): BelongsTo
    {
        return $this->belongsTo(EngagementBatch::class);
    }

    public function batch(): BelongsTo
    {
        return $this->engagementBatch();
    }

    public function scopeIsNotPartOfABatch(Builder $query): void
    {
        $query->whereNull('engagement_batch_id');
    }

    public function scopeSentToStudent(Builder $query): void
    {
        $query->where('recipient_type', resolve(Student::class)->getMorphClass());
    }

    public function scopeSentToProspect(Builder $query): void
    {
        $query->where('recipient_type', resolve(Prospect::class)->getMorphClass());
    }

    public function getSubscribable(): ?Subscribable
    {
        return $this->recipient instanceof Subscribable ? $this->recipient : null;
    }

    public function getBody(): HtmlString
    {
        return app(GenerateEngagementBodyContent::class)(
            $this->body,
            $this->getMergeData(),
            $this->batch ?? $this,
            'body',
        );
    }

    public function getBodyMarkdown(): string
    {
        return stripslashes((new HtmlConverter())->convert($this->getBody()));
    }

    public function getMergeData(): array
    {
        return [
            'student first name' => $this->recipient->getAttribute($this->recipient->displayFirstNameKey()),
            'student last name' => $this->recipient->getAttribute($this->recipient->displayLastNameKey()),
            'student full name' => $this->recipient->getAttribute($this->recipient->displayNameKey()),
            'student email' => $this->recipient->primaryEmail->address,
            'student preferred name' => $this->recipient->getAttribute($this->recipient->displayPreferredNameKey()),
        ];
    }

    /**
     * @param class-string $type
     */
    public static function getMergeTags(string $type): array
    {
        return match ($type) {
            Student::class => [
                'student first name',
                'student last name',
                'student full name',
                'student email',
                'student preferred name',
            ],
            default => [],
        };
    }

    public function getDeliveryMethod(): NotificationChannel
    {
        return $this->channel;
    }

    protected static function booted(): void
    {
        static::addGlobalScope('licensed', function (Builder $builder) {
            $builder->tap(new LicensedToEducatable('recipient'));
        });
    }
}
