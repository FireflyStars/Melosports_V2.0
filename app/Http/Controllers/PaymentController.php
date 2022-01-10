<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\PaymentSetting;
use App\User;
use App\Match;
use App\Contest;
use App\CreditPurchase;
use App\PaymentUser;
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
use Instamojo;

 


class PaymentController extends Controller
{ 
public function insta_post(Request $request)
{ 

$pay_apikey=PaymentSetting::findorfail(1);
$apikey=$pay_apikey->instamojo_credential['api_key'];
$auth=$pay_apikey->instamojo_credential['auth'];

if($pay_apikey->test_instamojo==0)
{
$url='https://test.instamojo.com/api/1.1/payment-requests/';

}
else
{
$url='https://www.instamojo.com/api/1.1/payment-requests/';
}

 $ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$apikey",
                  "X-Auth-Token:$auth"));

				  $payload = Array(
   
	'purpose' => 'Create Contest',
    'amount' => $request->payment_amount,
    'phone' =>$request->mobile_no ,
    'buyer_name' => $request->name,
    'redirect_url' =>url('insta-success'),
    'send_email' => false,
    'webhook' => url('response'),
    'send_sms' => false,
    'email' => $request->email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

/* print_r($response);
exit; */
$data=json_decode($response,true);
return redirect($data['payment_request']['longurl']);  
   
   }
   public function insta_success(Request $request)
{
	//return $request->all();
//echo	$request->payment_request_id;
$pay_apikey=PaymentSetting::findorfail(1);
$apikey=$pay_apikey->instamojo_credential['api_key'];
$auth=$pay_apikey->instamojo_credential['auth'];

	$api = new Instamojo\Instamojo($apikey, $auth);
	try {
    $response = $api->paymentRequestStatus($request->payment_request_id);
  //  print_r($response);
$data=PaymentUser::wheretransaction_id($response['payments'][0]['payment_id'])->get();
   if(count($data)==0)
   {
	
	$pay=New PaymentUser;
		$pay->user_id=Auth::user()->id;
		$pay->payment_amount=$response['amount'];
		$pay->transaction_id=$response['payments'][0]['payment_id'];
		$pay->mobile_no=$response['payments'][0]['buyer_phone'];
		$pay->email=$response['payments'][0]['buyer_email'];
		$pay->name=$response['payments'][0]['buyer_name'];
		$pay->payment_method='card';
		$pay->payment_status=$response['payments'][0]['status'];
		$pay->save();
		
		if($response['payments'][0]['status']=='Credit')
		{
		$user_wallet_current_amount=(Auth::user()->user_wallet_current_amount) + $response['amount'];
		
	$con=User::whereid(Auth::user()->id)->update([ 'user_wallet_current_amount' =>$user_wallet_current_amount]);
		}	
   }
		
	$dat['det']=$response['payments'][0]['status'];
	$dat['tra']=$response['payments'][0]['payment_id'];
	return view('website.user.instamojo_success',$dat);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
}
public function insta_response(Request $request)
{
	$pay_apikey=PaymentSetting::findorfail(1);
$salt=$pay_apikey->instamojo_credential['salt'];

	
$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}
// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without <>
$mac_calculated = hash_hmac("sha1", implode("|", $data), "$salt");
if($mac_provided == $mac_calculated){
    if($data['status'] == "Credit"){
        $pay=New PaymentUser;
		$pay->user_id=Auth::user()->id;
		$pay->payment_amount=$data['payment_amount'];
		$pay->transaction_id=$data['payment_id'];
		$pay->mobile_no=$data['mobile_no'];
		$pay->email=$data['email'];
		$pay->name=$data['buyer_name'];
		$pay->payment_method='card';
		$pay->save();
		return redirect('details');
    }
    else{
        $pay=New PaymentUser;
		$pay->user_id=Auth::user()->id;
		$pay->payment_amount=$data['payment_amount'];
		$pay->transaction_id=$data['payment_id'];
		$pay->mobile_no=$data['mobile_no'];
		$pay->email=$data['email'];
		$pay->name=$data['buyer_name'];
		$pay->payment_method='card';
		$pay->save();
		return redirect('details');
		
		
    }
}
else{
    echo "MAC mismatch";
	$pay=New PaymentUser;
		$pay->user_id=Auth::user()->id;
		$pay->payment_amount=$data['payment_amount'];
		$pay->transaction_id=$data['payment_id'];
		$pay->mobile_no=$data['mobile_no'];
		$pay->email=$data['email'];
		$pay->name=$data['buyer_name'];
		$pay->payment_method='card';
		$pay->save();
}



}
public function details()
{
Print_r('failure');
exit;

}

public function payment_post(Request $request)
{
	$pay_apikey=PaymentSetting::findorfail(1);
$merchant=$pay_apikey->payu_credential['merchant'];
$secret=$pay_apikey->payu_credential['secret'];
	if($pay_apikey->payu_test==0)
	{
	$test=true;
	$amount=1;
	}
	else{
	
		$test=false;
		$amount=$request->payment_amount;

	}
	
	$payumoney = new PayUMoney([
    'merchantId' =>$merchant,
    'secretKey'  => $secret,
    'testMode'   => $test
]);

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
// All of these parameters are required!


		
$params = [
    'txnid'       => $txnid,
    'amount'      => $amount,
    'productinfo' => 'purchase',
    'firstname'   => $request->name,
   // 'address'   => $request->address,
    'email'       => $request->email,
    'phone'       => $request->mobile_no,
    'surl'        => url('payu-success'),
    'furl'        =>  url('payu-failed'),
];

// Redirects to PayUMoney
$payumoney->initializePurchase($params)->send();
	
	
}




public function payu_success()
{
	
	$pay_apikey=PaymentSetting::findorfail(1);
$merchant=$pay_apikey->payu_credential['merchant'];
$secret=$pay_apikey->payu_credential['secret'];
	if($pay_apikey->payu_test==0)
	{
	$test=true;
	
	}
	else{
	
		$test=false;
		
	}
	
	$payumoney = new PayUMoney([
   'merchantId' => $merchant,
    'secretKey'  => $secret,
    'testMode'   => $test
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
  
  if($staus=='Completed' || $staus=='success')
		{
		$user_wallet_current_amount=(Auth::user()->user_wallet_current_amount) + $parm['amount'];
		
	$con=User::whereid(Auth::user()->id)->update([ 'user_wallet_current_amount' =>$user_wallet_current_amount]);
		}	
$tras=$parm['txnid'];

 
  return view('website.user.paytm_success',compact('tras')); 
 
  }

public function payu_failure()
{


 return view('website.user.paytm_failure');


}


public function paypal_success()
{

$data["item_transaction"] = $_GET['tx'];
 $data["item_price"] = $_GET['amt'];
 $data["item_currency"] = $_GET['cc'];
 //$data["subscription_status"] = $_GET['st'];
 
 $pay=New PaymentUser;
		$pay->user_id=Auth::user()->id;
		$pay->payment_amount=$data['item_price'];
		$pay->transaction_id=$data["item_transaction"];
		$pay->mobile_no=Auth::user()->mobile_number;
		$pay->email=Auth::user()->email;
		$pay->name=Auth::user()->name;
		$pay->payment_method='card';
		$pay->payment_status='completed';
		$pay->save();
$user_wallet_current_amount=(Auth::user()->user_wallet_current_amount) +  $data["item_price"];
		
	$con=User::whereid(Auth::user()->id)->update([ 'user_wallet_current_amount' =>$user_wallet_current_amount]);
	
	$tras=$data["item_transaction"];

 return view('website.user.paytm_success',compact('tras')); 

}

public function paypal_failure()
{
	
	return view('website.user.paytm_failure');
	
	
	
}


















}
