<?php

namespace App\Http\Controllers;

use App\Models\Uitslagen;
use App\Models\Spel;
use App\Models\Reservering;
use App\Models\Persoon;
use Illuminate\Http\Request;

class UitslagenController extends Controller
{
    
    public function index(Request $request)
    {
        $date = $request->input('date');
        $uitslagen = Uitslagen::with('spel', 'spel.persoon', 'spel.reservering', 'spel.reservering.persoon')
            ->when($date, function ($query, $date) {
                return $query->whereHas('spel.reservering', function ($query) use ($date) {
                    $query->whereDate('datum', $date);
                });
            })
            ->when($request->persoon_id, function ($query, $persoon_id) {
                return $query->whereHas('spel.persoon', function ($query) use ($persoon_id) {
                    $query->where('id', $persoon_id);
                });
            })
            ->orderBy('AantalPunten', 'desc')
            ->get();

        if($uitslagen->isEmpty()){
            return back()->with('error', 'Er is geen uitslag beschikbaar voor deze geselecteerde datum.');
        }

        return view('uitslagen.index', ['uitslagen' => $uitslagen]);
    }

    public function edit($id)
    {
        $uitslag = Uitslagen::find($id);

        if (!$uitslag) {
            return redirect()->route('uitslagen.index')->with('error', 'Uitslag niet gevonden');
        }

        return view('uitslagen.edit', compact('uitslag'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'AantalPunten' => 'required|integer|max:300',
        ], [
            'AantalPunten.max' => 'Het aantal punten is niet geldig, voer een waarde in kleiner of gelijk aan 300',
        ]);

        $uitslag = Uitslagen::find($id);
        $uitslag->AantalPunten = $request->AantalPunten;
        $uitslag->save();

        session()->flash('message', 'Aantal punten is gewijzigd');


        return redirect()->route('uitslagen.index');
    }

    public function profile($id)
    {
        $persoon = Persoon::find($id);

        if ($persoon === null) {
            // Handle the case where no person was found
            return redirect()->back()->with('error', 'Persoon niet gevonden');
        }

        $uitslagen = Uitslagen::whereHas('spel.persoon', function ($query) use ($id) {
            $query->where('id', $id);
        })->with('spel', 'spel.persoon', 'spel.reservering')->get();

        return view('uitslagen.profile', ['uitslagen' => $uitslagen]);
    }
    
    
}