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

    public function edit($score_id)
{
    // Retrieve the score by its ID
    $score = Score::findOrFail($score_id);
    
    // Pass the score to the view
    return view('scores.edit', compact('score'));
}   

    public function destroy($score_id)
    {
        // Retrieve the score by its ID
        $score = Score::findOrFail($score_id);
        
        // Delete the score
        $score->delete();

        // You can redirect the user back to the games page or anywhere else after deletion
        return redirect()->route('games.index')->with('success', 'Score deleted successfully');
    }

    public function update(Request $request, $score_id)
{
    $score = Score::findOrFail($score_id);
    
    // Explicitly assign fields you want to update
    $score->score = $request->input('score');
    // Add more fields if necessary
    
    $score->save();
    
    return redirect()->route('games.index')->with('success', 'Score updated successfully');
}
}