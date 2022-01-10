<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use Datatables;	
use DB;

class WinnerController extends Controller
{
    
	public function index()
    {
       return view('admin.winners.index');
    
    
    }
	
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users = DB::table('fantasy_user_join_contest')
	         ->join('fantasy_contests','fantasy_user_join_contest.contest_id','=','fantasy_contests.id')
	         ->join('users','fantasy_user_join_contest.user_id','=','users.id')
			 ->select('fantasy_user_join_contest.*', 'fantasy_contests.name as contest_name', 'fantasy_contests.match_date', 'fantasy_contests.prize_list', 'users.name as user_name')
	         //->where('users.id', '=', 'fantasy_user_join_contest.user_id')
			 //->where('fantasy_contests.match_id', '=', 'fantasy_user_join_contest.match_id')
			 ->where('fantasy_contests.is_practise_contest', '=', 0)
			 ->get();
			 
	
						  
				
	return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.winners', compact('users'))->render();}) ->make(true);
		
		
    }
	
	public function show($id)
    {
        
		$data['matches'] = DB::table('fantasy_contests')
	         ->leftjoin('fantasy_user_join_contest','fantasy_user_join_contest.contest_id','=','fantasy_contests.id')
	         ->leftjoin('users','fantasy_user_join_contest.user_id','=','users.id')
			 ->select('fantasy_user_join_contest.*', 'fantasy_contests.name as contest_name', 'fantasy_contests.match_date', 'fantasy_contests.prize_list', 'users.name as user_name')
	         //->where('users.id', '=', 'fantasy_user_join_contest.user_id')
			 //->where('fantasy_contests.match_id', '=', 'fantasy_user_join_contest.match_id')
			 ->where('fantasy_contests.is_practise_contest', '=', 0)
			 ->where('fantasy_user_join_contest.id', '=', $id)
			 ->first();  
				 
		/* $data['matches']=DB::table('fantasy_user_join_contest')
		                ->join('users','fantasy_user_join_contest.user_id','=','users.id')
						->select('fantasy_user_join_contest.*', 'users.name as user_name')
						//->where('users.id', '=', 'fantasy_user_join_contest.user_id')
			            ->first(); 
			
	    $data['name']=DB::table('fantasy_contests')
		         ->select( 'fantasy_contests.name as contest_name', 'fantasy_contests.match_date', 'fantasy_contests.prize_list')
		         ->where('is_practise_contest', '=', 0)
			     ->first();  */
 
		
         return view('admin.winners.show',$data);
    }
	
}
