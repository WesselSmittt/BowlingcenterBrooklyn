<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserveringen;

class MedewerkerController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reserveringen::query();

        if ($request->filled('date')) {
            $reservations->whereDate('datum', $request->date);
        }

        $reservations = $reservations->orderBy('datum', 'desc')->get();

        return view('medewerker.index', compact('reservations'));
    }
}
