<?php

namespace App\Http\Controllers\Admin;

use App\Match;
use App\Contest;
use App\User;
use App\ContestCategory;
use App\SocialSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use Datatables;	
//use Response;	
use DB;

class MatchnewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	
    public function index()
    
        {
	  if (! Gate::allows('matches_access')) {
            return abort(401);
        }
     return view('admin.matches.index');
    
    }
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users =DB::table('matches')
            ->join('series', 'series.id', '=', 'matches.series_id')
			->where('matches.is_delete',0)
            ->select('matches.*', 'series.name as series')
            ->get();
	
	    return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.matches', compact('users'))->render();}) ->make(true);
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
        if (! Gate::allows('matches_create')) {
            return abort(401);
        }
		$data['matches'] = DB::table('series')->where('is_active',1)->get();
		$data['contests'] = DB::table('fantasy_contests')->where('is_active',1)->get();
		
		$data['upcoming']=DB::table('fantasy_upcoming_match')->first();
        //return view('admin.matches.create',compact('matches'),compact('contests'),compact('upcoming'));
        return view('admin.matches.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if (! Gate::allows('matches_create')) {
            return abort(401);
        }
		
		$this->validate($request, [
   // 'name' => 'required',
  //  'team_1' => 'required',
   // 'team_2' => 'required',
   // 'date' => 'required',
   // 'time' => 'required',
  //  'contest' => 'required',
   
]);
		$contest = json_encode($request->contest,JSON_FORCE_OBJECT);
		
	$matches =New Match;
	
	$matches->name =$request->name;
	$matches->series_id =$request->series;
	$matches->unique_id =$request->unique_id;
	$matches->contest_id =$contest;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->date =$request->date;
	//$matches->time =$request->time;
	$matches->created_by =Auth::user()->id;
	$matches->is_active =1;
	$matches->is_delete =0;
	$matches->match_type =$request->match_type;
	$matches->abandon =0;
	
	$matches->save();
	
	if($matches)
	{
		Session::flash('success','Match Created Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
	 
     return redirect()->route('admin.matches.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('series_view')) {
            return abort(401);
        }
    /*   $matches=DB::table('matches')
            ->join('series', 'series.id', '=', 'matches.series_id')
           // ->join('fantasy_contests', 'matches.contest_id', '=', 'fantasy_contests.id')
			->where('matches.id',$id)
            ->select('matches.*', 'series.name as series_name')
			->first(); */
			
			$data['match']=Match::whereid($id)->whereis_active(1)->first();
		 		
			
			if($data['match']->contest_type=="customize")
				{
			$data['contest']=Contest::wheretype('customize')->wherematch_id($data['match']->unique_id)->whereis_active(1)->get();
				}
				else 
				{
				 	$data['contest']=Contest::wheretype('regular')->wherecategory_id($data['match']->category_id)->whereis_active(1)->get();	
				}

		
         return view('admin.matches.contest_list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('matches_edit')) {
            return abort(401);
        }
		$data['matches1'] = DB::table('series')->where('is_active',1)->get();
		$data['matches']=DB::table('matches')
            ->leftjoin('series', 'series.id', '=', 'matches.series_id')
			->where('matches.id',$id)
            ->select('matches.*', 'series.name as series_name')
			->first();
		$data['contests'] = DB::table('fantasy_contests')->where('is_active',1)->get();
		// return view('admin.matches.edit',compact('matches'),compact('matches1'),compact('contests'));
		 return view('admin.matches.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('matches_edit')) {	
            return abort(401);
        }
			$this->validate($request, [
    'name' => 'required',
    'team_1' => 'required',
    'team_2' => 'required',
    'date' => 'required',
    'time' => 'required',
   
]);
       $matches =Match::findorFail($id);
	
	$matches->name =$request->name;
	$matches->series_id =$request->series;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->date =$request->date;
//	$matches->time =$request->time;
	$matches->updated_by =Auth::user()->id;
	$matches->is_active =1;
	$matches->is_delete =0;
	$matches->abandon =0;
	$matches->match_type=$request->match_type;
	
	$matches->save();
	
	if($matches)
	{
		Session::flash('success','Match Updated Successfully');
	}
	else{
		Session::flash('error','Something Went Wrong');
	    }
		 return redirect()->route('admin.matches.index');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
	public function matches_delete(Request $request)
	{
	 $id=$request->delete_id;
	
		
		$delete=Match::whereid($id)->update([
		'is_delete' =>1,
		'is_active' =>0,
		'deleted_by' =>Auth::user()->id,
		]);
		if($delete)
		
	{
		Session::flash('success','Match Deleted Successfully');
		
	}
	else
	{
		Session::flash('error','Something Went Wrong');
		
	}	
			return back();
	}
	
    public function matches_active(Request $request)
	{
	 $id=$request->active_id;
		$exist=Match::whereid($id)->first();
		if(	$exist->is_active==1)
		{
		$active=Match::whereid($id)->update([
		'is_active' =>0,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('info','Match Deactived Successfully');
		}
		else
		{
			$active=Match::whereid($id)->update([
		'is_active' =>1,
		'updated_by' =>Auth::user()->id,
		]);
		Session::flash('success','Match Actived Successfully');
		}
		
			return back();
	}
	
	
	public function upcomingmatch()
	{
		$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/matches/?apikey=0WbLWwikPeQZT5PL6yyLCV7rjd72');	// change with your API key
	//$cricketMatches = json_decode($cricketMatchesTxt);
	
	$query=DB::table('fantasy_upcoming_match')->insert([
	'upcoming_match'=> $cricketMatchesTxt]
	);
	
}
public function match_list()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 return view('admin.matches.match_list');
		
    }
public function match_contest_publish(Request $request)
{
 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
		$data['unique_id']=$request->unique_id;
		$data['date']=$request->date;
		$data['team_1']=$request->team_1;
		$data['team_2']=$request->team_2;
		$data['type']=$request->match_type;
		$data['series'] = DB::table('series')->where('is_active',1)->get();
		
		$data['category'] = DB::table('fantasy_contest_category')->where('is_active',1)->get();
		
	$data['particular']=Contest::wherematch_id($request->unique_id)->get();
		 
		
	 return view('admin.matches.match_contest_publish',$data);
		
    }	

	public function insert_regular_contest(Request $request)
	{
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }	
	
	$pay_apikey=SocialSetting::findorfail(1);

$apikey=$pay_apikey->cric_api_key;


	$exist=Match::whereunique_id($request->unique_id)->count();
	$first=Match::whereunique_id($request->unique_id)->first();
	//echo $request->match_type;
	//exit;
	
	if($exist==0)
	{
	 $matches =New Match;
	$matches->contest_type =$request->contest_type;
	$matches->series_id =$request->series;
	$matches->unique_id =$request->unique_id;
	$matches->date =$request->date;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->category_id =$request->contest_category;
	$matches->created_by =Auth::user()->id;
	$matches->is_active =0;
	$matches->is_delete =0;
	$matches->abandon =0;
	
	 $matches->match_type=$request->match_type;
	
	
	$matches->save();
	
		Session::flash('success','Match Updated Successfully');
		
		$exist_match_player=DB::table('fantasy_team_players')->wherematch_id($request->unique_id)->get();
						if($exist_match_player)
						{
						DB::table('fantasy_team_players')->wherematch_id($request->unique_id)->delete();
						}
		
		
		$matchesd=DB::table('matches')->where('unique_id',$request->unique_id)->get();
		if($request->match_type=='ODI')
			{
								foreach($matchesd as $data1)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);
									
						$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);			
									//dd($cricketMatchesTxt);
									
									$cricketMatches = json_decode($cricketMatchesTxt);
										
									 
									foreach($cricketMatches->data as $dd) {
										
										//dd($dd);
									
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);				
										
										
										$db = json_decode($playingrole,true);
										
										//dd($db['data']['playing_role']);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
			$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										
											// $match=$db->data->data->batting->ODIs['Mat'];
									
										
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
									
								
										// credit point calculate	
											elseif(array_key_exists('ODIs',$db['data']['data']['batting'])){
										
										$match=$db['data']['data']['batting']['ODIs']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($match > 0 && $match <= 25)
										{
											 $credit=7;
											
										}
										else if($match >= 26 && $match <= 50)
										{
											 $credit=7.5;
										}
										else if($match >= 51 && $match <= 75)
										{
											$credit=8;
										}	
										else if($match >= 76 && $match <= 100)
										{
											$credit=8.5;
										}	
										else if($match >= 101 && $match <= 125)
										{
											$credit=9;
										}
										else if($match >= 126 && $match <= 150)
										{
											$credit=9.5;
										}
										else if($match >= 151 && $match <= 200)
										{
											$credit=10;
										}
										
										else if($match >= 201 && $match <= 300)
										{
											$credit=10.5;
										}	
										else if($match > 300)
										{
											$credit=11.5;
										}
										else
										{
											$credit=7;
										}
										
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	
	else if($request->match_type=='Test')
	{
		//echo $request->match_type;
		//exit;
			foreach($matchesd as $data2)
								{
						
	$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										//$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('tests',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['tests']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=9;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9.5;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=10;
										}
										else if($test_match > 151 && $test_match <= 200)
										{
											$credit=10.5;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										}
								
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
										//}
									
									
									
									
									}
									}
								}
								else if($request->match_type=='First-class')
	{
		//echo $request->match_type;
		//exit;
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('firstClass',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['firstClass']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=9;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9.5;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=10;
										}
										else if($test_match > 151 && $test_match <= 200)
										{
											$credit=10.5;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['playingRole'],
										//"player_role" =>$db['playingRole'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										}
								
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
										//}
									
									
									
									
									}
									}
								}
		
		
		
		
		
		
	
   //T20
   
   else	if($request->match_type=='Twenty20' || $request->match_type=="T20I")
			{
								foreach($matchesd as $data3)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('T20Is',$db['data']['data']['batting'])){
										
										$t20_match=$db['data']['data']['batting']['T20Is']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($t20_match > 0 && $t20_match <= 25)
										{
											 $credit=7;
											
										}
										else if($t20_match >= 26 && $t20_match <= 50)
										{
											 $credit=7.5;
										}
										else if($t20_match >= 51 && $t20_match <= 75)
										{
											$credit=8;
										}	
										else if($t20_match >= 76 && $t20_match <= 100)
										{
											$credit=8.5;
										}	
										else if($t20_match >= 101 && $t20_match <= 125)
										{
											$credit=9;
										}
										
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										//"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//count!=0
	
	
	
	else
	{
		$matches =Match::findorFail($first->id);
	$matches->contest_type =$request->contest_type;
	$matches->series_id =$request->series;
	$matches->unique_id =$request->unique_id;
	$matches->date =$request->date;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->category_id =$request->contest_category;
	$matches->created_by =Auth::user()->id;
	$matches->is_active =0;
	$matches->is_delete =0;
	$matches->abandon =0;
	$matches->match_type =$request->match_type;
	$matches->save();
	
	$exist_match_player=DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->get();
						if($exist_match_player)
						{
						DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->delete();
						}
	
	$matchesd=DB::table('matches')->where('unique_id',$matches->unique_id)->get();
								if($request->match_type=='ODI')
			{
								foreach($matchesd as $data1)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('ODIs',$db['data']['data']['batting'])){
										
										$match=$db['data']['data']['batting']['ODIs']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($match >= 0 && $match <= 25)
										{
											 $credit=7;
											
										}
										else if($match >= 26 && $match <= 50)
										{
											 $credit=7.5;
										}
										else if($match >= 51 && $match <= 75)
										{
											$credit=8;
										}	
										else if($match >= 76 && $match <= 100)
										{
											$credit=8.5;
										}	
										else if($match >= 101 && $match <= 125)
										{
											$credit=9;
										}
										else if($match >= 126 && $match <= 150)
										{
											$credit=9.5;
										}
										else if($match >= 151 && $match <= 200)
										{
											$credit=10;
										}
										
										else if($match >= 201 && $match <= 300)
										{
											$credit=10.5;
										}	
										else if($match > 300)
										{
											$credit=11.5;
										}
										else
										{
											$credit=7;
										}
										
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	
	else if($request->match_type=='Test')
	{
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										//$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
										$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('tests',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['tests']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=8.5;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=9.5;
										}
										else if($test_match >= 151 && $test_match <= 200)
										{
											$credit=10;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										//"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
									
									
									
									
									//}
									}
								}
		
		
		
		
		
		
	}
	else if($request->match_type=='First-class')
	{
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);	
										$db = json_decode($playingrole,true);
										
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('firstClass',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['firstClass']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=8.5;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=9.5;
										}
										else if($test_match >= 151 && $test_match <= 200)
										{
											$credit=10;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
									
									
									
									
									//}
									}
								}
		
		
		
		
		
		
	}
   else	if($request->match_type=='Twenty20'|| $request->match_type=='T20I')
			{
								foreach($matchesd as $data3)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);	
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
										$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('T20Is',$db['data']['data']['batting'])){
										
										$t20_match=$db['data']['data']['batting']['T20Is']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($t20_match > 0 && $t20_match <= 25)
										{
											 $credit=7;
											
										}
										else if($t20_match >= 26 && $t20_match <= 50)
										{
											 $credit=7.5;
										}
										else if($t20_match >= 51 && $t20_match <= 75)
										{
											$credit=8;
										}	
										else if($t20_match >= 76 && $t20_match <= 100)
										{
											$credit=8.5;
										}	
										else if($t20_match >= 101 && $t20_match <= 125)
										{
											$credit=9;
										}
										
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	
	
	
	
	
	//Session::flash('success','Match Updated Successfully');
	}
	
	
		Session::flash('success','Match published Successfully');	
	
	return redirect('admin/playe_edit/'.$request->unique_id);
}
public function insert_custom_contest(Request $request)
	{
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	$prize_list=json_encode($request->rank_amount, JSON_FORCE_OBJECT);	
$rank_list=json_encode($request->rank, JSON_FORCE_OBJECT);	
	$contest =New Contest;
	$contest->name =$request->contest_name;
	$contest->type ="customize";
	$contest->match_id =$request->unique_id;
	$contest->match_date =$request->date;
	//$contest->match_name =$request->match_name;
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
	$contest->created_by =Auth::user()->id;
	$contest->is_active =0;
	$contest->is_delete =0;
	$contest->save();
	
		$data['particular']=Contest::wherematch_id($request->unique_id)->get();
		
		
	
	return view('admin.matches.custom-list-ajax',$data);
	// return response ()->json ( $contest );
}
public function contest_delete_customize(Request $request)
{
	
Contest::whereid($request->delete_id)->delete();
 
	 return response(['data' => 'Product deleted', 'data' => 'success']);
 
}

public function save_customize_contest(Request $request)
{
	
	
	$pay_apikey=SocialSetting::findorfail(1);

$apikey=$pay_apikey->cric_api_key;
	
	//echo "$request->match_type";
	//exit;
	 $exist=Match::whereunique_id($request->unique_id)->count();
	 	$first=Match::whereunique_id($request->unique_id)->first();
	
	if($exist==0)
	{
	$matches =New Match;
	$matches->contest_type ="customize";
	$matches->series_id =$request->series;
	$matches->unique_id =$request->unique_id;
	$matches->date =$request->date;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->created_by =Auth::user()->id;
	$matches->is_active =1;
	$matches->is_delete =0;
	$matches->abandon =0;
	$matches->match_type =$request->match_type;
	$matches->save();
	
	$exist_match_player=DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->get();
						if($exist_match_player)
						{
						DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->delete();
						}
		
		
		$matchesd=DB::table('matches')->where('unique_id',$matches->unique_id)->get();
		if($request->match_type=='ODI')
			{
								foreach($matchesd as $data1)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);
									
						$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);			
									//dd($cricketMatchesTxt);
									
									$cricketMatches = json_decode($cricketMatchesTxt);
										
									 
									foreach($cricketMatches->data as $dd) {
										
										//dd($dd);
									
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);				
										
										
										$db = json_decode($playingrole,true);
										
										//dd($db['data']['playing_role']);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
			$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										
											// $match=$db->data->data->batting->ODIs['Mat'];
									
										
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
									
								
										// credit point calculate	
											elseif(array_key_exists('ODIs',$db['data']['data']['batting'])){
										
										$match=$db['data']['data']['batting']['ODIs']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($match > 0 && $match <= 25)
										{
											 $credit=7;
											
										}
										else if($match >= 26 && $match <= 50)
										{
											 $credit=7.5;
										}
										else if($match >= 51 && $match <= 75)
										{
											$credit=8;
										}	
										else if($match >= 76 && $match <= 100)
										{
											$credit=8.5;
										}	
										else if($match >= 101 && $match <= 125)
										{
											$credit=9;
										}
										else if($match >= 126 && $match <= 150)
										{
											$credit=9.5;
										}
										else if($match >= 151 && $match <= 200)
										{
											$credit=10;
										}
										
										else if($match >= 201 && $match <= 300)
										{
											$credit=10.5;
										}	
										else if($match > 300)
										{
											$credit=11.5;
										}
										else
										{
											$credit=7;
										}
										
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	
	else if($request->match_type=='Test')
	{
		//echo $request->match_type;
		//exit;
			foreach($matchesd as $data2)
								{
						
	$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										//$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('tests',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['tests']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=9;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9.5;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=10;
										}
										else if($test_match > 151 && $test_match <= 200)
										{
											$credit=10.5;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										}
								
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
										//}
									
									
									
									
									}
									}
								}
								else if($request->match_type=='First-class')
	{
		//echo $request->match_type;
		//exit;
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('firstClass',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['firstClass']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=9;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9.5;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=10;
										}
										else if($test_match > 151 && $test_match <= 200)
										{
											$credit=10.5;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['playingRole'],
										//"player_role" =>$db['playingRole'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										}
								
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
										//}
									
									
									
									
									}
									}
								}
		
		
		
		
		
		
	
   //T20
   
   else	if($request->match_type=='Twenty20' || $request->match_type=="T20I")
			{
								foreach($matchesd as $data3)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('T20Is',$db['data']['data']['batting'])){
										
										$t20_match=$db['data']['data']['batting']['T20Is']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($t20_match > 0 && $t20_match <= 25)
										{
											 $credit=7;
											
										}
										else if($t20_match >= 26 && $t20_match <= 50)
										{
											 $credit=7.5;
										}
										else if($t20_match >= 51 && $t20_match <= 75)
										{
											$credit=8;
										}	
										else if($t20_match >= 76 && $t20_match <= 100)
										{
											$credit=8.5;
										}	
										else if($t20_match >= 101 && $t20_match <= 125)
										{
											$credit=9;
										}
										
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										//"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	Session::flash('success','Match published Successfully');
	}
	
	
	
	
	
	else
	{
		$matches =Match::findorFail($first->id);
	$matches->contest_type ="customize";
	$matches->series_id =$request->series;
	$matches->unique_id =$request->unique_id;
	$matches->date =$request->date;
	$matches->team_1 =$request->team_1;
	$matches->team_2 =$request->team_2;
	$matches->category_id =$request->contest_category;
	$matches->created_by =Auth::user()->id;
	$matches->is_active =1;
	$matches->is_delete =0;
	$matches->abandon =0;
	$matches->match_type =$request->match_type;
	$matches->save();
	
	$exist_match_player=DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->get();
						if($exist_match_player)
						{
						DB::table('fantasy_team_players')->wherematch_id($matches->unique_id)->delete();
						}
	
	$matchesd=DB::table('matches')->where('unique_id',$matches->unique_id)->get();
								if($request->match_type=='ODI')
			{
								foreach($matchesd as $data1)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data1->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('ODIs',$db['data']['data']['batting'])){
										
										$match=$db['data']['data']['batting']['ODIs']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($match >= 0 && $match <= 25)
										{
											 $credit=7;
											
										}
										else if($match >= 26 && $match <= 50)
										{
											 $credit=7.5;
										}
										else if($match >= 51 && $match <= 75)
										{
											$credit=8;
										}	
										else if($match >= 76 && $match <= 100)
										{
											$credit=8.5;
										}	
										else if($match >= 101 && $match <= 125)
										{
											$credit=9;
										}
										else if($match >= 126 && $match <= 150)
										{
											$credit=9.5;
										}
										else if($match >= 151 && $match <= 200)
										{
											$credit=10;
										}
										
										else if($match >= 201 && $match <= 300)
										{
											$credit=10.5;
										}	
										else if($match > 300)
										{
											$credit=11.5;
										}
										else
										{
											$credit=7;
										}
										
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
									//	"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	
	else if($request->match_type=='Test')
	{
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										//$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
										$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('tests',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['tests']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=8.5;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=9.5;
										}
										else if($test_match >= 151 && $test_match <= 200)
										{
											$credit=10;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										//"player_role" =>$db['playingRole'],
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
									
									
									
									
									//}
									}
								}
		
		
		
		
		
		
	}
	else if($request->match_type=='First-class')
	{
			foreach($matchesd as $data2)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data2->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);	
										$db = json_decode($playingrole,true);
										
											
											$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('firstClass',$db['data']['data']['batting'])){
										
										$test_match=$db['data']['data']['batting']['firstClass']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($test_match > 0 && $test_match <= 25)
										{
											 $credit=7;
											
										}
										else if($test_match >= 26 && $test_match <= 50)
										{
											 $credit=7.5;
										}
										else if($test_match >= 51 && $test_match <= 75)
										{
											$credit=8;
										}	
										else if($test_match >= 76 && $test_match <= 100)
										{
											$credit=8.5;
										}	
										else if($test_match >= 101 && $test_match <= 125)
										{
											$credit=9;
										}
										else if($test_match >= 126 && $test_match <= 150)
										{
											$credit=9.5;
										}
										else if($test_match >= 151 && $test_match <= 200)
										{
											$credit=10;
										}
										
										else if($test_match > 201 && $test_match <= 225)
										{
											$credit=11;
										}	
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type,
										
										]);
											
									
										
										}
										
									
									
									
									
									//}
									}
								}
		
		
		
		
		
		
	}
   else	if($request->match_type=='Twenty20'|| $request->match_type=='T20I')
			{
								foreach($matchesd as $data3)
								{
						
								
	//$cricketMatchesTxt = file_get_contents('http://cricapi.com/api/fantasySquad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);
									$cricketMatchesTxt = file_get_contents('http://apizipper.com/api/fantasy_squad/?apikey='.$apikey.'&&unique_id='.$data3->unique_id);			
									
									
									$cricketMatches = json_decode($cricketMatchesTxt);
									 
									foreach($cricketMatches->data as $dd) {										
									//foreach($item->players as $dd) {
										
										//$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey='.$apikey.'&&pid='.$dd->pid);	
						$playingrole = file_get_contents('http://apizipper.com/api/playerstatistics/?apikey='.$apikey.'&&pid='.$dd->pid);	
										$db = json_decode($playingrole,true);
										//print_r($db->imageURL);
										//echo $item->name;
										//print_r($dd->name); 
										$dv=count($db); 
										//echo "&nbsp;";
										//$ts="playingRole";
										//$inarray=in_array($db['playingRole'],$ts,true);
											
										$player_al_exist_table=DB::table('fantasy_team_players')->whereplayer_id($dd->pid)->wherematch_type($request->match_type)->orderBy('id', 'DESC')->first();
										if($player_al_exist_table)	
										{
										 $credit=$player_al_exist_table->credit_point;	
										$db['data']['playing_role']=$player_al_exist_table->player_role;
										 
											
									}
											
										// credit point calculate	
											elseif(array_key_exists('T20Is',$db['data']['data']['batting'])){
										
										$t20_match=$db['data']['data']['batting']['T20Is']['Mat'];
										
										//echo $match;
										
										///$match=$odi->mat;
										if($t20_match > 0 && $t20_match <= 25)
										{
											 $credit=7;
											
										}
										else if($t20_match >= 26 && $t20_match <= 50)
										{
											 $credit=7.5;
										}
										else if($t20_match >= 51 && $t20_match <= 75)
										{
											$credit=8;
										}	
										else if($t20_match >= 76 && $t20_match <= 100)
										{
											$credit=8.5;
										}	
										else if($t20_match >= 101 && $t20_match <= 125)
										{
											$credit=9;
										}
										
										else
										{
											$credit=7;
										}
										
										}
										else
										{
											$credit=7;
										}
										
										
									//echo 	$credit; exit;
										
									if(array_key_exists('playing_role',$db['data']) ){
										
						if ( !empty ($db['data']['playing_role'])) {
    
    

									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>$db['data']['playing_role'],
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
									}
									else
								     {
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
								}
								else
								{
										
									$insert=DB::table('fantasy_team_players')->insert([
										"match_id" =>$matches->unique_id,
										"player_id" =>$dd->pid,
										"player_name" =>$dd->name,
										"player_team_name" =>$dd->team_name,
										"player_role" =>"No",
										"credit_point" =>$credit,
										"match_type" =>$request->match_type
										
										]);
											
									
										
										}
									
									
									
									
									//}
									}
								}
		
		
		
		
	}
	//Session::flash('success','Match Updated Successfully');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$update=Contest::wherematch_id($request->unique_id)->update([
	
		"is_active" =>1 ]);
		if($update)
		{
		Session::flash('success','Contest Updated Successfully');
		}
		else
		{
		Session::flash('error','Contest have not been updated');
		}
		//return redirect('admin/matches-list');
		return redirect('admin/playe_edit/'.$request->unique_id);
}
public function view_contest($id,$contest)
{
	$data['contest']=DB::table('fantasy_user_join_contest')
	                
					->where('match_id',$id)->where('contest_id',$contest)
					->get();
	/* $data['users']=DB::table('users')->where('id',$data['contest']->user_id)->get(); */				
			
         return view('admin.matches.view_contests ',$data);
	
}

public function winners_list($id,$contest)
{
	/* $data['contest']=DB::table('fantasy_user_join_contest')->where('match_id',$id)->where('contest_id',$contest)
					->get(); */
					
	  $data['winner']=DB::table('fantasy_user_winning_details')->where('match_id',$id)->where('contest_id',$contest)->get();           
	
	/* print_r($array);
	exit; */
	
	/* $data['rank']=DB::table('fantasy_contests')
	         ->join('fantasy_user_join_contest', 'fantasy_contests.id', '=', 'fantasy_user_join_contest.contest_id')
	         ->select('fantasy_contests.prize_list', 'fantasy_user_join_contest.rank')
			 ->where('fantasy_contests.no_winner','!=', NULL)
		      //->where('id','=', $id)
			  ->first();
	 */
			
         return view('admin.matches.winners_list ',$data);
	
}
	public function abandon($id)
	{
	$data=Match::whereunique_id($id)->update(['abandon'=>1]); 
	
	$user_join= DB::table('fantasy_user_join_contest')->wherematch_id($id)->get();


	foreach($user_join as $join_user)
	{
	
	
	$contest= DB::table('fantasy_contests')->whereid($join_user->contest_id)->first();
	$con_sub=DB::table('fantasy_user_create_team')->whereid($join_user->team_id)->first();
	if(!empty($con_sub->substitute) && $contest->is_practise_contest==0)
	{
	
	$user= User::findorfail($join_user->user_id);
	$creditpt=$user->credit_point;
	
	
	$user->credit_point=$creditpt+$contest->enterence_amount+10;
	$user->save();
	
	
	}
	
	
	else if($contest->is_practise_contest==0)
	{
	$user= User::findorfail($join_user->user_id);
	$creditpt=$user->credit_point;
	
	
	$user->credit_point=$creditpt+$contest->enterence_amount;
	$user->save();
	
	
	}
	}
	Session::flash('success','Match has been abandoned');
	return redirect('admin/matches');
	
	
	
	
	}

}