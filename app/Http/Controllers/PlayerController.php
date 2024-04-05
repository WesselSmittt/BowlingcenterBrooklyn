<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Player;
use App\Models\Game;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    // public function scores($player_id)
    // {
    //     $player = Player::find($player_id);

    //     if (!$player) {
    //         return redirect()->back()->with('error', 'Player not found');
    //     }

    //     $scores = $player->scores()->orderByDesc('score')->get();

    //     return view('players.scores', compact('player', 'scores'));
    // }
    
    public function scores($player_id)
{
    $player = Player::find($player_id);
    if (!$player) {
        return redirect()->back()->with('error', 'Player not found');
    }
    $scores = $player->scores()->orderByDesc('score')->get();
    return view('players.scores', ['player' => $player, 'scores' => $scores]);
}
//     public function show($id)
// {
    
    // }
    public function show($id)
    {
        $player = Player::findOrFail($id);
        $scores = $player->scores()->get(); // Or use paginate() if you want pagination
    return view('player.show', compact('player', 'scores'));
}
}
