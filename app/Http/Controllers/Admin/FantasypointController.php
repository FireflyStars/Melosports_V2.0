<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\FantasyPointSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use Datatables;	
use DB;

class FantasypointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.fantasy_point.index');
    
    
    }
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_pointsystem')
                           ->get();
						  
						  
	return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.fantasy', compact('users'))->render();}) ->make(true);
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fantasy_point.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
    'each_run' => 'required',
    'each_four' => 'required',
   'each_six' => 'required',
    'century' => 'required',
    'half_century' => 'required',
    'per_wicket' => 'required',
    'caught_bowled' => 'required',
    'dismissal_for_duck' => 'required',
    'maiden_over' => 'required',
    'wickets_4' => 'required',
    'wickets_5' => 'required',
    'stumping' => 'required',
    'run_out' => 'required',
    'economy_rate_below_4' => 'required',
    'economy_rate_4_5' => 'required',
	'economy_rate_5_6' => 'required',
	'economy_rate_6_7' => 'required',
    'economy_rate_7_9' => 'required',
    'economy_rate_above_9' => 'required',
    'strike_rate_60_70' => 'required',
    'strike_rate_50_60' => 'required',
    'strike_rate_below_50' => 'required',
    'match_type' => 'max:10|required|unique:fantasy_pointsystem',
    
   
]);
		//$contest = json_encode($request->contest,JSON_FORCE_OBJECT);
		
	$fantasy_pointsystem =New FantasyPointSystem;
	
	$fantasy_pointsystem->each_run =$request->each_run;
	$fantasy_pointsystem->each_four =$request->each_four;
	$fantasy_pointsystem->each_six =$request->each_six;
	$fantasy_pointsystem->century =$request->century;
	$fantasy_pointsystem->half_century =$request->half_century;
	$fantasy_pointsystem->per_wicket =$request->per_wicket;
	$fantasy_pointsystem->caught_bowled =$request->caught_bowled;
	$fantasy_pointsystem->dismissal_for_duck =$request->dismissal_for_duck;
	$fantasy_pointsystem->maiden_over =$request->maiden_over;
	$fantasy_pointsystem->wickets_4 =$request->wickets_4;
	$fantasy_pointsystem->wickets_5 =$request->wickets_5;
	$fantasy_pointsystem->stumping =$request->stumping;
	$fantasy_pointsystem->run_out =$request->run_out;
	$fantasy_pointsystem->economy_rate_below_4 =$request->economy_rate_below_4;
	$fantasy_pointsystem->economy_rate_4_5 =$request->economy_rate_4_5;
	$fantasy_pointsystem->economy_rate_5_6 =$request->economy_rate_5_6;
	$fantasy_pointsystem->economy_rate_6_7 =$request->economy_rate_6_7;
	$fantasy_pointsystem->economy_rate_7_9 =$request->economy_rate_7_9;
	$fantasy_pointsystem->economy_rate_above_9 =$request->economy_rate_above_9;
	$fantasy_pointsystem->strike_rate_60_70 =$request->strike_rate_60_70;
	$fantasy_pointsystem->strike_rate_50_60 =$request->strike_rate_50_60;
	$fantasy_pointsystem->strike_rate_below_50 =$request->strike_rate_below_50;
	$fantasy_pointsystem->match_type =$request->match_type;
	$fantasy_pointsystem->created_by =Auth::user()->id;
	
	
	$fantasy_pointsystem->save();
	
	if($fantasy_pointsystem)
	{
		Session::flash('success','Match Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.fantasypoint.index');
    } 
    

    /**
     * Display the specified resource.
     *
     * @param  \App\fantasy_pointsystem  $fantasy_pointsystem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matches=DB::table('fantasy_pointsystem')
		    ->whereid($id)
			->first();
		$name=DB::table('users')->where('id',$matches->created_by)
		    //->whereid($id)
			->first();

		
         return view('admin.fantasy_point.show',compact('matches'),compact('name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fantasy_pointsystem  $fantasy_pointsystem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $series=FantasyPointSystem::whereid($id)->first();
		
         return view('admin.fantasy_point.edit',compact('series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fantasy_pointsystem  $fantasy_pointsystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
    'each_run' => 'required',
    'each_four' => 'required',
   'each_six' => 'required',
    'century' => 'required',
    'half_century' => 'required',
    'per_wicket' => 'required',
    'caught_bowled' => 'required',
    'dismissal_for_duck' => 'required',
    'maiden_over' => 'required',
    'wickets_4' => 'required',
    'wickets_5' => 'required',
    'stumping' => 'required',
    'run_out' => 'required',
    'economy_rate_below_4' => 'required',
    'economy_rate_4_5' => 'required',
	'economy_rate_5_6' => 'required',
	'economy_rate_6_7' => 'required',
    'economy_rate_7_9' => 'required',
    'economy_rate_above_9' => 'required',
    'strike_rate_60_70' => 'required',
    'strike_rate_50_60' => 'required',
    'strike_rate_below_50' => 'required',
    'match_type' => 'required',
]);
		//$contest = json_encode($request->contest,JSON_FORCE_OBJECT);
		
	$fantasy_pointsystem =FantasyPointSystem::findorFail($id);
	
	$fantasy_pointsystem->each_run =$request->each_run;
	$fantasy_pointsystem->each_four =$request->each_four;
	$fantasy_pointsystem->each_six =$request->each_six;
	$fantasy_pointsystem->century =$request->century;
	$fantasy_pointsystem->half_century =$request->half_century;
	$fantasy_pointsystem->per_wicket =$request->per_wicket;
	$fantasy_pointsystem->caught_bowled =$request->caught_bowled;
	$fantasy_pointsystem->dismissal_for_duck =$request->dismissal_for_duck;
	$fantasy_pointsystem->maiden_over =$request->maiden_over;
	$fantasy_pointsystem->wickets_4 =$request->wickets_4;
	$fantasy_pointsystem->wickets_5 =$request->wickets_5;
	$fantasy_pointsystem->stumping =$request->stumping;
	$fantasy_pointsystem->run_out =$request->run_out;
	$fantasy_pointsystem->economy_rate_below_4 =$request->economy_rate_below_4;
	$fantasy_pointsystem->economy_rate_4_5 =$request->economy_rate_4_5;
	$fantasy_pointsystem->economy_rate_5_6 =$request->economy_rate_5_6;
	$fantasy_pointsystem->economy_rate_6_7 =$request->economy_rate_6_7;
	$fantasy_pointsystem->economy_rate_7_9 =$request->economy_rate_7_9;
	$fantasy_pointsystem->economy_rate_above_9 =$request->economy_rate_above_9;
	$fantasy_pointsystem->strike_rate_60_70 =$request->strike_rate_60_70;
	$fantasy_pointsystem->strike_rate_50_60 =$request->strike_rate_50_60;
	$fantasy_pointsystem->strike_rate_below_50 =$request->strike_rate_below_50;
	$fantasy_pointsystem->match_type =$request->match_type;
	$fantasy_pointsystem->updated_by =Auth::user()->id;
	
	
	$fantasy_pointsystem->save();
	
	if($fantasy_pointsystem)
	{
		Session::flash('success','Match Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.fantasypoint.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fantasy_pointsystem  $fantasy_pointsystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(fantasy_pointsystem $fantasy_pointsystem)
    {
        //
    }
}
