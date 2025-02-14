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

namespace AdvisingApp\MeetingCenter\Models;

use AdvisingApp\MeetingCenter\Enums\EventAttendeeStatus;
use AdvisingApp\Notification\Models\Contracts\CanBeNotified;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectEmailAddress;
use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\StudentDataModel\Models\StudentEmailAddress;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin IdeHelperEventAttendee
 */
class EventAttendee extends BaseModel implements CanBeNotified
{
    use Notifiable;

    protected $fillable = [
        'status',
        'email',
        'event_id',
    ];

    protected $casts = [
        'status' => EventAttendeeStatus::class,
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(EventRegistrationFormSubmission::class, 'event_attendee_id');
    }

    public function prospects(): HasManyThrough
    {
        return $this->hasManyThrough(
            Prospect::class,
            ProspectEmailAddress::class,
            'address', 
            'primary_email_id', 
            'email', 
            'id'
        );
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            StudentEmailAddress::class,
            'address', 
            'primary_email_id', 
            'email',
            'id'
        );
    }

    public function canRecieveSms(): bool
    {
        return false;
    }
}
