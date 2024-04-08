<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reserveringen;

class MedewerkerController extends Controller
{
    // Deze functie handelt de indexpagina van de Medewerker-sectie af
    public function index(Request $request)
    {
        // Start een query om alle reserveringen te krijgen
        $reservations = Reserveringen::query();

        // Als er een datum is opgegeven in het verzoek, filter dan de reserveringen om alleen die op of na de opgegeven datum te bevatten
        if ($request->filled('date')) {
            $reservations->whereDate('datum', '>=', $request->date);
        }

        // Haal de reserveringen op uit de database en sorteer ze op datum in oplopende volgorde
        $reservations = $reservations->orderBy('datum', 'asc')->get();

        // Als er geen reserveringen zijn, stel dan een bericht in
        if ($reservations->isEmpty()) {
            $message = 'Er is geen reserveringsinformatie beschikbaar voor deze geselecteerde datum';
        } else {
            $message = null;
        }

        // Retourneer de view met de reserveringen en het bericht
        return view('medewerker.index', compact('reservations', 'message'));
    }
}
