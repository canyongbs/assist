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

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property int|null $completed_at
 * @property string $file_disk
 * @property string|null $file_name
 * @property string $exporter
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereExporter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereFileDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereProcessedRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereSuccessfulRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereTotalRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Export withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperExport {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property array<array-key, mixed> $data
 * @property string $import_id
 * @property string|null $validation_error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Import $import
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereImportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow whereValidationError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FailedImportRow withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFailedImportRow {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $check_name
 * @property string $check_label
 * @property string $status
 * @property string|null $notification_message
 * @property string|null $short_summary
 * @property array<array-key, mixed> $meta
 * @property string $ended_at
 * @property string $batch
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\Health\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereCheckLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereCheckName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereEndedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereNotificationMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereShortSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthCheckResultHistoryItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperHealthCheckResultHistoryItem {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property int|null $completed_at
 * @property string $file_name
 * @property string $file_path
 * @property string $importer
 * @property int $processed_rows
 * @property int $total_rows
 * @property int $successful_rows
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FailedImportRow> $failedRows
 * @property-read int|null $failed_rows_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereImporter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereProcessedRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereSuccessfulRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereTotalRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Import withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperImport {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $group
 * @property string $name
 * @property bool $locked
 * @property string $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LandlordSettingsProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLandlordSettingsProperty {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Spatie\ScheduleMonitor\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MonitoredScheduledTaskLogItem> $logItems
 * @property-read int|null $log_items_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTask query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperMonitoredScheduledTask {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Spatie\ScheduleMonitor\Models\TFactory|null $use_factory
 * @property-read \App\Models\MonitoredScheduledTask|null $monitoredScheduledTask
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTaskLogItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTaskLogItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MonitoredScheduledTaskLogItem query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperMonitoredScheduledTaskLogItem {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $primary_color
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $from_name
 * @property-read \App\Models\NotificationSettingPivot|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Division\Models\Division> $divisions
 * @property-read int|null $divisions_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\NotificationSettingPivot> $settings
 * @property-read int|null $settings_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSetting withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotificationSetting {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $notification_setting_id
 * @property string $related_to_type
 * @property string $related_to_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $relatedTo
 * @property-read \App\Models\NotificationSetting $setting
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereNotificationSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereRelatedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereRelatedToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NotificationSettingPivot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperNotificationSettingPivot {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Database\Factories\PronounsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pronouns withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPronouns {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $group
 * @property string $name
 * @property bool $locked
 * @property string $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SettingsProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSettingsProperty {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SystemUser withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSystemUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \App\Enums\TagType $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\Taggable|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \Database\Factories\TagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTag {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $tag_id
 * @property string $taggable_id
 * @property string $taggable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $prospects
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $students
 * @property-read \App\Models\Tag $tag
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereTaggableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereTaggableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Taggable whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTaggable {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $domain
 * @property mixed $key
 * @property mixed $config
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $setup_complete
 * @property-read \Spatie\Multitenancy\Models\TFactory|null $use_factory
 * @method static \Spatie\Multitenancy\TenantCollection<int, static> all($columns = ['*'])
 * @method static \Database\Factories\TenantFactory factory($count = null, $state = [])
 * @method static \Spatie\Multitenancy\TenantCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereSetupComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tenant withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTenant {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $emplid
 * @property string|null $name
 * @property string|null $email
 * @property bool $is_email_visible_on_profile
 * @property string|null $password
 * @property string|null $remember_token
 * @property string|null $locale
 * @property string|null $type
 * @property bool $is_external
 * @property string|null $bio
 * @property bool $is_bio_visible_on_profile
 * @property string|null $avatar_url
 * @property bool $are_teams_visible_on_profile
 * @property bool $is_division_visible_on_profile
 * @property string $timezone
 * @property bool $has_enabled_public_profile
 * @property string|null $public_profile_slug
 * @property bool $office_hours_are_enabled
 * @property bool $appointments_are_restricted_to_existing_students
 * @property array<array-key, mixed>|null $office_hours
 * @property bool $out_of_office_is_enabled
 * @property \Illuminate\Support\Carbon|null $out_of_office_starts_at
 * @property \Illuminate\Support\Carbon|null $out_of_office_ends_at
 * @property string|null $phone_number
 * @property bool $is_phone_number_visible_on_profile
 * @property bool $working_hours_are_enabled
 * @property bool $are_working_hours_visible_on_profile
 * @property array<array-key, mixed>|null $working_hours
 * @property string|null $job_title
 * @property string|null $pronouns_id
 * @property bool $are_pronouns_visible_on_profile
 * @property bool $default_assistant_chat_folders_created
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Carbon\CarbonImmutable|null $last_chat_ping_at
 * @property string|null $multifactor_secret
 * @property string|null $multifactor_recovery_codes
 * @property string|null $multifactor_confirmed_at
 * @property bool $is_branding_bar_dismissed
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property \Illuminate\Support\Carbon|null $last_logged_in_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiAssistantUpvote> $aiAssistantUpvotes
 * @property-read int|null $ai_assistant_upvotes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiThreadFolder> $aiThreadFolders
 * @property-read int|null $ai_thread_folders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiThread> $aiThreads
 * @property-read int|null $ai_threads_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Task\Models\Task> $assignedTasks
 * @property-read int|null $assigned_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\MeetingCenter\Models\Calendar|null $calendar
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CareTeam\Models\CareTeam> $careTeams
 * @property-read int|null $care_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseAssignment> $caseAssignments
 * @property-read int|null $case_assignments_count
 * @property-read \AdvisingApp\Team\Models\TeamUser|\AdvisingApp\Notification\Models\Subscription|\AdvisingApp\CareTeam\Models\CareTeam|\AdvisingApp\Consent\Models\UserConsentAgreement|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Consent\Models\ConsentAgreement> $consentAgreements
 * @property-read int|null $consent_agreements_count
 * @property-read \AdvisingApp\InAppCommunication\Models\TwilioConversationUser|null $participant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\InAppCommunication\Models\TwilioConversation> $conversations
 * @property-read int|null $conversations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementBatch> $engagementBatches
 * @property-read int|null $engagement_batches_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $engagements
 * @property-read int|null $engagements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\CalendarEvent> $events
 * @property-read int|null $events_count
 * @property-read mixed $is_admin
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\License> $licenses
 * @property-read int|null $licenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Report\Models\TrackedEvent> $logins
 * @property-read int|null $logins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Report\Models\TrackedEventCount> $loginsCount
 * @property-read int|null $logins_count_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Pronouns|null $pronouns
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospectCareTeams
 * @property-read int|null $prospect_care_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospectSubscriptions
 * @property-read int|null $prospect_subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Segment\Models\Segment> $segments
 * @property-read int|null $segments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Student> $studentCareTeams
 * @property-read int|null $student_care_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Student> $studentSubscriptions
 * @property-read int|null $student_subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Team\Models\Team> $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Alert\Models\Alert[] $studentAlerts
 * @property-read int|null $student_alerts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Alert\Models\Alert[] $prospectAlerts
 * @property-read int|null $prospect_alerts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Authorization\Models\Permission[] $permissionsFromRoles
 * @property-read int|null $permissions_from_roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\CaseManagement\Models\CaseModel[] $cases
 * @property-read int|null $cases_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User admins()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User advancedFilter($data)
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAppointmentsAreRestrictedToExistingStudents($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereArePronounsVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAreTeamsVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAreWorkingHoursVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatarUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDefaultAssistantChatFoldersCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmplid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHasEnabledPublicProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsBioVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsBrandingBarDismissed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsDivisionVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsEmailVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsExternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsPhoneNumberVisibleOnProfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastChatPingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLoggedInAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMultifactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMultifactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMultifactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOfficeHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOfficeHoursAreEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOutOfOfficeEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOutOfOfficeIsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereOutOfOfficeStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePronounsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePublicProfileSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereWorkingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereWorkingHoursAreEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $assistant_id
 * @property string $name
 * @property string|null $description
 * @property string|null $instructions
 * @property string|null $knowledge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \AdvisingApp\Ai\Enums\AiApplication $application
 * @property bool $is_default
 * @property \AdvisingApp\Ai\Enums\AiModel $model
 * @property \Illuminate\Support\Carbon|null $archived_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiAssistantFile> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiThread> $threads
 * @property-read int|null $threads_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiAssistantUpvote> $upvotes
 * @property-read int|null $upvotes_count
 * @method static \AdvisingApp\Ai\Database\Factories\AiAssistantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereApplication($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereArchivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereAssistantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereKnowledge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistant withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiAssistant {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $assistant_id
 * @property string|null $file_id
 * @property string|null $name
 * @property string|null $temporary_url
 * @property string|null $mime_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\Ai\Models\AiAssistant $assistant
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \AdvisingApp\Ai\Database\Factories\AiAssistantFileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereAssistantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereTemporaryUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantFile withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiAssistantFile {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $assistant_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\Ai\Models\AiAssistant $assistant
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereAssistantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiAssistantUpvote withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiAssistantUpvote {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $message_id
 * @property string $content
 * @property string|null $context
 * @property array<array-key, mixed>|null $request
 * @property string $thread_id
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $prompt_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiMessageFile> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Ai\Models\Prompt|null $prompt
 * @property-read \AdvisingApp\Ai\Models\AiThread $thread
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Ai\Database\Factories\AiMessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage wherePromptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessage withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiMessage {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $message_id
 * @property string|null $file_id
 * @property string|null $name
 * @property string|null $temporary_url
 * @property string|null $mime_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \AdvisingApp\Ai\Models\AiMessage $message
 * @method static \AdvisingApp\Ai\Database\Factories\AiMessageFileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereTemporaryUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiMessageFile withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiMessageFile {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $thread_id
 * @property string|null $name
 * @property string $assistant_id
 * @property string|null $folder_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $locked_at
 * @property \Illuminate\Support\Carbon|null $saved_at
 * @property int $cloned_count
 * @property int $emailed_count
 * @property-read \AdvisingApp\Ai\Models\AiAssistant $assistant
 * @property-read \AdvisingApp\Ai\Models\AiThreadFolder|null $folder
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Carbon\CarbonInterface|null $last_engaged_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User $user
 * @property-read \AdvisingApp\Ai\Models\AiMessage|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \AdvisingApp\Ai\Database\Factories\AiThreadFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereAssistantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereClonedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereEmailedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereLockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereSavedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThread withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiThread {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \AdvisingApp\Ai\Enums\AiApplication $application
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\AiThread> $threads
 * @property-read int|null $threads_count
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Ai\Database\Factories\AiThreadFolderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereApplication($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AiThreadFolder withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAiThreadFolder {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $message
 * @property array<array-key, mixed> $metadata
 * @property string $user_id
 * @property array<array-key, mixed> $request
 * @property \Illuminate\Support\Carbon $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $ai_assistant_name
 * @property \AdvisingApp\Ai\Enums\AiFeature|null $feature
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereAiAssistantName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereFeature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereMetadata($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereRequest($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LegacyAiMessageLog whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLegacyAiMessageLog {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property string $prompt
 * @property string $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $user_id
 * @property bool $is_smart
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Ai\Models\PromptType $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\PromptUpvote> $upvotes
 * @property-read int|null $upvotes_count
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\PromptUse> $uses
 * @property-read int|null $uses_count
 * @method static \AdvisingApp\Ai\Database\Factories\PromptFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereIsSmart($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt wherePrompt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prompt withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPrompt {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Ai\Models\Prompt> $prompts
 * @property-read int|null $prompts_count
 * @method static \AdvisingApp\Ai\Database\Factories\PromptTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptType withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPromptType {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $prompt_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Ai\Models\Prompt $prompt
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote wherePromptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUpvote withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPromptUpvote {}
}

namespace AdvisingApp\Ai\Models{
/**
 * 
 *
 * @property string $id
 * @property string $prompt_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Ai\Models\Prompt $prompt
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Ai\Database\Factories\PromptUseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse wherePromptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PromptUse withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPromptUse {}
}

namespace AdvisingApp\Alert\Models{
/**
 * 
 *
 * @property-read Student|Prospect $concern
 * @property string $id
 * @property string $concern_type
 * @property string $concern_id
 * @property string $description
 * @property \AdvisingApp\Alert\Enums\AlertSeverity $severity
 * @property string $suggested_intervention
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $created_by
 * @property string $status_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Alert\Histories\AlertHistory> $histories
 * @property-read int|null $histories_count
 * @property-read \AdvisingApp\Alert\Models\AlertStatus $status
 * @method static \AdvisingApp\Alert\Database\Factories\AlertFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereConcernId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereConcernType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereSeverity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereSuggestedIntervention($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Alert withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAlert {}
}

namespace AdvisingApp\Alert\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Alert\Enums\SystemAlertStatusClassification $classification
 * @property string $name
 * @property int $order
 * @property bool $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Alert\Models\Alert> $alerts
 * @property-read int|null $alerts_count
 * @property-read \AdvisingApp\Alert\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\Alert\Database\Factories\AlertStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AlertStatus withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAlertStatus {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property bool $embed_enabled
 * @property array<array-key, mixed>|null $allowed_domains
 * @property string|null $primary_color
 * @property \AdvisingApp\Form\Enums\Rounding|null $rounding
 * @property bool $is_wizard
 * @property array<array-key, mixed>|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationField> $fields
 * @property-read int|null $fields_count
 * @property-read \AdvisingApp\Form\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationStep> $steps
 * @property-read int|null $steps_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Application\Database\Factories\ApplicationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereAllowedDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereEmbedEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereIsWizard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Application whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplication {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property string|null $code
 * @property string $application_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $author
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Application\Models\Application $submissible
 * @method static \AdvisingApp\Application\Database\Factories\ApplicationAuthenticationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplicationAuthentication {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property bool $is_required
 * @property array<array-key, mixed> $config
 * @property string $application_id
 * @property string|null $step_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Application\Models\ApplicationStep|null $step
 * @property-read \AdvisingApp\Application\Models\Application $submissible
 * @method static \AdvisingApp\Application\Database\Factories\ApplicationFieldFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationField withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplicationField {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property array<array-key, mixed>|null $content
 * @property string $application_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Application\Models\Application $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationStep withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplicationStep {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property string $application_id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property string $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Application\Models\ApplicationSubmissionState $state
 * @property-read \AdvisingApp\Application\Models\Application $submissible
 * @method static \AdvisingApp\Application\Database\Factories\ApplicationSubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplicationSubmission {}
}

namespace AdvisingApp\Application\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Application\Enums\ApplicationSubmissionStateClassification $classification
 * @property string $name
 * @property \AdvisingApp\Application\Enums\ApplicationSubmissionStateColorOptions $color
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Application\Database\Factories\ApplicationSubmissionStateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ApplicationSubmissionState withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperApplicationSubmissionState {}
}

namespace AdvisingApp\Audit\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $change_agent_type
 * @property string|null $change_agent_id
 * @property string $event
 * @property string $auditable_type
 * @property string $auditable_id
 * @property array<array-key, mixed>|null $old_values
 * @property array<array-key, mixed>|null $new_values
 * @property string|null $url
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $change_agent_name
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $auditable
 * @property-read \AdvisingApp\Audit\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $user
 * @method static \AdvisingApp\Audit\Database\Factories\AuditFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereAuditableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereAuditableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereChangeAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereChangeAgentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereChangeAgentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereNewValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereOldValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Audit whereUserAgent($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAudit {}
}

namespace AdvisingApp\Authorization\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property \AdvisingApp\Authorization\Enums\LicenseType $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|License withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperLicense {}
}

namespace AdvisingApp\Authorization\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $group_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Authorization\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Authorization\Models\PermissionGroup $group
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SystemUser> $systemUsers
 * @property-read int|null $system_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission api()
 * @method static \AdvisingApp\Authorization\Database\Factories\PermissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission web()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPermission {}
}

namespace AdvisingApp\Authorization\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PermissionGroup withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPermissionGroup {}
}

namespace AdvisingApp\Authorization\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Authorization\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Authorization\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role api()
 * @method static \AdvisingApp\Authorization\Database\Factories\RoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role superAdmin()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role web()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role withoutPermission($permissions)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperRole {}
}

namespace AdvisingApp\BasicNeeds\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\BasicNeeds\Models\BasicNeedsProgram> $basicNeedsProgram
 * @property-read int|null $basic_needs_program_count
 * @property-read \AdvisingApp\BasicNeeds\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\BasicNeeds\Database\Factories\BasicNeedsCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsCategory withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBasicNeedsCategory {}
}

namespace AdvisingApp\BasicNeeds\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string $basic_needs_category_id
 * @property string|null $contact_person
 * @property string|null $contact_email
 * @property string|null $contact_phone
 * @property string|null $location
 * @property string|null $availability
 * @property string|null $eligibility_criteria
 * @property string|null $application_process
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\BasicNeeds\Models\BasicNeedsCategory $basicNeedsCategories
 * @property-read \AdvisingApp\BasicNeeds\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\BasicNeeds\Database\Factories\BasicNeedsProgramFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereApplicationProcess($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereBasicNeedsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereEligibilityCriteria($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BasicNeedsProgram withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBasicNeedsProgram {}
}

namespace AdvisingApp\Campaign\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property bool $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $segment_id
 * @property string $created_by_type
 * @property string $created_by_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Campaign\Models\CampaignAction> $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $createdBy
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Segment\Models\Segment $segment
 * @method static \AdvisingApp\Campaign\Database\Factories\CampaignFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign hasNotBeenExecuted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereCreatedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Campaign withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCampaign {}
}

namespace AdvisingApp\Campaign\Models{
/**
 * 
 *
 * @property string $id
 * @property string $campaign_id
 * @property \AdvisingApp\Campaign\Enums\CampaignActionType $type
 * @property array<array-key, mixed> $data
 * @property \Illuminate\Support\Carbon $execute_at
 * @property string|null $last_execution_attempt_at
 * @property string|null $last_execution_attempt_error
 * @property string|null $successfully_executed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Campaign\Models\Campaign $campaign
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction campaignEnabled()
 * @method static \AdvisingApp\Campaign\Database\Factories\CampaignActionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction hasNotBeenExecuted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereCampaignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereExecuteAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereLastExecutionAttemptAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereLastExecutionAttemptError($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereSuccessfullyExecutedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CampaignAction withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCampaignAction {}
}

namespace AdvisingApp\CareTeam\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $educatable_id
 * @property string $educatable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\StudentDataModel\Models\Contracts\Educatable $educatable
 * @property-read \AdvisingApp\CareTeam\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereEducatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereEducatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareTeam whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCareTeam {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $case_model_id
 * @property string $user_id
 * @property string|null $assigned_by_id
 * @property \Illuminate\Support\Carbon $assigned_at
 * @property \AdvisingApp\CaseManagement\Enums\CaseAssignmentStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $assignedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseModel $case
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseAssignmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereAssignedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereAssignedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereCaseModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseAssignment withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseAssignment {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $case_type_id
 * @property string $name
 * @property string|null $description
 * @property bool $embed_enabled
 * @property array<array-key, mixed>|null $allowed_domains
 * @property string|null $primary_color
 * @property \AdvisingApp\Form\Enums\Rounding|null $rounding
 * @property bool $is_authenticated
 * @property bool $is_wizard
 * @property bool $recaptcha_enabled
 * @property array<array-key, mixed>|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \AdvisingApp\Form\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseFormStep> $steps
 * @property-read int|null $steps_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseFormSubmission> $submissions
 * @property-read int|null $submissions_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereAllowedDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereCaseTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereEmbedEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereIsAuthenticated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereIsWizard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereRecaptchaEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseForm whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseForm {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property string|null $code
 * @property string $case_form_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $author
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereCaseFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseFormAuthentication {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property bool $is_required
 * @property array<array-key, mixed> $config
 * @property string $case_form_id
 * @property string|null $case_form_step_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm|null $step
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereCaseFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereCaseFormStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormField withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseFormField {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property array<array-key, mixed>|null $content
 * @property string $case_form_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm|null $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereCaseFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormStep withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseFormStep {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property Student|Prospect|null $author
 * @property string $id
 * @property string $case_form_id
 * @property string|null $case_priority_id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property \Carbon\CarbonImmutable|null $submitted_at
 * @property \Carbon\CarbonImmutable|null $canceled_at
 * @property \AdvisingApp\Form\Enums\FormSubmissionRequestDeliveryMethod|null $request_method
 * @property string|null $request_note
 * @property string|null $requester_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \AdvisingApp\CaseManagement\Models\CaseModel|null $case
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\CaseManagement\Models\CasePriority|null $priority
 * @property-read \App\Models\User|null $requester
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission canceled()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission notCanceled()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission notSubmitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission requested()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission submitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereCaseFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereCasePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereRequestMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereRequestNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereRequesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseFormSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseFormSubmission {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $case_model_id
 * @property array<array-key, mixed> $original_values
 * @property array<array-key, mixed> $new_values
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\CaseManagement\Models\CaseModel $case
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read mixed $new_values_formatted
 * @property-read mixed $original_values_formatted
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereCaseModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereNewValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereOriginalValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseHistory withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseHistory {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property-read Student|Prospect $respondent
 * @property string $id
 * @property string $case_number
 * @property string $respondent_type
 * @property string $respondent_id
 * @property string|null $close_details
 * @property string|null $res_details
 * @property string|null $case_form_submission_id
 * @property string $division_id
 * @property string|null $status_id
 * @property string|null $priority_id
 * @property string|null $created_by_id
 * @property \Carbon\CarbonImmutable|null $status_updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\CaseManagement\Models\CaseAssignment|null $assignedTo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseAssignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseFormSubmission|null $caseFormSubmission
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseUpdate> $caseUpdates
 * @property-read int|null $case_updates_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \AdvisingApp\Division\Models\Division $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\EmailMessage> $emailMessages
 * @property-read int|null $email_messages_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseHistory> $histories
 * @property-read int|null $histories_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseAssignment|null $initialAssignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseUpdate|null $latestInboundCaseUpdate
 * @property-read \AdvisingApp\CaseManagement\Models\CaseUpdate|null $latestOutboundCaseUpdate
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $orderedInteractions
 * @property-read int|null $ordered_interactions_count
 * @property-read \AdvisingApp\CaseManagement\Models\CasePriority|null $priority
 * @property-read \AdvisingApp\CaseManagement\Models\CaseStatus|null $status
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseModelFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel open()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereCaseFormSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereCaseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereCloseDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel wherePriorityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereResDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereRespondentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereRespondentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereStatusUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseModel withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseModel {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property int $order
 * @property string|null $sla_id
 * @property string $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseModel> $cases
 * @property-read int|null $cases_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\CaseManagement\Models\Sla|null $sla
 * @property-read \AdvisingApp\CaseManagement\Models\CaseType $type
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CasePriorityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereSlaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CasePriority withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCasePriority {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\CaseManagement\Enums\SystemCaseClassification $classification
 * @property string $name
 * @property \AdvisingApp\CaseManagement\Enums\ColumnColorOptions $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseModel> $cases
 * @property-read int|null $cases_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseStatus withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseStatus {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property bool $has_enabled_feedback_collection
 * @property bool $has_enabled_csat
 * @property bool $has_enabled_nps
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseModel> $cases
 * @property-read int|null $cases_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseForm|null $form
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CasePriority> $priorities
 * @property-read int|null $priorities_count
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereHasEnabledCsat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereHasEnabledFeedbackCollection($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereHasEnabledNps($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseType withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseType {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $case_model_id
 * @property string $update
 * @property bool $internal
 * @property \AdvisingApp\CaseManagement\Enums\CaseUpdateDirection $direction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\CaseManagement\Models\CaseModel|null $case
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\CaseManagement\Database\Factories\CaseUpdateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereCaseModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereInternal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereUpdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CaseUpdate withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaseUpdate {}
}

namespace AdvisingApp\CaseManagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property int|null $response_seconds
 * @property int|null $resolution_seconds
 * @property string|null $terms
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CasePriority> $casePriorities
 * @property-read int|null $case_priorities_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereResolutionSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereResponseSeconds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Sla withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSla {}
}

namespace AdvisingApp\Consent\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Consent\Enums\ConsentAgreementType $type
 * @property string $title
 * @property string $description
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Consent\Models\UserConsentAgreement> $userConsentAgreements
 * @property-read int|null $user_consent_agreements_count
 * @property-read \AdvisingApp\Consent\Models\UserConsentAgreement|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \AdvisingApp\Consent\Database\Factories\ConsentAgreementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ConsentAgreement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperConsentAgreement {}
}

namespace AdvisingApp\Consent\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $consent_agreement_id
 * @property string $ip_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Consent\Models\ConsentAgreement $consentAgreement
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereConsentAgreementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserConsentAgreement withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUserConsentAgreement {}
}

namespace AdvisingApp\Division\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string $code
 * @property string|null $header
 * @property string|null $footer
 * @property string|null $created_by_id
 * @property string|null $last_updated_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @property-read \App\Models\User|null $lastUpdatedBy
 * @property-read \App\Models\NotificationSettingPivot|null $notificationSetting
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Team\Models\Team> $teams
 * @property-read int|null $teams_count
 * @method static \AdvisingApp\Division\Database\Factories\DivisionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereLastUpdatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperDivision {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed> $content
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Engagement\Database\Factories\EmailTemplateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailTemplate withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEmailTemplate {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property-read Educatable $recipient
 * @property string $id
 * @property string|null $user_id
 * @property string|null $engagement_batch_id
 * @property string|null $recipient_id
 * @property string|null $recipient_type
 * @property string|null $subject
 * @property array<array-key, mixed>|null $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \AdvisingApp\Notification\Enums\NotificationChannel $channel
 * @property \Illuminate\Support\Carbon|null $scheduled_at
 * @property \Illuminate\Support\Carbon|null $dispatched_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Engagement\Models\EngagementBatch|null $batch
 * @property-read \App\Models\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\EmailMessage> $emailMessages
 * @property-read int|null $email_messages_count
 * @property-read \AdvisingApp\Engagement\Models\EngagementBatch|null $engagementBatch
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Notification\Models\EmailMessage|null $latestEmailMessage
 * @property-read \AdvisingApp\Notification\Models\SmsMessage|null $latestSmsMessage
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\SmsMessage> $smsMessages
 * @property-read int|null $sms_messages_count
 * @property-read \AdvisingApp\Timeline\Models\Timeline|null $timelineRecord
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Engagement\Database\Factories\EngagementFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement isNotPartOfABatch()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement sentToProspect()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement sentToStudent()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereDispatchedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereEngagementBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Engagement withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEngagement {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $identifier
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \AdvisingApp\Notification\Enums\NotificationChannel|null $channel
 * @property string|null $subject
 * @property array<array-key, mixed>|null $body
 * @property \Illuminate\Support\Carbon|null $scheduled_at
 * @property int|null $total_engagements
 * @property int|null $processed_engagements
 * @property int|null $successful_engagements
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $engagements
 * @property-read int|null $engagements_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Engagement\Database\Factories\EngagementBatchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereProcessedEngagements($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereScheduledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereSuccessfulEngagements($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereTotalEngagements($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementBatch whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEngagementBatch {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $description
 * @property string|null $retention_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $created_by_type
 * @property string|null $created_by_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $createdBy
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \AdvisingApp\Engagement\Models\EngagementFileEntities|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Student> $students
 * @property-read int|null $students_count
 * @method static \AdvisingApp\Engagement\Database\Factories\EngagementFileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereCreatedByType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereRetentionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEngagementFile {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $engagement_file_id
 * @property string $entity_id
 * @property string $entity_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\Engagement\Models\EngagementFile $engagementFile
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $entity
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities whereEngagementFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementFileEntities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEngagementFileEntities {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $sender_id
 * @property string|null $sender_type
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $sender
 * @property-read \AdvisingApp\Timeline\Models\Timeline|null $timelineRecord
 * @method static \AdvisingApp\Engagement\Database\Factories\EngagementResponseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse sentByProspect()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse sentByStudent()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereSenderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EngagementResponse withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEngagementResponse {}
}

namespace AdvisingApp\Engagement\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed> $content
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Engagement\Database\Factories\SmsTemplateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsTemplate withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSmsTemplate {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property bool $embed_enabled
 * @property array<array-key, mixed>|null $allowed_domains
 * @property string|null $primary_color
 * @property \AdvisingApp\Form\Enums\Rounding|null $rounding
 * @property bool $is_authenticated
 * @property bool $is_wizard
 * @property bool $recaptcha_enabled
 * @property array<array-key, mixed>|null $content
 * @property string|null $on_screen_response
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property bool $generate_prospects
 * @property-read \AdvisingApp\Form\Models\FormEmailAutoReply|null $emailAutoReply
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormField> $fields
 * @property-read int|null $fields_count
 * @property-read \AdvisingApp\Form\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormStep> $steps
 * @property-read int|null $steps_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Form\Database\Factories\FormFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereAllowedDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereEmbedEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereGenerateProspects($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereIsAuthenticated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereIsWizard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereOnScreenResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereRecaptchaEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Form whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperForm {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property string|null $code
 * @property string $form_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $author
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Form\Models\Form $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormAuthentication {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $subject
 * @property array<array-key, mixed>|null $body
 * @property bool $is_enabled
 * @property string $form_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\Form\Models\Form $form
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereIsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormEmailAutoReply withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormEmailAutoReply {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property bool $is_required
 * @property array<array-key, mixed> $config
 * @property string $form_id
 * @property string|null $step_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Form\Models\FormStep|null $step
 * @property-read \AdvisingApp\Form\Models\Form $submissible
 * @property-read \AdvisingApp\Form\Models\FormFieldSubmission|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Form\Database\Factories\FormFieldFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormField withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormField {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property array<array-key, mixed> $response
 * @property string $field_id
 * @property string $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\Form\Models\FormField $field
 * @property-read \AdvisingApp\Form\Models\FormSubmission $submission
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormFieldSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormFieldSubmission {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property array<array-key, mixed>|null $content
 * @property string $form_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Form\Models\Form $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormStep withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormStep {}
}

namespace AdvisingApp\Form\Models{
/**
 * 
 *
 * @property Student|Prospect|null $author
 * @property string $id
 * @property string $form_id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property \Carbon\CarbonImmutable|null $submitted_at
 * @property \Carbon\CarbonImmutable|null $canceled_at
 * @property \AdvisingApp\Form\Enums\FormSubmissionRequestDeliveryMethod|null $request_method
 * @property string|null $request_note
 * @property string|null $requester_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \AdvisingApp\Form\Models\FormFieldSubmission|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $requester
 * @property-read \AdvisingApp\Form\Models\Form $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission canceled()
 * @method static \AdvisingApp\Form\Database\Factories\FormSubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission notCanceled()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission notSubmitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission requested()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission submitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereRequestMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereRequestNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereRequesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FormSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFormSubmission {}
}

namespace AdvisingApp\InAppCommunication\Models{
/**
 * 
 *
 * @property string $sid
 * @property string|null $friendly_name
 * @property \AdvisingApp\InAppCommunication\Enums\ConversationType $type
 * @property string|null $channel_name
 * @property bool $is_private_channel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\InAppCommunication\Models\TwilioConversationUser|null $participant
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $managers
 * @property-read int|null $managers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $participants
 * @property-read int|null $participants_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereChannelName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereFriendlyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereIsPrivateChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversation withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTwilioConversation {}
}

namespace AdvisingApp\InAppCommunication\Models{
/**
 * 
 *
 * @property string $conversation_sid
 * @property string $user_id
 * @property string $participant_sid
 * @property bool $is_channel_manager
 * @property bool $is_pinned
 * @property \AdvisingApp\InAppCommunication\Enums\ConversationNotificationPreference $notification_preference
 * @property string|null $first_unread_message_sid
 * @property \Carbon\CarbonImmutable|null $first_unread_message_at
 * @property string|null $last_unread_message_content
 * @property \Carbon\CarbonImmutable|null $last_read_at
 * @property int $unread_messages_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\InAppCommunication\Models\TwilioConversation $conversation
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereConversationSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereFirstUnreadMessageAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereFirstUnreadMessageSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereIsChannelManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereIsPinned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereLastReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereLastUnreadMessageContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereNotificationPreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereParticipantSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereUnreadMessagesCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TwilioConversationUser whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTwilioConversationUser {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $subject
 * @property string|null $description
 * @property string|null $user_id
 * @property string|null $interactable_id
 * @property string|null $interactable_type
 * @property string|null $interaction_type_id
 * @property string|null $interaction_relation_id
 * @property string|null $interaction_driver_id
 * @property string|null $interaction_status_id
 * @property string|null $interaction_outcome_id
 * @property string|null $division_id
 * @property \Illuminate\Support\Carbon $start_datetime
 * @property \Illuminate\Support\Carbon|null $end_datetime
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $interaction_initiative_id
 * @property bool $is_confidential
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Interaction\Models\InteractionConfidentialUser|\AdvisingApp\Interaction\Models\InteractionConfidentialTeam|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Team\Models\Team> $confidentialAccessTeams
 * @property-read int|null $confidential_access_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $confidentialAccessUsers
 * @property-read int|null $confidential_access_users_count
 * @property-read \AdvisingApp\Division\Models\Division|null $division
 * @property-read \AdvisingApp\Interaction\Models\InteractionDriver|null $driver
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Interaction\Models\InteractionInitiative|null $initiative
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $interactable
 * @property-read \AdvisingApp\Interaction\Models\InteractionOutcome|null $outcome
 * @property-read \AdvisingApp\Interaction\Models\InteractionRelation|null $relation
 * @property-read \AdvisingApp\Interaction\Models\InteractionStatus|null $status
 * @property-read \AdvisingApp\Timeline\Models\Timeline|null $timelineRecord
 * @property-read \AdvisingApp\Interaction\Models\InteractionType|null $type
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereEndDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionInitiativeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionOutcomeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionRelationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereInteractionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereIsConfidential($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereStartDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Interaction withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteraction {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property-read \AdvisingApp\Interaction\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Interaction\Models\Interaction|null $interaction
 * @property-read \AdvisingApp\Team\Models\Team|null $team
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionConfidentialTeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialTeam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialTeam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialTeam query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionConfidentialTeam {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property-read \AdvisingApp\Interaction\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Interaction\Models\Interaction|null $interaction
 * @property-read \App\Models\User|null $user
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionConfidentialUserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionConfidentialUser query()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionConfidentialUser {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionDriverFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionDriver withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionDriver {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\Interaction\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionInitiativeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionInitiative whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionInitiative {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionOutcomeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionOutcome withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionOutcome {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionRelationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionRelation withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionRelation {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \AdvisingApp\Interaction\Enums\InteractionStatusColorOptions $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionStatus withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionStatus {}
}

namespace AdvisingApp\Interaction\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property bool $is_default
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @method static \AdvisingApp\Interaction\Database\Factories\InteractionTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InteractionType withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInteractionType {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $name
 * @property \AdvisingApp\MeetingCenter\Enums\CalendarProvider $provider_type
 * @property mixed|null $provider_id
 * @property mixed $provider_email
 * @property mixed|null $oauth_token
 * @property mixed|null $oauth_refresh_token
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $oauth_token_expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\CalendarEvent> $events
 * @property-read int|null $events_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\CalendarFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereOauthRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereOauthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereOauthTokenExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereProviderEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereProviderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Calendar whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCalendar {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property array<array-key, mixed>|null $attendees
 * @property string|null $provider_id
 * @property string $calendar_id
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\MeetingCenter\Models\Calendar $calendar
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\CalendarEventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereAttendees($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereCalendarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCalendarEvent {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property string|null $location
 * @property int|null $capacity
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventAttendee> $attendees
 * @property-read int|null $attendees_count
 * @property-read \AdvisingApp\MeetingCenter\Models\EventRegistrationForm|null $eventRegistrationForm
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Event withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEvent {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\MeetingCenter\Enums\EventAttendeeStatus $status
 * @property string $email
 * @property string $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\MeetingCenter\Models\Event $event
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Student> $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventAttendeeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventAttendee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventAttendee {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $event_id
 * @property bool $embed_enabled
 * @property array<array-key, mixed>|null $allowed_domains
 * @property string|null $primary_color
 * @property \AdvisingApp\Form\Enums\Rounding|null $rounding
 * @property bool $is_wizard
 * @property bool $recaptcha_enabled
 * @property array<array-key, mixed>|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \AdvisingApp\MeetingCenter\Models\Event $event
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \AdvisingApp\Form\Models\TFactory|null $use_factory
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormStep> $steps
 * @property-read int|null $steps_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormSubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventRegistrationFormFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereAllowedDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereEmbedEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereIsWizard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereRecaptchaEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationForm withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventRegistrationForm {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property-read EventRegistrationForm $submissible
 * @property string $id
 * @property string $event_attendee_id
 * @property string|null $code
 * @property string $form_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\MeetingCenter\Models\EventAttendee $author
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereEventAttendeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventRegistrationFormAuthentication {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property bool $is_required
 * @property array<array-key, mixed> $config
 * @property string $form_id
 * @property string|null $step_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\MeetingCenter\Models\EventRegistrationFormStep|null $step
 * @property-read \AdvisingApp\MeetingCenter\Models\EventRegistrationForm $submissible
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventRegistrationFormFieldFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormField withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventRegistrationFormField {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property array<array-key, mixed>|null $content
 * @property string $form_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\MeetingCenter\Models\EventRegistrationForm $submissible
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventRegistrationFormStepFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormStep withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventRegistrationFormStep {}
}

namespace AdvisingApp\MeetingCenter\Models{
/**
 * 
 *
 * @property string $id
 * @property string $form_id
 * @property string $event_attendee_id
 * @property \AdvisingApp\MeetingCenter\Enums\EventAttendeeStatus $attendee_status
 * @property \Carbon\CarbonImmutable|null $submitted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property \AdvisingApp\Form\Enums\FormSubmissionRequestDeliveryMethod $request_method
 * @property-read \AdvisingApp\MeetingCenter\Models\EventAttendee $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventRegistrationFormField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $requester
 * @property-read \AdvisingApp\MeetingCenter\Models\EventRegistrationForm $submissible
 * @method static \AdvisingApp\MeetingCenter\Database\Factories\EventRegistrationFormSubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereAttendeeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereEventAttendeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EventRegistrationFormSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEventRegistrationFormSubmission {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $notification_class
 * @property string|null $notification_id
 * @property array<array-key, mixed> $content
 * @property string|null $related_type
 * @property string|null $related_id
 * @property string|null $recipient_id
 * @property string|null $recipient_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $recipient
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $related
 * @method static \AdvisingApp\Notification\Database\Factories\DatabaseMessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereNotificationClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereNotificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DatabaseMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperDatabaseMessage {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $notification_class
 * @property string|null $external_reference_id
 * @property array<array-key, mixed> $content
 * @property int $quota_usage
 * @property string|null $related_type
 * @property string|null $related_id
 * @property string|null $recipient_id
 * @property string|null $recipient_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\EmailMessageEvent> $events
 * @property-read int|null $events_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $recipient
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $related
 * @method static \AdvisingApp\Notification\Database\Factories\EmailMessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereExternalReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereNotificationClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereQuotaUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEmailMessage {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $email_message_id
 * @property \AdvisingApp\Notification\Enums\EmailMessageEventType $type
 * @property array<array-key, mixed> $payload
 * @property \Illuminate\Support\Carbon $occurred_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Notification\Models\EmailMessage|null $message
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereEmailMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereOccurredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmailMessageEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEmailMessageEvent {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $notification_class
 * @property string|null $external_reference_id
 * @property array<array-key, mixed> $content
 * @property int $quota_usage
 * @property string|null $related_type
 * @property string|null $related_id
 * @property string|null $recipient_id
 * @property string|null $recipient_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\SmsMessageEvent> $events
 * @property-read int|null $events_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $recipient
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $related
 * @method static \AdvisingApp\Notification\Database\Factories\SmsMessageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereExternalReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereNotificationClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereQuotaUsage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSmsMessage {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $sms_message_id
 * @property \AdvisingApp\Notification\Enums\SmsMessageEventType $type
 * @property array<array-key, mixed> $payload
 * @property \Illuminate\Support\Carbon $occurred_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Notification\Models\SmsMessage|null $message
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereOccurredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereSmsMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SmsMessageEvent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSmsMessageEvent {}
}

namespace AdvisingApp\Notification\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $subscribable_id
 * @property string $subscribable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\Notification\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subscribable
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Notification\Database\Factories\SubscriptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereSubscribableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereSubscribableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subscription whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSubscription {}
}

namespace AdvisingApp\Portal\Models{
/**
 * 
 *
 * @property Carbon|null $created_at
 * @property string $id
 * @property string|null $educatable_id
 * @property string|null $educatable_type
 * @property string|null $code
 * @property \AdvisingApp\Portal\Enums\PortalType|null $portal_type
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $educatable
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \AdvisingApp\Portal\Database\Factories\PortalAuthenticationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereEducatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereEducatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication wherePortalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PortalAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPortalAuthentication {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $pipeline_id
 * @property string $pipeline_stage_id
 * @property string $educatable_type
 * @property string $educatable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $educatable
 * @property-read \AdvisingApp\Prospect\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Prospect\Models\Pipeline $pipeline
 * @property-read \AdvisingApp\Prospect\Models\PipelineStage|null $stage
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage whereEducatableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage whereEducatableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage wherePipelineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage wherePipelineStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducatablePipelineStage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEducatablePipelineStage {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $user_id
 * @property string $segment_id
 * @property string|null $default_stage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $createdBy
 * @property-read \AdvisingApp\Prospect\Models\EducatablePipelineStage|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $educatablePipelineStages
 * @property-read int|null $educatable_pipeline_stages_count
 * @property-read \AdvisingApp\Prospect\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Segment\Models\Segment $segment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\PipelineStage> $stages
 * @property-read int|null $stages_count
 * @method static \AdvisingApp\Prospect\Database\Factories\PipelineFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereDefaultStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pipeline whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPipeline {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $pipeline_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\EducatablePipelineStage> $educatables
 * @property-read int|null $educatables_count
 * @property-read \AdvisingApp\Prospect\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Prospect\Models\Pipeline $pipeline
 * @method static \AdvisingApp\Prospect\Database\Factories\PipelineStageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage wherePipelineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PipelineStage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPipelineStage {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $display_name
 * @property string $id
 * @property string $status_id
 * @property string $source_id
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 * @property string|null $preferred
 * @property string|null $description
 * @property string|null $email
 * @property string|null $email_2
 * @property string|null $mobile
 * @property bool $sms_opt_out
 * @property bool $email_bounce
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $address_2
 * @property string|null $address_3
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string|null $hsgrad
 * @property string|null $created_by_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $student_id
 * @property string|null $primary_email_id
 * @property string|null $primary_phone_id
 * @property string|null $primary_address_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\ProspectAddress> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Alert\Models\Alert> $alerts
 * @property-read int|null $alerts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationSubmission> $applicationSubmissions
 * @property-read int|null $application_submissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\BasicNeeds\Models\BasicNeedsProgram> $basicNeedsPrograms
 * @property-read int|null $basic_needs_programs_count
 * @property-read \App\Models\Taggable|\AdvisingApp\Notification\Models\Subscription|\AdvisingApp\Engagement\Models\EngagementFileEntities|\AdvisingApp\Prospect\Models\EducatablePipelineStage|\AdvisingApp\CareTeam\Models\CareTeam|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $careTeam
 * @property-read int|null $care_team_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseModel> $cases
 * @property-read int|null $cases_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Pipeline> $educatablePipelineStages
 * @property-read int|null $educatable_pipeline_stages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\ProspectEmailAddress> $emailAddresses
 * @property-read int|null $email_addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementFile> $engagementFiles
 * @property-read int|null $engagement_files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementResponse> $engagementResponses
 * @property-read int|null $engagement_responses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $engagements
 * @property-read int|null $engagements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventAttendee> $eventAttendeeRecords
 * @property-read int|null $event_attendee_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormSubmission> $formSubmissions
 * @property-read int|null $form_submissions_count
 * @property-read mixed $full_address
 * @property-read \AdvisingApp\Prospect\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementResponse> $orderedEngagementResponses
 * @property-read int|null $ordered_engagement_responses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $orderedEngagements
 * @property-read int|null $ordered_engagements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $orderedInteractions
 * @property-read int|null $ordered_interactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\ProspectPhoneNumber> $phoneNumbers
 * @property-read int|null $phone_numbers_count
 * @property-read \AdvisingApp\Prospect\Models\ProspectAddress|null $primaryAddress
 * @property-read \AdvisingApp\Prospect\Models\ProspectEmailAddress|null $primaryEmail
 * @property-read \AdvisingApp\Prospect\Models\ProspectPhoneNumber|null $primaryPhone
 * @property-read \AdvisingApp\Prospect\Models\ProspectSource $source
 * @property-read \AdvisingApp\Prospect\Models\ProspectStatus $status
 * @property-read \AdvisingApp\StudentDataModel\Models\Student|null $student
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $subscribedUsers
 * @property-read int|null $subscribed_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Task\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \AdvisingApp\Timeline\Models\Timeline|null $timeline
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Alert\Histories\AlertHistory[] $alertHistories
 * @property-read int|null $alert_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Task\Histories\TaskHistory[] $taskHistories
 * @property-read int|null $task_histories_count
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereAddress3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereEmailBounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereHsgrad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePreferred($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePrimaryAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePrimaryEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect wherePrimaryPhoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereSmsOptOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prospect withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspect {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $prospect_id
 * @property string|null $line_1
 * @property string|null $line_2
 * @property string|null $line_3
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal
 * @property string|null $country
 * @property string|null $type
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Prospect\Models\Prospect $prospect
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereLine3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereProspectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspectAddress {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $prospect_id
 * @property string $address
 * @property string|null $type
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Prospect\Models\Prospect $prospect
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectEmailAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereProspectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectEmailAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspectEmailAddress {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $prospect_id
 * @property string $number
 * @property int|null $ext
 * @property string|null $type
 * @property bool $can_recieve_sms
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Prospect\Models\Prospect $prospect
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectPhoneNumberFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereCanRecieveSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereProspectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectPhoneNumber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspectPhoneNumber {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectSourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectSource withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspectSource {}
}

namespace AdvisingApp\Prospect\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Prospect\Enums\SystemProspectClassification $classification
 * @property string $name
 * @property \AdvisingApp\Prospect\Enums\ProspectStatusColorOptions $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $sort
 * @property bool $is_system_protected
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @method static \AdvisingApp\Prospect\Database\Factories\ProspectStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereClassification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereIsSystemProtected($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProspectStatus withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProspectStatus {}
}

namespace AdvisingApp\Report\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed>|null $filters
 * @property array<array-key, mixed> $columns
 * @property \AdvisingApp\Report\Enums\ReportModel $model
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Report\Database\Factories\ReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereColumns($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereFilters($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Report whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperReport {}
}

namespace AdvisingApp\Report\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Report\Enums\TrackedEventType $type
 * @property string|null $occurred_at
 * @property string|null $deleted_at
 * @property string|null $related_to_type
 * @property string|null $related_to_id
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $relatedTo
 * @method static \AdvisingApp\Report\Database\Factories\TrackedEventFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereOccurredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereRelatedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereRelatedToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEvent whereType($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTrackedEvent {}
}

namespace AdvisingApp\Report\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Report\Enums\TrackedEventType $type
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $last_occurred_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $related_to_type
 * @property string|null $related_to_id
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $relatedTo
 * @method static \AdvisingApp\Report\Database\Factories\TrackedEventCountFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereLastOccurredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereRelatedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereRelatedToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TrackedEventCount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTrackedEventCount {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property bool $public
 * @property string $title
 * @property array<array-key, mixed>|null $article_details
 * @property string|null $notes
 * @property string|null $quality_id
 * @property string|null $status_id
 * @property string|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $portal_view_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \AdvisingApp\ResourceHub\Models\ResourceHubCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Division\Models\Division> $division
 * @property-read int|null $division_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \AdvisingApp\ResourceHub\Models\ResourceHubQuality|null $quality
 * @property-read \AdvisingApp\ResourceHub\Models\ResourceHubStatus|null $status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\ResourceHub\Models\ResourceHubArticleUpvote> $upvotes
 * @property-read int|null $upvotes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\ResourceHub\Models\ResourceHubArticleView> $views
 * @property-read int|null $views_count
 * @method static \AdvisingApp\ResourceHub\Database\Factories\ResourceHubArticleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle public()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereArticleDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle wherePortalViewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereQualityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticle withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubArticle {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property string $resource_hub_item_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\ResourceHub\Models\ResourceHubArticle $resourceHubArticle
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereResourceHubItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleUpvote whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubArticleUpvote {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property string $resource_hub_item_id
 * @property string|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\ResourceHub\Models\ResourceHubArticle $resourceHubArticle
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereResourceHubItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubArticleView whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubArticleView {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\ResourceHub\Models\ResourceHubArticle> $resourceHubArticles
 * @property-read int|null $resource_hub_articles_count
 * @method static \AdvisingApp\ResourceHub\Database\Factories\ResourceHubCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubCategory withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubCategory {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\ResourceHub\Models\ResourceHubArticle> $resourceHubArticles
 * @property-read int|null $resource_hub_articles_count
 * @method static \AdvisingApp\ResourceHub\Database\Factories\ResourceHubQualityFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubQuality withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubQuality {}
}

namespace AdvisingApp\ResourceHub\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\ResourceHub\Models\ResourceHubArticle> $resourceHubArticles
 * @property-read int|null $resource_hub_articles_count
 * @method static \AdvisingApp\ResourceHub\Database\Factories\ResourceHubStatusFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ResourceHubStatus withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperResourceHubStatus {}
}

namespace AdvisingApp\Segment\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed>|null $filters
 * @property \AdvisingApp\Segment\Enums\SegmentModel $model
 * @property \AdvisingApp\Segment\Enums\SegmentType $type
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Campaign\Models\Campaign> $campaigns
 * @property-read int|null $campaigns_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Segment\Models\SegmentSubject> $subjects
 * @property-read int|null $subjects_count
 * @property-read \App\Models\User $user
 * @method static \AdvisingApp\Segment\Database\Factories\SegmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment model(\AdvisingApp\Segment\Enums\SegmentModel $model)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereFilters($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Segment withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSegment {}
}

namespace AdvisingApp\Segment\Models{
/**
 * 
 *
 * @property string $id
 * @property string $subject_id
 * @property string $subject_type
 * @property string $segment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Segment\Models\Segment $segment
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SegmentSubject withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSegmentSubject {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $sisid
 * @property string|null $division
 * @property string|null $class_nbr
 * @property string|null $crse_grade_off
 * @property int|null $unt_taken
 * @property int|null $unt_earned
 * @property \Illuminate\Support\Carbon|null $last_upd_dt_stmp
 * @property string|null $section
 * @property string|null $name
 * @property string|null $department
 * @property string|null $faculty_name
 * @property string|null $faculty_email
 * @property string|null $semester_code
 * @property string|null $semester_name
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $id
 * @property-read \AdvisingApp\StudentDataModel\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\StudentDataModel\Models\Student|null $student
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\EnrollmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereClassNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereCrseGradeOff($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereFacultyEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereFacultyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereLastUpdDtStmp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereSemesterCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereSemesterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereUntEarned($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment whereUntTaken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Enrollment withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEnrollment {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $sisid
 * @property string|null $acad_career
 * @property string|null $division
 * @property string|null $prog_status
 * @property float|null $cum_gpa
 * @property string|null $semester
 * @property string|null $descr
 * @property string|null $foi
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $id
 * @property array<array-key, mixed>|null $acad_plan
 * @property \Illuminate\Support\Carbon|null $change_dt
 * @property \Illuminate\Support\Carbon|null $declare_dt
 * @property \Illuminate\Support\Carbon|null $graduation_dt
 * @property \Illuminate\Support\Carbon|null $conferred_dt
 * @property-read \AdvisingApp\StudentDataModel\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\StudentDataModel\Models\Student|null $student
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\ProgramFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereAcadCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereAcadPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereChangeDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereConferredDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereCumGpa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereDeclareDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereDescr($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereFoi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereGraduationDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereProgStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Program withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProgram {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $display_name
 * @property string $mobile
 * @property string $sisid
 * @property string|null $otherid
 * @property string|null $first
 * @property string|null $last
 * @property string|null $full_name
 * @property string|null $preferred
 * @property string|null $email
 * @property string|null $email_2
 * @property bool $sms_opt_out
 * @property bool $email_bounce
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $address2
 * @property string|null $address3
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property int|null $hsgrad
 * @property bool $dual
 * @property bool $ferpa
 * @property \Illuminate\Support\Carbon|null $dfw
 * @property bool $sap
 * @property string|null $holds
 * @property bool $firstgen
 * @property string|null $ethnicity
 * @property string|null $lastlmslogin
 * @property string|null $f_e_term
 * @property string|null $mr_e_term
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_at_source
 * @property \Illuminate\Support\Carbon|null $updated_at_source
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $primary_email_id
 * @property string|null $primary_phone_id
 * @property string|null $primary_address_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\StudentAddress> $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Alert\Models\Alert> $alerts
 * @property-read int|null $alerts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Application\Models\ApplicationSubmission> $applicationSubmissions
 * @property-read int|null $application_submissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\BasicNeeds\Models\BasicNeedsProgram> $basicNeedsPrograms
 * @property-read int|null $basic_needs_programs_count
 * @property-read \App\Models\Taggable|\AdvisingApp\Notification\Models\Subscription|\AdvisingApp\Engagement\Models\EngagementFileEntities|\AdvisingApp\CareTeam\Models\CareTeam|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $careTeam
 * @property-read int|null $care_team_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\CaseManagement\Models\CaseModel> $cases
 * @property-read int|null $cases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\StudentEmailAddress> $emailAddresses
 * @property-read int|null $email_addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementFile> $engagementFiles
 * @property-read int|null $engagement_files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementResponse> $engagementResponses
 * @property-read int|null $engagement_responses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $engagements
 * @property-read int|null $engagements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\MeetingCenter\Models\EventAttendee> $eventAttendeeRecords
 * @property-read int|null $event_attendee_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Form\Models\FormSubmission> $formSubmissions
 * @property-read int|null $form_submissions_count
 * @property-read mixed $full_address
 * @property-read \AdvisingApp\StudentDataModel\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\EngagementResponse> $orderedEngagementResponses
 * @property-read int|null $ordered_engagement_responses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Engagement\Models\Engagement> $orderedEngagements
 * @property-read int|null $ordered_engagements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Interaction\Models\Interaction> $orderedInteractions
 * @property-read int|null $ordered_interactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\StudentPhoneNumber> $phoneNumbers
 * @property-read int|null $phone_numbers_count
 * @property-read \AdvisingApp\StudentDataModel\Models\StudentAddress|null $primaryAddress
 * @property-read \AdvisingApp\StudentDataModel\Models\StudentEmailAddress|null $primaryEmail
 * @property-read \AdvisingApp\StudentDataModel\Models\StudentPhoneNumber|null $primaryPhone
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\StudentDataModel\Models\Program> $programs
 * @property-read int|null $programs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Prospect\Models\Prospect> $prospects
 * @property-read int|null $prospects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Segment\Models\SegmentSubject> $segmentSubjects
 * @property-read int|null $segment_subjects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $subscribedUsers
 * @property-read int|null $subscribed_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Notification\Models\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Task\Models\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \AdvisingApp\Timeline\Models\Timeline|null $timeline
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Alert\Histories\AlertHistory[] $alertHistories
 * @property-read int|null $alert_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\AdvisingApp\Task\Histories\TaskHistory[] $taskHistories
 * @property-read int|null $task_histories_count
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\StudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereAddress3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereCreatedAtSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereDfw($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereDual($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereEmailBounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereEthnicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereFETerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereFerpa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereFirst($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereFirstgen($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereHolds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereHsgrad($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereLastlmslogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereMrETerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereOtherid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePreferred($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePrimaryAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePrimaryEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student wherePrimaryPhoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereSap($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereSmsOptOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student whereUpdatedAtSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Student withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperStudent {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $id
 * @property string $sisid
 * @property string|null $line_1
 * @property string|null $line_2
 * @property string|null $line_3
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal
 * @property string|null $country
 * @property string|null $type
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\StudentDataModel\Models\Student $student
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\StudentAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereLine3($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperStudentAddress {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $id
 * @property string $sisid
 * @property string $address
 * @property string|null $type
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\StudentDataModel\Models\Student $student
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\StudentEmailAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentEmailAddress whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperStudentEmailAddress {}
}

namespace AdvisingApp\StudentDataModel\Models{
/**
 * 
 *
 * @property string $id
 * @property string $sisid
 * @property string $number
 * @property int|null $ext
 * @property string|null $type
 * @property bool $can_recieve_sms
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\StudentDataModel\Models\Student $student
 * @method static \AdvisingApp\StudentDataModel\Database\Factories\StudentPhoneNumberFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereCanRecieveSms($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereSisid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentPhoneNumber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperStudentPhoneNumber {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property bool $embed_enabled
 * @property array<array-key, mixed>|null $allowed_domains
 * @property string|null $primary_color
 * @property \AdvisingApp\Form\Enums\Rounding|null $rounding
 * @property bool $is_authenticated
 * @property bool $is_wizard
 * @property bool $recaptcha_enabled
 * @property array<array-key, mixed>|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveyField> $fields
 * @property-read int|null $fields_count
 * @property-read \AdvisingApp\Form\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveyStep> $steps
 * @property-read int|null $steps_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveySubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Survey\Database\Factories\SurveyFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereAllowedDomains($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereEmbedEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereIsAuthenticated($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereIsWizard($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey wherePrimaryColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereRecaptchaEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereRounding($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Survey whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurvey {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property string $id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property string|null $code
 * @property string $survey_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent|null $author
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Survey\Models\Survey $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyAuthentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurveyAuthentication {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property bool $is_required
 * @property array<array-key, mixed> $config
 * @property string $survey_id
 * @property string|null $step_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Survey\Models\SurveyStep|null $step
 * @property-read \AdvisingApp\Survey\Models\Survey $submissible
 * @property-read \AdvisingApp\Survey\Models\SurveyFieldSubmission|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveySubmission> $submissions
 * @property-read int|null $submissions_count
 * @method static \AdvisingApp\Survey\Database\Factories\SurveyFieldFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereStepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyField withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurveyField {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property string $id
 * @property array<array-key, mixed> $response
 * @property string $field_id
 * @property string $submission_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\Survey\Models\SurveyField $field
 * @property-read \AdvisingApp\Survey\Models\SurveySubmission $submission
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereSubmissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyFieldSubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurveyFieldSubmission {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property string $id
 * @property string $label
 * @property array<array-key, mixed>|null $content
 * @property string $survey_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveyField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Survey\Models\Survey $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveyStep withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurveyStep {}
}

namespace AdvisingApp\Survey\Models{
/**
 * 
 *
 * @property Student|Prospect|null $author
 * @property string $id
 * @property string $survey_id
 * @property string|null $author_id
 * @property string|null $author_type
 * @property \Carbon\CarbonImmutable|null $submitted_at
 * @property \Carbon\CarbonImmutable|null $canceled_at
 * @property \AdvisingApp\Form\Enums\FormSubmissionRequestDeliveryMethod|null $request_method
 * @property string|null $request_note
 * @property string|null $requester_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \AdvisingApp\Survey\Models\SurveyFieldSubmission|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Survey\Models\SurveyField> $fields
 * @property-read int|null $fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $requester
 * @property-read \AdvisingApp\Survey\Models\Survey $submissible
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission canceled()
 * @method static \AdvisingApp\Survey\Database\Factories\SurveySubmissionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission notCanceled()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission notSubmitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission requested()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission submitted()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereAuthorType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRequestMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRequestNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereRequesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SurveySubmission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSurveySubmission {}
}

namespace AdvisingApp\Task\Models{
/**
 * 
 *
 * @property-read Student|Prospect $concern
 * @property string $id
 * @property string $title
 * @property string $description
 * @property \AdvisingApp\Task\Enums\TaskStatus $status
 * @property \Illuminate\Support\Carbon|null $due
 * @property string|null $assigned_to
 * @property string|null $created_by
 * @property string|null $concern_type
 * @property string|null $concern_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $assignedTo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \AdvisingApp\Task\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \AdvisingApp\Task\Histories\TaskHistory> $histories
 * @property-read int|null $histories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task byNextDue()
 * @method static \AdvisingApp\Task\Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task licensedToEducatable(string $relationship)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task open()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereAssignedTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereConcernId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereConcernType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTask {}
}

namespace AdvisingApp\Team\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string|null $division_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \AdvisingApp\Division\Models\Division|null $division
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \AdvisingApp\Team\Models\TeamUser|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \AdvisingApp\Team\Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTeam {}
}

namespace AdvisingApp\Team\Models{
/**
 * 
 *
 * @property string $id
 * @property string $team_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \AdvisingApp\Team\Models\Team $team
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TeamUser whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTeamUser {}
}

namespace AdvisingApp\Timeline\Models{
/**
 * 
 *
 * @property string $id
 * @property string $entity_type
 * @property string $entity_id
 * @property string $timelineable_type
 * @property string $timelineable_id
 * @property string $record_sortable_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $timelineable
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline forEntity(\Illuminate\Database\Eloquent\Model $entity)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereRecordSortableDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereTimelineableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereTimelineableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Timeline withoutTrashed()
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperTimeline {}
}

namespace AdvisingApp\Webhook\Models{
/**
 * 
 *
 * @property string $id
 * @property \AdvisingApp\Webhook\Enums\InboundWebhookSource $source
 * @property string $event
 * @property string $url
 * @property string $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InboundWebhook whereUrl($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperInboundWebhook {}
}

