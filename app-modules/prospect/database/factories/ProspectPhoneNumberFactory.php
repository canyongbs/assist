<?php

namespace AdvisingApp\Prospect\Database\Factories;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectPhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProspectPhoneNumber>
 */
class ProspectPhoneNumberFactory extends Factory
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
            'number' => $this->faker->phoneNumber,
            'ext' => $this->faker->randomNumber(),
            'type' => $this->faker->words(10),
            'is_mobile' => $this->faker->boolean,
        ];
    }
}
