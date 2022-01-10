<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contest;
use App\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Session;
use Datatables;
use DB;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contest_access')) {
            return abort(401);
        }
		
     return view('admin.contest.index');
    }
	
  public function datatable_content()
    { 
	 if (! Gate::allows('contest_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_contests')->where('is_delete',0)->where('is_active',1)->where('cd_status',0)->where('type','regular')->get();
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.contest', compact('users'))->render();}) ->make(true);
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
        if (! Gate::allows('contest_create')) {
            return abort(404);
        }
        $data['category'] = DB::table('fantasy_contest_category')->where('is_active',1)->get();
        return view('admin.contest.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('contest_create')) {
            return abort(401);
        }
		
		$this->validate($request, [
    'name' => 'required|unique:fantasy_contests',
    'contest_team_length' => 'required',
    'is_recommended' => 'required',
    'is_multi_entry' => 'required',
    'is_confirm_contest' => 'required',
    'is_practise_contest' => 'required',
   
]);
	
$prize_list=json_encode($request->rank_amount, JSON_FORCE_OBJECT);	
$rank_list=json_encode($request->rank, JSON_FORCE_OBJECT);	
 
 if($request->mega_contest==1)
 {
	 $update_megacontest=Contest::wherecategory_id($request->category_id)->update([
	 'mega_contest'=>0]);
 }
 
	$contest =New Contest;
	$contest->category_id =$request->category_id;
	$contest->name =$request->name;
	$contest->type ="regular";
	$contest->winning_pirze =$request->winning_pirze;
	$contest->rank_list =$rank_list;
	$contest->enterence_amount =$request->enterence_amount;
	$contest->contest_team_length =$request->contest_team_length;
	$contest->prize_list =$prize_list;
	$contest->no_winner =$request->no_winner;
	$contest->is_recommended =$request->is_recommended;
	$contest->is_multi_entry =$request->is_multi_entry;
	$contest->is_confirm_contest =$request->is_confirm_contest;
	$contest->is_practise_contest =$request->is_practise_contest;
	$contest->mega_contest =$request->mega_contest;
	$contest->created_by =Auth::user()->id;
	$contest->is_active =1;
	$contest->is_delete =0;
	$contest->save();
	
	if($contest)
	{
		Session::flash('success','Contest Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.contest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if (! Gate::allows('contest_view')) {
            return abort(401);
        }
		$contest=DB::table('fantasy_contests')
            ->join('fantasy_contest_category', 'fantasy_contests.category_id', '=', 'fantasy_contest_category.id')
			->where('fantasy_contests.id',$id)
			->where('fantasy_contests.is_delete',0)
            ->select('fantasy_contests.*', 'fantasy_contest_category.contest_category')
            ->first();
		
      /* $contest=Contest::whereid($id)->first();
      $category=ContestCategory::whereid($id)->first(); */
	  
		
         return view('admin.contest.show',compact('contest'));
    }

		
      /* $contest=Contest::whereid($id)->first();
		
         return view('admin.contest.show',compact('contest'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contest_edit')) {
            return abort(401);
        }
		
		$contest1=DB::table('fantasy_contest_category')->where('is_active',1)->get();
		$contest=DB::table('fantasy_contests')
            ->join('fantasy_contest_category', 'fantasy_contests.category_id', '=', 'fantasy_contest_category.id')
			->where('fantasy_contests.id',$id)
			->where('fantasy_contests.is_delete',0)
            ->select('fantasy_contests.*', 'fantasy_contest_category.contest_category')
            ->first();
			
			/* print_r($contest);
		    exit; */
		//$contest=Contest::whereid($id)->first();
		
         return view('admin.contest.edit',compact('contest'),compact('contest1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('contest_edit')) {
            return abort(401);
        }
			$this->validate($request, [
    'name' => 'required',
    'contest_team_length' => 'required',
    'is_recommended' => 'required',
    'is_multi_entry' => 'required',
    'is_confirm_contest' => 'required',
    'is_practise_contest' => 'required',
   
]);
	
$prize_list=json_encode($request->rank_amount, JSON_FORCE_OBJECT);	
$rank_list=json_encode($request->rank, JSON_FORCE_OBJECT);	

if($request->mega_contest==1)
 {
	 $update_megacontest=Contest::wherecategory_id($request->category_id)->update([
	 'mega_contest'=>0]);
 }
    $contest =Contest::findorFail($id);
	$contest->category_id =$request->category_id;
	$contest->name =$request->name;
	$contest->type ="regular";
	$contest->winning_pirze =$request->winning_pirze;
	$contest->rank_list =$rank_list;
	$contest->enterence_amount =$request->enterence_amount;
	$contest->contest_team_length =$request->contest_team_length;
	$contest->prize_list =$prize_list;
	$contest->no_winner =$request->no_winner;
	$contest->is_recommended =$request->is_recommended;
	$contest->is_multi_entry =$request->is_multi_entry;
	$contest->is_confirm_contest =$request->is_confirm_contest;
	$contest->is_practise_contest =$request->is_practise_contest;
	$contest->mega_contest =$request->mega_contest;
	$contest->created_by =Auth::user()->id;
	$contest->is_active =1;
	$contest->is_delete =0;
	$contest->save();
	
	if($contest)
	{
		Session::flash('success','Contest Updated Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
		 return redirect()->route('admin.contest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
    }
	
	public function contest_delete(Request $request)
	{
	 $id=$request->delete_id;
		
		$delete=Contest::whereid($id)->update([
		'is_delete' =>1,
		'is_active' =>0,
		'deleted_by' =>Auth::user()->id,
		]);
		if($delete)
		
	{
		Session::flash('success','Contest has been Deleted Successfully');
		
	}
	else
	{
		Session::flash('error','Something Went Wrong');
		
	}	
			return back();
	}
	
public function contest_active(Request $request)
	{
	 $id=$request->active_id;
		$exist=Contest::whereid($id)->first();
		if(	$exist->is_active==1)
		{
		$active=Contest::whereid($id)->update([
		'is_active' =>0,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('info','Contest Deactivated Successfully');
		}
		else
		{
			$active=Contest::whereid($id)->update([
		'is_active' =>1,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('success','Contest Activated Successfully');
		}
		
			return back();
	}
}
