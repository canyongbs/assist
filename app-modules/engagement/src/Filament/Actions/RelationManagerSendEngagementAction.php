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

namespace AdvisingApp\Engagement\Filament\Actions;

use AdvisingApp\Engagement\Actions\CreateEngagement;
use AdvisingApp\Engagement\DataTransferObjects\EngagementCreationData;
use AdvisingApp\Engagement\Filament\Forms\Components\EngagementSmsBodyInput;
use AdvisingApp\Engagement\Models\EmailTemplate;
use AdvisingApp\Engagement\Models\Engagement;
use AdvisingApp\Notification\Enums\NotificationChannel;
use AdvisingApp\Prospect\Models\Prospect;
use App\Features\ProspectStudentRefactor;
use Filament\Actions\StaticAction;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action as FormComponentAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Carbon;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class RelationManagerSendEngagementAction extends CreateAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->icon('heroicon-m-chat-bubble-bottom-center-text')
            ->label('New Email or Text')
            ->modalHeading('Create new email or text')
            ->model(Engagement::class)
            ->authorize(function (RelationManager $livewire) {
                $ownerRecord = $livewire->getOwnerRecord();

                return auth()->user()->can('create', [Engagement::class, $ownerRecord instanceof Prospect ? $ownerRecord : null]);
            })
            ->fillForm(function (RelationManagerSendEngagementAction $action) {
                if(ProspectStudentRefactor::active()) {
                    return [
                        'channel' => $action->getArguments()['type'] ?? NotificationChannel::Email->value,
                        'email' => $action->getArguments()['id'] ?? null,
                        'phone' => $action->getArguments()['id'] ?? null,
                    ];
                }
            })
            ->form(fn (Form $form) => $form->schema([
                Select::make('channel')
                    ->label('What would you like to send?')
                    ->options(NotificationChannel::getEngagementOptions())
                    ->default(NotificationChannel::Email->value)
                    ->disableOptionWhen(fn (RelationManager $livewire, string $value): bool => (($value == (NotificationChannel::Sms->value) && ! $livewire->getOwnerRecord()->canRecieveSms())) || NotificationChannel::tryFrom($value)?->getCaseDisabled())
                    ->selectablePlaceholder(false)
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('email', null);
                        $set('phone', null);
                    }),
                Fieldset::make('Content')
                    ->schema([
                        Select::make('email')
                            ->options(function (RelationManager $livewire) {
                                return $livewire->getOwnerRecord()->emailAddresses()->limit(10)->pluck('address', 'id')->toArray();
                            })
                            ->preload()
                            ->getSearchResultsUsing(fn (RelationManager $livewire,string $search): array => $livewire->getOwnerRecord()->emailAddresses()->where('address', 'like', "%{$search}%")->limit(50)->pluck('address', 'id')->toArray())
                            ->visible(fn (Get $get) => ProspectStudentRefactor::active() && $get('channel') === NotificationChannel::Email->value)
                            ->columnSpanFull()
                            ->searchable(),
                        Select::make('phone')
                            ->options(function (RelationManager $livewire) {
                                return $livewire->getOwnerRecord()->phoneNumbers()->limit(10)->pluck('number', 'id')->toArray();
                            })
                            ->visible()
                            ->preload()
                            ->getSearchResultsUsing(fn (RelationManager $livewire,string $search): array => $livewire->getOwnerRecord()->phoneNumbers()->where('number', 'like', "%{$search}%")->limit(50)->pluck('number', 'id')->toArray())
                            ->visible(fn (Get $get) => ProspectStudentRefactor::active() && $get('channel') === NotificationChannel::Sms->value)
                            ->columnSpanFull()
                            ->searchable(),
                        TextInput::make('subject')
                            ->autofocus()
                            ->required()
                            ->placeholder(__('Subject'))
                            ->hidden(fn (Get $get): bool => $get('channel') === NotificationChannel::Sms->value)
                            ->columnSpanFull(),
                        TiptapEditor::make('body')
                            ->disk('s3-public')
                            ->label('Body')
                            ->mergeTags($mergeTags = [
                                'student first name',
                                'student last name',
                                'student full name',
                                'student email',
                                'student preferred name',
                            ])
                            ->profile('email')
                            ->required()
                            ->hintAction(fn (TiptapEditor $component) => FormComponentAction::make('loadEmailTemplate')
                                ->form([
                                    Select::make('emailTemplate')
                                        ->searchable()
                                        ->options(function (Get $get): array {
                                            return EmailTemplate::query()
                                                ->when(
                                                    $get('onlyMyTemplates'),
                                                    fn (Builder $query) => $query->whereBelongsTo(auth()->user())
                                                )
                                                ->orderBy('name')
                                                ->limit(50)
                                                ->pluck('name', 'id')
                                                ->toArray();
                                        })
                                        ->getSearchResultsUsing(function (Get $get, string $search): array {
                                            return EmailTemplate::query()
                                                ->when(
                                                    $get('onlyMyTemplates'),
                                                    fn (Builder $query) => $query->whereBelongsTo(auth()->user())
                                                )
                                                ->when(
                                                    $get('onlyMyTeamTemplates'),
                                                    fn (Builder $query) => $query->whereIn('user_id', auth()->user()->teams->users->pluck('id'))
                                                )
                                                ->where(new Expression('lower(name)'), 'like', "%{$search}%")
                                                ->orderBy('name')
                                                ->limit(50)
                                                ->pluck('name', 'id')
                                                ->toArray();
                                        }),
                                    Checkbox::make('onlyMyTemplates')
                                        ->label('Only show my templates')
                                        ->live()
                                        ->afterStateUpdated(fn (Set $set) => $set('emailTemplate', null)),
                                    Checkbox::make('onlyMyTeamTemplates')
                                        ->label("Only show my team's templates")
                                        ->live()
                                        ->afterStateUpdated(fn (Set $set) => $set('emailTemplate', null)),
                                ])
                                ->action(function (array $data) use ($component) {
                                    $template = EmailTemplate::find($data['emailTemplate']);

                                    if (! $template) {
                                        return;
                                    }

                                    $component->state(
                                        $component->generateImageUrls($template->content),
                                    );
                                }))
                            ->hidden(fn (Get $get): bool => $get('channel') === NotificationChannel::Sms->value)
                            ->helperText('You can insert student information by typing {{ and choosing a merge value to insert.')
                            ->columnSpanFull(),
                        EngagementSmsBodyInput::make(context: 'create', form: $form),
                        Actions::make([
                            RelationManagerDraftWithAiAction::make()
                                ->mergeTags($mergeTags),
                        ]),
                    ]),
                Fieldset::make('Send your email or text')
                    ->schema([
                        Toggle::make('send_later')
                            ->reactive()
                            ->helperText('By default, this email or text will send as soon as it is created unless you schedule it to send later.'),
                        DateTimePicker::make('scheduled_at')
                            ->required()
                            ->visible(fn (Get $get) => $get('send_later')),
                    ]),
            ]))
            ->action(function (array $data, Form $form, RelationManager $livewire) {
                if ($data['channel'] == NotificationChannel::Sms->value && ! $livewire->getOwnerRecord()->canRecieveSms()) {
                    Notification::make()
                        ->title('Student does not have mobile number.')
                        ->danger()
                        ->send();

                    $this->halt();
                }

                $engagement = app(CreateEngagement::class)->execute(new EngagementCreationData(
                    user: auth()->user(),
                    recipient: $livewire->getOwnerRecord(),
                    channel: NotificationChannel::parse($data['channel']),
                    subject: $data['subject'] ?? null,
                    body: $data['body'] ?? null,
                    temporaryBodyImages: array_map(
                        fn (TemporaryUploadedFile $file): array => [
                            'extension' => $file->getClientOriginalExtension(),
                            'path' => (fn () => $this->path)->call($file),
                        ],
                        $form->getFlatFields()['body']->getTemporaryImages(),
                    ),
                    scheduledAt: ($data['send_later'] ?? false) ? Carbon::parse($data['scheduled_at'] ?? null) : null,
                ));

                $form->model($engagement)->saveRelationships();
            })
            ->modalSubmitActionLabel('Send')
            ->modalCloseButton(false)
            ->closeModalByClickingAway(false)
            ->closeModalByEscaping(false)
            ->createAnother(false)
            ->modalCancelAction(false)
            ->extraModalFooterActions([
                Action::make('cancel')
                    ->color('gray')
                    ->cancelParentActions()
                    ->requiresConfirmation()
                    ->action(fn () => null)
                    ->modalSubmitAction(fn (StaticAction $action) => $action->color('danger')),
            ]);
    }

    public static function getDefaultName(): ?string
    {
        return 'engage';
    }
}
