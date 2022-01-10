<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Admin;
use App\SiteSetting;
use App\CurrencySetting;
use App\Support;
use App\PaymentSetting;
use App\SmsSetting;
use App\Currency;
use App\SocialSetting;
use Auth; 
use Session;
use Hash; 
use File;
use DB;
use Mail;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response 
     */
    public function profile_set()
    {
		  if (! Gate::allows('user_access')) {
            return abort(401);
        }
        
		$users=Admin::findorfail(Auth::user()->id);

	   return view('admin.settings.profile_set',compact('users'));
    }
	public function profile_save(Request $request)
    {
        
		  if (! Gate::allows('user_access')) {
            return abort(401);
        }
		$user=Admin::findorfail(Auth::user()->id);
		$user->name=$request->name;
		$user->email=$request->email;
		$user->city=$request->city;
		$user->address=$request->address;
		$user->zip_code=$request->zip_code;
		
		 if(!env('DEMO_MODE')) {
		 if ($request->hasFile('image')) {
$image = $request->file('image');
		 

    
	$img= time().'.'.$image->getClientOriginalExtension();

     $request->image->move(public_path('admin/admin_image'),$img);
$user->admin_image=$img;

	   }
	}
		
		if(isset($request->password))
		{
		
	$user->password=bcrypt($request->password);
		
		
		}
		$user->save();
		
		Session::flash('success', 'Your profile have been updated!!'); 
		
		return back();
    }
	public function site_set()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
		$users=SiteSetting::findorfail(1);

	  return view('admin.settings.site_set',compact('users'));
    }
	public function save_site(Request $request)
	{
		
		  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	$user=SiteSetting::findorfail(1);
	$user->site_name=$request->site_name;
	$user->meta_keyword=$request->meta_keyword;
	$user->meta_description=$request->description;
	$user->website=$request->website;
	$user->footer_text=$request->footer_text;
	$user->terms_condition=$request->terms_condition;
	$user->privacy_policy=$request->privacy_policy;
	$user->social_links=$request->social_links;
	$user->address=$request->address;
	$user->city=$request->city;
	$user->zip_code=$request->zip_code;
	$user->user_pts=$request->user_pts;
	$user->email=$request->email;
	$user->support_email=$request->support_email;
	$user->phone=$request->phone;
	$user->minimum_wallet_amount=$request->minimum_wallet_amount;
	$user->minimum_play_point=$request->minimum_play_point;

	// if(!env('DEMO_MODE')) {
	 if ($request->hasFile('site_logo')) {

	 
	 $file = $request->file('site_logo');
            if(isset($file) && $file->isValid()){
                $name = 'logo.png';
                File::move($file->getRealPath(), public_path().'/adminlte/site_image/'.$name);
	 $target_path=public_path() . '/adminlte/site_image/' . $name;
				chmod($target_path, 0644);
$user->site_logo=$name;

	   }
	}
	//}
	   


$user->save();	   
	
	if($request->favicon){
            $file = $request->file('favicon');
            if(isset($file) && $file->isValid()){
                $name = 'favicon.ico';
                File::move($file->getRealPath(), public_path() . '/' . $name);
				 $target_path=public_path() . '/' . $name;
				chmod($target_path, 0644);
            }
        }
	
	Session::flash('success', 'Site settings have been updated!!'); 
		
		return back();
	
	}
	
	
	public function pay_set()
	{
		
		  if (! Gate::allows('user_access')) {
            return abort(401);
        }
$user=PaymentSetting::findorfail(1);
	return view('admin.settings.payment_set',compact('user'));
	
	
	
	}
	public function save_pay(Request $request)
	{
	
	  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	$pay=PaymentSetting::findorfail(1);
	$pay->gateway_status=$request->gateway_status;
	
	$pay->pay_pal_status=$request->pay_pal_status;
	$pay->pay_pal_credential=$request->pay_pal_credential;
	$pay->payu_test=$request->payu_test;
	$pay->payu_status=$request->payu_status;
	
	$pay->payu_credential=$request->payu_credential;
	
	$pay->instamojo_status=$request->instamojo_status;
	$pay->test_instamojo=$request->test_instamojo;
	$pay->instamojo_credential=$request->instamojo_credential;
	
	$pay->save();
	
	Session::flash('success', 'Payment settings have been updated!!'); 
		
		return back();
	
	
	}
	
	
	public function sms_set()
	{
	  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	
	$user=SmsSetting::findorfail(1);
	return view('admin.settings.sms_set',compact('user'));
	}
	
	
	public function save_sms(Request $request)
	{
	
	  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	$sms=SmsSetting::findorfail(1);
	$sms->enable_sms=$request->enable_sms;
	
	if($request->sms_gateway==1)
	{
	
	$sms->ninems_status=0;
	$sms->twilio_status=1;
	$sms->shakthi_status=1;
	
	} elseif($request->sms_gateway==2){
	
	
	$sms->twilio_status=0;
	$sms->shakthi_status=1;
	$sms->ninems_status=1;
	}
	elseif($request->sms_gateway==3){
	
	
	$sms->twilio_status=1;
	$sms->shakthi_status=0;
	$sms->ninems_status=1;
	}
	
	else
	{
	
	$sms->ninems_status=1;
	$sms->twilio_status=1;
	$sms->shakthi_status=1;
	
	}
	
	
	$sms->ninems_credentials=$request->ninems_credentials;
	
	$sms->twilio_credentials=$request->twilio_credentials;
	$sms->shakthi_credential=$request->shakthi_credential;
	$sms->save();
	Session::flash('success', 'Sms settings have been updated!!'); 
		
		return back();
	
	
	
	
	}
	
	public function social_set()
	{
		
		  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	$user=socialSetting::findorfail(1);
	return view('admin.settings.social_set',compact('user'));
	
	
	}
	
	public function save_social(Request $request)
	{
	
	
	  if (! Gate::allows('user_access')) {
            return abort(401);
        }
	$pay=SocialSetting::findorfail(1);
	//$pay=new SocialSetting;
	$pay->fb_status=$request->fb_status;
	$pay->fb_credential=$request->fb_credential;
	$pay->gmap_status=$request->gmap_status;
	$pay->gmap_credential=$request->gmap_credential;
	$pay->glogin_status=$request->glogin_status;
	$pay->glogin_credential=$request->glogin_credential;
	$pay->recapcha_status=$request->recapcha_status;
	$pay->recapcha_credential=$request->recapcha_credential;
	$pay->cric_api_key=$request->cric_api_key;
	$pay->save();
	
	Session::flash('success', 'Social settings have been updated!!'); 
		
		return back();
	
	
	
	
	}
	
	public function view_how()
	{
	
	
	$support=Support::findorfail(2);
	return view('admin.settings.how_play',compact('support'));
	
	
	}
	public function how_post(Request $request)
	{
	
	
	$support=Support::findorfail(2);
	$support->how_play=$request->how_play;
	$support->how_play_link=$request->how_play_link;
	$support->save();
	return back();
	
	
	}
	
	
	
	
	
	public function currency_avail()
	{
/* 	echo 'ada';
	exit;
	 */
	$data['setting']=CurrencySetting::findorfail(1);
	$data['currency']=Currency::whereactive(0)->get();
	return view('admin.settings.currency_set',$data);
	
	
	}
	public function currency_set(Request $request)
	{
	$currency=CurrencySetting::findorfail(1);
	//$currency=new CurrencySetting;
	$currency->currency_id=$request->currency_id;
	$currency->save();
	Session::flash('success', 'Currency settings have been updated!!'); 
		
	return back();
	
	
	}
	public function currency_add()
	{
	
	/* echo "swsf";
	exit; */
	return view('admin.settings.addcurrency');
	
	
	}
	
	public function save_currency(Request $request)
	{
	
	
	
	$data=$request->all();
	Currency::create($data);
	Session::flash('success', 'Currency added successfully!!'); 
	return redirect('admin/currency_settings');
	
	}
}

