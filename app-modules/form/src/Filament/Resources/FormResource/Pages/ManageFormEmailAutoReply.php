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

namespace AdvisingApp\Form\Filament\Resources\FormResource\Pages;

use AdvisingApp\Engagement\Models\EmailTemplate;
use AdvisingApp\Form\Filament\Resources\FormResource;
use AdvisingApp\Form\Models\Form;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use App\Models\User;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form as FilamentForm;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Expression;

class ManageFormEmailAutoReply extends EditRecord
{
    use EditPageRedirection;

    protected static string $resource = FormResource::class;

    protected static ?string $navigationLabel = 'Email Auto Reply';

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $breadcrumb = 'Email Auto Reply';

    protected ?string $heading = 'Email Auto Reply';

    public static function canAccess(array $parameters = []): bool
    {
        /** @var ?Form $form */
        $form = $parameters['record'] ?? null;

        if (! $form) {
            return false;
        }

        return $form->is_authenticated;
    }

    public function form(FilamentForm $form): FilamentForm
    {
        return $form
            ->schema([
                Section::make()
                    ->relationship('emailAutoReply')
                    ->schema([
                        Toggle::make('is_enabled')
                            ->label('Enabled')
                            ->live(),
                        TextInput::make('subject')
                            ->required(fn (Get $get) => $get('is_enabled'))
                            ->placeholder('Subject')
                            ->columnSpanFull(),
                        TiptapEditor::make('body')
                            ->disk('s3-public')
                            ->mergeTags([
                                'student first name',
                                'student last name',
                                'student full name',
                                'student email',
                                'student preferred name',
                            ])
                            ->profile('email')
                            ->required(fn (Get $get) => $get('is_enabled'))
                            ->hintAction(fn (TiptapEditor $component) => Action::make('loadEmailTemplate')
                                ->form([
                                    Select::make('emailTemplate')
                                        ->searchable()
                                        ->options(function (Get $get): array {
                                            /** @var User $user */
                                            $user = auth()->user();

                                            return EmailTemplate::query()
                                                ->when(
                                                    $get('onlyMyTemplates'),
                                                    fn (Builder $query) => $query->whereBelongsTo($user)
                                                )
                                                ->orderBy('name')
                                                ->limit(50)
                                                ->pluck('name', 'id')
                                                ->toArray();
                                        })
                                        ->getSearchResultsUsing(function (Get $get, string $search): array {
                                            /** @var User $user */
                                            $user = auth()->user();

                                            return EmailTemplate::query()
                                                ->when(
                                                    $get('onlyMyTemplates'),
                                                    fn (Builder $query) => $query->whereBelongsTo($user)
                                                )
                                                ->when(
                                                    $get('onlyMyTeamTemplates'),
                                                    fn (Builder $query) => $query->whereIn('user_id', $user->teams->users->pluck('id'))
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
                            ->helperText('You can insert student information by typing {{ and choosing a merge value to insert.')
                            ->columnSpanFull()
                            ->live(),
                    ]),
            ]);
    }
}
