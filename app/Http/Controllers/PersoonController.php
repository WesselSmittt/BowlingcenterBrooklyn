<?php

namespace App\Http\Controllers;

use App\Models\Persoon;
use App\Models\Uitslagen;
use Illuminate\Http\Request;

class PersoonController extends Controller
{
    public function index()
    {
        $personen = Persoon::all();

        return view('persoon.index', ['personen' => $personen]);
    }

    public function show($id)
    {
        $persoon = Persoon::find($id);
        $uitslagen = Uitslagen::with('spel', 'spel.persoon', 'spel.reservering')
            ->whereHas('spel.persoon', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->orderBy('AantalPunten', 'desc')
            ->get();

        return view('profile', ['persoon' => $persoon, 'uitslagen' => $uitslagen]);
    }
}
