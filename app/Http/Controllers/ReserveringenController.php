<?php

namespace App\Http\Controllers;

use App\Models\PakketOptie;
use Illuminate\Http\Request;
use App\Models\Reserveringen;
use Illuminate\Support\Facades\Auth;

class ReserveringenController extends Controller
{
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
        return view('dashboard', ['reservations' => $reservations]);
    }
    public function edit($id)
    {
        $reservation = Reserveringen::findOrFail($id);
        $pakketOpties = PakketOptie::all(); // Zorg ervoor dat je het PakketOptie model hebt geïmporteerd bovenaan je controller bestand.

        return view('reservations.edit', ['reservation' => $reservation, 'pakketOpties' => $pakketOpties]);
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

        return redirect()->route('dashboard')->with('success', 'Pakket succesvol bijgewerkt');
    }
}
