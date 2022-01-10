<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enquiry;
use App\FaqQuestion;
use App\Testmonials;
use App\SiteSetting;
use Mail;
use Session;
use DB;

class SupportController extends Controller
{
	
	//Support Pages
	
	//About
	
public function u_about()
{
		return view('website.user.about');
}

public function l_about()
{
		return view('website.login.about');
}

public function u_point()
{
	$data['t20'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('t20')
		   ->first();
		   
	$data['odi'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('odi')
		   ->first();
		   
	$data['test'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('test')
		   ->first();
    		   
		return view('website.user.pointsystem', $data);
}

public function l_point()
{
	$data['t20'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('t20')
		   ->first();
		   
	$data['odi'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('odi')
		   ->first();
		   
	$data['test'] = DB::table('fantasy_pointsystem')
           ->wherematch_type('test')
		   ->first();
		   
		return view('website.login.pointsystem', $data);
}

    //Contact

public function u_contact()
{
	
		return view('website.user.contact');
}

public function u_contact_mail(Request $request)
{
	//echo $request->mobile_no;
	//exit;
	$site=SiteSetting::findorfail(1);

	$login =New Enquiry;

	$login->name =$request->name;
	$login->email =$request->email;
	$login->mobile =$request->mobile_no;
	$login->message =$request->message;
	$login->save();
	
	$user=Enquiry::whereemail($request->email)->first();
	
	if($login)
		  {
	$data['admin'] = array('user_id'=>$user->id, 'name'=>$user->name, 'email'=>$user->email,'from' =>$site->support_email, 'from_name' =>$site->site_name,'type' => 'admin' );	
		Mail::send( 'website.user.contactmail', $data, function( $message ) use ($data)
		{
   
 
		$message->to($data['admin']['email'],$data['admin']['from_name'])->from( $data['admin']['from'],$data['admin']['from_name']  )->subject('Acknowledgement!!');
 
		});
	
	Session::flash('success','Acknowledgement message was sent to your mail');
		return back();
		  }
		  return back();
}

public function l_contact()
{
		return view('website.login.contact');
}

public function l_contact_mail(Request $request)
{
	
	$site=SiteSetting::findorfail(1);
	$login =New Enquiry;

	$login->name =$request->name;
	$login->email =$request->email;
	$login->mobile =$request->mobile_no;
	$login->message =$request->message;
	$login->save();
	
	$user=Enquiry::whereemail($request->email)->first();
	
	if($user)
		  {
	$data['admin'] = array('user_id'=>$user->id, 'name'=>$user->name, 'email'=>$user->email,'from' =>$site->support_email, 'from_name' =>$site->site_name,'type' => 'admin' );	
		Mail::send( 'website.user.contactmail', $data, function( $message ) use ($data)
		{
   
 
		$message->to($data['admin']['email'],$data['admin']['from_name'])->from( $data['admin']['from'],$data['admin']['from_name'])->subject('Acknowledgement!!');
 
		});
		Session::flash('success','Acknowledgement message was sent to your mail');
		return back();
		  }
		  return back();
}

//FAQ

public function u_faq()
{
	
$god=FaqQuestion::whereis_status(0)->get();
	return view('website.user.faq',compact('god'));
//	return view('website.user.faq');
}

public function l_faq()
{
		
	$god=FaqQuestion::whereis_status(0)->get();
	return view('website.login.faq',compact('god'));
}

//How to play cricket

public function u_htp()
{
		return view('website.user.howtoplay');
}

public function l_htp()
{
		return view('website.login.howtoplay');
}

//Terms and conditions

public function u_tc()
{
		return view('website.user.termsandcondition');
}

public function l_tc()
{
		return view('website.login.termsandcondition');
}
public function u_news()
{
	$god=DB::table('fantasy_news')->whereis_delete(0)->get();
	return view('website.user.news',compact('god'));
}


public function l_news()
{
$god=DB::table('fantasy_news')->whereis_delete(0)->get();
return view('website.login.news',compact('god'));


}

//Privacy Policies

public function u_policy()
{
		return view('website.user.privacypolicy');
}

public function l_policy()
{
		return view('website.login.privacypolicy');
}


//Disclaimer

public function u_disclaimer()
{
		return view('website.user.disclaimer');
}

public function l_disclaimer()
{
		return view('website.login.disclaimer');
}

//Site Map

public function u_sitemap()
{
		return view('website.user.sitemap');
}

public function l_sitemap()
{
		return view('website.login.sitemap');
}
public function l_testimonial()
{
$god=Testmonials::whereis_status(0)->get();
return view('website.login.testimonial',compact('god'));

}

public function u_testimonial()
{
$god=Testmonials::whereis_status(0)->get();
return view('website.user.testimonial',compact('god'));

}



	


public function view_winnerboard()
{
	
	$data['admin'] = DB::table('fantasy_user_winning_details')
            ->join('matches', 'fantasy_user_winning_details.match_id', '=', 'matches.unique_id')
            ->join('users', 'fantasy_user_winning_details.user_id', '=', 'users.id')
            ->select(DB::raw('SUM(fantasy_user_winning_details.amount) as user_amount, fantasy_user_winning_details.created_at as wdate'), 'matches.team_1', 'matches.team_2', 'users.name as username')
			->orderby('fantasy_user_winning_details.created_at', 'DESC' )
			->groupby('users.name','matches.unique_id' )
            ->get();
	
		return view('website.login.winner_board',$data);
}
public function view_refertoearn()
{
		return view('website.login.refer_earn');
}
public function artisan()

{
	 \Artisan::call('demo:cron');
}
public function artisan_win()
{
 \Artisan::call('frndwin:cron');

}

public function l_document_page()
{

    
    return view('website.login.document');
    
}



	
	}