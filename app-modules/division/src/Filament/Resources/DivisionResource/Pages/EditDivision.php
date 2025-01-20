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

namespace AdvisingApp\Division\Filament\Resources\DivisionResource\Pages;

use AdvisingApp\Division\Filament\Resources\DivisionResource;
use AdvisingApp\Division\Models\Division;
use App\Features\DivisionIsDefault;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use App\Models\NotificationSetting;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use FilamentTiptapEditor\TiptapEditor;

class EditDivision extends EditRecord
{
    use EditPageRedirection;

    protected static string $resource = DivisionResource::class;

    protected ?bool $hasDatabaseTransactions = true;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->string()
                    ->unique(ignoreRecord: true),
                TextInput::make('code')
                    ->required()
                    ->string()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->string()
                    ->columnSpanFull(),
                TiptapEditor::make('header')
                    ->disk('s3-public')
                    ->string()
                    ->columnSpanFull(),
                TiptapEditor::make('footer')
                    ->disk('s3-public')
                    ->string()
                    ->columnSpanFull(),
                Select::make('notification_setting_id')
                    ->label('Notification Setting')
                    ->options(NotificationSetting::pluck('name', 'id'))
                    ->searchable(),
                Toggle::make('is_default')
                    ->label('Default')
                    ->visible(DivisionIsDefault::active())
                    ->hint(function (?Division $record, $state): ?string {
                        if ($record?->is_default) {
                            return null;
                        }

                        if (! $state) {
                            return null;
                        }

                        $currentDefault = Division::query()
                            ->where('is_default', true)
                            ->value('name');

                        if (blank($currentDefault)) {
                            return null;
                        }

                        return "The current default status is '{$currentDefault}', you are replacing it.";
                    })
                    ->hintColor('danger')
                    ->columnStart(1),
            ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data = parent::mutateFormDataBeforeFill($data);

        /** @var Division $division */
        $division = $this->getRecord();

        $data['notification_setting_id'] = $division->notificationSetting?->setting->id;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = parent::mutateFormDataBeforeSave($data);

        /** @var Division $division */
        $division = $this->getRecord();

        if ($data['notification_setting_id']) {
            $division->notificationSetting()->updateOrCreate([
                'related_to_id' => $division->id,
                'related_to_type' => $division->getMorphClass(),
            ], [
                'notification_setting_id' => $data['notification_setting_id'],
            ]);
        } else {
            $division->notificationSetting()->delete();
        }

        unset($data['notification_setting_id']);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
