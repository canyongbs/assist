<?php

namespace AdvisingApp\Prospect\Filament\Pages;

use AdvisingApp\Prospect\Filament\Widgets\MostEngagedProspectsTable;
use Filament\Pages\Dashboard;
use AdvisingApp\Report\Filament\Widgets\RefreshWidget;
use AdvisingApp\Prospect\Filament\Widgets\ProspectEngagementState;
use AdvisingApp\Prospect\Filament\Widgets\ProspectEngagementLineChart;
use App\Filament\Clusters\ReportLibrary;

class ProspectEnagagementReport extends Dashboard
{
    protected static ?string $cluster = ReportLibrary::class;

    protected static ?string $navigationGroup = 'Prospects';

    protected static ?string $title = 'Prospect Engagement';

    protected static string $routePath = 'prospect-enagement-report';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected $cacheTag = 'prospect-enagement-cache';

    protected static ?int $navigationSort = 20;

    public function getColumns(): int | string | array
    {
        return [
            'sm' => 2,
            'md' => 4,
            'lg' => 4,
        ];
    }

    public function getWidgets(): array
    {
        return [
            RefreshWidget::make(['cacheTag' => $this->cacheTag]),
            ProspectEngagementState::make(['cacheTag' => $this->cacheTag]),
            ProspectEngagementLineChart::make(['cacheTag' => $this->cacheTag]),
            MostEngagedProspectsTable::make(['cacheTag' => $this->cacheTag]),
        ];
    }
}
