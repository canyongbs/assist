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

namespace AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages;

use AdvisingApp\CareTeam\Filament\Actions\ToggleCareTeamBulkAction;
use AdvisingApp\Engagement\Filament\Actions\BulkEngagementAction;
use AdvisingApp\Notification\Filament\Actions\SubscribeBulkAction;
use AdvisingApp\Notification\Filament\Actions\SubscribeTableAction;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource;
use AdvisingApp\Prospect\Imports\ProspectImporter;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectSource;
use AdvisingApp\Prospect\Models\ProspectStatus;
use AdvisingApp\Segment\Actions\BulkSegmentAction;
use AdvisingApp\Segment\Actions\TranslateSegmentFilters;
use AdvisingApp\Segment\Enums\SegmentModel;
use AdvisingApp\Segment\Models\Segment;
use App\Enums\TagType;
use App\Features\ProspectStudentRefactor;
use App\Filament\Tables\Columns\IdColumn;
use App\Models\Tag;
use Filament\Actions\CreateAction;
use Filament\Actions\ImportAction;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ListProspects extends ListRecords
{
    protected static string $resource = ProspectResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                IdColumn::make(),
                TextColumn::make(Prospect::displayNameKey())
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->visible(! ProspectStudentRefactor::active())
                    ->sortable(),
                TextColumn::make('primaryEmail.address')
                    ->label('Email')
                    ->searchable()
                    ->visible(ProspectStudentRefactor::active())
                    ->sortable(),
                TextColumn::make('mobile')
                    ->label('Mobile')
                    ->searchable()
                    ->visible(! ProspectStudentRefactor::active())
                    ->sortable(),
                TextColumn::make('primaryPhone.number')
                    ->label('Mobile')
                    ->searchable()
                    ->visible(ProspectStudentRefactor::active())
                    ->sortable(),
                TextColumn::make('status.name')
                    ->badge()
                    ->color(fn (Prospect $record) => $record->status->color->value)
                    ->toggleable()
                    ->sortable(['sort']),
                TextColumn::make('source.name')
                    ->label('Source')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('g:ia - M j, Y')
                    ->toggleable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('my_segments')
                    ->label('My Population Segments')
                    ->options(
                        auth()->user()->segments()
                            ->where('model', SegmentModel::Prospect)
                            ->pluck('name', 'id'),
                    )
                    ->searchable()
                    ->optionsLimit(20)
                    ->query(fn (Builder $query, array $data) => $this->segmentFilter($query, $data)),
                SelectFilter::make('all_segments')
                    ->label('All Population Segments')
                    ->options(
                        Segment::all()
                            ->where('model', SegmentModel::Prospect)
                            ->pluck('name', 'id'),
                    )
                    ->searchable()
                    ->optionsLimit(20)
                    ->query(fn (Builder $query, array $data) => $this->segmentFilter($query, $data)),
                Filter::make('subscribed')
                    ->query(fn (Builder $query): Builder => $query->whereRelation('subscriptions.user', 'id', auth()->id())),
                Filter::make('care_team')
                    ->label('Care Team')
                    ->query(
                        function (Builder $query) {
                            return $query
                                ->whereRelation('careTeam', 'user_id', '=', auth()->id())
                                ->get();
                        }
                    ),
                SelectFilter::make('alerts')
                    ->multiple()
                    ->relationship('alerts.status', 'name')
                    ->searchable()
                    ->preload()
                    ->optionsLimit(20),
                SelectFilter::make('status_id')
                    ->relationship('status', 'name', fn (Builder $query) => $query->orderBy('sort'))
                    ->multiple()
                    ->preload(),
                SelectFilter::make('source_id')
                    ->relationship('source', 'name')
                    ->multiple()
                    ->preload(),

                SelectFilter::make('tags')
                    ->label('Tags')
                    ->options(fn (): array => Tag::query()->where('type', TagType::Prospect)->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->optionsLimit(20)
                    ->multiple()
                    ->query(
                        function (Builder $query, array $data) {
                            if (blank($data['values'])) {
                                return;
                            }

                            $query->whereHas('tags', function (Builder $query) use ($data) {
                                $query->whereIn('tag_id', $data['values']);
                            });
                        }
                    ),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                SubscribeTableAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    SubscribeBulkAction::make(),
                    BulkEngagementAction::make(context: 'prospects'),
                    DeleteBulkAction::make(),
                    ToggleCareTeamBulkAction::make(),
                    BulkAction::make('bulk_update')
                        ->icon('heroicon-o-pencil-square')
                        ->form([
                            Select::make('field')
                                ->options([
                                    'description' => 'Description',
                                    'email_bounce' => 'Email Bounce',
                                    'hsgrad' => 'High School Graduation Date',
                                    'sms_opt_out' => 'SMS Opt Out',
                                    'source_id' => 'Source',
                                    'status_id' => 'Status',
                                ])
                                ->required()
                                ->live(),
                            Textarea::make('description')
                                ->string()
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'description'),
                            Radio::make('email_bounce')
                                ->label('Email Bounce')
                                ->boolean()
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'email_bounce'),
                            TextInput::make('hsgrad')
                                ->label('High School Graduation Date')
                                ->numeric()
                                ->minValue(1920)
                                ->maxValue(now()->addYears(25)->year)
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'hsgrad'),
                            Radio::make('sms_opt_out')
                                ->label('SMS Opt Out')
                                ->boolean()
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'sms_opt_out'),
                            Select::make('source_id')
                                ->label('Source')
                                ->relationship('source', 'name')
                                ->exists(
                                    table: (new ProspectSource())->getTable(),
                                    column: (new ProspectSource())->getKeyName()
                                )
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'source_id'),
                            Select::make('status_id')
                                ->label('Status')
                                ->relationship('status', 'name', fn (Builder $query) => $query->orderBy('sort'))
                                ->exists(
                                    table: (new ProspectStatus())->getTable(),
                                    column: (new ProspectStatus())->getKeyName()
                                )
                                ->required()
                                ->visible(fn (Get $get) => $get('field') === 'status_id'),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $records->each(
                                fn (Prospect $prospect) => $prospect
                                    ->forceFill([$data['field'] => $data[$data['field']]])
                                    ->save()
                            );

                            Notification::make()
                                ->title($records->count() . ' ' . str('Prospect')->plural($records->count()) . ' Updated')
                                ->success()
                                ->send();
                        }),
                    BulkSegmentAction::make(segmentModel: SegmentModel::Prospect),
                ]),
            ]);
    }

    protected function segmentFilter(Builder $query, array $data): void
    {
        if (blank($data['value'])) {
            return;
        }

        $query->whereKey(
            app(TranslateSegmentFilters::class)
                ->handle($data['value'])
                ->pluck($query->getModel()->getQualifiedKeyName()),
        );
    }

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->importer(ProspectImporter::class)
                ->authorize('import', Prospect::class),
            CreateAction::make(),
        ];
    }
}
