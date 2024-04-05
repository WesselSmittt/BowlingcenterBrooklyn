<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Menu;
use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = $this->faker->dateTimeBetween('now', '+2 years');
        $end_time = (clone $start_time)->modify('+2 hours');
    
        return [
            'menu_id' => Menu::factory(),
            'user_id' => User::factory(),
            'tariff_id' => Tariff::factory(),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'total_childs' => $this->faker->numberBetween(1, 10),
            'total_adults' => $this->faker->numberBetween(1, 10),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
