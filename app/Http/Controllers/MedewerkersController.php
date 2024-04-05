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
    // Retrieves all the Reservations for a specific user from the database, joins them with the users table, and sends them to the user_reservations view.
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
    // Retrieves a specific reservation from the database and sends it to the edit view.
    public function edit(string $id)
    {
        $reservation = DB::table('reservations')->where('id', $id)->first();

        return view('medewerkers.edit', ['reservation' => $reservation]);
    }
    // Validates the request data and updates a specific reservation in the database, then redirects to the index view with a success message.
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
    // Deletes a specific reservation from the database, then redirects to the index view with a success message.
    public function destroy(string $id)
    {
        DB::table('reservations')->where('id', $id)->delete();


        return redirect()->route('medewerkers.index')->with('success_delete', 'Reservation deleted successfully');
    }
}
