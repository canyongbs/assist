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

namespace AdvisingApp\Campaign\Filament\Resources\CampaignResource\RelationManagers;

use AdvisingApp\Campaign\Enums\CampaignActionType;
use AdvisingApp\Campaign\Filament\Blocks\CampaignActionBlock;
use AdvisingApp\Campaign\Models\Campaign;
use AdvisingApp\Campaign\Models\CampaignAction;
use AdvisingApp\Campaign\Settings\CampaignSettings;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Arr;

class CampaignActionsRelationManager extends RelationManager
{
    protected static string $relationship = 'actions';

    protected static ?string $title = 'Journey Steps';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),
                Group::make(fn (CampaignAction $record) => $record->type->getEditFields()),
            ])
            ->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->modifyQueryUsing(fn (QueryBuilder $query) => $query->orderBy('execute_at', 'ASC'))
            ->columns([
                TextColumn::make('type')->label('Step Type'),
                TextColumn::make('execute_at')->label('Schedule')
                    ->dateTime(timezone: app(CampaignSettings::class)->getActionExecutionTimezone()),
            ])
            ->headerActions([
                Action::make('create')
                    ->label('New')
                    ->modalHeading('Create campaign actions')
                    ->form([
                        Builder::make('data')
                            ->hiddenLabel()
                            ->addActionLabel('Add a new Campaign Action')
                            ->blocks(CampaignActionType::blocks())
                            ->dehydrated(false)
                            ->model($this->getOwnerRecord())
                            ->saveRelationshipsUsing(function (Builder $component, Campaign $record) {
                                foreach ($component->getChildComponentContainers() as $item) {
                                    /** @var CampaignActionBlock $block */
                                    $block = $item->getParentComponent();

                                    $itemData = $item->getState(shouldCallHooksBefore: false);

                                    $action = $record->actions()->create([
                                        'type' => $block->getName(),
                                        'data' => Arr::except($itemData, ['execute_at']),
                                        'execute_at' => $itemData['execute_at'],
                                    ]);

                                    $item->model($action)->saveRelationships();
                                }
                            }),
                    ])
                    ->action(fn () => null)
                    ->hidden(fn () => $this->getOwnerRecord()->hasBeenExecuted() === true),
            ])
            ->actions([
                EditAction::make()
                    ->modalHeading(fn (CampaignAction $action) => 'Edit ' . $action->type->getLabel())
                    ->hidden(fn () => $this->getOwnerRecord()->hasBeenExecuted() === true),
                DeleteAction::make()
                    ->modalHeading(fn (CampaignAction $action) => 'Delete ' . $action->type->getLabel())
                    ->hidden(fn () => $this->getOwnerRecord()->hasBeenExecuted() === true),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ])
                    ->hidden(fn () => $this->getOwnerRecord()->hasBeenExecuted() === true),
            ]);
    }
}
