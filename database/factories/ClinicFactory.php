<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'clinicname' => $this->faker->word(),
            'location' => $this->faker->text(),
            'contact' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
