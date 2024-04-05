<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'column1' => $this->faker->sentence,
            'column2' => $this->faker->sentence,
            'column3' => $this->faker->sentence,
            'column4' => $this->faker->sentence,
            // Voeg meer kolommen toe indien nodig
        ];
    }
}
