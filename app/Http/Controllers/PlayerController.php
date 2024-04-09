<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display the specified player's scores.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scores($id)
    {
        $player = Player::find($id);

        if (!$player) {
            return redirect()->back()->with('error', 'Player not found');
        }

        $scores = $player->scores()->orderByDesc('score')->get();

        return view('players.scores', ['player' => $player, 'scores' => $scores]);
    }
}