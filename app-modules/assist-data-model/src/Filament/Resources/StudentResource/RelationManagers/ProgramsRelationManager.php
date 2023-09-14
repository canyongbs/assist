<?php

namespace Assist\AssistDataModel\Filament\Resources\StudentResource\RelationManagers;

use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\RelationManagers\RelationManager;

class ProgramsRelationManager extends RelationManager
{
    protected static string $relationship = 'programs';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('descr')
            ->columns([
                TextColumn::make('otherid')
                    ->label('STUID'),
                TextColumn::make('division')
                    ->label('College'),
                TextColumn::make('descr')
                    ->label('Program'),
                TextColumn::make('foi')
                    ->label('Field of Interest'),
                TextColumn::make('cum_gpa')
                    ->label('Cumulative GPA'),
                TextColumn::make('declare_dt')
                    ->label('Start Date'),
            ])
            ->filters([
            ])
            ->headerActions([])
            ->actions([
                ViewAction::make(),
            ])
            ->bulkActions([])
            ->emptyStateActions([]);
    }
}
