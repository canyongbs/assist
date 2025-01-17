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

use AdvisingApp\Prospect\Filament\Resources\ProspectTagResource\Pages\CreateProspectTag;
use AdvisingApp\Prospect\Filament\Resources\ProspectTagResource\Pages\EditProspectTag;
use AdvisingApp\Prospect\Filament\Resources\ProspectTagResource\Pages\ListProspectTags;
use AdvisingApp\Prospect\Filament\Resources\ProspectTagResource\Pages\ViewProspectTag;
use AdvisingApp\Prospect\Models\Prospect;
use App\Enums\TagType;
use App\Filament\Clusters\ConstituentManagement;
use App\Models\Tag;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;

class ProspectTagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Tags';

    protected static ?int $navigationSort = 50;

    protected static ?string $cluster = ConstituentManagement::class;

    protected static ?string $navigationGroup = 'Prospects';

    public static function canAccess(): bool
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->hasLicense(Prospect::getLicenseType());
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProspectTags::route('/'),
            'create' => CreateProspectTag::route('/create'),
            'view' => ViewProspectTag::route('/{record}'),
            'edit' => EditProspectTag::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', TagType::Prospect);
    }
}
