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

namespace AdvisingApp\Prospect\Models;

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
use AdvisingApp\Prospect\Filament\Resources\ProspectResource;
use AdvisingApp\Prospect\Observers\ProspectObserver;
use AdvisingApp\StudentDataModel\Models\Contracts\Educatable;
use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\Task\Models\Task;
use AdvisingApp\Timeline\Models\Contracts\HasFilamentResource;
use AdvisingApp\Timeline\Models\Timeline;
use App\Enums\TagType;
use App\Features\ProspectStudentRefactor;
use App\Models\Authenticatable;
use App\Models\Scopes\HasLicense;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\User;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as BaseAuthenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * @property string $display_name
 *
 * @mixin IdeHelperProspect
 */
#[ObservedBy([ProspectObserver::class])]
class Prospect extends BaseAuthenticatable implements Auditable, Subscribable, Educatable, HasFilamentResource, CanBeNotified
{
    use HasApiTokens;
    use AuditableTrait;
    use HasFactory;
    use HasManyMorphedEngagementResponses;
    use HasManyMorphedEngagements;
    use HasManyMorphedInteractions;
    use HasSubscriptions;
    use HasUuids;
    use Notifiable;
    use NotifiableViaSms;
    use SoftDeletes;
    use UsesTenantConnection;
    use HasRelationships;

    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'preferred',
        'description',
        'email',
        'email_2',
        'mobile',
        'sms_opt_out',
        'email_bounce',
        'status_id',
        'source_id',
        'phone',
        'address',
        'address_2',
        'address_3',
        'city',
        'state',
        'postal',
        'birthdate',
        'hsgrad',
        'assigned_to_id',
        'created_by_id',
        'primary_email_id',
        'primary_phone_id',
        'primary_address_id',
    ];

    protected $casts = [
        'sms_opt_out' => 'boolean',
        'email_bounce' => 'boolean',
        'birthdate' => 'date',
    ];

    public function identifier(): string
    {
        return $this->id;
    }

    public function cases(): MorphMany
    {
        return $this->morphMany(
            related: CaseModel::class,
            name: 'respondent',
            type: 'respondent_type',
            id: 'respondent_id',
            localKey: 'id'
        );
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ProspectStatus::class);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(ProspectSource::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'sisid');
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
        )
            ->using(EngagementFileEntities::class)
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

    public function formSubmissions(): MorphMany
    {
        return $this->morphMany(FormSubmission::class, 'author');
    }

    public function applicationSubmissions(): MorphMany
    {
        return $this->morphMany(ApplicationSubmission::class, 'author');
    }

    public static function displayNameKey(): string
    {
        return 'full_name';
    }

    public static function displayEmailKey(): string
    {
        return 'email';
    }

    public static function displayFirstNameKey(): string
    {
        return 'first_name';
    }

    public static function displayLastNameKey(): string
    {
        return 'last_name';
    }

    public static function displayPreferredNameKey(): string
    {
        return 'preferred';
    }

    public static function filamentResource(): string
    {
        return ProspectResource::class;
    }

    public function alertHistories(): HasManyDeep
    {
        return $this->hasManyDeepFromRelations($this->alerts(), (new Alert())->histories());
    }

    public function taskHistories(): HasManyDeep
    {
        return $this->hasManyDeepFromRelations($this->tasks(), (new Task())->histories());
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

    public static function getLicenseType(): LicenseType
    {
        return LicenseType::RecruitmentCrm;
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
        return $this->hasMany(ProspectAddress::class);
    }

    public function emailAddresses(): HasMany
    {
        return $this->hasMany(ProspectEmailAddress::class);
    }

    public function phoneNumbers(): HasMany
    {
        return $this->hasMany(ProspectPhoneNumber::class);
    }

    public function primaryEmail(): BelongsTo
    {
        return $this->belongsTo(ProspectEmailAddress::class, 'primary_email_id', 'id');
    }

    public function primaryPhone(): BelongsTo
    {
        return $this->belongsTo(ProspectPhoneNumber::class, 'primary_phone_id', 'id');
    }

    public function primaryAddress(): BelongsTo
    {
        return $this->belongsTo(ProspectAddress::class, 'primary_address_id', 'id');
    }

    public static function getLabel(): string
    {
        return 'prospect';
    }

    /**
     * @return MorphToMany<Pipeline>
     */
    public function educatablePipelineStages(): MorphToMany
    {
        return $this->morphToMany(
            related: Pipeline::class,
            name: 'educatable',
            table: 'educatable_pipeline_stages',
            foreignPivotKey: 'educatable_id',
            relatedPivotKey: 'pipeline_id',
        )
            ->using(EducatablePipelineStage::class)
            ->withPivot(['pipeline_stage_id'])
            ->withTimestamps();
    }

    public function canRecieveSms(): bool
    {
        if (ProspectStudentRefactor::active()) {
            return $this->primaryPhone && $this->primaryPhone->number && $this->primaryPhone->can_recieve_sms;
        }

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
            ->where('type', TagType::Prospect);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return array<string, string>|string|null
     */
    public function routeNotificationForMail(Notification $notification): array|string|null
    {
        if (ProspectStudentRefactor::active()) {
            return $this->primaryEmail?->address;
        }

        return $this->email;
    }

    protected static function booted(): void
    {
        static::addGlobalScope('licensed', function (Builder $builder) {
            if (! auth()->check()) {
                return;
            }

            /** @var Authenticatable $user */
            $user = auth()->user();

            if (! $user->hasLicense(Prospect::getLicenseType())) {
                $builder->whereRaw('1 = 0');
            }
        });
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format(config('project.datetime_format') ?? 'Y-m-d H:i:s');
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
                if (ProspectStudentRefactor::active()) {
                    $address = $this->primaryAddress;

                    if (! $address) {
                        return null;
                    }

                    $addressLine = trim("{$address['line_1']} {$address['line_2']} {$address['line_3']}");

                    return trim(sprintf(
                        '%s %s %s %s',
                        ! empty($addressLine) ? $addressLine . ',' : '',
                        ! empty($address['city']) ? $address['city'] . ',' : '',
                        ! empty($address['state']) ? $address['state'] : '',
                        ! empty($address['postal']) ? $address['postal'] : '',
                    ));
                }

                $addressLine = trim("{$attributes['address']} {$attributes['address_2']} {$attributes['address_3']}");

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
