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

namespace AdvisingApp\Audit\Filament\Resources\AuditResource\Pages;

use AdvisingApp\Audit\Actions\Finders\AuditableModels;
use AdvisingApp\Audit\Filament\Exports\AuditExporter;
use AdvisingApp\Audit\Filament\Resources\AuditResource;
use App\Filament\Tables\Columns\IdColumn;
use App\Models\User;
use Carbon\Carbon;
use Filament\Actions\ExportAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ListAudits extends ListRecords
{
    protected static string $resource = AuditResource::class;

    protected static ?string $title = 'System Administration';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                IdColumn::make(),
                TextColumn::make('auditable_type')
                    ->label('Auditable')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => Str::of($state)->headline()),
                TextColumn::make('change_agent_name')
                    ->label('Change Agent (User)')
                    ->sortable()
                    ->default('System'),
                TextColumn::make('event')
                    ->label('Event')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Occurred At')
                    ->formatStateUsing(fn (string $state) => Carbon::parse($state)->format('m-d-Y h:i A')),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                Filter::make('exclude_system_user')
                    ->label('Exclude System User')
                    ->query(
                        fn (Builder $query, array $data): Builder => $query->when($data['isActive'], fn (Builder $query) => $query->whereHas('user'))
                    )
                    ->form([
                        Checkbox::make('isActive')
                            ->label('Exclude System User')
                            ->default(true),
                    ]),
                SelectFilter::make('change_agent_user')
                    ->label('Change Agent (User)')
                    ->options(fn (): array => User::query()->pluck('name', 'id')->all())
                    ->searchable()
                    ->query(fn (Builder $query, array $data) => $data['value'] ? $query->where('change_agent_type', 'user')->where('change_agent_id', $data['value']) : null),
                SelectFilter::make('auditable')
                    ->label('Auditable')
                    ->options(AuditableModels::all())
                    ->query(fn (Builder $query, array $data) => $data['value'] ? $query->where('auditable_type', $data['value']) : null),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')
                            ->label('Start Date'),
                        DatePicker::make('created_until')
                            ->label('End Date'),
                    ])
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators[] = Indicator::make('Start Date: ' . Carbon::parse($data['created_from'])->format('m-d-Y'))
                                ->removeField('created_from');
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators[] = Indicator::make('End Date: ' . Carbon::parse($data['created_until'])->format('m-d-Y'))
                                ->removeField('created_until');
                        }

                        return $indicators;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                ViewAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(AuditExporter::class),
                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()
                ->exporter(AuditExporter::class),
        ];
    }
}
