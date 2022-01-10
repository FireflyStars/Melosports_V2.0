<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use Datatables;	
use DB;

class UserPaymentController extends Controller
{
    
	public function index()
    {
       return view('admin.user_payment.index');
    
    
    }
	
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users =DB::table('fantasy_user_payment')
	                       ->where('payment_status', 'Credit')
                           ->get();
						  
						  
	return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.payment', compact('users'))->render();}) ->make(true);
		
		
    }
	
	public function show($id)
    {
        $data['matches']=DB::table('fantasy_user_payment')
		         ->where('payment_status', 'Credit')
		         ->whereid($id) 
			     ->first();
			
	   /*  $name=DB::table('fantasy_user_payment')
                 
			     ->first();
 */
		
         return view('admin.user_payment.show',$data);
    }
	
}
