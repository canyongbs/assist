<?php

namespace AdvisingApp\StudentDataModel\Database\Factories;

use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\StudentDataModel\Models\StudentAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentAddress>
 */
class StudentAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
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
