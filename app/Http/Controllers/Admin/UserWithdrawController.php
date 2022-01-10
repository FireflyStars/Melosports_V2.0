<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\WithdrawRequest;use App\WithdrawPts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Session;
use Datatables;	
use DB;
use Twilio;
use Services_Twilio;
Use App\User;
Use App\SmsSetting;
Use App\SiteSetting;

class UserWithdrawController extends Controller
{
    
	public function index()
    { 
	
	   return view('admin.user_withdraw.index',compact('user'));
    
    }
	
	public function datatable_content()
    { 
	 if (! Gate::allows('matches_access')) {
            return abort(401);
        }
	 $users =DB::table('users')
	        ->join('fantasy_user_withdraw', 'users.id', '=', 'fantasy_user_withdraw.user_id')
	        ->join('fantasy_user_bankdetails', 'fantasy_user_withdraw.user_id', '=', 'fantasy_user_bankdetails.user_id')
			//->where('fantasy_user_withdraw.deposite_status','=',0)
			//->where('fantasy_user_bankdetails.bank_verify_status','=',1)
            ->select('users.*', 'fantasy_user_withdraw.*', 'fantasy_user_bankdetails.bank_name','fantasy_user_bankdetails.branch_name','fantasy_user_bankdetails.bank_acc_no','fantasy_user_bankdetails.ifsc_code')
            ->get();
     			
						  
						  
	return Datatables::of($users)
           ->addColumn('action', function ($users){return view('admin.button.withdraw', compact('users'))
		   ->render();}) 
		   ->make(true);
		
		
    }
	
	public function show($id)
    {
        $matches=DB::table('fantasy_user_withdraw')
			     ->first();
			
	    $name=DB::table('users')
                 ->where('id','=', $id)
			     ->first();

		
         return view('admin.user_withdraw.show',compact('matches'),compact('name'));
    }
	
	public function withdraw_process(Request $request)
	{
	$id=$request->active_id;
	
		$exist=WithdrawRequest::whereid($id)->first();
		if($exist->deposite_status==0)
		{
		$active=WithdrawRequest::whereid($id)->update([
		'deposite_status' =>1,
		'deposited_on' =>date('Y-m-d h:i:s'),
		]);
		Session::flash('info','Withdraw Successful');
		}
			return back();
	}
	public function withdraw_sms($id,$us)
	{
	
	 
 
 $sms_senderid=SmsSetting::findorfail(1);
 $site=SiteSetting::findorfail(1);
 $site_name=$site->site_name;
 
  $name=User::findorfail($us);
 $user=$name->name;
 
 
 if($sms_senderid->enable_status==0)
 { 
 if($sms_senderid->ninems_status==0)
{
$authKey =$sms_senderid->ninems_credentials['auth'] ;

//Multiple mobiles numbers separated by comma
$mobileNumber =$name->mobile_number;

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId =$sms_senderid->ninems_credentials['s_id'];

//Your message to send, Add URL encoding here.
//$message =urlencode("Hi $name->name, Your OTP is $token");
 $message = urlencode("Dear".$user.",\n Your withdraw request has been processed. Your amount will be transferred shortly.\n Regards \n".$site_name);
//Define route 
$route =4;
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://www.91sms.in/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

}

else if($sms_senderid->twilio_status==0)
{

//$message =urlencode("Hi $name->name, Your OTP is $token");
 $message = urlencode("Dear ".$user.",\n Your withdraw request has been processed. Your amount will be transferred shortly.\n Regards \n".$site_name);
$mobilenumber =$name->mobile_number;
 $accountId=$sms_senderid->twilio_credentials['s_id'];
$token=$sms_senderid->twilio_credentials['token'];
$fromNumber=$sms_senderid->twilio_credentials['t_no'];

$client = new \Services_Twilio($accountId, $token);

$message = $client->account->messages->sendMessage(
   $fromNumber,$mobilenumber,$message
	 
	 );


}
else if($sms_senderid->shakthi_status==0)
{

$mobilenumbers=$name->mobile_number;
			//enter Mobile numbers comma seperated//$mobilenumbers=8015886788; //enter Mobile numbers comma seperated
			//$message = urlencode("Hi $name->name, Your OTP is $token");  //enter Your Message
		 $message = urlencode("Dear ".$user.",\n Your withdraw request has been processed. Your amount will be transferred shortly.\n Regards \n".$site_name);	
	$user="shakthitech"; 
$password="123456";
$senderid=$sms_senderid->shakthi_credential;
$messagetype="ndnd";
$smstype="normal";
 
$url = "http://message.mrads.in/api/sendmsg.php?user=$user&pass=$password&sender=$senderid&phone=$mobilenumbers&text=$message&priority=$messagetype&stype=$smstype";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch); 




}
else{
	
	//return '<p style="color:red">Sms Gateway Not Enabled By	Admin </p>';
	 Session::flash('fail','Sms Gateway Not Enabled By	Admin');
        return back();
}

}
else{
	
	//return '<p style="color:red">Sms Gateway Not Enabled By	Admin </p>';
	 Session::flash('fail','Sms Gateway Not Enabled By	Admin');
        return back();
}
 
$var=DB::table('fantasy_user_withdraw')->where('id',$id)->where('user_id',$us)->update(['deposite_status'=>1]);
$active=WithdrawRequest::whereid($id)->update([
		
		'deposited_on' =>date('Y-m-d h:i:s'),
		]);
	
	return back();
	
 }	
	
	
	
			
	public function withdray_playpt()
	{		
	$users =DB::table('users')	 
	->join('withdraw_playpt', 'users.id', '=', 'withdraw_playpt.user_id')
	->join('fantasy_user_bankdetails', 'withdraw_playpt.user_id', '=', 'fantasy_user_bankdetails.user_id')	 
	->select('users.*', 'withdraw_playpt.*', 'fantasy_user_bankdetails.bank_name','fantasy_user_bankdetails.branch_name','fantasy_user_bankdetails.bank_acc_no','fantasy_user_bankdetails.ifsc_code')->get();	
	return view('admin.user_withdraw.pt_withdraw');					
	}		
	public function datatablept_content()	
	{	 
	if (! Gate::allows('matches_access')) { 
	return abort(401);       
	}	
	$users =DB::table('users')	   
	->join('withdraw_playpt', 'users.id', '=', 'withdraw_playpt.user_id')	        		
	->select('users.*', 'withdraw_playpt.play_pt','withdraw_playpt.amount','withdraw_playpt.status as pt_status',
	'withdraw_playpt.user_id','withdraw_playpt.id as withdraw_id')->get();			      									  						
  	return Datatables::of($users)->addColumn('action',function ($users){
		return view('admin.button.pt_withdraw', compact('users'))->render();
		})->make(true);		
	}
	public function pt_withdraw_process(Request $request)
	{
		$with=WithdrawPts::findorfail($request->active_id);
		$with->status=1;
		$with->save();
		$user=User::findorfail($with->user_id);
		$user->user_wallet_current_amount+=$with->amount;
		$user->save();
		
		
		Session::flash('info','Withdraw accepted  Successfully');
		return back();
		}
		
		public function pt_withdraw_decline(Request $request)
		{
			
			$with=WithdrawPts::findorfail($request->active_id);
			$with->status=2;
			$with->save();
			$user=User::findorfail($with->user_id);
			$user->credit_point+=$with->play_pt;
			$user->save();
			Session::flash('info','Withdraw declined Successfully ');
			return back();}		
	
}
