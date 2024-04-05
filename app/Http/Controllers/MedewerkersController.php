<?php

namespace App\Http\Controllers;

use App\Models\Reserveren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedewerkersController extends Controller
{
    // Retrieves all the Reservations from the database and puts them in a variable and gets used in the index view.
    public function index()
    {
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->select('reservations.*', 'users.name as user_name')
            ->get();

        return view('medewerkers.index', ['reservations' => $reservations]);
    }

    public function userReservations($id)
    {
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->where('users.id', $id)
            ->select('reservations.*', 'users.name as user_name')
            ->get();

        return view('medewerkers.user_reservations', ['reservations' => $reservations]);
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
    public function edit(string $id)
    {
        $reservation = DB::table('reservations')->where('id', $id)->first();

        return view('medewerkers.edit', ['reservation' => $reservation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'tariff_id' => 'required|integer',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i',
            'total_childs' => 'required|integer',
            'total_adults' => 'required|integer',
            'menu_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        DB::table('reservations')
            ->where('id', $id)
            ->update($validatedData);

        return redirect()->route('medewerkers.index')->with('success', 'Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('reservations')->where('id', $id)->delete();


        return redirect()->route('medewerkers.index')->with('success_delete', 'Reservation deleted successfully');
    }
}
