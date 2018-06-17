<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Support\Facades\DB;

class GamesController extends Controller
{

    public function index()
    {
        $games = Game::whereNull('result1')->get();
        $results = Game::whereNotNull('result1')->get();
        $g2point = Game::whereNotNull('g2point1')->get();
        $g3point = Game::whereNotNull('g3point1')->get();
        $fines = Game::whereNotNull('fine1')->get();
        $transfers = Game::whereNotNull('transfers1')->get();
        $rebounds = Game::whereNotNull('rebounds1')->get();

//        $g2point1 = DB::table('games')->where('team1_id', ['id'])->get();
//        $g2point2 = DB::table('games')->where('team2_id', ['id'])->get();
//        $g2point = 0;
//        foreach ($g2point1 as $game){$g2point += $game->g2point1;}
//        foreach ($g2point2 as $game){$g2point += $game->g2point2;}
//        dd($g2point);




        return view('front.games', compact('games', 'results', 'g2point', 'g3point', 'fines', 'transfers', 'rebounds'));
    }

}
