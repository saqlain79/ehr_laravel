<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vaccinename' => $this->faker->word(),
            'targetDisease' => $this->faker->text(),
            'company' => $this->faker->word(),
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
