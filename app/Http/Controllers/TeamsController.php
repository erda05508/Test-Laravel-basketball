<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Player;
use App\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('front.teams', compact('teams'));
    }

    public function players($team_id)
    {
        $team = Team::find($team_id);
        $players = Player::where('team_id', $team_id)->get();
        return view('front.players', compact('players', 'team'));
    }

    public function coaches($team_id)
    {
        $team = Team::find($team_id);
        $coaches = Coach::where('team_id', $team_id)->get();
        return view('front.coaches', compact('coaches', 'team'));
    }
}
