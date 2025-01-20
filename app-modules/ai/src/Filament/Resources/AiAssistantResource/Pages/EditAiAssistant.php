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

namespace AdvisingApp\Ai\Filament\Resources\AiAssistantResource\Pages;

use AdvisingApp\Ai\Actions\ReInitializeAiServiceAssistant;
use AdvisingApp\Ai\Actions\ResetAiServiceIdsForAssistant;
use AdvisingApp\Ai\Enums\AiModel;
use AdvisingApp\Ai\Filament\Resources\AiAssistantResource;
use AdvisingApp\Ai\Filament\Resources\AiAssistantResource\Concerns\HandlesFileUploads;
use AdvisingApp\Ai\Filament\Resources\AiAssistantResource\Forms\AiAssistantForm;
use AdvisingApp\Ai\Models\AiAssistant;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use App\Settings\LicenseSettings;
use Filament\Actions\Action;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class EditAiAssistant extends EditRecord
{
    use HandlesFileUploads;
    use EditPageRedirection;

    protected static string $resource = AiAssistantResource::class;

    public function form(Form $form): Form
    {
        return resolve(AiAssistantForm::class)->form($form);
    }

    public function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->submit(null)
            ->requiresConfirmation()
            ->modalHeading('Sync all chats to this new service?')
            ->modalDescription('If you are moving to a new account, you will need to sync all the data to the new service to minimize disruption. Advising App can do this for you, but if you just want to save the settings and do it yourself, you can choose to do so.')
            ->modalWidth(MaxWidth::ThreeExtraLarge)
            ->modalSubmitActionLabel('Save and sync all chats')
            ->modalHidden(function () {
                $newModel = AiModel::parse($this->form->getRawState()['model']);

                return $this->getRecord()->model->isSharedDeployment($newModel);
            })
            ->extraModalFooterActions([
                Action::make('justSave')
                    ->label('Just save the settings')
                    ->color('gray')
                    ->action(fn () => $this->save())
                    ->cancelParentActions(),
            ])
            ->action(function (ResetAiServiceIdsForAssistant $resetAiServiceIds, ReInitializeAiServiceAssistant $reInitializeAiServiceAssistant) {
                $newModel = AiModel::parse($this->form->getState()['model']);

                $modelDeploymentIsShared = $this->getRecord()->model->isSharedDeployment($newModel);

                $assistant = $this->getRecord();

                if (! $modelDeploymentIsShared) {
                    DB::transaction(function () use ($assistant, $resetAiServiceIds) {
                        $resetAiServiceIds($assistant);
                    });
                }

                $this->save();

                if ((! $modelDeploymentIsShared) && (! $assistant->archived_at)) {
                    $reInitializeAiServiceAssistant($assistant);
                }
            });
    }

    /** @var AiAssistant $assistant */
    public static function canAccess(array $parameters = []): bool
    {
        $assistant = $parameters['record'];

        if ($assistant->is_default) {
            return false;
        }

        return parent::canAccess();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('archive')
                ->color('danger')
                ->action(function () {
                    $assistant = $this->getRecord();
                    $assistant->archived_at = now();
                    $assistant->save();

                    Notification::make()
                        ->title('Assistant archived')
                        ->success()
                        ->send();
                })
                ->hidden(fn (): bool => (bool) $this->getRecord()->archived_at),
            Action::make('restore')
                ->action(function () {
                    $assistant = $this->getRecord();
                    $assistant->archived_at = null;
                    $assistant->save();

                    Notification::make()
                        ->title('Assistant restored')
                        ->success()
                        ->send();
                })
                ->hidden(function (): bool {
                    if (! $this->getRecord()->archived_at) {
                        return true;
                    }

                    $assistantsLimit = app(LicenseSettings::class)->data->limits->conversationalAiAssistants;
                    $assistantsCount = AiAssistant::query()
                        ->where('is_default', false)
                        ->whereNull('archived_at')
                        ->count();

                    return $assistantsCount >= $assistantsLimit;
                }),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->fill($data);

        $aiService = $record->model->getService();

        try {
            $aiService->isAssistantExisting($record) ?
                $aiService->updateAssistant($record) :
                $aiService->createAssistant($record);
        } catch (Throwable $exception) {
            report($exception);

            Notification::make()
                ->title('Could not save assistant')
                ->body('We failed to connect to the AI service. Support has been notified about this problem. Please try again later.')
                ->danger()
                ->send();

            $this->halt();
        }

        $record->save();

        if ($this->attemptingToUploadAssistantFilesWhenItsNotSupported($aiService, $data)) {
            return $record;
        }

        if (isset($data['uploaded_files']) && ! empty($data['uploaded_files'])) {
            $this->uploadFilesToAssistant(
                aiService: $aiService,
                assistant: $record,
                uploadedFiles: $data['uploaded_files']
            );
        }

        return $record;
    }
}
