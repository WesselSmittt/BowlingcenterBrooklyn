<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        

        $request->validate([
            'game_id' => 'required|exists:games,id',
            'player_id' => 'required|exists:players,id',
            'score' => 'required|integer|max:300',
        ]);

        $score = new Score;
        $score->game_id = $request->game_id; // Store the game_id retrieved from the form
        $score->player_id = $request->player_id;
        $score->score = $request->score;
        $score->player()->associate($player);
        $score->save();

        return redirect()->route('games.index')->with('success', 'Score created successfully');
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
    // Define validation rules with custom error message
    $rules = [
        'score' => 'required|numeric|max:300', // Limit score to 300
    ];

    // Define custom error messages
    $customMessages = [
        'score.max' => 'The score must not exceed 300.',
    ];

    // Validate the request data with custom error messages
    $validator = Validator::make($request->all(), $rules, $customMessages);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Proceed with updating the score if validation passes
    $score = Score::findOrFail($score_id);
    
    // Update the score
    $score->score = $request->input('score');
    // Add more fields if necessary
    
    $score->save();
    
    // Redirect or return a response
    return redirect()->route('games.index')->with('success', 'Score updated successfully');
}   

    public function create(Request $request)
{
    $games = Game::all();
    $selectedGameId = $request->input('game_id');
    $players = [];

    if ($selectedGameId) {
        $players = Game::findOrFail($selectedGameId)->players;
    }

    return view('scores.create', compact('games', 'players', 'selectedGameId'));
}

    public function getPlayersByGame(Request $request)
{
    // Retrieve the game ID from the request
    $gameId = $request->input('game_id');
    
    // Fetch players based on the selected game ID
    $players = Game::findOrFail($gameId)->players;
    
    // Return players as JSON response
    return response()->json($players);
}
}
