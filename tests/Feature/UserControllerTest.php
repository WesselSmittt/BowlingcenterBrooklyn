<?php

namespace Tests\Unit;

use App\Models\Score;
use App\Models\Player;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScoreTest extends TestCase
{
    use RefreshDatabase;

    public function testScoreCanBeCreatedAndRetrieved()
    {
        $player = Player::factory()->create();
        $game = Game::factory()->create();

        $score = Score::factory()->create([
            'player_id' => $player->id,
            'game_id' => $game->id,
            'score' => 150,
        ]);

        $retrievedScore = Score::find($score->id);

        $this->assertNotNull($retrievedScore);
        $this->assertEquals($score->id, $retrievedScore->id);
        $this->assertEquals($score->player_id, $retrievedScore->player_id);
        $this->assertEquals($score->game_id, $retrievedScore->game_id);
        $this->assertEquals($score->score, $retrievedScore->score);
    }
}