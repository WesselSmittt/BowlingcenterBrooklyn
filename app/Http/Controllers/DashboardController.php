<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Reserveren;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reserveren::where('user_id', Auth::id())->get();

        return view('dashboard', ['reservations' => $reservations]);
    }
}
