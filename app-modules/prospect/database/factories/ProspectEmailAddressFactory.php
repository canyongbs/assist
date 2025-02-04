<?php

namespace AdvisingApp\Prospect\Database\Factories;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectEmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProspectEmailAddress>
 */
class ProspectEmailAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prospect_id' => Prospect::factory(),
            'address' => $this->faker->email,
            'type' => $this->faker->words(10),
        ];
    }
}
