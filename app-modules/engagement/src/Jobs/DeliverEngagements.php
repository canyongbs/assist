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

namespace AdvisingApp\Engagement\Jobs;

use AdvisingApp\Engagement\Models\Engagement;
use AdvisingApp\Engagement\Notifications\EngagementNotification;
use App\Features\ProspectStudentRefactor;
use App\Models\Tenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Support\Facades\DB;

class DeliverEngagements implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;

    public function handle(): void
    {
        Engagement::query()
            ->where(fn (Builder $query) => $query
                ->whereNull('scheduled_at')
                ->orWhere('scheduled_at', '<=', now()))
            ->whereNull('dispatched_at')
            ->with('recipient')
            ->eachById(
                fn (Engagement $engagement) => DB::transaction(function () use ($engagement) {
                    $updatedEngagementsCount = Engagement::query()
                        ->whereNull('dispatched_at')
                        ->whereKey($engagement)
                        ->update(['dispatched_at' => now()]);

                    if (! $updatedEngagementsCount) {
                        return;
                    }

                    if (ProspectStudentRefactor::active()) {
                        if ($engagement->recipient->primaryEmail) {
                            $engagement->recipient->notify(new EngagementNotification($engagement));
                        }
                    } else {
                        $engagement->recipient->notify(new EngagementNotification($engagement));
                    }
                }),
                250,
            );
    }

    public function middleware(): array
    {
        return [(new WithoutOverlapping(Tenant::current()->id))->dontRelease()->expireAfter(180)];
    }
}
