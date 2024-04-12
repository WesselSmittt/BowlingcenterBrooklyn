<?php

namespace App\Http\Controllers;

use App\Models\PakketOptie;
use Illuminate\Http\Request;
use App\Models\Reserveringen;
use Illuminate\Support\Facades\Auth;

class DylanMedewerkerController extends Controller
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
        return view('Dylan.Index', compact('reservations', 'message'));
    }
    public function show()
    {
        // De 'with'-methode wordt hier gebruikt in plaats van 'join' om de gerelateerde modellen vooraf te laden.
        // Dit kan het aantal queries dat naar de database wordt gemaakt aanzienlijk verminderen en zo de prestaties van de applicatie verhogen.
        // In dit geval laden we de 'persoon', 'pakketOptie' en 'reserveringStatus' relaties van het Reserveringen model.
        // De 'where'-methode wordt gebruikt om een where-clausule aan de query toe te voegen. In dit geval halen we alleen de reserveringen op waar de 'persoon_id' overeenkomt met de ID van de momenteel geauthenticeerde gebruiker.
        // De 'get'-methode wordt gebruikt om de query uit te voeren en de resultaten uit de database op te halen.
        $reservations = Reserveringen::with(['persoon', 'pakketOptie', 'reserveringStatus'])
            ->where('persoon_id', Auth::id())
            ->get();

        // De 'view'-functie geeft een view terug (in dit geval 'dashboard') om te renderen, met de reserveringen data doorgegeven aan de view.
        return view('Dylan.index', ['reservations' => $reservations]);
    }
    public function edit($id)
    {
        $reservation = Reserveringen::findOrFail($id);
        $pakketOpties = PakketOptie::all();
        return view('Dylan.edit', ['reservation' => $reservation, 'pakketOpties' => $pakketOpties]);
    }

    public function update(Request $request, $id)
    {
        $reservation = Reserveringen::findOrFail($id);
        $pakketOptie = PakketOptie::find($request->input('pakket_optie_id'));

        if ($reservation->aantal_kinderen > 0 && $pakketOptie->id == 4) {
            return redirect()->back()->with('error', 'Het optiepakket ' . $pakketOptie->naam . ' is niet bedoeld voor kinderen');
        }

        $reservation->pakket_optie_id = $pakketOptie->id;
        $reservation->save();

        return redirect()->route('Dylan.index')->with('success', 'Pakket succesvol bijgewerkt');
    }
}
