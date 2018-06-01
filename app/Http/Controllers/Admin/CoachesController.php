<?php

namespace App\Http\Controllers\Admin;

use App\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCoachesRequest;
use App\Http\Requests\Admin\UpdateCoachesRequest;

class CoachesController extends Controller
{
    /**
     * Display a listing of Coach.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('coach_access')) {
            return abort(401);
        }

        $coaches = Coach::all();

        return view('admin.coaches.index', compact('coaches'));
    }

    /**
     * Show the form for creating new Coach.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('coach_create')) {
            return abort(401);
        }
        $teams = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.coaches.create', compact('teams'));
    }

    /**
     * Store a newly created Coach in storage.
     *
     * @param  \App\Http\Requests\StoreCoachesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoachesRequest $request)
    {
        if (! Gate::allows('coach_create')) {
            return abort(401);
        }
        $coach = Coach::create($request->all());



        return redirect()->route('admin.coaches.index');
    }


    /**
     * Show the form for editing Coach.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('coach_edit')) {
            return abort(401);
        }
        $teams = \App\Team::get()->pluck('name', 'id')->prepend('Please select', '');

        $coach = Coach::findOrFail($id);

        return view('admin.coaches.edit', compact('coach', 'teams'));
    }

    /**
     * Update Coach in storage.
     *
     * @param  \App\Http\Requests\UpdateCoachesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoachesRequest $request, $id)
    {
        if (! Gate::allows('coach_edit')) {
            return abort(401);
        }
        $coach = Coach::findOrFail($id);
        $coach->update($request->all());



        return redirect()->route('admin.coaches.index');
    }


    /**
     * Display Coach.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('coach_view')) {
            return abort(401);
        }
        $coach = Coach::findOrFail($id);

        return view('admin.coaches.show', compact('coach'));
    }


    /**
     * Remove Coach from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('coach_delete')) {
            return abort(401);
        }
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return redirect()->route('admin.coaches.index');
    }

    /**
     * Delete all selected Coach at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('coach_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Coach::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
