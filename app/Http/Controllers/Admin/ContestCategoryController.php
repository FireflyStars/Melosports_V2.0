<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ContestCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Session;
use Datatables;
use DB;

class ContestCategoryController extends Controller
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
     return view('admin.contest_category.index');
    }
	 
	 public function datatable_content()
    { 
	 if (! Gate::allows('series_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_contest_category')->whereis_delete(0)->select('*');
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.contestcategory', compact('users'))->render();}) ->make(true);
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
        return view('admin.contest_category.create');
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
    'contest_category' => 'required|max:30|unique:fantasy_contest_category',	
   
]);
		
	$category =New ContestCategory;
	
	$category->contest_category =$request->contest_category;
	$category->created_by =Auth::user()->id;
	$category->is_active =1;
	$category->is_delete =0;
	$category->save();
	
	if($category)
	{
		Session::flash('success','Category Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.contestcategory.index');
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
		/* $data['category']=DB::table('fantasy_contests')
	        ->join('fantasy_contest_category', 'fantasy_contests.category_id', '=', 'fantasy_contest_category.id')
			->where('fantasy_contest_category.id', '=', $id)
			->first(); */
			
			$category=DB::table('fantasy_contest_category')
	            ->join('fantasy_contests', 'fantasy_contest_category.id', '=', 'fantasy_contests.category_id')
				->where('fantasy_contest_category.id', '=', $id)
				->select('fantasy_contests.name', 'fantasy_contests.winning_pirze', 'fantasy_contests.enterence_amount', 'fantasy_contests.contest_team_length', 'fantasy_contests.no_winner')
				->get();
			
      //$category=ContestCategory::whereid($id)->first();
		
         return view('admin.contest_category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
		 if (! Gate::allows('series_edit')) {
            return abort(401);
        }
		
		$category=ContestCategory::whereid($id)->first();
		
         return view('admin.contest_category.edit',compact('category'));
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
    'contest_category' => 'required',
   
]);
       $category =ContestCategory::findorFail($id);
	
	$category->contest_category =$request->contest_category;
	$category->updated_by =Auth::user()->id;
	$category->save();
	
	if($category)
	{
		Session::flash('success','Contest Category Updated Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
		 return redirect()->route('admin.contestcategory.index');
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
	
	public function contestcategory_delete(Request $request)
	{
	 $id=$request->delete_id;
		
		$delete=ContestCategory::whereid($id)->update([
		'is_delete' =>1,
		'is_active' =>0,
		'deleted_by' =>Auth::user()->id,
		]);
		if($delete)
		
	{
		Session::flash('success','ContestCategory Deleted Successfully');
		
	}
	else
	{
		Session::flash('error','Something Went Wrong');
		
	}	
			return back();
	}
	
public function contestcategory_active(Request $request)
	{
	 $id=$request->active_id;
		$exist=ContestCategory::whereid($id)->first();
		if(	$exist->is_active==1)
		{
		$active=ContestCategory::whereid($id)->update([
		'is_active' =>0,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('info','ContestCategory Deactived Successfully');
		}
		else
		{
			$active=ContestCategory::whereid($id)->update([
		'is_active' =>1,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('success','ContestCategory Actived Successfully');
		}
		
			return back();
	}
}
