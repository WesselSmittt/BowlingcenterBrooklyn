<?php

namespace App\Http\Controllers;

use App\Models\PakketOptie;
use App\Models\Reservering;
use Illuminate\Http\Request;

class WesselMedewerkersController extends Controller
{
    public function indexPakket()
    {
        $vanaf_datum = request('vanaf_datum');

        $reserveringen = Reservering::query()
            ->when($vanaf_datum, function ($query, $vanaf_datum) {
                return $query->where('datum', '>=', $vanaf_datum);
            })
            ->orderBy('datum', 'desc')
            ->get();

        if ($vanaf_datum && $reserveringen->isEmpty()) {
            session()->flash('message', 'Er is geen reserveringsinformatie beschikbaar voor deze geselecteerde datum');
        }

        return view('Wessel.index', compact('reserveringen')); // Adjusted view path
    }


    public function edit($id)
    {
        $reservering = Reservering::find($id);
        $pakketopties = PakketOptie::all(); // Fetch all pakketopties from the database

        return view('Wessel.edit', compact('reservering', 'pakketopties')); // Adjusted view path
    }

    public function updatePakket(Request $request, $id)
    {
        $reservering = Reservering::find($id);
        $pakket_optie = PakketOptie::find($request->input('optiepakket_id'));

        // Controleer of het pakket_optie_id "4" is en er kinderen in de reservering zijn
        if ($reservering->aantal_kinderen > 0 && $pakket_optie->id == 4) {
            return redirect()->back()->with('error', 'Het optiepakket ' . $pakket_optie->naam . ' is niet bedoeld voor kinderen');
        }

        $reservering->pakket_optie_id = $pakket_optie->id;
        $reservering->save();

        return redirect()->route('Wessel.index')->with('success', 'Reservering succesvol bijgewerkt'); // Adjusted route name
    }
}
