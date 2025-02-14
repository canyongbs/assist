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

namespace AdvisingApp\Prospect\Database\Factories;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectAddress;
use AdvisingApp\Prospect\Models\ProspectEmailAddress;
use AdvisingApp\Prospect\Models\ProspectPhoneNumber;
use AdvisingApp\Prospect\Models\ProspectSource;
use AdvisingApp\Prospect\Models\ProspectStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Prospect>
 */
class ProspectFactory extends Factory
{
    public function definition(): array
    {
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();
        $address3 = fake()->optional()->words(asText: true);

        return [
            'status_id' => ProspectStatus::inRandomOrder()->first() ?? ProspectStatus::factory(),
            'source_id' => ProspectSource::inRandomOrder()->first() ?? ProspectSource::factory(),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'full_name' => "{$firstName} {$lastName}",
            'preferred' => fake()->firstName(),
            'description' => fake()->paragraph(),
            'sms_opt_out' => fake()->boolean(),
            'email_bounce' => fake()->boolean(),
            'birthdate' => fake()->date(),
            'hsgrad' => fake()->year(),
            'created_by_id' => User::factory(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Prospect $prospect) {
            $prospect->primaryEmail()->associate(ProspectEmailAddress::factory()->create(['prospect_id' => $prospect->getKey(), 'address' => fake()->unique()->email()]));
            $prospect->primaryPhone()->associate(ProspectPhoneNumber::factory()->create(['prospect_id' => $prospect->getKey(), 'number' => fake()->phoneNumber()]));
            $prospect->primaryAddress()->associate(ProspectAddress::factory()->create([
                'prospect_id' => $prospect->getKey(),
                'line_1' => fake()->streetAddress(),
                'line_2' => fake()->secondaryAddress(),
                'line_3' => fake()->optional()->words(asText: true) ?? null,
                'city' => fake()->city(),
                'state' => fake()->stateAbbr(),
                'postal' => str(fake()->postcode())->before('-')->toString(),
            ]));

            $prospect->save();
        });
    }
}
