<?php

/*
<COPYRIGHT>

    Copyright © 2022-2023, Canyon GBS LLC. All rights reserved.

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

namespace AdvisingApp\Consent\Policies;

use App\Enums\Feature;
use App\Models\Authenticatable;
use Illuminate\Auth\Access\Response;
use AdvisingApp\Consent\Models\ConsentAgreement;
use App\Concerns\FeatureAccessEnforcedPolicyBefore;
use App\Policies\Contracts\FeatureAccessEnforcedPolicy;

class ConsentAgreementPolicy implements FeatureAccessEnforcedPolicy
{
    use FeatureAccessEnforcedPolicyBefore;

    public function viewAny(Authenticatable $authenticatable): Response
    {
        return $authenticatable->canOrElse(
            abilities: 'consent_agreement.view-any',
            denyResponse: 'You do not have permission to view consent agreements.'
        );
    }

    public function view(Authenticatable $authenticatable, ConsentAgreement $agreement): Response
    {
        return $authenticatable->canOrElse(
            abilities: ['consent_agreement.*.view', "consent_agreement.{$agreement->id}.view"],
            denyResponse: 'You do not have permission to view this consent agreement.'
        );
    }

    public function create(Authenticatable $authenticatable): Response
    {
        return Response::deny('Consent Agreements cannot be created.');
    }

    public function update(Authenticatable $authenticatable, ConsentAgreement $agreement): Response
    {
        return $authenticatable->canOrElse(
            abilities: ['consent_agreement.*.update', "consent_agreement.{$agreement->id}.update"],
            denyResponse: 'You do not have permission to update this consent agreement.'
        );
    }

    public function delete(Authenticatable $authenticatable, ConsentAgreement $agreement): Response
    {
        return Response::deny('Consent Agreements cannot be deleted.');
    }

    public function restore(Authenticatable $authenticatable, ConsentAgreement $agreement): Response
    {
        return Response::deny('Consent Agreements cannot be restored.');
    }

    public function forceDelete(Authenticatable $authenticatable, ConsentAgreement $agreement): Response
    {
        return Response::deny('Consent Agreements cannot be permanently deleted.');
    }

    protected function requiredFeatures(): array
    {
        return [
            Feature::PersonalAssistant,
        ];
    }
}
