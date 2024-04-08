<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Reserveringen;

class MedewerkerController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reserveringen::query();

        if ($request->filled('date')) {
            $reservations->whereDate('datum', '>=', $request->date);
        } else {
            $reservations->whereDate('datum', '>=', Carbon::tomorrow());
        }

        $reservations = $reservations->orderBy('datum', 'asc')->get();

        return view('medewerker.index', compact('reservations'));
    }
}
