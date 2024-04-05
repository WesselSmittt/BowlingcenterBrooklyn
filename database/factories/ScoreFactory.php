<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Player;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Score::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player_id' => Player::factory(),
            'game_id' => Game::factory(),
            'score' => $this->faker->numberBetween($min = 1, $max = 300),
        ];
    }
}