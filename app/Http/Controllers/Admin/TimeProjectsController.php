<?php

namespace App\Http\Controllers\Admin;

use App\TimeProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimeProjectsRequest;
use App\Http\Requests\Admin\UpdateTimeProjectsRequest;

class TimeProjectsController extends Controller
{
    /**
     * Display a listing of TimeProject.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('time_project_access')) {
            return abort(401);
        }

        $time_projects = TimeProject::all();

        return view('admin.time_projects.index', compact('time_projects'));
    }

    /**
     * Show the form for creating new TimeProject.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('time_project_create')) {
            return abort(401);
        }
        return view('admin.time_projects.create');
    }

    /**
     * Store a newly created TimeProject in storage.
     *
     * @param  \App\Http\Requests\StoreTimeProjectsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeProjectsRequest $request)
    {
        if (! Gate::allows('time_project_create')) {
            return abort(401);
        }
        $time_project = TimeProject::create($request->all());



        return redirect()->route('admin.time_projects.index');
    }


    /**
     * Show the form for editing TimeProject.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('time_project_edit')) {
            return abort(401);
        }
        $time_project = TimeProject::findOrFail($id);

        return view('admin.time_projects.edit', compact('time_project'));
    }

    /**
     * Update TimeProject in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeProjectsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeProjectsRequest $request, $id)
    {
        if (! Gate::allows('time_project_edit')) {
            return abort(401);
        }
        $time_project = TimeProject::findOrFail($id);
        $time_project->update($request->all());



        return redirect()->route('admin.time_projects.index');
    }


    /**
     * Display TimeProject.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('time_project_view')) {
            return abort(401);
        }
        $time_entries = \App\TimeEntry::where('project_id', $id)->get();

        $time_project = TimeProject::findOrFail($id);

        return view('admin.time_projects.show', compact('time_project', 'time_entries'));
    }


    /**
     * Remove TimeProject from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('time_project_delete')) {
            return abort(401);
        }
        $time_project = TimeProject::findOrFail($id);
         if(!env('DEMO_MODE')) {
        $time_project->delete();
    }

        return redirect()->route('admin.time_projects.index');
    }

    /**
     * Delete all selected TimeProject at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('time_project_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TimeProject::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {

                 if(!env('DEMO_MODE')) {
                $entry->delete();
              }
            }
        }
    }

}
