<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Team;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{

    public function index()
    {
        $tournaments = Tournament::all();
        return view('front.tournaments', compact('tournaments'));
    }
}
