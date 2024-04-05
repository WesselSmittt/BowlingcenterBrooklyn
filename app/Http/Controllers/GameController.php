<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Game;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('id', 'desc')->paginate(6);
        return view('games.index', compact('games'));
    }

    public function show($id)
{
    $game = Game::find($id);

    if (!$game) {
        return redirect('/games')->with('error', 'Game not found');
    }

    $scores = Score::where('game_id', $id)->get();

    $gameDetails = DB::table('games')
        ->join('users', 'games.user_id', '=', 'users.id')
        ->join('reservations', 'games.reservation_id', '=', 'reservations.id')
        ->where('games.id', $id)
        ->select('games.*', 'users.name as user_name', 'reservations.*')
        ->first();

    return view('games.details', compact('game', 'gameDetails', 'scores'));

    $scores = Score::with('player')->where('game_id', $id)->get();
    
}
}
