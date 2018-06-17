<?php

namespace App\Http\Controllers;

use App\Team;
use App\Game;


class TableController extends Controller
{

    public function index()
    {
        $teams = Team::all()->sortByDesc('points');
        $games = Game::all();

        return view('front.table', compact('teams', 'games'));
    }

    public function show($team1_id, $team2_id)
    {
        $g2point1 = DB::table('games')->where('team1_id', $team1_id)->get();
        $g2point2 = DB::table('games')->where('team2_id', $team2_id)->get();
        $g2point = 0;
        foreach ($g2point1 as $game){$g2point += $game->g2point1;}
        foreach ($g2point2 as $game){$g2point += $game->g2point2;}
        dd($g2point);


        return view('front.table', compact( 'g2point'));
    }

}
