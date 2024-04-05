<?php

namespace App\Http\Controllers;
use App\Models\Reserveren;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReserverenController extends Controller
{
    public function index()
    {
        return view('reserveren.index');
 
    } 

    public function store(Request $request)
    { 

        $reserveren = new Reserveren;

        $reserveren->setTariffId();

        $reserveren->tariff_id = $reserveren->getTariffId();
        $reserveren->user_id = Auth::id();
        $reserveren->start_time = $request->start_time;
        $reserveren->end_time = $request->end_time;
        $reserveren->total_childs = $request->total_childs;
        $reserveren->total_adults = $request->total_adults;
        $reserveren->menu_id = $request->menu_id;

        $reserveren->save();

    return redirect('reserveren');
    }

    public function show($id)
    {
        $reservation = Reserveren::findOrFail($id);

        return view('reserveren.show', ['reservation' => $reservation]);
    }

    public function destroy($id)
        {
            $reserveren = Reserveren::find($id);
            if ($reserveren) {
                $reserveren->delete();
                // Voeg een succesbericht toe aan de sessie
                Session::flash('success', 'Reservering succesvol verwijderd');
            } else {
                // Voeg een foutbericht toe aan de sessie
                Session::flash('error', 'Er is een fout opgetreden bij het verwijderen van de reservering');
            }

    return redirect()->route('dashboard')->with('status', 'Reservation cancelled successfully!');
        }

    public function edit($id)
    {
        $reserveren = Reserveren::find($id);
        return view('reserveren.edit', compact('reserveren'));
    }

    public function update(Request $request, $id)
    {
        $reserveren = Reserveren::find($id);
        $reserveren->total_childs = $request->get('total_childs');
        $reserveren->total_adults = $request->get('total_adults');
        // Update other fields...
        $reserveren->save();

        return redirect()->route('reserveren.show', $id)->with('success', 'Reservering succesvol bijgewerkt');
    }
}
