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

use AdvisingApp\Division\Models\Division;
use AdvisingApp\ResourceHub\Filament\Resources\ResourceHubArticleResource;
use AdvisingApp\ResourceHub\Models\ResourceHubArticle;
use AdvisingApp\ResourceHub\Models\ResourceHubCategory;
use AdvisingApp\ResourceHub\Models\ResourceHubQuality;
use AdvisingApp\ResourceHub\Models\ResourceHubStatus;
use App\Filament\Tables\Columns\IdColumn;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ListResourceHubArticles extends ListRecords
{
    protected ?string $heading = 'Resource Hub';

    protected static string $resource = ResourceHubArticleResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                IdColumn::make(),
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quality.name')
                    ->label('Quality')
                    ->sortable(),
                TextColumn::make('status.name')
                    ->label('Status')
                    ->sortable(),
                TextColumn::make('public')
                    ->label('Public')
                    ->sortable()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No'),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                TextColumn::make('views_count')
                    ->label('Views')
                    ->counts('views')
                    ->sortable(),
                TextColumn::make('upvotes_count')
                    ->label('Upvotes')
                    ->counts([
                        'upvotes',
                        'upvotes as my_upvotes_count' => fn (Builder $query) => $query->whereBelongsTo(auth()->user()),
                    ])
                    ->sortable()
                    ->action(fn (ResourceHubArticle $record) => $record->toggleUpvote())
                    ->color(fn (ResourceHubArticle $record): string => $record->my_upvotes_count ? 'success' : 'gray')
                    ->tooltip(fn (ResourceHubArticle $record): string => $record->my_upvotes_count ? 'Click to remove upvote' : 'Click to upvote')
                    ->formatStateUsing(fn (ResourceHubArticle $record, int $state): string => ($record->my_upvotes_count ? 'Upvoted ' : 'Upvote ') . "({$state})"),
            ])
            ->filters([
                SelectFilter::make('quality')
                    ->relationship('quality', 'name')
                    ->multiple()
                    ->preload(),
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->multiple()
                    ->preload(),
                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->multiple()
                    ->preload(),
                TernaryFilter::make('public'),
            ])
            ->actions([
                EditAction::make(),
                ReplicateAction::make()
                    ->label('Replicate')
                    ->form([
                        Section::make()
                            ->schema([
                                TextInput::make('title')
                                    ->label('Article Title')
                                    ->required()
                                    ->string(),
                                Toggle::make('public')
                                    ->label('Public')
                                    ->default(false)
                                    ->onColor('success')
                                    ->offColor('gray'),
                                Textarea::make('notes')
                                    ->label('Notes')
                                    ->string(),
                            ]),
                        Section::make()
                            ->schema([
                                Select::make('quality_id')
                                    ->label('Quality')
                                    ->relationship('quality', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->exists((new ResourceHubQuality())->getTable(), (new ResourceHubQuality())->getKeyName()),
                                Select::make('status_id')
                                    ->label('Status')
                                    ->relationship('status', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->exists((new ResourceHubStatus())->getTable(), (new ResourceHubStatus())->getKeyName()),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->exists((new ResourceHubCategory())->getTable(), (new ResourceHubCategory())->getKeyName()),
                                Select::make('division')
                                    ->label('Division')
                                    ->multiple()
                                    ->relationship('division', 'name')
                                    ->searchable(['name', 'code'])
                                    ->preload()
                                    ->exists((new Division())->getTable(), (new Division())->getKeyName()),
                            ]),
                    ])
                    ->before(function (array $data, Model $record) {
                        $record->title = $data['title'];
                        $record->public = $data['public'];
                        $record->notes = $data['notes'];
                    })
                    ->after(function (ResourceHubArticle $replica, ResourceHubArticle $record): void {
                        $record->load('division');

                        foreach ($record->division as $divison) {
                            $replica->division()->attach($divison->id);
                        }

                        $replica->article_details = tiptap_converter()
                            ->record($record, 'article_details')
                            ->copyImagesToNewRecord($replica->article_details, $replica, disk: 's3-public');
                        $replica->save();
                    })
                    ->excludeAttributes(['views_count', 'upvotes_count', 'my_upvotes_count'])
                    ->successNotificationTitle('Article replicated successfully!'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->disabled(fn (): bool => ! auth()->user()->can('resource_hub_article.create'))
                ->createAnother(false)
                ->successRedirectUrl(fn (Model $record): string => ResourceHubArticleResource::getUrl('edit', ['record' => $record])),
        ];
    }
}
