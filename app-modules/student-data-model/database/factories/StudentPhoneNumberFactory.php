<?php

namespace AdvisingApp\StudentDataModel\Database\Factories;

use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\StudentDataModel\Models\StudentAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentAddress>
 */
class StudentPhoneNumberFactory extends Factory
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
            'number' => $this->faker->phoneNumber,
            'ext' => $this->faker->randomNumber(),
            'type' => $this->faker->words(10),
            'is_mobile' => $this->faker->boolean,
        ];
    }
}
