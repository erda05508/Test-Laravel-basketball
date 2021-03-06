<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGamesRequest;
use App\Http\Requests\Admin\UpdateGamesRequest;

class GamesController extends Controller
{
    /**
     * Display a listing of Game.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('game_access')) {
            return abort(401);
        }

        $games = Game::all();

        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating new Game.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('game_create')) {
            return abort(401);
        }
        $team1s = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');
        $team2s = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');
        $tournament = \App\Tournament::get()->pluck('title')->prepend('Please select', '');

        return view('admin.games.create', compact('team1s', 'team2s', 'tournament'));
    }

    /**
     * Store a newly created Game in storage.
     *
     * @param StoreGamesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGamesRequest $request)
    {
        if (! Gate::allows('game_create')) {
            return abort(401);
        }
        $game = Game::create($request->all());



        return redirect()->route('admin.games.index');
    }


    /**
     * Show the form for editing Game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('game_edit')) {
            return abort(401);
        }
        $team1s = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');
        $team2s = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');

        $game = Game::findOrFail($id);

        return view('admin.games.edit', compact('game', 'team1s', 'team2s'));
    }

    /**
     * Update Game in storage.
     *
     * @param UpdateGamesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGamesRequest $request, $id)
    {
        if (! Gate::allows('game_edit')) {
            return abort(401);
        }
        $game = Game::findOrFail($id);
        $game->update($request->all());



        return redirect()->route('admin.games.index');
    }


    /**
     * Display Game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('game_view')) {
            return abort(401);
        }
        $game = Game::findOrFail($id);
        $g2point1 = DB::table('games')
            ->where('team1_id', $id)
            ->get();
        $g2point2 = DB::table('games')
            ->where('team2_id', $id)
            ->get();
        $g2point = 0;
        foreach ($g2point1 as $game){
            $g2point += $game->g2point1;
        }
        foreach ($g2point2 as $game){
            $g2point += $game->g2point2;
        }
        dd($g2point);

        return view('admin.games.show', compact('game', 'g2point', 'g2point1', 'g2point2'));
    }


    /**
     * Remove Game from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('game_delete')) {
            return abort(401);
        }
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admin.games.index');
    }

    /**
     * Delete all selected Game at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('game_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Game::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
