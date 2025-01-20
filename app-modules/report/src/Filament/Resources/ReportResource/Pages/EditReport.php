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

namespace AdvisingApp\Report\Filament\Resources\ReportResource\Pages;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Report\Enums\ReportModel;
use AdvisingApp\Report\Filament\Resources\ReportResource;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class EditReport extends EditRecord implements HasTable
{
    use InteractsWithTable {
        bootedInteractsWithTable as baseBootedInteractsWithTable;
    }
    use EditPageRedirection;

    protected static string $resource = ReportResource::class;

    protected static string $view = 'report::filament.resources.reports.pages.edit-report';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->autocomplete(false)
                    ->string()
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Grid::make()
                    ->schema([
                        Select::make('model')
                            ->options(ReportModel::class)
                            ->disabled()
                            ->visible(auth()->user()->hasLicense([Student::getLicenseType(), Prospect::getLicenseType()]) || auth()->user()->can('viewAny', User::class)),
                        TextInput::make('user.name')
                            ->label('User')
                            ->disabled(),
                    ])
                    ->columns(3),
                CheckboxList::make('columns')
                    ->options(fn (): array => array_reduce(
                        $this->getRecord()->model->exporter()::getColumns(),
                        fn (array $options, ExportColumn $column): array => [
                            ...$options,
                            $column->getName() => $column->getLabel(),
                        ],
                        [],
                    ))
                    ->columns(3)
                    ->live()
                    ->columnSpanFull()
                    ->afterStateUpdated($this->bootedInteractsWithTable(...)),
            ]);
    }

    public function table(Table $table): Table
    {
        $report = $this->getRecord();

        $columns = $this->form->getRawState()['columns'] ?? [];

        return $report->model->table($table)
            ->columns(array_reduce(
                $report->model->exporter()::getColumns(type: TextColumn::class),
                fn (array $carry, TextColumn $column): array => [
                    ...$carry,
                    ...(in_array($column->getName(), $columns) ? [$column->getName() => $column] : []),
                ],
                [],
            ));
    }

    public function bootedInteractsWithTable(): void
    {
        if ($this->shouldMountInteractsWithTable) {
            $this->tableFilters = $this->getRecord()->filters;
        }

        $this->baseBootedInteractsWithTable();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $report = $this->getRecord();

        $data['model'] = $report->model;
        $data['user']['name'] = $report->user->name;

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->icon('heroicon-m-arrow-down-tray')
                ->action(function () {
                    $this->save();

                    $exporter = $this->getRecord()->model->exporter();
                    $columns = $this->form->getRawState()['columns'] ?? [];

                    ExportAction::make()
                        ->livewire($this)
                        ->exporter($exporter)
                        ->modalHidden()
                        ->formData([
                            'columnMap' => array_reduce($exporter::getColumns(), fn (array $carry, ExportColumn $column): array => [
                                ...$carry,
                                $column->getName() => [
                                    'isEnabled' => in_array($column->getName(), $columns),
                                    'label' => $column->getLabel(),
                                ],
                            ], []),
                        ])
                        ->call();
                }),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['filters'] = $this->tableFilters ?? [];

        return $data;
    }
}
