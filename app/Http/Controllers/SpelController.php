<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spel; // Zorg ervoor dat u het juiste model importeert

class SpelController extends Controller
{
    public function index()
    {
        $spellen = Spel::all(); // Haal alle spellen op uit de database

        return view('spellen.index', ['spellen' => $spellen]); // Geef de spellen door aan de view
    }
}