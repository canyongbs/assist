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

namespace AdvisingApp\CaseManagement\Observers;

use AdvisingApp\CaseManagement\Actions\CreateCaseHistory;
use AdvisingApp\CaseManagement\Cases\CaseNumber\Contracts\CaseNumberGenerator;
use AdvisingApp\CaseManagement\Enums\SystemCaseClassification;
use AdvisingApp\CaseManagement\Exceptions\CaseNumberUpdateAttemptException;
use AdvisingApp\CaseManagement\Models\CaseModel;
use AdvisingApp\CaseManagement\Notifications\EducatableCaseClosedNotification;
use AdvisingApp\CaseManagement\Notifications\EducatableCaseOpenedNotification;
use AdvisingApp\Notification\Events\TriggeredAutoSubscription;
use App\Features\ProspectStudentRefactor;
use App\Models\User;

class CaseObserver
{
    public function creating(CaseModel $case): void
    {
        $case->case_number ??= app(CaseNumberGenerator::class)->generate();
    }

    public function created(CaseModel $case): void
    {
        $user = auth()->user();

        if ($user instanceof User) {
            TriggeredAutoSubscription::dispatch($user, $case);
        }

        if ($case->status->classification === SystemCaseClassification::Open) {
            if (ProspectStudentRefactor::active()) {
                if ($case->respondent->primaryEmail) {
                    $case->respondent->notify(new EducatableCaseOpenedNotification($case));
                }
            } else {
                $case->respondent->notify(new EducatableCaseOpenedNotification($case));
            }
        }
    }

    public function updating(CaseModel $case): void
    {
        throw_if($case->isDirty('case_number'), new CaseNumberUpdateAttemptException());
    }

    public function saving(CaseModel $case): void
    {
        if ($case->wasChanged('status_id')) {
            $case->status_updated_at = now();
        }
    }

    public function saved(CaseModel $case): void
    {
        CreateCaseHistory::dispatch($case, $case->getChanges(), $case->getOriginal());

        if (
            $case->wasChanged('status_id')
            && $case->status->classification === SystemCaseClassification::Closed
        ) {
            if ($case->respondent->primaryEmail) {
                $case->respondent->notify(new EducatableCaseClosedNotification($case));
            }
        }
    }
}
