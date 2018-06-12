<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTournamentsRequest;
use App\Http\Requests\Admin\UpdateTournamentsRequest;

class TournamentsController extends Controller
{
    /**
     * Display a listing of Tournament.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tournament_access')) {
            return abort(401);
        }

        $tournaments = Tournament::all();

        return view('admin.tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating new Tournament.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tournament_create')) {
            return abort(401);
        }

        $teams = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');
        return view('admin.tournaments.create', compact( 'teams'));
    }

    /**
     * Store a newly created Tournament in storage.
     *
     * @param StoreTournamentsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTournamentsRequest $request)
    {
        if (! Gate::allows('tournament_create')) {
            return abort(401);
        }
        $tournament = Tournament::create($request->all());
        $tournament->teams()->attach($request->get('teams'));

        return redirect()->route('admin.tournaments.index', compact('tournament', 'teams'));
    }


    /**
     * Show the form for editing Tournament.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tournament_edit')) {
            return abort(401);
        }
        $teams = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');

        $tournament = Tournament::findOrFail($id);

        return view('admin.tournaments.edit', compact('tournament', 'teams'));
    }

    /**
     * Update Tournament in storage.
     *
     * @param UpdateTournamentsRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTournamentsRequest $request, $id)
    {
        if (! Gate::allows('tournament_edit')) {
            return abort(401);
        }
        $tournament = Tournament::findOrFail($id);
        $tournament->update($request->all());
        $tournament->teams()->sync($request->get('teams'));



        return redirect()->route('admin.tournaments.index');
    }


    /**
     * Display Tournament.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tournament_view')) {
            return abort(401);
        }
        $tournament = Tournament::findOrFail($id);

        return view('admin.tournaments.show', compact('tournament'));
    }


    /**
     * Remove Tournament from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tournament_delete')) {
            return abort(401);
        }
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();

        return redirect()->route('admin.tournaments.index');
    }

    /**
     * Delete all selected Tournament at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tournament_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Tournament::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
