<?php

namespace AdvisingApp\StudentDataModel\Database\Factories;

use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\StudentDataModel\Models\StudentEmailAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentEmailAddress>
 */
class StudentEmailAddressFactory extends Factory
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
            'address' => $this->faker->email,
            'type' => $this->faker->words(10),
        ];
    }
}
