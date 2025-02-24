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

namespace AdvisingApp\Prospect\Filament\Resources;

use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\CreateProspect;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\EditProspect;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ListProspects;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ManageProspectAlerts;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ManageProspectCareTeam;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ManageProspectSubscriptions;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ManageProspectTasks;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ViewProspect;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ViewProspectActivityFeed;
use AdvisingApp\Prospect\Models\Prospect;
use App\Features\ProspectStudentRefactor;
use App\Filament\Resources\Concerns\HasGlobalSearchResultScoring;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProspectResource extends Resource
{
    use HasGlobalSearchResultScoring;

    protected static ?string $model = Prospect::class;

    protected static ?int $navigationSort = 20;

    protected static ?string $navigationGroup = 'Recruitment CRM';

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        if (ProspectStudentRefactor::active()) {
            return parent::getGlobalSearchEloquentQuery()->with(['emailAddresses:id,address', 'phoneNumbers:id,number']);
        }

        return parent::getGlobalSearchEloquentQuery();
    }

    public static function modifyGlobalSearchQuery(Builder $query, string $search): void
    {
        if (ProspectStudentRefactor::active()) {
            $query->leftJoinRelationship('primaryEmail');
        }

        static::scoreGlobalSearchResults($query, $search, [
            'full_name' => 100,
            ...(
                ProspectStudentRefactor::active()
              ? ['prospect_email_addresses.address' => 75]
              : ['email' => 75, 'email_2' => 75]
            ),
        ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'full_name', 'preferred',
            ...(
                ProspectStudentRefactor::active()
                ? ['emailAddresses.address', 'phoneNumbers.number']
                : ['email', 'email_2', 'mobile', 'phone']
            ),
        ];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return array_filter([
            'Student ID' => $record->sisid,
            'Other ID' => $record->otherid,
            'Email Address' => ProspectStudentRefactor::active() ? $record?->primaryEmail->address : collect([$record->email, $record->email_id])->filter()->implode(', '),
            'Phone' => ProspectStudentRefactor::active() ? $record?->primaryPhone->number : collect([$record->mobile, $record->phone])->filter()->implode(', '),
            'Preferred Name' => $record->preferred,
        ], fn (mixed $value): bool => filled($value));
    }

    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ProspectResource::getUrl('view', ['record' => $record]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProspects::route('/'),
            'create' => CreateProspect::route('/create'),
            'edit' => EditProspect::route('/{record}/edit'),
            'manage-alerts' => ManageProspectAlerts::route('/{record}/alerts'),
            'manage-subscriptions' => ManageProspectSubscriptions::route('/{record}/subscriptions'),
            'manage-tasks' => ManageProspectTasks::route('/{record}/tasks'),
            'view' => ViewProspect::route('/{record}'),
            'activity-feed' => ViewProspectActivityFeed::route('/{record}/activity'),
            'care-team' => ManageProspectCareTeam::route('/{record}/care-team'),
        ];
    }
}
