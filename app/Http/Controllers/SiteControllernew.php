<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Match;
use App\Contest;
use App\CreditPurchase;
use App\PaymentUser;
use App\Fantasyinvite;
use App\WithdrawRequest;
use App\BankVerify;
use PaytmWallet;
use DB;
use Session;
use Response;
use Auth;
use Hash;
use Mail;
use CodeZero\PayUMoney\PayUMoney;
require 'vendor/autoload.php'; 
use App\Http\Controllers\Controller;
use Softon\Indipay\Facades\Indipay;


class SiteControllernew extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
	{
		$data['series'] =DB::table('series')->whereis_delete(0)->whereis_active(1)->get();
		if(!Session::has('series'))
		{
		$data['matches'] =DB::table('matches')->whereis_delete(0)->whereis_active(1)->orderBy('date','asc')->where('abandon','!=',1)->get();
		}
		elseif(Session::get('series')=="all")
		{
			$data['matches'] = Match::whereis_active(1)->orderBy('date','desc')->take(40)->where('abandon','!=',1)->get()->reverse();
			//print_r($data);
		//	exit;
		}
       else 
       {		
	$data['matches'] = Match::where('series_id',Session::get('series'))->whereis_active(1)->where('abandon','!=',1)->get();
       }
	
/* $data['series_date'] = DB::table('series')
->join('matches', 'series.id', '=', 'matches.series_id')
->select('matches.date')
->orderBy('matches.date', 'desc')->first(); */

		//echo Auth::user()->id;
     return view('website.user.page1',$data);
    
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|confirmed',
		//'confirm_password'=>'required|min:6',
		//'date' => 'required',
		'mobile_number' => 'required',
		'g-recaptcha-response' => 'required',
		
        // ...
       /*  'g-recaptcha-response' => 'required|captcha', */
   
		'name' => 'required',
		//'month' => 'required',
		//'year' => 'required',
 ]);
	if (($request->password)==($request->password_confirmation)) {
	
	
		
	
	$login =New User;
	
 //add logic here

	$login->name =$request->name;
	$login->email =$request->email;
	$login->mobile_number =$request->mobile_number;
	$login->password =Hash::make($request->password);
	//$login->dob =$request->date.'-'.$request->month.'-'.$request->year;
	$login->role_id = 2;
	$login->verification_id = RAND(100000,99999999);
	$login->status = 0;
	$login->credit_point =100;
	
	$login->save();
	
	$refer=Fantasyinvite::wherefriend_mail($request->email)->first();
	print_r($refer);
	
	if($refer)
	{
		
		$us =User::findorfail($refer->user_id);
$point=$us->credit_point;	
	$us->credit_point=$point+100;
		
		$us->save();
	}
	$user=User::whereemail($request->email)->first();
	$vi=$user->verification_id;
        if($user)
		  {
			  
			  
		$data['admin'] = array('user_id'=>$user->id,'name'=>$user->name,'email'=>$user->email, 'verification_id'=>$vi, 'from' => 'contact@leaguerocks.com', 'from_name' => 'League Rocks','type' => 'admin' );	
		Mail::send( 'website.user.registermail', $data, function( $message ) use ($data)
		{
   
 
		$message->to($data['admin']['email'],'League Rocks' )->from( $data['admin']['from'], 'League Rocks' )->subject('Password Generated!!');
 
		});
		Mail::send( 'website.user.adminmail', $data, function( $message ) use ($data)
		{
   
 
		$message->to('contact@leaguerocks.com','League Rocks' )->from('contact@leaguerocks.com', 'League Rocks' )->subject('New user Details!!');
 
		});
		  Session::flash('success','Please check your mail for email verification');
			return back();
		  
			
		  }
	
		else
		{
		Session::flash('error','Sorry we can not find your mail id in our records. Please enter valid email id !!');
		return back();
		}
	
    Session::flash('success','Registration Comleted Successfully..!!!!');
	
	 return back();
	 }	
	 else{
		 Session::flash('error','password confirm password mismatch.!!!!');
	
	 return back();
		 
	 }
	
	}
	
	
	
	public function email_verification($id)
	{
	$verify=User::whereverification_id($id)->first();
	
	$update=User::whereverification_id($id)->whereemail($verify->email)->update([
	'status'=>1]);
	
	return view('website.login.verification-page');
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
	public function series_post(Request $request)
	{
		if($request->input_field=="all")
		{				
			$data['query'] = Match::whereis_active(1)->get();
		}
       else 
       {
		   
	$data['query'] = Match::where('series_id',$request->input_field)->whereis_active(1)->get();
       }
	return view('website.user.ajaxseries',$data);
	}
	
	public function contest_post(Request $request)
	{
	//echo	$request->input_field;
	//$data['unique_id']=$request->input_field;
		//Session::put('unique_id',$request->input_field);
		
		$data['team_of_user']=DB::table('fantasy_user_create_team')
		
		->rightjoin('fantasy_user_join_contest','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
		->where('fantasy_user_join_contest.match_id',$request->input_field)->groupby('fantasy_user_join_contest.contest_id')->count();
		
			$match=Match::whereunique_id($request->input_field)->whereis_active(1)->first();
		 
			
			if($match->contest_type=="customize")
				{
			
			$data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->get();
				}
				else if($match->contest_type=="regular")
				{
				
				 	$data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->get();	
					
				}
				
$check=DB::table('fantasy_user_create_team')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->first();
		$data['view_team']=DB::table('fantasy_user_create_team')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->get();

			if($check)
			{
				$data['create_team']=1;
			}	
			else{
				$data['create_team']=0;
			}
				
			$data['contest_first_team']=DB::table('fantasy_user_create_team')->select('id')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->orderBy('id','asc')->first(); 
			
			$count=DB::table('fantasy_user_join_contest')->select('contest_id')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->groupby('contest_id')->get(); 
			$data['contest_count']=count($count);
			$data['view_contest']=DB::table('fantasy_user_join_contest')->select('contest_id')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->get(); 
			
			$data['view_teams']=DB::table('fantasy_user_create_team')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->get();  
			//allpalayer	
			$data['all_players']=DB::table('fantasy_team_players')->wherematch_id($request->input_field)->get();
				
			$teamcount=DB::table('fantasy_user_create_team')->wherematch_id($request->input_field)->whereuser_id(Auth::user()->id)->orderBy('id','desc')->get();  
			$data['team_count']=count($teamcount);
			
			//$data['view_team_player']=DB::table('fantasy_user_create_team')->whereid($contest_first_team)->get();

///user team point calculations
			
			$user_team=DB::table('fantasy_user_create_team')->wherematch_id($request->input_field)->get();
			
			
			foreach($user_team as $ut)
			{
				$user_sum=0;
				$point_sum=DB::table('fantasy_pointupdate_test')->wherematch_id($ut->match_id)->get();
				foreach($point_sum as $ps)
				{
					
				$batting_json=json_decode($ps->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json=json_decode($ps->bowling);
				$fielding_json=json_decode($ps->fielding);
					//echo $ps->match_id; echo '<br>';
					$json=json_decode($ut->team_players);
					
					
					for($i=0;$i < count($json);$i++)
					{
						
					//total calculation player	
					
				if($json[$i]==$ps->player_id && $batting_json!=NULL && $bowling_json==NULL && $fielding_json==NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=$batting_json->total[0] *2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=$batting_json->total[0] *1.5; 
				
					}
					else{
						$user_sum+=$batting_json->total[0];
					}
		  
				}
				
				elseif($json[$i]==$ps->player_id && $batting_json!=NULL && $bowling_json!=NULL && $fielding_json==NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0]);
					}
		  
				}
				
				elseif($json[$i]==$ps->player_id && $batting_json!=NULL && $bowling_json==NULL && $fielding_json!=NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($batting_json->total[0] +$fielding_json->field_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($batting_json->total[0] +$fielding_json->field_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($batting_json->total[0] +$fielding_json->field_total[0]);
					}
		  
				}
				
				elseif($json[$i]==$ps->player_id && $batting_json!=NULL && $bowling_json!=NULL && $fielding_json!=NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0]+$fielding_json->field_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0]+$fielding_json->field_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($batting_json->total[0] +$bowling_json->bowl_total[0]+$fielding_json->field_total[0]);
					}
		  
				}
				
				elseif($json[$i]==$ps->player_id && $batting_json==NULL && $bowling_json!=NULL && $fielding_json!=NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($bowling_json->bowl_total[0]+$fielding_json->field_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($bowling_json->bowl_total[0]+$fielding_json->field_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($bowling_json->bowl_total[0]+$fielding_json->field_total[0]);
					}
		  
				}
				
				elseif($json[$i]==$ps->player_id && $batting_json==NULL && $bowling_json!=NULL && $fielding_json==NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($bowling_json->bowl_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($bowling_json->bowl_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($bowling_json->bowl_total[0]);
					}
		  
				}
				elseif($json[$i]==$ps->player_id && $batting_json==NULL && $bowling_json==NULL && $fielding_json!=NULL )
				{
					if($json[$i]==$ut->captain)
					{
						 $user_sum+=($fielding_json->field_total[0])*2;
					}
					elseif($json[$i]==$ut->vice_captain)
					{
			  $user_sum+=($fielding_json->field_total[0]) *1.5; 
				
					}
					else{
						$user_sum+=($fielding_json->field_total[0]);
					}
		  
				}
				
					
					
			
				
					}
					
				
				
				}
				//$user_sum=+$user_sum;
				 $user_sum;
			//user total update
					$total_upate=DB::table('fantasy_user_create_team')
		  ->wherematch_id($ut->match_id)
		  ->whereid($ut->id)
		  ->update(['team_players_points' =>$user_sum ]);
		  
		  $total_upate=DB::table('fantasy_user_join_contest')
		  ->wherematch_id($ut->match_id)
		  ->whereteam_id($ut->id)
		  ->update(['points' =>$user_sum ]);

				
			}
			
				
			
		if($data['contest_count'] >0)
		{			
			$data['user_team_total']=DB::table('fantasy_user_join_contest')
			->select('fantasy_user_join_contest.contest_id','fantasy_contests.*','users.*','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','fantasy_user_join_contest.contest_id')
			->leftjoin('users','users.id','fantasy_user_join_contest.user_id')
			->where('fantasy_user_create_team.match_id',$request->input_field)
			->where('fantasy_user_create_team.user_id',Auth::user()->id)
			 ->groupBy('fantasy_user_join_contest.contest_id')
			->get();
			//print_r($data['user_team_total']);
		
		/* $data['user_team_list']=DB::table('fantasy_user_join_contest')
			->select('fantasy_user_join_contest.contest_id','fantasy_user_join_contest.rank','fantasy_user_join_contest.points','fantasy_contests.*','users.name as user_name','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','fantasy_user_join_contest.contest_id')
			->leftjoin('users','users.id','fantasy_user_join_contest.user_id')
			//->where('fantasy_user_create_team.user_id',Auth::user()->id)
			->where('fantasy_user_create_team.match_id',$request->input_field)
			 //->groupBy('fantasy_user_join_contest.contest_id')
			->get(); */
		}
		else
		{
			$data['user_team_total']='';
			//$data['user_team_list']='';
		}
			
			//Rank Tests
			$cont_list=DB::table('fantasy_user_join_contest')->wherematch_id($request->input_field)->orderBy('points','desc')->groupby('contest_id')->get();
			foreach($cont_list as $cont_id)
			{
			$rank_list=DB::table('fantasy_user_join_contest')->wherematch_id($request->input_field)->wherecontest_id($cont_id->contest_id)->orderBy('points','desc')->get();
		
			       $rank = 0;
                   $last_score = false;
                   $rows = 0;
foreach($rank_list as $r)
{
	 $rows++;
	 if( $last_score!= $r->points )
	 {
      $last_score = $r->points;
      $rank = $rows;
    }
  //  echo "rank ".$rank." is ".$r->id." with point ".$r->points;
  
  $rank_update=DB::table('fantasy_user_join_contest')->wherematch_id($request->input_field)->whereid($r->id)->update([
  'rank' => $rank ]);
  
  }
			}
			
			
			
				
			 $data['unique_id']=$request->input_field;	
			Session::put('unique_id',$request->input_field);

		
         
		
	return view('website.user.ajaxcontest',$data);
	}
	
	public function ajax_filter(Request $request)
	{
		$win=$request->win;
		$pay=$request->pay;
		$size=$request->size;
		$unique=$request->unique;
		$match=Match::whereunique_id($unique)->whereis_active(1)->first();
		$data['team_of_user']=DB::table('fantasy_user_create_team')->wherematch_id($request->unique)->count();
		$check=DB::table('fantasy_user_create_team')->wherematch_id($unique)->whereuser_id(Auth::user()->id)->first();
		$data['view_team']=DB::table('fantasy_user_create_team')->wherematch_id(Session::get('unique_id'))->whereuser_id(Auth::user()->id)->get();

			if($check)
			{
				$data['create_team']=1;
			}	
			else{
				$data['create_team']=0;
			}
			if($match->contest_type=="customize")
				{
					
				if($size=="all" && $pay=="all")
				{
					if($win==0)
				{
			       $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->whereis_practise_contest(1)->get();	
				   return view('website.user.ajaxfilter',$data);
			
				}
					else if($win=="10000-x")
				{
							$data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->where('winning_pirze', '>',10000)->get();
							return view('website.user.ajaxfilter',$data);
							
			    }
					else
					
				{
						$split=(explode("-",$win));
						$data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->whereBetween('winning_pirze', [$split[0], $split[1]])->get();	
						return view('website.user.ajaxfilter',$data);
				}
				}
				
				    else if($win=="all" && $pay=="all")
				{
					
					if($size=="10-x")	
				{	
			         $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereis_active(1)->get();
					 return view('website.user.ajaxfilter',$data);
				}
				   else
					   
					   { 
				    $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_active(1)->get();
					return view('website.user.ajaxfilter',$data);
					   }
			 
				} 
				
				 else if($win=="all" && $size=="all")
				 {
					 if($pay==0)
				{
			       $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->whereis_practise_contest(1)->get();
				   return view('website.user.ajaxfilter',$data);
			
				}
					else
					
				{
						$split=(explode("-",$pay));
						$data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_active(1)->whereBetween('enterence_amount', [$split[0], $split[1]])->get();	
						return view('website.user.ajaxfilter',$data);
				}
				 }
				 
				 else if($win=="all")
				 {
					if($size=="10-x" && $pay==0 )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						elseif($size!="10-x" && $pay==0  )
						{
							
						 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
						// print_r($data['contest']);
						 return view('website.user.ajaxfilter',$data);	
						}
						
						elseif($size=="10-x" && $pay!=0  )
						{
							$split=(explode("-",$pay));
						 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereBetween('enterence_amount', [$split[0], $split[1]])->whereis_active(1)->get();
						 return view('website.user.ajaxfilter',$data);	
						}
						
						elseif($size!="10-x" && $pay!=0  )
						{
							$split=(explode("-",$pay));
						 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereBetween('enterence_amount', [$split[0], $split[1]])->whereis_active(1)->get();
						 return view('website.user.ajaxfilter',$data);	
						}
						
				 }

                	else if($pay=="all")
					{
                 
				 if($size=="10-x" && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
						else if($size=="10-x" && $win==0 )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size=="10-x" && $win!=0 && $win!="10000-x" )
						
						{
							$split=(explode("-",$win));
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size!="10-x" && $win!=0 && $win!="10000-x" )
						
						{
							$split=(explode("-",$win));
							
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size!="10-x" && $win==0 )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
						else if($size!="10-x" && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
				 
					}				 
				 
				 else if($size=="all")
					{
					if($pay==0 && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_practise_contest(1)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
                  else if($pay==0 && $win==0)					
						{
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						 else if($pay==0 && $win!=0 && $win!="10000-x")					
						{
							$split=(explode("-",$win));
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_practise_contest(1)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						 else if($pay!=0 && $win!=0 && $win!="10000-x")					
						{
							$split=(explode("-",$win));
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($pay!=0 && $win==0)					
						{
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($pay!=0 && $win=="10000-x" )
						
						{
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
					}
				 
				 else if($win==0 && $pay==0 && $size!="10-x" )
				 {
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win==0 && $pay==0 && $size=="10-x" )
				 {
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win==0 && $pay!=0 && $size=="10-x" )
				 {
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win==0 && $pay!=0 && $size!="10-x" )
				 {
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 
				  else if($win!=0 && $win!="10000-x" && $pay==0 && $size!="10-x" )
				 {
					  $split1=(explode("-",$win));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereBetween('winning_pirze', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
			  else if($win!=0 && $win!="10000-x" && $pay==0 && $size=="10-x" )
				 {
					  $split1=(explode("-",$win));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split1[0], $split1[1]])->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				   else if($win!=0 && $win!="10000-x" && $pay!=0 && $size=="10-x" )
				 {
					 $split=(explode("-",$win));
				  $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win!=0 && $win!="10000-x" && $pay!=0 && $size!="10-x" )
				 {
					  $split=(explode("-",$win));
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 
				 else if($win="10000-x" && $pay==0 && $size!="10-x")
				 {
				  $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 } 
				 else if($win="10000-x" && $pay==0 && $size=="10-x")
				 {
				  $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win="10000-x" && $pay!=0 && $size=="10-x")
				 {
					 $split1=(explode("-",$pay));
				  $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win="10000-x" && $pay!=0 && $size!="10-x")
				 {
					 $split1=(explode("-",$pay));
				  $data['contest']=Contest::wheretype('customize')->wherematch_id($match->unique_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win="all" && $pay=="all" && $size=="all")
				 {
					echo "00";
				  $data['contest']=Contest::wheretype('customize')->wherecategory_id($match->category_id)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				//return view('website.user.ajaxfilter',$data);	 
		
	}	
	
	// regular contest
	else
				{
					
				if($size=="all" && $pay=="all")
				{
					if($win==0)
				{
				
			
			       $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->whereis_practise_contest(1)->get();	
				   return view('website.user.ajaxfilter',$data);
			
				}
					else if($win=="10000-x")
				{
					
							$data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->where('winning_pirze', '>',10000)->get();
							return view('website.user.ajaxfilter',$data);
							
			    }
					else
					
				{
						$split=(explode("-",$win));
						
						
						$data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->whereBetween('winning_pirze', [$split[0], $split[1]])->get();	
						return view('website.user.ajaxfilter',$data);
				}
				}
				
				    else if($win=="all" && $pay=="all")
				{
					
					if($size=="10-x")	
				{	
			         $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereis_active(1)->get();
					 return view('website.user.ajaxfilter',$data);
				}
				   else
					   
					   { 
				    $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_active(1)->get();
					return view('website.user.ajaxfilter',$data);
					   }
			 
				} 
				
				 else if($win=="all" && $size=="all")
				 {
					 if($pay==0)
				{
			       $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->whereis_practise_contest(1)->get();
				   return view('website.user.ajaxfilter',$data);
			
				}
					else
					
				{
						$split=(explode("-",$pay));
						$data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->whereBetween('enterence_amount', [$split[0], $split[1]])->get();	
						return view('website.user.ajaxfilter',$data);
				}
				 }
				 
				 else if($win=="all")
				 {
					if($size=="10-x" && $pay==0 )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						elseif($size!="10-x" && $pay==0  )
						{
							
						 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
						// print_r($data['contest']);
						 return view('website.user.ajaxfilter',$data);	
						}
						
						elseif($size=="10-x" && $pay!=0  )
						{
							$split=(explode("-",$pay));
						 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereBetween('enterence_amount', [$split[0], $split[1]])->whereis_active(1)->get();
						 return view('website.user.ajaxfilter',$data);	
						}
						
						elseif($size!="10-x" && $pay!=0  )
						{
							$split=(explode("-",$pay));
						 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereBetween('enterence_amount', [$split[0], $split[1]])->whereis_active(1)->get();
						 return view('website.user.ajaxfilter',$data);	
						}
						
				 }

                	else if($pay=="all")
					{
                 
				 if($size=="10-x" && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
						else if($size=="10-x" && $win==0 )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size=="10-x" && $win!=0 && $win!="10000-x" )
						
						{
							$split=(explode("-",$win));
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size!="10-x" && $win!=0 && $win!="10000-x" )
						
						{
							$split=(explode("-",$win));
							
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($size!="10-x" && $win==0 )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
						else if($size!="10-x" && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
				 
					}				 
				 
				 else if($size=="all")
					{
					if($pay==0 && $win=="10000-x" )
						
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_practise_contest(1)->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
                  else if($pay==0 && $win==0)					
						{
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_practise_contest(1)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						 else if($pay==0 && $win!=0 && $win!="10000-x")					
						{
							$split=(explode("-",$win));
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_practise_contest(1)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						 else if($pay!=0 && $win!=0 && $win!="10000-x")					
						{
							$split=(explode("-",$win));
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereBetween('winning_pirze', [$split[0], $split[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($pay!=0 && $win==0)					
						{
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						else if($pay!=0 && $win=="10000-x" )
						
						{
							$split1=(explode("-",$pay));
							 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->where('winning_pirze', '>',10000)->whereis_active(1)->get();
							  return view('website.user.ajaxfilter',$data);
						}
						
					}
				 
				 else if($win==0 && $pay==0 && $size!="10-x" )
				 {
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win==0 && $pay==0 && $size=="10-x" )
				 {
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win==0 && $pay!=0 && $size=="10-x" )
				 {
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win==0 && $pay!=0 && $size!="10-x" )
				 {
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 
				  else if($win!=0 && $win!="10000-x" && $pay==0 && $size!="10-x" )
				 {
					  $split1=(explode("-",$win));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereis_practise_contest(1)->whereBetween('winning_pirze', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
			  else if($win!=0 && $win!="10000-x" && $pay==0 && $size=="10-x" )
				 {
					  $split1=(explode("-",$win));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split1[0], $split1[1]])->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				   else if($win!=0 && $win!="10000-x" && $pay!=0 && $size=="10-x" )
				 {
					 $split=(explode("-",$win));
				  $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win!=0 && $win!="10000-x" && $pay!=0 && $size!="10-x" )
				 {
					  $split=(explode("-",$win));
					 $split1=(explode("-",$pay));
					 $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->whereBetween('winning_pirze', [$split[0], $split[1]])->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 
				 else if($win="10000-x" && $pay==0 && $size!="10-x")
				 {
				  $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 } 
				 else if($win="10000-x" && $pay==0 && $size=="10-x")
				 {
				  $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereis_practise_contest(1)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win="10000-x" && $pay!=0 && $size=="10-x")
				 {
					 $split1=(explode("-",$pay));
				  $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length','>',10)->where('winning_pirze', '>',10000)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				 else if($win="10000-x" && $pay!=0 && $size!="10-x")
				 {
					 $split1=(explode("-",$pay));
				  $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->where('contest_team_length',$size)->where('winning_pirze', '>',10000)->whereBetween('enterence_amount', [$split1[0], $split1[1]])->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				  else if($win="all" && $pay=="all" && $size=="all")
				 {
					
				  $data['contest']=Contest::wheretype('regular')->wherecategory_id($match->category_id)->whereis_active(1)->get();
			 return view('website.user.ajaxfilter',$data);
				 }
				//return view('website.user.ajaxfilter',$data);	 
		
	}
	
	
	
	}
	
	public function invite_friend(Request $request)
	{
		//$data['invite']=$request->email;
		$users = DB::table('users')->where('email',$request->friend_mail)->first();
		$invite = DB::table('fantasy_invite_friend')->where('friend_mail',$request->friend_mail)->first();
		
		if(count($users)==0 && count($invite)==0)
		{
		
		$insert=DB::table('fantasy_invite_friend')->insert(
    ['friend_mail' => $request->friend_mail, 'user_id' => Auth::user()->id]
);
$data['admin'] = array('friend_email'=>$request->friend_mail, 'from' => 'contact@leaguerocks.com', 'from_name' => 'Leauge Rocks','type' => 'admin' );	
		Mail::send( 'website.user.invite_mail', $data, function( $message ) use ($data)
		{
   
 
		$message->to($data['admin']['friend_email'],'Leauge Rocks' )->from( $data['admin']['from'], 'Leauge Rocks' )->subject('Friend Invite..!!');
 
		});
		Session::flash('success','Friend invited Successfully');
		return back();
		}
		
		
		else
		{
		Session::flash('error','Mail Id already exist');
		return back();
		}
		
	}
	
	
	public function view_payment(Request $request)
	{
		$data['payment_amount']=$request->cash;
		return view('website.user.payment_view',$data);
	}
	
	 public function order(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'mobile_no' => 'required|numeric|digits:10',
            'address' => 'required',
        ]);

        $input = $request->all();
        $input['order_id'] = $request->mobile_no.rand(1,100);
        $input['payment_amount'] = $request->payment_amount;
        $input['user_id'] = Auth::user()->id;
        $input['payment_method'] = 'paytm';

        PaymentUser::create($input);
//Session::put('payment_amount',$request->payment_amount);
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
          'order' => $input['order_id'],
          'user' => 'SARAVANA',
          'mobile_number' => '9087794209',
          'email' => 'apsaravana30@gmail.com',
          'amount' => $input['payment_amount'],
          'callback_url' => url('payment/status')
        ]);
        return $payment->receive();
    }
	
	  public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response();
        $order_id = $transaction->getOrderId();
       

        if($transaction->isSuccessful()){
       $data['success']=   PaymentUser::where('order_id',$order_id)->update(['payment_status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
		  $user_wallet_current_amount=(Auth::user()->user_wallet_current_amount) + (Session::get('payment_amount'));
		
	$con=User::whereid(Auth::user()->id)->update([ 'user_wallet_current_amount' =>$user_wallet_current_amount]);
		
		  return view('website.user.paytm_success',$data);
        }else if($transaction->isFailed()){
        $data['failed']=   PaymentUser::where('order_id',$order_id)->update(['payment_status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
       //   dd('Payment Failed.');
		  return view('website.user.paytm_success',$data);
        }
    }    
	public function payment_post(Request $request)
{
	
	$payumoney = new PayUMoney([
    'merchantId' => '4mQTl6ga',
    'secretKey'  => 'GjBQs37X29',
    'testMode'   => false
]);

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
// All of these parameters are required!


		
$params = [
    'txnid'       => $txnid,
    'amount'      => $request->payment_amount,
    'productinfo' => 'purchase',
    'firstname'   => $request->name,
   // 'address'   => $request->address,
    'email'       => $request->email,
    'phone'       => $request->mobile_no,
    'surl'        => 'http://leaguerocks.com/payu-success',
    'furl'        => 'http://leaguerocks.com/failer',
];

// Redirects to PayUMoney
$payumoney->initializePurchase($params)->send();
	
	
}

public function ccavenue_post(Request $request)
{


$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
$parameters = [
      
        'tid' => $txnid,
        'order_id' => 1232212,
        'amount' => $request->payment_amount,
		 'productinfo' => 'purchase',
		'firstname'   => $request->name,
	   // 'address'   => $request->address,
		'email'       => $request->email,
		'phone'       => $request->mobile_no,
		'merchant_id' => 2193,
		'currency' => 'INR',
		'redirect_url' => 'http://leaguerocks.com/ccavenue-success',
		'cancel_url' => 'http://leaguerocks.com/indipay/response',
		'language' => 'EN',
		'accessCode' => 'F94007DF1640D69A',
		'workingKey' => '8C95427E14C3804A963194C9FB010538', 
      ];
	    
		// gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo
      
      $order = Indipay::gateway('CCAvenue')->prepare($parameters);
      return Indipay::process($order);
	
}

public function response(Request $request)
    
    {
        /* // For default Gateway
        $response = Indipay::response($request); */
        
        // For Otherthan Default Gateway
        $response = Indipay::gateway('CCAvenue')->response($request);

        dd($response);
    
    }  


public function payu_success()
{
	$payumoney = new PayUMoney([
   'merchantId' => '4mQTl6ga',
    'secretKey'  => 'GjBQs37X29',
    'testMode'   => false
]);

$result = $payumoney->completePurchase($_POST);

//if ($result->checksumIsValid() && $result->getStatus() === PayUMoney::STATUS_COMPLETED) {
 
// Returns Complete, Pending, Failed or Tampered
 $staus=$result->getStatus(); 

// Returns an array of all the parameters of the transaction
$parm=$result->getParams();

//print_r($parm);
// Returns the ID of the transaction
 $tarn=$result->getTransactionId();
 
 $insert=new PaymentUser;
 $insert->user_id=Auth::user()->id;
 $insert->payment_amount=$parm['amount'];
 $insert->email=$parm['email'];
 $insert->name=$parm['firstname'];
//$insert->address=$parm['address'];
 $insert->mobile_no=$parm['phone'];
 $insert->transaction_id=$parm['txnid'];
 $insert->payment_method='payu';
 $insert-> payment_status=$staus;
 $insert->save();
  
   $user_wallet_current_amount=(Auth::user()->user_wallet_current_amount) + $parm['amount'];
		
	$con=User::whereid(Auth::user()->id)->update([ 'user_wallet_current_amount' =>$user_wallet_current_amount]);

// Returns true if the checksum is correct
//$result->checksumIsValid();
$six_digit_random_number = mt_rand(100000, 999999);

 
  
 /* $data['admin'] = array( 'email' => $parm['email'],'order_id' => $insert, 'name' => $parm['firstname'],'amount' => $parm['amount'],'TransactionId' => $tarn,'mobile' => $parm['phone'], 'from' => 'apsaravana30@gmail.com', 'from_name' => 'Saravana.R','type' => 'user' );

Mail::send( 'website.user.mail.payment-sucess', $data, function( $message ) use ($data)
{
   $message->to($data['admin']['email'],'Rangvatacademy' )->from( $data['admin']['from'], 'Rangvatacademy' )->subject('Payment Confirmation!');
   $message->bcc('apsaravana30@gmail.com', 'Rangvatacademy');
   
});  */
 
  return view('website.user.paytm_success');
 
  }

public function credit_point_purchase(Request $request)
{
	$credit=$request->credit;
	$wallet=Auth::user()->user_wallet_current_amount;
	$test=$wallet*10;
	$credit_to_amount=$credit/10;
	if($test > $credit)
		
		{
			
			$insert=new CreditPurchase;
			$insert->user_id=Auth::user()->id;
			$insert->credit_point=$credit;
			$insert->purchase_amount=$credit_to_amount;
			$insert->save();
			
			if($insert)
			{
				$update=User::findorFail(Auth::user()->id);
				$update->user_wallet_current_amount=$wallet-$credit_to_amount;
				$update->credit_point=Auth::user()->credit_point+$credit;
				$update->save();
			}
			return response()->json([
                "message" => "Success"
            ]);
		}
			else {
					return response()->json([
                "message" => "failed"
            ]);
			}
			
			
	
}
public function view_withdraw()
{
	
		$data['bank']=BankVerify::whereuser_id(Auth::user()->id)->first();
		$data['winning'] = DB::table('fantasy_user_winning_details')
            ->join('fantasy_contests', 'fantasy_user_winning_details.contest_id', '=', 'fantasy_contests.id')
            ->join('users', 'users.id', '=', 'fantasy_user_winning_details.user_id')
			->join('matches', 'matches.unique_id', '=', 'fantasy_user_winning_details.match_id')
            ->select('users.*', 'fantasy_contests.name as contest_name', 'matches.team_1','matches.team_2','fantasy_user_winning_details.amount','fantasy_user_winning_details.created_at as win_date')
            ->where('users.id',Auth::user()->id)->get();
		$data['user_withdraw'] = DB::table('fantasy_user_withdraw')
            ->join('users', 'users.id', '=', 'fantasy_user_withdraw.user_id')
            ->select('users.*','users.name as user_name','fantasy_user_withdraw.withdraw_amount', 'fantasy_user_withdraw.withdraw_request_at','fantasy_user_withdraw.deposite_status')
            ->where('users.id',Auth::user()->id)
			->where('deposite_status',1)->get();
		$data['user_history'] = DB::table('fantasy_user_join_contest')
			->join('users','users.id', '=', 'fantasy_user_join_contest.user_id')
			->join('fantasy_contests','fantasy_contests.id', '=', 'fantasy_user_join_contest.contest_id')
			->join('matches','matches.unique_id', '=', 'fantasy_user_join_contest.match_id')
			->select('users.*','users.name as user_name', 'matches.unique_id','fantasy_contests.name as fantasy_contests_name','fantasy_user_join_contest.points','fantasy_user_join_contest.rank','matches.date')
			->where('users.id',Auth::user()->id)->get();		
			//print_r($data['user_withdraw']);
	return view('website.user.withdraw',$data);
}





public function withdraw_request(Request $request)
{
	
	$amount=$request->withdraw_amount;
	
	$access=Auth::user()->user_wallet_current_amount - $amount;
	
	if($access > 100)
	{
		$insert=new WithdrawRequest;
		$insert->user_id=Auth::user()->id;
		$insert->withdraw_amount=$request->withdraw_amount;
		$insert->withdraw_request_at=date('Y-m-d h:i:s') ;
		$insert->deposite_status=0;
		$insert->save();
	if($insert)
	{
		        $update=User::findorFail(Auth::user()->id);
				$update->user_wallet_current_amount=Auth::user()->user_wallet_current_amount - $amount;
				//$update->credit_point=Auth::user()->credit_point+$credit;
				$update->save();
				
		
	}
	return response()->json([
                "message" => "Success"
            ]);
	}
	else {
					return response()->json([
                "message" => "failed"
            ]);
			}
	
	
}

public function bank_verify()

{
	$data['bank']=BankVerify::whereuser_id(Auth::user()->id)->first();
	//print_r($data['bank']);
	//exit;
	return view('website.user.bank_verify',$data);
}

public function bank_verify_otp(Request $request)
{
	
	$mobile=$request->mobile;
	echo $mobile;
	
$exist=BankVerify::whereuser_id(Auth::user()->id)->get();
$exist1=BankVerify::whereuser_id(Auth::user()->id)->first();

$token = mt_rand(100000, 999999);
if(count($exist)==0)
{
			$insert=new BankVerify;
			$insert->user_id=Auth::user()->id;
			$insert->mobile_no=$request->mobile;
			$insert->otp=$token;
			$insert->otp_verification_status=0;
			$insert->save();
		 
				
				 //	$name=Auth::user()->name;
		  $mobilenumbers=Session::get('bank_mobile'); //enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			$message = urlencode("Hi, Your OTP is $token");  //enter Your Message
			
$user="shakthitech"; 
$password="123456";
$senderid="DHRONA";
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);   


			
			
		Session::put('bank_mobile',$request->mobile);
		return response()->json([
                "message" => "Success"
            ]);
			
} 
else
	{
		
	$insert=BankVerify::findorFail($exist1->id);
	$insert->user_id=Auth::user()->id;
			$insert->mobile_no=$request->mobile;
			$insert->otp=$token;
			$insert->otp_verification_status=0;
			$insert->save();
			
			
			
		  $mobilenumbers=Session::get('bank_mobile'); //enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			$message = urlencode("Hi, Your OTP is $token");  //enter Your Message
			
$user="shakthitech"; 
$password="123456";
$senderid="DHRONA";
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);  
 

			Session::put('bank_mobile',$request->mobile);
			return response()->json([
               "message" => "Success"
          ]);
		  
}

}

public function otp_verify_number(Request $request)
{
	$otp=$request->otp;
	$mobile=Session::get('bank_mobile');
$exist=BankVerify::whereuser_id(Auth::user()->id)->wheremobile_no($mobile)->whereotp($otp)->first();



if(count($exist)==1)
{
			$insert=BankVerify::findorFail($exist->id);
	        $insert->user_id=Auth::user()->id;
			$insert->otp_verification_status=1;
			$insert->save();
			
			
			
			Session::forget('bank_mobile');
			return response()->json([
                "message" => "Success"
            ]);
			
} else {
	return response()->json([
                "message" => "failed"
            ]);
}
}

public function verify_pancard(Request $request)
{
	$exist=BankVerify::whereuser_id(Auth::user()->id)->whereotp_verification_status(1)->first();
	//$date=$request->date
	if($exist)
	{
			$insert=BankVerify::findorFail($exist->id);
	        $insert->user_id=Auth::user()->id;
			$insert->pan_full_name=$request->pan_name;
			$insert->pan_card_no=$request->pan_number;
			$insert->date_of_birth=$request->date.'-'.$request->month.'-'.$request->year;
			$insert->state=$request->state;
			$insert->pancard_verify_status=1;
			$insert->save();
			Session::forget('bank_mobile');
			return response()->json([
                "message" => "Success"
            ]);
	}
	else 
	{
		return response()->json([
                "message" => "failed"
            ]);
  }
		
	
}
public function verify_bank_details(Request $request)
{
	$exist=BankVerify::whereuser_id(Auth::user()->id)->whereotp_verification_status(1)->wherepancard_verify_status(1)->first();
	//$date=$request->date
	if($exist)
	{
			$insert=BankVerify::findorFail($exist->id);
	        $insert->user_id=Auth::user()->id;
			$insert->bank_acc_no=$request->bank_acc_no;
			$insert->bank_name=$request->bank_name;
			$insert->branch_name=$request->branch_name;
			$insert->bank_holder_name=$request->bank_holder_name;
			$insert->ifsc_code=$request->ifsc;
			$insert->bank_verify_status=1;
			$insert->save();
			return response()->json([
                "message" => "Success"
            ]);
	}
	else 
	{
		return response()->json([
                "message" => "failed"
            ]);
  }
		
	
}


public function user_point_system()
{
	$matches=Match::all();
		
	
foreach($matches as	$matchlist)
{
	
 
	//$team=DB::table('fantasy_user_create_team')->wherematch_id('1089420')->get();
	
    $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&unique_id='.$matchlist->unique_id);


           	
	$cricketMatches = json_decode($cricketMatchesTxt); 
	
	$test= $cricketMatches->data;
	
	$type=$cricketMatches->type;
	
	if($type=="Test")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('Test')->first();
		
	}
	elseif($type=="oneday-international")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('odi')->first();
	}
	elseif($type=="t20")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('t20')->first();
	}
	else{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('odi')->first();
	}
	
	
	
	//catch and bowled

	 foreach ($test->batting as $batting)
	 {
	 $pid=array();
		 foreach ($batting->scores as $scores)
	 {
		 
		if( in_array("catch & bowled",$batting->scores))
	{
	 $dismissal_by='dismissal-by';
	 $iii=$scores->$dismissal_by;
		foreach($iii as $discatbowl)
		{
			$pid=$discatbowl->pid;
			//$pid1=$discatbowl->name;

	    }
	//	Print_r($pid);
		//exit;
	}
	}
	 }
	 

	
	
	
	//batting
		 foreach ($test->batting as $batting)
	 {
	 
		 foreach ($batting->scores as $scores)
	 {
		
		 
		 if($scores->batsman!="Total" && $scores->batsman!="Extras")
		 {
		
$f="4s";
$s="6s";

	$pid=$scores->pid;
	$run=$scores->R*$point_table->each_run;
	$s4=$scores->$f*$point_table->each_four;
	$s6=$scores->$s*$point_table->each_six;
	//centure && half centry
	if($scores->R >=50 && $scores->R <=99)
	{
		$half_century=$point_table->half_century;
		$century=0;
	}
	elseif($scores->R >=100)
	{
			$half_century=0;
		$century=$point_table->century;
	}
	else {
		$century=0;
		$half_century=0;
	}
	//strike rate
	//if($scores->B > 10)
	//{ 
if($scores->SR  >60 && $scores->SR <=70)
{
$strike_rate=$point_table->strike_rate_60_70;
	}
	elseif($scores->SR  >50 && $scores->SR <=60)
	{
		$strike_rate=$point_table->strike_rate_50_60;
	}
	elseif($scores->SR < 50)
	{
		$strike_rate=$point_table->strike_rate_below_50;
		
	}
  else 
   {
	$strike_rate=0;
   }
	
//	}
		
	
		
		$total=$run+$s4+$s6+$half_century+$century+$strike_rate;
		
		$data = array();
//$data['pid'] = array($pid);
$data['total'] = array($total);
$data['s4'] = array($s4);
$data['run'] = array($run);
$data['s6'] = array($s6);
$data['half_century'] = array($half_century);
$data['century'] = array($century);
$data['strike_rate'] = array($strike_rate);
$batting_son= json_encode($data);

	$exist=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($pid)->first();
	if(!$exist){
		
		$insert=DB::table('fantasy_pointupdate_test')->insert([
		'batting'=>$batting_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$pid,
		
		]);
	}
	else 
	{
		$insert=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($pid)->update([
		'batting'=>$batting_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$pid,
		
		]);
	}
		 }
	
	 
		
	
	
	
	
		
	
		 
		
	  } 
	
	
}







 foreach ($test->bowling as $bowling)
	 {
	 
		 foreach ($bowling->scores as $scoresbowl)
	 {
		 
		 $maiden_over=$scoresbowl->M * $point_table->maiden_over;
	
	// wicket 4 or 5
	if($scoresbowl->W==4)
	{
		$wicket4or5=$point_table->wickets_4;
		
	}
	elseif($scoresbowl->W >=5)
	{
	$wicket4or5=$point_table->wickets_5;	
	}
	else
	{
	$wicket4or5=0;
	}	//each wicket
		$single_wicket= $scoresbowl->W *$point_table->per_wicket;
		
	if(array_key_exists('Econ',$scoresbowl) && $scoresbowl->O >=3)
	{
		 if($scoresbowl->Econ <= 4)
		{
		$econmcy=$point_table->economy_rate_below_4;
		}
		else if($scoresbowl->Econ >4 && $scoresbowl->Econ <= 5)
		{
		$econmcy=$point_table->economy_rate_4_5;
		}
		else if($scoresbowl->Econ >5 && $scoresbowl->Econ <= 6)
		{
		$econmcy=$point_table->economy_rate_5_6;
		}
		else if($scoresbowl->Econ >6 && $scoresbowl->Econ <= 7)
		{
		$econmcy=$point_table->economy_rate_6_7;
		} 
		else if($scoresbowl->Econ >7 && $scoresbowl->Econ <= 9)
		{
		$econmcy=$point_table->economy_rate_7_9;
		}
		else if($scoresbowl->Econ >9)
		{
		$econmcy=$point_table->economy_rate_above_9;
		} 
	}
	else
	{
	$econmcy=0;
    }	
		$bowl_total=$maiden_over+$single_wicket+$wicket4or5+$econmcy;
		 
      $bowling_array = array();
//$data['pid'] = array($pid);
//$bowling_array['O'] = array($scoresbowl->O);
$bowling_array['bowl_total'] = array($bowl_total);
$bowling_array['maiden_over'] = array($maiden_over);
$bowling_array['econmcy'] = array($econmcy);
$bowling_array['single_wicket'] = array($single_wicket);
$bowling_array['wicket4or5'] = array($wicket4or5);
$bowling_son= json_encode($bowling_array);

$exist_bowl=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresbowl->pid)->first();
	if(!$exist_bowl){
		
		$insert_bowl=DB::table('fantasy_pointupdate_test')->insert([
		'bowling'=>$bowling_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresbowl->pid,
		
		]);
	}
	else 
	{
		$insert_bowl=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresbowl->pid)->update([
		'bowling'=>$bowling_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresbowl->pid,
		
		]);
	}
		 }
	 }
	
	
	foreach ($test->fielding as $fielding)
	 {
	 
		 foreach ($fielding->scores as $scoresfield)
	 {
		 
		$catch= $scoresfield->catch * $point_table->catch;
		$stumping= $scoresfield->stumped * $point_table->stumping;
		$field_total= $stumping;
      $fielding_array = array();
//$data['pid'] = array($pid);
$fielding_array['catch'] = array($catch);
/* $fielding_array['lbw'] = array($scoresfield->lbw);
$fielding_array['bowled'] = array($scoresfield->bowled); */
$fielding_array['stumping'] = array($stumping);
$fielding_array['field_total'] = array($field_total);
$fielding_son= json_encode($fielding_array);

$exist_field=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresfield->pid)->first();
	if(!$exist_field){
		
		$insert_field=DB::table('fantasy_pointupdate_test')->insert([
		'fielding'=>$fielding_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresfield->pid,
		
		]);
	}
	else 
	{
		$insert_field=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresfield->pid)->update([
		'fielding'=>$fielding_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresfield->pid,
		
		]);
	}
		 }
	 }
	 
	
	 }
	 
	 
	 
}
	 
	 public function test_point_matchwise()
	 {
		$matches=Match::all();
		
		//$matchlist123=array();
foreach($matches as	$matchlist)
{
	//for($i=0;$i<count($matchlist);$i++)
	//{
//$matchlist123=$matchlist->unique_id[$i];
 return $this->user_point_system($matchlist->unique_id)	;
}
//}	

	
	 }
		 
	 
	 
//28.6

public function edit_profile(Request $request)
    {
        /* $this->validate($request, [
    'date' => 'required',
    'month' => 'required',
    'year' => 'required',
    'gender' => 'required',
    'mobile' => 'required',
    'address' => 'required',
    'city' => 'required',
    'state' => 'required',
    'pincode' => 'required',
	
  
    ]); */
	
	/* echo $request->gender;
	exit; */
	$login = User::findorFail(Auth::user()->id);
	
	$login->dob =$request->date.'-'.$request->month.'-'.$request->year;
	$login->mobile_number =$request->mobile_number;
	$login->gender =$request->gender;
	$login->address =$request->address;
	$login->city =$request->city;
	$login->state =$request->state;
	$login->pincode =$request->pincode;
	
	$login->save();
	Session::flash('success','Your profile has changed Successfully');
	return back();
	}
	
	public function change_password(Request $request)
    {
        $user = Auth::user();

   
    $newPassword = $request->np;
    $renewPassword = $request->rnp;

    
      if($newPassword==$renewPassword)
	  {		  
	
        $obj_user = User::findorFail(Auth::user()->id);
		
        $obj_user->password = Hash::make($newPassword);
        $obj_user->save();
         Session::flash('success','Password changed Successfully');
        return back();
    }
	else
	{
	Session::flash('error','Mismatch in new password and Re-Enter new password');
        return back();
	}
	
    
   
    }
	
	public function forgot_password(Request $request)
	 
	{
		     
			  $name = DB::table('users')->whereemail($request->email)->first(); 
			 
			  if(count($name)==1)
			  {
				Session::put('forgetemail',$request->email); 
				 $data['email']=$request->email;
				 
			  $token = mt_rand(100000, 999999);
			$fc=User::whereemail($request->email)->update(['password_token' => $token]);
			 
			  $mobilenumbers=$name->mobile_number;
			//enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			$message = urlencode("Hi $name->name, Your OTP is $token");  //enter Your Message
			
	$user="shakthitech"; 
$password="123456";
$senderid="SHAKTI";
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 
 
			 
			 
			 
			 
			 
			 
			 /* $data['admin'] = array( 'email' => $request->input('email'), 'subject' => $request->input('subject'), 'from' => 'apsaravana30@gmail.com', 'from_name' => 'Saravana.R','type' => 'admin' );
		Mail::send( 'website.user.forgot_password', $data, function( $message ) use ($data)
		{
		   
		   
		   $message->to($data['admin']['email'],'Fantasy Cricket' )->from( $data['admin']['from'], 'Fantasy Cricket' )->subject('Forgot Password');
		   
		});
		 */
			//Session::flash('success','Enquiry Submited Successfully!!!');
			return view('website.user.otp',$data);
			  }
				//return back();


	 /* Mail::send('email.send',['title' => $title, 'message' =>$message], function ($message)
	  {
		  $message->from('','');
		  $message->to('');
	  }); */
	  
	
	}
	//re-send
public function resend_otp(Request $request)
{
	 
			  $name = DB::table('users')->whereemail($request->email)->first(); 
			 $name->email;
			
			  if(count($name)==1)
			  {
				Session::put('forgetemail',$request->email); 
				 $data['email']=$request->email;
				 
			  $token = mt_rand(100000, 999999);
			$fc=User::whereemail($request->email)->update(['password_token' => $token]);
			 
			  $mobilenumbers=$name->mobile_number;
			//enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			$message = urlencode("Hi $name->name, Your OTP is $token");  //enter Your Message
			
	$user="shakthitech"; 
$password="123456";
$senderid="SHAKTI";
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 
if(count($name)==1)
			  {
 return response()->json([
	   "message"=>"Success"
	   ]);
			  }

   }			  
	   
	
}

public function o_t_p(Request $request)
{
	$data['email'] = $request->email;
	

   $table=DB::table('users')
          ->whereemail($request->email)
          ->wherepassword_token($request->otp)
		  ->get();
   if(count($table)==1)
   {
 //  return view('website.user.reset_password',$data);
  return response()->json([
	   "message"=>"Success"
	   ]);
  
  }
   else
   {
	   /* Session::flash('failure','OTP entered was wrong');
	   return back(); */
	   return response()->json([
	   "message"=>"failure"
	   ]);
   }
}

public function reset_password1(Request $request)
{
 
  $newpassword = $request->newpassword;
  
 
    $conformpassword = $request->conformpassword;
   
 if($newpassword==$conformpassword)
 {
	$fc=User::whereemail($request->mailpassword)->update(['password' =>Hash::make ($newpassword )]);
   	//Session::flash('success','Password set done');
   	if($fc)
   	{
   	$remove=User::whereemail($request->mailpassword)->update(['password_token' =>'']);
   	}
	return response()->json([
	   "message"=>"Success"
	   ]);
	
 }
 else
 {
	 //Session::flash('failure','Password not matching');
	 return response()->json([
	   "message"=>"failure"
	   ]);
	  
 }
 
  
}

public function reset_password_view($id)
{
	$data['id']=$id;
	return view('website.user.reset_password',$data);
}

function create_team($id,$team)
	{
		$data['match_id']= base64_decode($id);
		$data['team_no']= base64_decode($team);
		
		$data['all_players']=DB::table('fantasy_team_players')->wherematch_id(base64_decode($id))->get();
		//$data['selected_player']=DB::table('fantasy_team_selected_players')->wherematch_id(base64_decode($id))->get();
		
		$delete=DB::table('fantasy_team_selected_players')->whereuser_id(Auth::user()->id)->wherematch_id(base64_decode($id))->whereteam_no(base64_decode($team))->delete();
		
		
		return view('website.user.page2',$data);	 
		
	}
	
	function user_create_team_post(Request $req)
	{
		$user_id=Auth::user()->id;
		$match_id=$req->matchid;
		$team_playres = json_encode($req->playersjson); 
		$captain_id=$req->captainid;
		$vicecaptain_id=$req->vicecaptainid;
		$selected_replace_player_id=$req->selected_replace_player_id;
		$selected_substitute_player_id=$req->selected_substitute_player_id;
		$team_no=$req->team_no;
		
		
		
		 $check=DB::table('fantasy_user_create_team')
			   ->whereuser_id(Auth::user()->id)
			   ->wherematch_id($match_id)
			   ->whereteam_players($team_playres)
			   ->wherecaptain($captain_id)
			   ->wherevice_captain($vicecaptain_id)
			   ->get(); 
			 //  $alr=$req->playersjson;
	
	/* foreach($check as $d_team)
	{
	$db_pl=json_decode($d_team->team_players);
	
	print_r($db_pl);
		
	}			   
		 */
		
		if(count($check)==0)
		{
		
		$insert=DB::table('fantasy_user_create_team')->insert([
		"user_id" => $user_id,
		"match_id" => $match_id,
		"team_players" => $team_playres, 
		"team_players_points" => 0,
		"team_no" => $team_no,
		"captain" => $captain_id,
		"vice_captain" => $vicecaptain_id,
		"replace_player" => $selected_replace_player_id,
		"substitute" => $selected_substitute_player_id
		]);
		
		
		
		
		
		
		
		Session::flash('match_success','Your match created Successfully, now you can join contest');
		
		}
		else
		{
			Session::flash('match_fail','Already exist');
		}
		
		 //return back();
		//return redirect('main');
	}
	
	
	function user_update_team_post(Request $req)
	{
		$user_id=Auth::user()->id;
		$match_id=$req->matchid;
		$team_playres = json_encode($req->playersjson); 
		$captain_id=$req->captainid;
		$vicecaptain_id=$req->vicecaptainid;
		//$selected_replace_player_id=$req->selected_replace_player_id;
		//$selected_substitute_player_id=$req->selected_substitute_player_id;
		$team_no=$req->teamno;
		


		$check=DB::table('fantasy_user_create_team')
			   ->whereuser_id(Auth::user()->id)
			   ->wherematch_id($match_id)
			   ->whereteam_players($team_playres)
			   ->wherecaptain($captain_id)
			   ->wherevice_captain($vicecaptain_id)
			   ->get(); 
		if(count($check)==0)
		{
		$insert=DB::table('fantasy_user_create_team')->wherematch_id($match_id)->whereuser_id($user_id)->whereteam_no($team_no)->update([
		"user_id" => $user_id,
		"match_id" => $match_id,
		"team_players" => $team_playres, 
		"team_players_points" => 0,
		"team_no" => $team_no,
		"captain" => $captain_id,
		"vice_captain" => $vicecaptain_id,
		//"replace_player" => $selected_replace_player_id,
		//"substitute" => $selected_substitute_player_id
		]);
		Session::flash('match_success','Your Team created Successfully, now you can join contest');
		
		}
		else
		{
			Session::flash('match_fail','Already exist');
		}
		//$data['content']="success";
		
		 //return back();
		//return redirect('main');
	}
	
	
	function user_join_contest(Request $req)
	{
		$user_id=Auth::user()->id;
		$match_id=$req->matchid;
		$contest_id = $req->contestid;
		$team_id=$req->teamid; 
		$contest_amount=Contest::whereid($req->contestid)->first();
		$already_exist_team=DB::table('fantasy_user_join_contest')->where([
		"user_id" =>$user_id,
		"contest_id" =>$contest_id,
		"match_id" =>$match_id,
		"team_id" =>$team_id 
		])->count();
		
		if($already_exist_team==0)
		{
		
		if($contest_amount->is_practise_contest!=1)
		{
			$minus_val=Auth::user()->credit_point-$contest_amount->enterence_amount;
			$credit=DB::table('fantasy_user_create_team')->whereuser_id(Auth::user()->id)->whereid($team_id)->first();
			if($credit->substitute!='')
			{
	$minus_val=Auth::user()->credit_point-10;
	
			}
			if($minus_val>=0)
			{
			$enterance_credit=$contest_amount->enterence_amount;
			$user_credit=Auth::user()->credit_point;
			$update_credit=$user_credit-$enterance_credit;
		
		    $update=User::findorFail(Auth::user()->id);
			if($credit->substitute!='')
			{
			$update->credit_point=$update_credit-10;
			}
			else
			{
			$update->credit_point=$update_credit;
			}
			$update->save();
			
	
		$insert=DB::table('fantasy_user_join_contest')->insert([
		"user_id" => $user_id,
		"match_id" => $match_id,
		"team_id" => $team_id,
		"contest_id" => $contest_id
		
		]);
		
		 return response()->json([
	   "message"=>"success"
	   ]);
			}
			else
			{
			  return response()->json([
	   "message"=>"failure"
	   ]);
			}
		}
		else{
		$insert=DB::table('fantasy_user_join_contest')->insert([
		"user_id" => $user_id,
		"match_id" => $match_id,
		"team_id" => $team_id,
		"contest_id" => $contest_id 
		]);
		
		 return response()->json([
	   "message"=>"success"
	   ]);
		}
		
		}
		
		
		else 
			
			{
				 return response()->json([
	   "message"=>"already_exist"
	   ]);
		}
		
		//$data['content']="success";
		
		 //return back();
		//return redirect('main');
	}
	
	function select_view_team(Request $req)
	{
		
		
		$data['team_players']=DB::table('fantasy_user_create_team')->whereid($req->selteamid)->first();
		$data['team']=$req->selteam;
		
	$data['all_players']=DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->get();
		 
		return view('website.user.ajaxselectviewteam',$data);
	}
	function edit_team($id,$matchid,$team_no)
	{
		
		$data['team_id'] = base64_decode($id);
		 $data['match_id'] = base64_decode($matchid);
		 $data['team_no'] = base64_decode($team_no);
		
		
		$data['team_edit_list']=DB::table('fantasy_team_players')->where('match_id',$data['match_id'])->get();
		$data['user_team']=DB::table('fantasy_user_create_team')->where('id',$data['team_id'])->first();
	//	print_r($data['team_edit_list']);
		return view('website.user.edit_team',$data);
	}
	function insert_selected_player(Request $req)
	{
		 $insert=DB::table('fantasy_team_selected_players')->insert([
		"user_id" => Auth::user()->id,
		"match_id" => $req->matchid,
		"player_id" => $req->pid,
		"team_no" => $req->teamno

		]);
		
	}
	function delete_selected_player(Request $req)
	{
		 $delete=DB::table('fantasy_team_selected_players')->wherematch_id($req->matchid)->whereplayer_id($req->pid)->whereteam_no($req->teamno)->whereuser_id(Auth::user()->id)->delete(); 
		
	}	
	function selected_team_player(Request $req)
	{
		$data['matchid']=$req->matchid;
		$data['team_no']=$req->team_no;
		$data['cid']=$req->cid;
		$data['vicecaptain_id']=$req->vicecaptain_id;
		
		 $data['selected_players']=DB::table('fantasy_team_selected_players')
		                         ->select('player_id')
								 ->wherematch_id($req->matchid)
								 ->whereteam_no($req->team_no)
								 ->whereuser_id(Auth::user()->id)
								// ->where('player_id','!=',$req->cid)
								// ->where('player_id','!=',$req->vicecaptain_id)
								 ->get();  
								// print_r( $data['selected_players']);
								 
		/* $data['captain_vicecaptain']=DB::table('fantasy_user_create_team')
		                            ->select('captain','vice_captain')
									->wherematch_id($req->matchid)
		                            ->get(); */
								
		
		$data['team_players']=DB::table('fantasy_team_players')->select('player_id')
		->wherematch_id($req->matchid)
		->get();
		 
		foreach($data['selected_players'] as $dd)
		{ 
		$ddsel[]=$dd->player_id;
		}
		foreach($data['team_players'] as $bb)
		{ 
		$ddtea[]=$bb->player_id;
		}
		
		$data['substitute_players']=array_diff($ddtea,$ddsel);
		//print_r($ddbb);
		//exit;
		 /* $data['non_selected_players']=DB::table('fantasy_team_players')->whereNotExists(function($query)
            {
                $query->select(DB::raw('*'))
                      ->from('fantasy_team_selected_players')
                      ->whereRaw('fantasy_team_selected_players.player_id = fantasy_team_players.player_id')
                      ->whereRaw('fantasy_team_selected_players.match_id = fantasy_team_players.match_id');
                      //->whereRaw('fantasy_team_selected_players.user_id',Auth::user()->id);
                     // ->whereRaw('fantasy_team_selected_players.team_no',$req->team_no);
            })
            ->get(); */
		return view('website.user.ajaxnonselectedplayers',$data);
	
	}
	public function winner_list()
	{
		//$today = date('Y-m-d').'%';
		$today = date('2017-11-11').'%';
	//	echo $today;
		$mat_contest=Match::where('date','like',$today)->get();
		//$mat_contest=Match::all();
		foreach($mat_contest as $s)
		{
		 $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&unique_id='.$s->unique_id);
		 $cricketMatches = json_decode($cricketMatchesTxt);
		 foreach($cricketMatches->data as $item) {
			 
			 if (array_key_exists("winner_team",$cricketMatches->data))
			 {
		 		 $con=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->get();
				 
				
				// echo count($con);
				 //print_r($con);
				 foreach($con as $c)
				 {
					 $contest=Contest::where('id',$c->contest_id)->whereis_practise_contest(0)->get();
					// print_r($contest);
					 foreach($contest as $test)
					 {
						
						 
						 
						 $con_1=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->wherecontest_id($test->id)->get();
						 
						
						  $al_exist=DB::table('fantasy_user_winning_details')->wherematch_id($s->unique_id)->wherecontest_id($test->id)->get();
									if(count($al_exist)==0)
									{	 
						 foreach($con_1 as $mans)
						 {
							// $vals = array_count_values($mans->rank);
						//print_r($vals);
							 
							$winning_amount=json_decode($test->prize_list);
							$rank_list=json_decode($test->rank_list);
							
							//	$i=0;
							foreach($rank_list as $index => $rank)
							{
								
							
								
								if($rank==$mans->rank)
								{
									 
						 $test_count=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->wherecontest_id($test->id)->groupby('rank')->select(DB::raw("COUNT(rank) count,rank"))->get();
						print_r($test_count); 
						
									for($i=0;$i<count($test_count);$i++)
									{
									if($test_count[$i]->rank==$mans->rank)
									{
									echo	$no_winner=$test->no_winner;
									echo	$rank_minus=$mans->rank-1;
										
									echo $c_dcup=$test_count[$i]->count;
									//stdobject array convert in to array
									$array =  (array) $winning_amount;
									
									//exit;
		 							$output = array_slice($array,$rank_minus, $c_dcup-1);
									print_r($output);
									$divide_amount=array_sum($output);
								$user_get=$divide_amount/$c_dcup;
									
									
									//else
									//{
								 	//$user_get=$winning_amount[$index];
									//}
									
									$insert_winning=DB::table('fantasy_user_winning_details')->insert([
									'match_id'=>$s->unique_id,
									'contest_id'=>$test->id,
									'user_id'=>$mans->user_id,
									'rank'=>$mans->rank,
									'amount'=>$user_get
									]);
									
									
									
									$current_user=User::whereid($mans->user_id)->first();
									$update_amount=$user_get+$current_user->user_wallet_current_amount;
									
									$update=User::findorFail($mans->user_id);
									$update->user_wallet_current_amount=$update_amount;
									$update->save();
									
									
									if($insert_winning)
		  {
	$data['admin'] = array('name'=>$current_user->name, 'email'=>$current_user->email, 'rank'=>$mans->rank, 'amount'=>$user_get, 'from' => 'contact@leaguerocks.com', 'from_name' => 'League Rocks','type' => 'admin' );	
		Mail::send( 'website.user.winnermail', $data, function( $message ) use ($data)
		{
   
 
		$message->to($data['admin']['email'],'League Rocks' )->from( $data['admin']['from'], 'League Rocks' )->subject('Acknowledgement!!');
 
		});
	
	
		  }
								}
								
									}
									
									
								}
								//$i++;	
							}
							
								
								
							
							
									}
								
							 
						 }
						 
						
						 
					 }
				 }
			
				 
			 }
		 
		}
		}
		//print_r($data['mat_contest']);
	//	exit;
		
	}
	
  
	 
	 public function change_series(Request $request)
	 {
		$series= $request->series;
		Session::put('series',$series);
		//echo Session::get('series');
		
		/* 	if($series=="all")
		{
			$data['match'] = Match::whereis_active(1)->get();
		}
       else 
       {		
	$data['match'] = Match::where('series_id',$request->input_field)->whereis_active(1)->get();
       }
		 */
		
		return back();
	 }
public function capcha()
{
return view('website.login.captcha_code');
}
public function scorecard()
{

return view('website.user.score_card',compact('score'));
}

//Live score
public function uscore()
{

return view('website.user.livescore');
}
public function uresult()
{

return view('website.user.result');
}
public function lscore()
{

return view('website.login.livescore');
}
public function lresult()
{

return view('website.login.result');
}


public function resnd_verifyotp(Request $request)
{
$dat2=User::findorfail(Auth::user()->id);
 
				 
			  $token = mt_rand(100000, 999999);
			
			 
		 $mobilenumbers=$request->mobile;
			
			//enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			$message = urlencode("Hi $dat2->name, Your OTP is $token");  //enter Your Message
			
	$user="shakthitech"; 
$password="123456";
$senderid="SHAKTI";
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 

$bank=BankVerify::wheremobile_no($request->mobile)->whereuser_id(Auth::user()->id)->update(['otp'=>$token]);


if($bank)
{
return response()->json([
	   "message"=>"success"
	   ]);
			}
			else
			{
			  return response()->json([
	   "message"=>"failure"
	   ]);


			}










}
public function player_pts($id)
{
$data['players']=DB::table('fantasy_team_players')->where('match_id',$id)->get();
foreach($data['players'] as $player)
{
 $data['play']=DB::table('fantasy_pointupdate_test')->where('match_id',$id)->where('player_id',$player->player_id)->get();
	print_r($data['play']);
	
	
	/* foreach($data['play'] as $plays)
	{
	$bat=json_decode($plays->batting);
	print_r($bat); */
	}
	//print_r($data['play']);
//	exit; 

	/* $bat=json_decode($players->batting);
		
	$ball=json_decode($players->bowling);
	$field=json_decode($players->fielding); */


		


return view('website.points_table',$data);



}






}

//
/*public function u_faq()
{
	//$data['id']=$id;
	return view('website.login.faq');
}*/
