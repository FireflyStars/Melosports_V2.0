<?php

namespace App\Http\Controllers\Admin;

use App\TimeEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimeEntriesRequest;
use App\Http\Requests\Admin\UpdateTimeEntriesRequest;

class TimeEntriesController extends Controller
{
    /**
     * Display a listing of TimeEntry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('time_entry_access')) {
            return abort(401);
        }

        $time_entries = TimeEntry::all();

        return view('admin.time_entries.index', compact('time_entries'));
    }

    /**
     * Show the form for creating new TimeEntry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('time_entry_create')) {
            return abort(401);
        }
        $work_types = \App\TimeWorkType::get()->pluck('name', 'id')->prepend('Please select', '');$projects = \App\TimeProject::get()->pluck('name', 'id')->prepend('Please select', '');

        return view('admin.time_entries.create', compact('work_types', 'projects'));
    }

    /**
     * Store a newly created TimeEntry in storage.
     *
     * @param  \App\Http\Requests\StoreTimeEntriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeEntriesRequest $request)
    {
        if (! Gate::allows('time_entry_create')) {
            return abort(401);
        }
        $time_entry = TimeEntry::create($request->all());



        return redirect()->route('admin.time_entries.index');
    }


    /**
     * Show the form for editing TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('time_entry_edit')) {
            return abort(401);
        }
        $work_types = \App\TimeWorkType::get()->pluck('name', 'id')->prepend('Please select', '');$projects = \App\TimeProject::get()->pluck('name', 'id')->prepend('Please select', '');

        $time_entry = TimeEntry::findOrFail($id);

        return view('admin.time_entries.edit', compact('time_entry', 'work_types', 'projects'));
    }

    /**
     * Update TimeEntry in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeEntriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeEntriesRequest $request, $id)
    {
        if (! Gate::allows('time_entry_edit')) {
            return abort(401);
        }
        $time_entry = TimeEntry::findOrFail($id);
        $time_entry->update($request->all());



        return redirect()->route('admin.time_entries.index');
    }


    /**
     * Display TimeEntry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('time_entry_view')) {
            return abort(401);
        }
        $time_entry = TimeEntry::findOrFail($id);

        return view('admin.time_entries.show', compact('time_entry'));
    }


    /**
     * Remove TimeEntry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('time_entry_delete')) {
            return abort(401);
        }
        $time_entry = TimeEntry::findOrFail($id);
         if(!env('DEMO_MODE')) {
        $time_entry->delete();
    }

        return redirect()->route('admin.time_entries.index');
    }

    /**
     * Delete all selected TimeEntry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('time_entry_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TimeEntry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                 if(!env('DEMO_MODE')) {
                $entry->delete();
              }
            }
        }
    }

}
