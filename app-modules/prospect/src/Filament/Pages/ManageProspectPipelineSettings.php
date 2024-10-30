<?php

namespace AdvisingApp\Prospect\Filament\Pages;

use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Toggle;
use App\Filament\Clusters\GlobalSettings;
use AdvisingApp\Prospect\Settings\ProspectPipelineSettings;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource;

class ManageProspectPipelineSettings extends SettingsPage
{
    protected static string $resource = ProspectResource::class;

    protected static ?string $cluster = GlobalSettings::class;

    protected static string $settings = ProspectPipelineSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 100;

    public function form(Form $form): Form
    {
        return $form->schema([
            Toggle::make('is_enabled')
                ->inline(true)
                ->label('Is Enabled?')
                ->columnSpanFull(),
        ]);
    }
}
