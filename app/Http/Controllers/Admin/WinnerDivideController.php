<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Contest;
use App\WinnerLength;
use App\Series;
use Session;
use Datatables;
use DB;


class WinnerDivideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		
		return view('admin.win-divide.index');
		
		
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
public function datatable_content()
    { 
	
	 $users =DB::table('fantasy_contests')->where('is_delete',0)->where('is_active',1)->where('cd_status',1)->where('type','regular')->get();
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.win_div', compact('users'))->render();}) ->make(true);
		  /*  ->addColumn('id',function ($user)  {
            return ''; 
        })  */
		
    }





   public function create()
    {
        //
		
		
		$data['category'] = DB::table('fantasy_contest_category')->where('is_active',1)->get();
        $data['winner']=WinnerLength::wherestatus(0)->orderby('team_length','asc')->get();
		return view('admin.win-divide.create',$data);
		
		
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$this->validate($request, [
    'name' => 'required|unique:fantasy_contests',
    'winner_length' => 'required',
   // 'is_recommended' => 'required',
    'contest_team_length' => 'required',
    'is_multi_entry' => 'required',
    //'winning_prze' => 'required',
    'enterence_amount' => 'required',
   // 'is_confirm_contest' => 'required',
    //'is_practise_contest' => 'required',
   
]);
		
		if($request->mega_contest==1)
 {
	 $update_megacontest=Contest::wherecategory_id($request->category_id)->update([
	 'mega_contest'=>0]);
 }
 
 $data=$request->all();
 //dd($data);
 
 $winner=WinnerLength::findorfail($request->winner_length);
 $prize=json_decode($winner->rank_amount);
 $rank=json_decode($winner->position);
 $prize_list=json_encode($prize,JSON_FORCE_OBJECT);
 $rank_list=json_encode($rank,JSON_FORCE_OBJECT);
 
	$contest =New Contest;
	$contest->category_id =$request->category_id;
	$contest->name =$request->name;
	$contest->type ="regular";
	$contest->winning_pirze =$request->winning_pirze;
	$contest->rank_list =$rank_list;
	$contest->enterence_amount =$request->enterence_amount;
	$contest->contest_team_length =$request->contest_team_length;
	$contest->prize_list =$prize_list;
	$contest->no_winner =$winner->team_length;
	//$contest->is_recommended =$request->is_recommended;
	$contest->is_multi_entry =$request->is_multi_entry;
	$contest->is_confirm_contest =1;
	$contest->cd_status=1;
	$contest->winner_length_id=$request->winner_length;
	$contest->is_practise_contest=0;
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
	 
     return redirect()->route('admin.winner_divide.index');
		
		
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$contest=DB::table('fantasy_contests')
            ->join('fantasy_contest_category', 'fantasy_contests.category_id', '=', 'fantasy_contest_category.id')
			->where('fantasy_contests.id',$id)
			->where('fantasy_contests.is_delete',0)
            ->select('fantasy_contests.*', 'fantasy_contest_category.contest_category')
            ->first();
		
		return view('admin.win-divide.show',compact('contest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		
		
		$contest1=DB::table('fantasy_contest_category')->where('is_active',1)->get();
		$contest=DB::table('fantasy_contests')
            ->join('fantasy_contest_category', 'fantasy_contests.category_id', '=', 'fantasy_contest_category.id')
			->where('fantasy_contests.id',$id)
			->where('fantasy_contests.is_delete',0)
            ->select('fantasy_contests.*', 'fantasy_contest_category.contest_category')
            ->first();
			
			
			
			
			$winner=WinnerLength::wherestatus(0)->orderby('team_length','asc')->get();
			
			/* print_r($contest);
		    exit; */
		//$contest=Contest::whereid($id)->first();
		
         return view('admin.win-divide.edit',compact('contest','winner'),compact('contest1'));
		
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		
		$this->validate($request, [
    'name' => 'required',
    'winner_length' => 'required',
   // 'is_recommended' => 'required',
    'contest_team_length' => 'required',
    'is_multi_entry' => 'required',
    //'winning_prze' => 'required',
    'enterence_amount' => 'required',
   // 'is_confirm_contest' => 'required',
    //'is_practise_contest' => 'required',
   
]);
		
		if($request->mega_contest==1)
 {
	 $update_megacontest=Contest::wherecategory_id($request->category_id)->update([
	 'mega_contest'=>0]);
 }
 
 $data=$request->all();
 //dd($data);
 
 $winner=WinnerLength::findorfail($request->winner_length);
 $prize=json_decode($winner->rank_amount);
 $rank=json_decode($winner->position);
 $prize_list=json_encode($prize,JSON_FORCE_OBJECT);
 $rank_list=json_encode($rank,JSON_FORCE_OBJECT);
 
	$contest =Contest::findorFail($id);
	$contest->category_id =$request->category_id;
	$contest->name =$request->name;
	$contest->type ="regular";
	$contest->winning_pirze =$request->winning_pirze;
	$contest->rank_list =$rank_list;
	$contest->enterence_amount =$request->enterence_amount;
	$contest->contest_team_length =$request->contest_team_length;
	$contest->prize_list =$prize_list;
	$contest->no_winner =$winner->team_length;
	//$contest->is_recommended =$request->is_recommended;
	$contest->is_multi_entry =$request->is_multi_entry;
	$contest->is_confirm_contest =1;
	$contest->cd_status=1;
	$contest->winner_length_id=$request->winner_length;
	$contest->is_practise_contest=0;
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
	 
     return redirect()->route('admin.winner_divide.index');
		
		
		
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
	
	
	
	
	
	public function rank_ajax(Request $request)
{

if(empty($request->rank_id))
{
return '<p style="color:red">Select the no of winners</p>';


}


$win=WinnerLength::findorfail($request->rank_id);


$data['rank']=json_decode($win->position);
$data['amount']=json_decode($win->rank_amount);
//return '<p style="color:red">Select the no of winners</p>';
return view('admin.win-divide.ajax_rank',$data);



}
	
	
}
