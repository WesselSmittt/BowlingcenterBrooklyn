<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::with('game.player')->get();
        
        // Now you can access players data through scores
        foreach ($scores as $score) {
            $playerName = $score->game->player->name;
            // Do something with player name
        }

        return $scores;
    }
    
    public function store(Request $request)
    {
        $player = Player::find($request->player_id);

        if (!$player) {
            // Handle the case where the player is not found
        }

        $score = new Score;
        $score->score = $request->score;
        $score->player()->associate($player);
        $score->save();

        // Redirect, return a view, or do whatever you need to do after storing the score
    }
}