<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservering; // Zorg ervoor dat u het juiste model importeert

class ReserveringController extends Controller
{
    public function index()
    {
        $reserveringen = Reservering::all(); // Haal alle reserveringen op uit de database

        return view('reservering.index', ['reserveringen' => $reserveringen]); // Geef de reserveringen door aan de view
    }
}