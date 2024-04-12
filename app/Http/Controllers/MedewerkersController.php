<?php

namespace App\Http\Controllers;

use App\Models\PakketOptie;
use App\Models\User;
use App\Models\Reserveren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservering;


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
        try {
            $reservations = DB::table('reservations')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->where('users.id', $id)
                ->select('reservations.*', 'users.name as user_name')
                ->get();

            return view('medewerkers.user_reservations', ['reservations' => $reservations]);
        } catch (\Exception $e) {
            // If an exception is caught, redirect back with an error message
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


    public function editMedewerker($id)
    {
        try {
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
        } catch (\Exception $e) {
            // If an exception is caught, redirect back with an error message
            return redirect()->back()->with('error', 'De updates konden niet worden toegepast vanwege een technisch probleem. Probeer het later opnieuw of neem contact op met de technische ondersteuning voor hulp.');
        }
    }
    // Deletes a specific reservation from the database, then redirects to the index view with a success message.



    /**
     * Update the specified resource in storage.
     */

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

        return redirect()->route('medewerkers.index')->with('success', 'Reservering succesvol bijgewerkt');
    }

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
