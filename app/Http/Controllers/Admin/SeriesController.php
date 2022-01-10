<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Session;
use Datatables;
use DB;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	  if (! Gate::allows('series_access')) {
            return abort(401);
        }
     return view('admin.series.index');
    }
	 
	 public function datatable_content()
    { 
	 if (! Gate::allows('series_access')) {
            return abort(401);
        }
	 $users =DB::table('series')->whereis_delete(0)->select('*');
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.series', compact('users'))->render();}) ->make(true);
		  /*  ->addColumn('id',function ($user)  {
            return ''; 
        })  */
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 if (! Gate::allows('series_create')) {
            return abort(401);
        }
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	// $series = Series::create($request->all());
	 if (! Gate::allows('series_create')) {
            return abort(401);
        }
		
		$this->validate($request, [
    'name' => 'required|max:30|unique:series',
   
]);
		
	$series =New Series;
	
	$series->name =$request->name;
	$series->created_by =Auth::user()->id;
	$series->is_active =1;
	$series->is_delete =0;
	$series->save();
	
	if($series)
	{
		Session::flash('success','Series Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		 if (! Gate::allows('series_view')) {
            return abort(401);
        }
      $series=Series::whereid($id)->first();
		
         return view('admin.series.show',compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		 if (! Gate::allows('series_edit')) {
            return abort(401);
        }
		
		$series=Series::whereid($id)->first();
		
         return view('admin.series.edit',compact('series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		 if (! Gate::allows('series_edit')) {
            return abort(401);
        }
			$this->validate($request, [
    'name' => 'required',
   
]);
       $series =Series::findorFail($id);
	
	$series->name =$request->name;
	$series->updated_by =Auth::user()->id;
	$series->save();
	
	if($series)
	{
		Session::flash('success','Series Updated Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
		 return redirect()->route('admin.series.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
	
	public function series_delete(Request $request)
	{
	 $id=$request->delete_id;
		
		$delete=Series::whereid($id)->update([
		'is_delete' =>1,
		'is_active' =>0,
		'deleted_by' =>Auth::user()->id,
		]);
		if($delete)
		
	{
		Session::flash('success','Series has been Deleted Successfully');
		
	}
	else
	{
		Session::flash('error','Something Went Wrong');
		
	}	
			return back();
	}
	
public function series_active(Request $request)
	{
	 $id=$request->active_id;
		$exist=Series::whereid($id)->first();
		if(	$exist->is_active==1)
		{
		$active=Series::whereid($id)->update([
		'is_active' =>0,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('info','Series Deactived Successfully');
		}
		else
		{
			$active=Series::whereid($id)->update([
		'is_active' =>1,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('success','Series Actived Successfully');
		}
		
			return back();
	}
}
