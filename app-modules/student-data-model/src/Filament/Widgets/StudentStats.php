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

namespace AdvisingApp\StudentDataModel\Filament\Widgets;

use AdvisingApp\Alert\Enums\SystemAlertStatusClassification;
use AdvisingApp\Segment\Enums\SegmentModel;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Number;

class StudentStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        /** @var User $user */
        $user = auth()->user();

        return [
            Stat::make('Students', Number::format(
                Cache::tags(['students'])
                    ->remember('students-count', now()->addHour(), function (): int {
                        return Student::count();
                    }),
                maxPrecision: 2,
            )),
            Stat::make('My Subscriptions', Cache::tags(['students', "user-{$user->getKey()}-student-subscriptions"])
                ->remember("user-{$user->getKey()}-student-subscriptions-count", now()->addHour(), function () use ($user): int {
                    return $user->studentSubscriptions()->count();
                })),
            Stat::make('My Alerts', Cache::tags(['students', "user-{$user->getKey()}-student-alerts"])
                ->remember("user-{$user->getKey()}-student-alerts-count", now()->addHour(), function () use ($user): int {
                    return $user->studentAlerts()->whereHas('status', function ($query) {
                        $query->where('classification', SystemAlertStatusClassification::Active);
                    })->count();
                })),
            Stat::make('My Population Segments', Cache::tags(["user-{$user->getKey()}-student-segments"])
                ->remember("user-{$user->getKey()}-student-segments-count", now()->addHour(), function () use ($user): int {
                    return $user->segments()->model(SegmentModel::Student)->count();
                })),
        ];
    }
}
