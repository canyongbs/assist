<?php

namespace AdvisingApp\BasicNeeds\Filament\Resources\BasicNeedsProgramResource\RelationManagers;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Resources\Pages\ManageRelatedRecords;

abstract class StudentsRelationManager extends ManageRelatedRecords
{
    protected static string $relationship = 'students';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('full_name')
            ->columns([
                TextColumn::make('sisid')
                    ->label('SISID'),
                TextColumn::make('full_name')
                    ->label('Name'),
                TextColumn::make('email'),
                TextColumn::make('mobile'),
            ])
            ->headerActions([
                AttachAction::make(),
            ])
            ->actions([
                DetachAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DetachBulkAction::make(),
                ]),
            ]);
    }
}
