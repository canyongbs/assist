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

namespace AdvisingApp\Interaction\Filament\Resources\InteractionResource\Pages;

use AdvisingApp\CaseManagement\Models\CaseModel;
use AdvisingApp\Division\Models\Division;
use AdvisingApp\Interaction\Filament\Resources\InteractionResource;
use AdvisingApp\Interaction\Models\InteractionDriver;
use AdvisingApp\Interaction\Models\InteractionInitiative;
use AdvisingApp\Interaction\Models\InteractionOutcome;
use AdvisingApp\Interaction\Models\InteractionRelation;
use AdvisingApp\Interaction\Models\InteractionStatus;
use AdvisingApp\Interaction\Models\InteractionType;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use App\Models\Scopes\ExcludeConvertedProspects;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\MorphToSelect\Type;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Builder;

class EditInteraction extends EditRecord
{
    use EditPageRedirection;

    protected static string $resource = InteractionResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                MorphToSelect::make('interactable')
                    ->label('Related To')
                    ->searchable()
                    ->required()
                    ->types([
                        ...(auth()->user()->hasLicense(Student::getLicenseType()) ? [Type::make(Student::class)
                            ->titleAttribute(Student::displayNameKey())] : []),
                        ...(auth()->user()->hasLicense(Prospect::getLicenseType()) ? [
                            Type::make(Prospect::class)
                                ->titleAttribute(Prospect::displayNameKey())
                                ->modifyOptionsQueryUsing(
                                    fn (Builder $query, $record) => $query
                                        ->tap(new ExcludeConvertedProspects())
                                        ->orWhere('id', '=', $record->interactable_id)
                                ),
                        ] : []),
                        Type::make(CaseModel::class)
                            ->label('Case')
                            ->titleAttribute('case_number'),
                    ])
                    ->columnSpanFull(),
                Fieldset::make('Details')
                    ->schema([
                        Select::make('interaction_initiative_id')
                            ->relationship('initiative', 'name')
                            ->preload()
                            ->label('Initiative')
                            ->required()
                            ->exists((new InteractionInitiative())->getTable(), 'id'),
                        Select::make('interaction_driver_id')
                            ->relationship('driver', 'name')
                            ->preload()
                            ->label('Driver')
                            ->required()
                            ->exists((new InteractionDriver())->getTable(), 'id'),
                        Select::make('division_id')
                            ->relationship('division', 'name')
                            ->preload()
                            ->label('Division')
                            ->required()
                            ->exists((new Division())->getTable(), 'id'),
                        Select::make('interaction_outcome_id')
                            ->relationship('outcome', 'name')
                            ->preload()
                            ->label('Outcome')
                            ->required()
                            ->exists((new InteractionOutcome())->getTable(), 'id'),
                        Select::make('interaction_relation_id')
                            ->relationship('relation', 'name')
                            ->preload()
                            ->label('Relation')
                            ->required()
                            ->exists((new InteractionRelation())->getTable(), 'id'),
                        Select::make('interaction_status_id')
                            ->relationship('status', 'name')
                            ->preload()
                            ->label('Status')
                            ->required()
                            ->exists((new InteractionStatus())->getTable(), 'id'),
                        Select::make('interaction_type_id')
                            ->relationship('type', 'name')
                            ->preload()
                            ->label('Type')
                            ->required()
                            ->exists((new InteractionType())->getTable(), 'id'),
                    ]),
                Fieldset::make('Time')
                    ->schema([
                        DateTimePicker::make('start_datetime')
                            ->seconds(false)
                            ->required(),
                        DateTimePicker::make('end_datetime')
                            ->seconds(false)
                            ->required(),
                    ]),
                Fieldset::make('Notes')
                    ->schema([
                        TextInput::make('subject')
                            ->required(),
                        Textarea::make('description')
                            ->required(),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
