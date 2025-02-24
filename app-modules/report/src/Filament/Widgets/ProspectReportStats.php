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

namespace AdvisingApp\Report\Filament\Widgets;

use AdvisingApp\Alert\Models\Alert;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Segment\Enums\SegmentModel;
use AdvisingApp\Segment\Models\Segment;
use AdvisingApp\Task\Models\Task;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;

class ProspectReportStats extends StatsOverviewReportWidget
{
    protected int | string | array $columnSpan = [
        'sm' => 2,
        'md' => 4,
        'lg' => 4,
    ];

    protected function getStats(): array
    {
        return [
            Stat::make('Total Prospects', Number::format(
                Cache::tags([$this->cacheTag])->remember('prospects-count', now()->addHours(24), function (): int {
                    return Prospect::count();
                }),
                maxPrecision: 2,
            )),
            Stat::make('Total Alerts', Number::abbreviate(
                Cache::tags([$this->cacheTag])->remember('prospect-alerts-count', now()->addHours(24), function (): int {
                    return Alert::whereHasMorph('concern', Prospect::class)->count();
                }),
                maxPrecision: 2,
            )),
            Stat::make('Total Segments', Number::abbreviate(
                Cache::tags([$this->cacheTag])->remember('prospect-segments-count', now()->addHours(24), function (): int {
                    return Segment::query()->where('model', SegmentModel::Prospect)->count();
                }),
                maxPrecision: 2,
            )),
            Stat::make('Total Tasks', Number::abbreviate(
                Cache::tags([$this->cacheTag])->remember('prospect-tasks-count', now()->addHours(24), function (): int {
                    return Task::whereHasMorph('concern', Prospect::class)->count();
                }),
                maxPrecision: 2,
            )),
        ];
    }
}
