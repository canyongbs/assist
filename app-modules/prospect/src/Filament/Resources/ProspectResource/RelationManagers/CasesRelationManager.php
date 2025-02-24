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

namespace AdvisingApp\Prospect\Filament\Resources\ProspectResource\RelationManagers;

use AdvisingApp\CaseManagement\Filament\Resources\CaseResource;
use AdvisingApp\CaseManagement\Filament\Resources\CaseResource\Pages\CreateCase;
use AdvisingApp\CaseManagement\Filament\Resources\CaseResource\Pages\ViewCase;
use AdvisingApp\CaseManagement\Models\CaseModel;
use AdvisingApp\CaseManagement\Models\CasePriority;
use App\Filament\Tables\Columns\IdColumn;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CasesRelationManager extends RelationManager
{
    protected static string $relationship = 'cases';

    public function form(Form $form): Form
    {
        return (resolve(CreateCase::class))->form($form);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return (resolve(ViewCase::class))->infolist($infolist);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                IdColumn::make(),
                TextColumn::make('case_number')
                    ->label('Case #')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('priority.name')
                    ->label('Priority')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('assignedTo.user.name')
                    ->label('Assigned to')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('priority')
                    ->relationship('priority', 'name', fn (Builder $query) => $query->with('type'))
                    ->getOptionLabelFromRecordUsing(fn (CasePriority $record) => "{$record->type->name} - {$record->name}")
                    ->multiple()
                    ->preload(),
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->multiple()
                    ->preload(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->modalHeading('Create new case'),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn (CaseModel $record) => CaseResource::getUrl('view', ['record' => $record, 'referrer' => 'respondentProfile'])),
                EditAction::make()
                    ->url(fn (CaseModel $record) => CaseResource::getUrl('edit', ['record' => $record, 'referrer' => 'respondentProfile'])),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
