<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Score;
use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'game_id' => Game::factory(),
        ];
    }
    public function showScores($playerId)
{
    $player = Player::find($playerId); // Fetch the player from the database
    $scores = $player->scores; // Fetch the scores for this player

    return view('players.scores', ['scores' => $scores]);
}
}