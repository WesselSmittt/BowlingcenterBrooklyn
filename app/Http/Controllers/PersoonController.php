<?php

namespace App\Http\Controllers;

use App\Models\Persoon;
use Illuminate\Http\Request;

class PersoonController extends Controller
{
    public function index()
    {
        $personen = Persoon::all();

        return view('persoon.index', ['personen' => $personen]);
    }
}