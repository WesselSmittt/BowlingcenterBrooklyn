<?php

namespace App\Http\Controllers;
use App\Models\Reserveren;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReserverenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reserveren.index');
 
    } 


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $reserveren = new Reserveren;

        $reserveren->tariff_id = $request->tariff_id;
        $reserveren->user_id = Auth::id();
        $reserveren->start_time = $request->start_time;
        $reserveren->end_time = $request->end_time;
        $reserveren->total_childs = $request->total_childs;
        $reserveren->total_adults = $request->total_adults;
        $reserveren->menu_id = $request->menu_id;

        $reserveren->save();

    return redirect('reserveren');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reserveren::findOrFail($id);

        return view('reserveren.show', ['reservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
