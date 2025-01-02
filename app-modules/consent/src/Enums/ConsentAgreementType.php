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

namespace AdvisingApp\Consent\Enums;

use Filament\Support\Contracts\HasLabel;

enum ConsentAgreementType: string implements HasLabel
{
    case AzureOpenAI = 'azure_open_ai';

    // We may end up moving this to the model itself, but for now it doesn't quite make sense to make this editable by an admin
    public function getModalDescription(): string
    {
        return match ($this) {
            self::AzureOpenAI => "Warning: Changing the AI Usage Agreement will reset everyone's consents, making them agree to your new terms all over again. There's no undoing this, so please make sure this is your intention.",
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AzureOpenAI => 'Azure OpenAI',
            default => str($this->name)->headline(),
        };
    }
}
