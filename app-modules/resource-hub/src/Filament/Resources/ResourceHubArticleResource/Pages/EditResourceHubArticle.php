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

namespace AdvisingApp\ResourceHub\Filament\Resources\ResourceHubArticleResource\Pages;

use AdvisingApp\Authorization\Enums\LicenseType;
use AdvisingApp\ResourceHub\Filament\Actions\DraftResourceHubArticleWithAiAction;
use AdvisingApp\ResourceHub\Filament\Resources\ResourceHubArticleResource;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use Filament\Actions\Action as BaseAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Model;

class EditResourceHubArticle extends EditRecord
{
    use EditPageRedirection;

    protected static string $resource = ResourceHubArticleResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Article Title')
                            ->required()
                            ->string()
                            ->suffixAction(
                                Action::make('saveArticleTitle')
                                    ->icon('heroicon-o-check')
                                    ->action(function (Model $record, $state) {
                                        if ($record->title === $state) {
                                            return;
                                        }

                                        $record->update([
                                            'title' => $state,
                                        ]);

                                        if ($record->wasChanged('title')) {
                                            Notification::make()
                                                ->title("Title successfully updated to '{$record->title}'")
                                                ->success()
                                                ->duration(3000)
                                                ->send();
                                        }
                                    }),
                            ),
                    ]),
                TiptapEditor::make('article_details')
                    ->label('Article Details')
                    ->columnSpanFull()
                    ->extraInputAttributes([
                        'style' => 'min-height: 32rem;',
                        'class' => 'text-gray-900 dark:bg-gray-800 dark:text-gray-100 border-2 dark:border-0 border-gray-200 rounded-none mx-4 my-2 px-8 py-4',
                    ]),
                Actions::make([
                    DraftResourceHubArticleWithAiAction::make(),
                ])
                    ->visible(
                        auth()->user()->hasLicense(LicenseType::ConversationalAi)
                    ),
            ]);
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Article details successfully saved';
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSubmitFormAction()->label('Save'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            BaseAction::make('save')
                ->action('save')
                ->button()
                ->color('primary')
                ->label('Save'),
            EditAction::make()
                ->label('Edit Properties')
                ->button()
                ->outlined()
                ->record($this->record)
                ->form(resolve(EditResourceHubArticleMetadata::class)->form())
                ->successNotificationTitle('Article metadata successfully updated'),
        ];
    }
}
