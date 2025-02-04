<?php

namespace AdvisingApp\Prospect\Database\Factories;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProspectAddress>
 */
class ProspectAddressFactory extends Factory
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
            'line_1' => $this->faker->streetAddress,
            'line_2' => $this->faker->streetAddress,
            'line_3' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'postal' => $this->faker->postcode,
            'country' => $this->faker->country,
        ];
    }
}
