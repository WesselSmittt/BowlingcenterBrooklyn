<?php

namespace App\Http\Controllers;
use App\Models\PakketOptie;
use Illuminate\Http\Request;
use App\Models\Reservering;


class MedewerkersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    
    public function index()
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

        return view('medewerkers.index', compact('reserveringen'));
    }
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    public function edit($id)
    {
        $reservering = Reservering::find($id);
        $pakketopties = PakketOptie::all(); // Fetch all pakketopties from the database

        return view('medewerkers.edit', compact('reservering', 'pakketopties'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservering = Reservering::find($id);
        $reservering->update($request->all());
        

        return redirect()->route('medewerkers.index')->with('success', 'Reservering succesvol bijgewerkt');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
