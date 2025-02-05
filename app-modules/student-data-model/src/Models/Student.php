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

namespace AdvisingApp\StudentDataModel\Models;

use AdvisingApp\Alert\Models\Alert;
use AdvisingApp\Application\Models\ApplicationSubmission;
use AdvisingApp\Audit\Models\Concerns\Auditable as AuditableTrait;
use AdvisingApp\Authorization\Enums\LicenseType;
use AdvisingApp\BasicNeeds\Models\BasicNeedsProgram;
use AdvisingApp\CareTeam\Models\CareTeam;
use AdvisingApp\CaseManagement\Models\CaseModel;
use AdvisingApp\Engagement\Models\Concerns\HasManyMorphedEngagementResponses;
use AdvisingApp\Engagement\Models\Concerns\HasManyMorphedEngagements;
use AdvisingApp\Engagement\Models\EngagementFile;
use AdvisingApp\Engagement\Models\EngagementFileEntities;
use AdvisingApp\Form\Models\FormSubmission;
use AdvisingApp\Interaction\Models\Concerns\HasManyMorphedInteractions;
use AdvisingApp\MeetingCenter\Models\EventAttendee;
use AdvisingApp\Notification\Models\Concerns\HasSubscriptions;
use AdvisingApp\Notification\Models\Concerns\NotifiableViaSms;
use AdvisingApp\Notification\Models\Contracts\CanBeNotified;
use AdvisingApp\Notification\Models\Contracts\Subscribable;
use AdvisingApp\Notification\Models\Subscription;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Segment\Models\SegmentSubject;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource;
use AdvisingApp\StudentDataModel\Models\Contracts\Educatable;
use AdvisingApp\Task\Models\Task;
use AdvisingApp\Timeline\Models\Contracts\HasFilamentResource;
use AdvisingApp\Timeline\Models\Timeline;
use App\Enums\TagType;
use App\Models\Authenticatable;
use App\Models\Scopes\HasLicense;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as BaseAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * @property string $display_name
 * @property string $mobile
 *
 * @mixin IdeHelperStudent
 */
class Student extends BaseAuthenticatable implements Auditable, Subscribable, Educatable, HasFilamentResource, CanBeNotified
{
    use SoftDeletes;
    use HasApiTokens;
    use AuditableTrait;
    use HasFactory;
    use Notifiable;
    use HasManyMorphedEngagements;
    use HasManyMorphedEngagementResponses;
    use HasManyMorphedInteractions;
    use HasSubscriptions;
    use NotifiableViaSms;
    use UsesTenantConnection;
    use HasRelationships;

    protected $table = 'students';

    protected $primaryKey = 'sisid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'sisid',
        'otherid',
        'first',
        'last',
        'full_name',
        'preferred',
        'birthdate',
        'hsgrad',
        'email',
        'email_2',
        'mobile',
        'phone',
        'address',
        'address2',
        'address3',
        'city',
        'state',
        'postal',
        'sms_opt_out',
        'email_bounce',
        'dual',
        'ferpa',
        'dfw',
        'sap',
        'holds',
        'firstgen',
        'ethnicity',
        'lastlmslogin',
        'f_e_term',
        'mr_e_term',
    ];

    protected $casts = [
        'sisid' => 'string',
        'updated_at_source' => 'datetime',
        'birthdate' => 'date',
        'dfw' => 'date',
    ];

    public function identifier(): string
    {
        return $this->sisid;
    }

    public static function displayFirstNameKey(): string
    {
        return 'first';
    }

    public static function displayLastNameKey(): string
    {
        return 'last';
    }

    public static function displayNameKey(): string
    {
        return 'full_name';
    }

    public static function displayEmailKey(): string
    {
        return 'email';
    }

    public static function displayPreferredNameKey(): string
    {
        return 'preferred';
    }

    public function cases(): MorphMany
    {
        return $this->morphMany(
            related: CaseModel::class,
            name: 'respondent',
            type: 'respondent_type',
            id: 'respondent_id',
            localKey: 'sisid'
        );
    }

    public function engagementFiles(): MorphToMany
    {
        return $this->morphToMany(
            related: EngagementFile::class,
            name: 'entity',
            table: 'engagement_file_entities',
            foreignPivotKey: 'entity_id',
            relatedPivotKey: 'engagement_file_id',
            relation: 'engagementFiles',
        )->using(EngagementFileEntities::class)
            ->withTimestamps();
    }

    public function tasks(): MorphMany
    {
        return $this->morphMany(Task::class, 'concern');
    }

    public function alerts(): MorphMany
    {
        return $this->morphMany(Alert::class, 'concern');
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class, 'sisid', 'sisid');
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'sisid', 'sisid');
    }

    public function formSubmissions(): MorphMany
    {
        return $this->morphMany(FormSubmission::class, 'author');
    }

    public function applicationSubmissions(): MorphMany
    {
        return $this->morphMany(ApplicationSubmission::class, 'author');
    }

    public function careTeam(): MorphToMany
    {
        return $this->morphToMany(
            related: User::class,
            name: 'educatable',
            table: 'care_teams',
        )
            ->using(CareTeam::class)
            ->withPivot('id')
            ->withTimestamps()
            ->tap(new HasLicense($this->getLicenseType()));
    }

    public function subscribedUsers(): MorphToMany
    {
        return $this->morphToMany(
            related: User::class,
            name: 'subscribable',
            table: 'subscriptions',
        )
            ->using(Subscription::class)
            ->withPivot('id')
            ->withTimestamps()
            ->tap(new HasLicense($this->getLicenseType()));
    }

    public function eventAttendeeRecords(): HasMany
    {
        return $this->hasMany(
            related: EventAttendee::class,
            foreignKey: 'email',
            localKey: 'email',
        );
    }

    public function segmentSubjects(): MorphMany
    {
        return $this->morphMany(
            related: SegmentSubject::class,
            name: 'subject',
            type: 'subject_type',
            id: 'subject_id',
            localKey: 'sisid'
        );
    }

    public static function filamentResource(): string
    {
        return StudentResource::class;
    }

    public function alertHistories(): HasManyDeep
    {
        return $this->hasManyDeepFromRelations($this->alerts(), (new Alert())->histories());
    }

    public function taskHistories(): HasManyDeep
    {
        return $this->hasManyDeepFromRelations($this->tasks(), (new Task())->histories());
    }

    public function prospects(): HasMany
    {
        return $this->hasMany(Prospect::class, 'student_id');
    }

    public static function getLicenseType(): LicenseType
    {
        return LicenseType::RetentionCrm;
    }

    public function timeline(): MorphOne
    {
        return $this->morphOne(Timeline::class, 'entity');
    }

    public function basicNeedsPrograms(): MorphToMany
    {
        return $this->morphToMany(
            related: BasicNeedsProgram::class,
            name: 'program_participants',
            table: 'program_participants',
            foreignPivotKey: 'program_participants_id',
            relatedPivotKey: 'basic_needs_program_id'
        )->withTimestamps();
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(StudentAddress::class, 'sisid');
    }

    public function emailAddresses(): HasMany
    {
        return $this->hasMany(StudentEmailAddress::class, 'sisid');
    }

    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(StudentPhoneNumber::class, 'sisid');
    }

    public static function getLabel(): string
    {
        return 'student';
    }

    public function canRecieveSms(): bool
    {
        return filled($this->mobile);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(
            related: Tag::class,
            name: 'taggable',
            table: 'taggables',
            foreignPivotKey: 'taggable_id',
            relatedPivotKey: 'tag_id',
        )
            ->using(Taggable::class)
            ->withPivot(['tag_id'])
            ->withTimestamps()
            ->where('type', TagType::Student);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('licensed', function (Builder $builder) {
            if (! auth()->check()) {
                return;
            }

            /** @var Authenticatable $user */
            $user = auth()->user();

            if (! $user->hasLicense(Student::getLicenseType())) {
                $builder->whereRaw('1 = 0');
            }
        });
    }

    protected function displayName(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value, array $attributes) => $attributes[$this->displayNameKey()],
        );
    }

    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                $addressLine = trim("{$attributes['address']} {$attributes['address2']} {$attributes['address3']}");

                return trim(sprintf(
                    '%s %s %s %s',
                    ! empty($addressLine) ? $addressLine . ',' : '',
                    ! empty($attributes['city']) ? $attributes['city'] . ',' : '',
                    ! empty($attributes['state']) ? $attributes['state'] : '',
                    ! empty($attributes['postal']) ? $attributes['postal'] : '',
                ));
            }
        );
    }
}
