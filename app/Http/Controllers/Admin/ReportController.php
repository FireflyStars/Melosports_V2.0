<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Match;
use App\FaqQuestion;
use App\Contest;
use App\CreditPurchase;
use App\PaymentUser;
use App\Fantasyinvite;
use App\WithdrawRequest;
use App\BankVerify;
use PaytmWallet;
use DateTime;
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


class ReportController extends Controller
{ 

public function income_index()
{


return view('admin.reports.report_index');



}


public function ajax_index(Request $request)
{
//echo $request->start_date;

$fdate = $request->start_date;
$tdate = $request->to_date;

return view('admin.reports.ajax_income_rep',compact('fdate','tdate'));

}

public function win_index()
{


return view('admin.reports.winner_index');



}


public function match_index()
{


return view('admin.reports.match_index');



}







public function ajax_win(Request $request)
{
//echo $request->start_date;

$fdate = $request->start_date;
$tdate = $request->to_date;

return view('admin.reports.ajax_win_rep',compact('fdate','tdate'));

}


public function ajax_mat(Request $request)
{
//echo $request->start_date;

$fdate = $request->start_date;
$tdate = $request->to_date;

return view('admin.reports.ajax_mat_rep',compact('fdate','tdate'));

}
public function dateval(Request $request)
	{
	/* echo "sfdsf";
exit; */
	$data['fdate'] = $request->start_date;
$data['tdate'] = $request->to_date;
return view('home',$data);
	
	
	
	
	}
	public function dateus(Request $request)
	{
	/* echo "sfdsf";
exit; */
	$data['fdate1'] = $request->start_date;
$data['tdate1'] = $request->to_date;
return view('home',$data);
	
	
	
	
	}



}