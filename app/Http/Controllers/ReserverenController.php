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

        $startTime = strtotime($request->start_time);
        $endTime = strtotime($request->end_time);
        $dayOfWeek = date("w", $startTime);
        $hourStart = date("H", $startTime);
        $hourEnd = date("H", $endTime);

        // Controleer of het bowlingcentrum geopend is
        if ($hourStart < 14 || ($dayOfWeek >= 1 && $dayOfWeek <= 4 && $hourEnd > 22) || ($dayOfWeek >= 5 && $hourEnd > 24)) {
            return redirect()->back()->with('error', 'Het bowlingcentrum is gesloten op de geselecteerde tijden.');
        }

        // Stel het tarief in op basis van de dag en het uur
        if ($dayOfWeek >= 1 && $dayOfWeek <= 4) {
            // Maandag t/m donderdag
            $reserveren->tariff_id = 1;
        } elseif ($dayOfWeek >= 5 && $hourStart >= 14 && $hourEnd <= 22) {
            // Vrijdag t/m zondag van 14.00 uur tot 22.00 uur
            $reserveren->tariff_id = 2;
        } elseif ($dayOfWeek >= 5 && $hourStart >= 22 && $hourEnd <= 24) {
            // Vrijdag t/m zondag van 22.00 uur tot 24.00 uur (magic bowlen)
            $reserveren->tariff_id = 3;
        }


        $reserveren->user_id = Auth::id();
        $reserveren->start_time = $request->start_time;
        $reserveren->end_time = $request->end_time;
        $reserveren->total_childs = $request->total_childs;
        $reserveren->total_adults = $request->total_adults;
        $reserveren->package = $request->package;
        $reserveren->calculatePrice();
        $reserveren->save();

        return redirect('dashboard')->with('success', 'Reservation created successfully');
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
        $reserveren->start_time = $request->get('start_time');
        $reserveren->end_time = $request->get('end_time');
        $reserveren->total_childs = $request->get('total_childs');
        $reserveren->total_adults = $request->get('total_adults');
        $reserveren->package = $request->get('package');
        $reserveren->calculatePrice();
        $reserveren->save();

        return redirect()->route('reserveren.show', $id)->with('success', 'Reservering succesvol bijgewerkt');
    }
}
