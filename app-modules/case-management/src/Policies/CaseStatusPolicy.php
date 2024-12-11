<?php

/*
<COPYRIGHT>

    Copyright © 2016-2024, Canyon GBS LLC. All rights reserved.

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

namespace AdvisingApp\CaseManagement\Policies;

use App\Enums\Feature;
use App\Models\Authenticatable;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use App\Support\FeatureAccessResponse;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\CaseManagement\Models\CaseStatus;

class CaseStatusPolicy
{
    public function before(Authenticatable $authenticatable): ?Response
    {
        if (! $authenticatable->hasAnyLicense([Student::getLicenseType(), Prospect::getLicenseType()])) {
            return Response::deny('You are not licensed for the Retention or Recruitment CRM.');
        }

        if (! Gate::check(
            collect($this->requiredFeatures())->map(fn(Feature $feature) => $feature->getGateName())
        )) {
            return FeatureAccessResponse::deny();
        }

        return null;
    }

    public function viewAny(Authenticatable $authenticatable): Response
    {
        return $authenticatable->canOrElse(
            abilities: 'product_admin.view-any',
            denyResponse: 'You do not have permissions to view case statuses.'
        );
    }

    public function view(Authenticatable $authenticatable, CaseStatus $caseStatus): Response
    {
        return $authenticatable->canOrElse(
            abilities: ["product_admin.{$caseStatus->getKey()}.view"],
            denyResponse: 'You do not have permissions to view this case status.'
        );
    }

    public function create(Authenticatable $authenticatable): Response
    {
        return $authenticatable->canOrElse(
            abilities: 'product_admin.create',
            denyResponse: 'You do not have permissions to create case statuses.'
        );
    }

    public function update(Authenticatable $authenticatable, CaseStatus $caseStatus): Response
    {
        return $authenticatable->canOrElse(
            abilities: ["product_admin.{$caseStatus->getKey()}.update"],
            denyResponse: 'You do not have permissions to update this case status.'
        );
    }

    public function delete(Authenticatable $authenticatable, CaseStatus $caseStatus): Response
    {
        return $authenticatable->canOrElse(
            abilities: ["product_admin.{$caseStatus->getKey()}.delete"],
            denyResponse: 'You do not have permissions to delete this case status.'
        );
    }

    public function restore(Authenticatable $authenticatable, CaseStatus $caseStatus): Response
    {
        return $authenticatable->canOrElse(
            abilities: ["product_admin.{$caseStatus->getKey()}.restore"],
            denyResponse: 'You do not have permissions to restore this case status.'
        );
    }

    public function forceDelete(Authenticatable $authenticatable, CaseStatus $caseStatus): Response
    {
        if ($caseStatus->cases()->exists()) {
            return Response::deny('You cannot force delete this case status because it has associated cases.');
        }

        return $authenticatable->canOrElse(
            abilities: ["product_admin.{$caseStatus->getKey()}.force-delete"],
            denyResponse: 'You do not have permissions to force delete this case status.'
        );
    }

    protected function requiredFeatures(): array
    {
        return [Feature::CaseManagement];
    }
}
