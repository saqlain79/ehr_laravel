<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_name' => $this->faker->name(),
            'contact' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'dob' => $this->faker->date(),
            'license_num' => $this->faker->randomNumber(),
            'specialty' => $this->faker->word(),
            'years_of_exp' => $this->faker->randomNumber(),
            'center_id' => $this->faker->randomNumber(1, 10),
        ];
    }
}
