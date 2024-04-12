<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserveren;
use App\Models\PakketOptie;
use App\Models\Reservation;
use App\Models\Reservering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class MedewerkersController extends Controller
{
    public function index()
    {
        $allReservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->select('reservations.*', 'users.name as user_name')
            ->get();

        return view('medewerkers.index', ['allReservations' => $allReservations]);
    }

    public function userReservations($id)
    {
        try {
            $userReservations = DB::table('reservations')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where('users.id', $id)
                ->select('reservations.*', 'users.name as user_name')
                ->get();

            return view('medewerkers.user_reservations', ['reservations' => $userReservations]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Er is een technisch probleem opgetreden en de reserveringen kunnen momenteel niet worden geladen.');
        }
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


    public function edit($id)
    {
        $reservation = Reservation::find($id);

        // Pass the reservation to the view
        return view('medewerkers.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('reservations')->where('id', $id)->delete();


        return redirect()->route('medewerkers.index')->with('success_delete', 'Reservation deleted successfully');
    }
    // This function is used to display all users
    public function show()
    {
        // Fetch all users from the database
        $users = User::all();

        // Return the 'make-medewerker' view with the users data
        return view('medewerkers.make-medewerker', compact('users'));
    }

    // This function is used to change a user's role to 'medewerker'
    public function makeMedewerker($id)
    {
        // Find the user with the given id, or fail if not found
        $user = User::findOrFail($id);

        // Change the user's role_id to 2 (which represents 'medewerker')
        $user->role_id = 2;

        // Save the changes to the database
        $user->save();

        // Redirect the user back to the 'users.show' route with a success message
        return redirect()->route('users.show')->with('success', $user->name . ' has been made a medewerker');
    }

    // This function is used to change a user's role to 'klant'
    public function makeKlant($id)
    {
        // Find the user with the given id, or fail if not found
        $user = User::findOrFail($id);

        // Change the user's role_id to 1 (which represents 'klant')
        $user->role_id = 1;

        // Save the changes to the database
        $user->save();

        // Redirect the user back to the 'users.show' route with a success message
        return redirect()->route('users.show')->with('success', $user->name . ' has been made a klant');
    }
}
