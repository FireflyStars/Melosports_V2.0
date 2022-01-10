<?php
//Route::get('/', function () { return redirect('/admin/home'); });

/* // Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');
 */

if(env('DB_DATABASE')=='')
{
   
   // Route::get('/', 'InstallatationController@index');
   Route::get('/install', 'InstallatationController@index');
   Route::post('/update-details', 'InstallatationController@updateDetails');
   Route::post('/install', 'InstallatationController@installProject');
}

 // Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;


Route::get('/', function () { 

	if(env('DB_DATABASE')=='')
    { 

       return redirect()->action('InstallatationController@index');
    }
    
//Session::flush();
	if(Auth::user())
		return redirect('main');

   return view('website.login.index'); 
    // return redirect()->action('SiteController@homePage');

});
Route::get('/refer/{id}', function ($id) { 

	Session::put('refer_id',$id);

   return view('website.login.index'); 
    // return redirect()->action('SiteController@homePage');

});

Route::get('/admin', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/adminlogout', function () {
	
  Auth::guard('adminAuth')->logout();
    Auth::logout();
    Session::flush();



    return redirect('/admin');
});
Route::post('/userlogout', function () {

    Auth::logout();
	
	Auth::guard('userAuth')->logout();
    Session::flush();
	
    //alert()->success('You have been logged out.', 'Good bye!');
    return redirect('/');
});
/* Route::get('/userLogin', function (Request $request) {
	if(url()->previous()!="http://touchwoodlearning.net/touchwoodlearning/userLogin"){
	$request->session()->put('url.intended',url()->previous());
	}
    return view('website.login-user');
}); */
/* Route::get('/userRegister', function () {
    return view('website.twl_register');
}); */
Route::post('userLogin',function(Request $request)
{
	 
    $credentials = Input::only('email', 'password'); 
	
   // $credentials1 = Input::only('mobile_number', 'password'); 

    if ( ! Auth::attempt($credentials))
    {
      Session::flash('fail', 'Invalid credentials!');
        return Redirect::back();
    }
	
          $remember = (Input::has('remember')) ? true : false;
			 

    if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember))
    {
    if (Auth::user()->role_id == 2) 
    {
		if(Auth::user()->status == 1)
		{
		
		$now = date('Y-m-d H:i:s');
		
		User::whereid(Auth::user()->id)->update([
		'last_login' => $now]);
		
		$user = auth()->user();
	     return redirect('main');
    }
	else
	{
	Session::flash('fail', 'Email verification not completed. Check your registered mail id.');
    return Redirect::back();
	}
	
	}
	}
    Session::flash('fail', 'Invalid credentials!');
    return Redirect::back();
});

//Route::get('adminLogin','AdminAuth\LoginController@showLoginForm');
Route::post('adminLogin',function(Request $request) 
{
    $credentials = Input::only('email', 'password'); 

    if ( ! Auth::attempt($credentials))
    {
		Session::flash('fail', 'Invalid credentials!');
        return Redirect::back();
    }
$remember = (Input::has('remember')) ? true : false;
			 

    if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember))
    {
    if (Auth::user()->role_id == 1) 
    {
		$now = date('Y-m-d H:i:s');
		
		User::whereid(Auth::user()->id)->update([
		'last_login' => $now]);
        return Redirect::to('admin/home');
    }
	else{
		Session::flash('fail', 'Invalid credentials!');
		  return Redirect::back();
	}
	}
    return Redirect::to('/admin');
});

//Route::post('/user-register', 'UserLogin\UserLoginController@user_register');



Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	 //Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('auth.login');
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('contact_companies', 'Admin\ContactCompaniesController');
    Route::post('contact_companies_mass_destroy', ['uses' => 'Admin\ContactCompaniesController@massDestroy', 'as' => 'contact_companies.mass_destroy']);
    Route::resource('contacts', 'Admin\ContactsController');
    Route::post('contacts_mass_destroy', ['uses' => 'Admin\ContactsController@massDestroy', 'as' => 'contacts.mass_destroy']);
    Route::resource('time_work_types', 'Admin\TimeWorkTypesController');
    Route::post('time_work_types_mass_destroy', ['uses' => 'Admin\TimeWorkTypesController@massDestroy', 'as' => 'time_work_types.mass_destroy']);
    Route::resource('time_projects', 'Admin\TimeProjectsController');
    Route::post('time_projects_mass_destroy', ['uses' => 'Admin\TimeProjectsController@massDestroy', 'as' => 'time_projects.mass_destroy']);
    Route::resource('time_entries', 'Admin\TimeEntriesController');
    Route::post('time_entries_mass_destroy', ['uses' => 'Admin\TimeEntriesController@massDestroy', 'as' => 'time_entries.mass_destroy']);
    Route::resource('time_reports', 'Admin\TimeReportsController');
    Route::resource('expense_categories', 'Admin\ExpenseCategoriesController');
    Route::post('expense_categories_mass_destroy', ['uses' => 'Admin\ExpenseCategoriesController@massDestroy', 'as' => 'expense_categories.mass_destroy']);
    Route::resource('income_categories', 'Admin\IncomeCategoriesController');
    Route::post('income_categories_mass_destroy', ['uses' => 'Admin\IncomeCategoriesController@massDestroy', 'as' => 'income_categories.mass_destroy']);
    Route::resource('incomes', 'Admin\IncomesController');
    Route::post('incomes_mass_destroy', ['uses' => 'Admin\IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);
    Route::resource('expenses', 'Admin\ExpensesController');
    Route::post('expenses_mass_destroy', ['uses' => 'Admin\ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);
    Route::resource('monthly_reports', 'Admin\MonthlyReportsController');
    Route::resource('faq_categories', 'Admin\FaqCategoriesController');
    Route::post('faq_categories_mass_destroy', ['uses' => 'Admin\FaqCategoriesController@massDestroy', 'as' => 'faq_categories.mass_destroy']);
    Route::resource('faq_questions', 'Admin\FaqQuestionsController');
    Route::post('faq_questions_mass_destroy', ['uses' => 'Admin\FaqQuestionsController@massDestroy', 'as' => 'faq_questions.mass_destroy']);

   //series
	Route::resource('series', 'Admin\SeriesController');
	Route::get('datatable/series', ['as'=>'datatable.series','uses'=>'Admin\SeriesController@datatable_content']);
	Route::post('series-active','Admin\SeriesController@series_active');
	Route::post('series-delete','Admin\SeriesController@series_delete');
    Route::post('series_mass_destroy', ['uses' => 'Admin\SeriesController@massDestroy', 'as' => 'series.mass_destroy']);
	
	
	//Contest Category
	Route::resource('contestcategory', 'Admin\ContestCategoryController');
	Route::get('datatable/contestcategory', ['as'=>'datatable.contestcategory','uses'=>'Admin\ContestCategoryController@datatable_content']);
	Route::post('contestcategory-active','Admin\ContestCategoryController@contestcategory_active');
	Route::post('contestcategory-delete','Admin\ContestCategoryController@contestcategory_delete');
	
	
	//Report
	Route::get('report_incoming','Admin\ReportController@income_index');
	Route::get('report_winning','Admin\ReportController@win_index');
	Route::get('match_wise','Admin\ReportController@match_index');
	Route::post('report_income','Admin\ReportController@ajax_index');
	Route::post('winner_income','Admin\ReportController@ajax_win');
	Route::post('match_income','Admin\ReportController@ajax_mat');
	
	
	
	//contest
	Route::resource('contest', 'Admin\ContestController');
	Route::get('datatable/contest', ['as'=>'datatable.contest','uses'=>'Admin\ContestController@datatable_content']);
	Route::post('contest-active','Admin\ContestController@contest_active');
	Route::post('contest-deactive','Admin\ContestController@contest_deactive');
	Route::post('contest-delete','Admin\ContestController@contest_delete');
    Route::post('series_mass_destroy', ['uses' => 'Admin\SeriesController@massDestroy', 'as' => 'contest.mass_destroy']);
	
	//Winning Divide Contest
	Route::resource('winner_divide', 'Admin\WinnerDivideController');
	Route::get('datatable/winner_divide', ['as'=>'datatable.winner_divide','uses'=>'Admin\WinnerDivideController@datatable_content']);
	Route::post('winner_divide-active','Admin\ContestController@contest_active');
	Route::post('winner_divide-deactive','Admin\ContestController@contest_deactive');
	Route::post('winner_divide-delete','Admin\ContestController@contest_delete');
	  Route::post('ajax_rank','SiteController@rank_ajax');
    //Route::post('series_mass_destroy', ['uses' => 'Admin\SeriesController@massDestroy', 'as' => 'contest.mass_destroy']);
	//matches
    Route::resource('matches', 'Admin\MatchController');
	Route::get('datatable/matches', ['as'=>'datatable.matches','uses'=>'Admin\MatchController@datatable_content']);
	Route::post('matches-active','Admin\MatchController@matches_active');
	Route::post('matches-delete','Admin\MatchController@matches_delete');
	Route::post('match-abandon','Admin\MatchController@abandon');
	Route::get('view-contest/{id}/{con}','Admin\MatchController@view_contest');
	Route::get('winners-list/{id}/{con}','Admin\MatchController@winners_list');
	
	
	
	//upcoming match
	Route::get('upcomingmatch','Admin\MatchController@upcomingmatch');
	
	Route::get('matches-list','Admin\MatchController@match_list');
	Route::post('match-contest-publish','Admin\MatchController@match_contest_publish');
	
	Route::post('insert_regular_contest','Admin\MatchController@insert_regular_contest');
	Route::post('insert_regular_contestnew','Admin\MatchnewController@insert_regular_contest');
	
	Route::post('insert-customize-contest','Admin\MatchController@insert_custom_contest');
	Route::post('insert-customize-contest_new','Admin\MatchnewController@insert_custom_contest');
	
	
	Route::post('delete-customize-contest','Admin\MatchController@contest_delete_customize');
	Route::post('save-customize-contest_new','Admin\MatchnewController@save_customize_contest');

	
	//Edit player
	
	Route::get('playe_edit/{id}','Admin\MatchController@edit_player_details');
	Route::post('player_edit_post','Admin\MatchController@edit_player_post');
	
	//Fantasy Point System
	Route::resource('fantasypoint', 'Admin\FantasypointController');
	Route::get('datatable/fantasypoint', ['as'=>'datatable.fantasypoint','uses'=>'Admin\FantasypointController@datatable_content']);
	
	
	//Fantasy User Payment
	Route::resource('fantasyuserpayment', 'Admin\UserPaymentController');
	Route::get('datatable/fantasyuserpayment', ['as'=>'datatable.fantasyuserpayment','uses'=>'Admin\UserPaymentController@datatable_content']);
	
	
	//Fantasy User Withdraw
	Route::resource('fantasyuserwithdraw', 'Admin\UserWithdrawController');
	Route::get('datatable/fantasyuserwithdraw', ['as'=>'datatable.fantasyuserwithdraw','uses'=>'Admin\UserWithdrawController@datatable_content']);			Route::get('datatable/pt_withdraw', ['as'=>'datatable.pt_withdraw','uses'=>'Admin\UserWithdrawController@datatablept_content']);
	Route::post('withdraw-process','Admin\UserWithdrawController@withdraw_process');	Route::post('pt_withdrawal_post','Admin\UserWithdrawController@pt_withdraw_process');	Route::post('pt_withdrawal_decline','Admin\UserWithdrawController@pt_withdraw_decline');
	Route::get('withsms/{id}/{us}','Admin\UserWithdrawController@withdraw_sms');	Route::get('playpt_withdraw','Admin\UserWithdrawController@withdray_playpt');
	
	
	//Support Pages
	Route::get('contactus', 'Admin\SupportController@contact_us');
	Route::post('contactUs', 'Admin\SupportController@contact_us_update');
	Route::get('aboutus', 'Admin\SupportController@about_us');
	Route::post('aboutUs', 'Admin\SupportController@about_us_update');
	/* //news
	Route::get('news', 'Admin\SupportController@news');
	Route::post('news-update', 'Admin\SupportController@news_update'); */
	
	//News
	Route::resource('news', 'Admin\NewsController');
	Route::get('datatable/news', ['as'=>'datatable.news','uses'=>'Admin\NewsController@datatable_content']);
	Route::post('news-active','Admin\NewsController@news_active');
	Route::post('news-delete','Admin\NewsController@news_delete');
    Route::post('series_mass_destroy', ['uses' => 'Admin\NewsController@massDestroy', 'as' => 'news.mass_destroy']);
	//FAQ
	Route::resource('faq_questions','Admin\FaqQuestionsController');

	//Testimonials
	Route::resource('testimonials','Admin\TestmonialsController');
	Route::post('testimonials_mass_destroy', ['uses' => 'Admin\TestmonialsController@massDestroy', 'as' => 'testimonials.mass_destroy']);
	//Enquiry
	Route::resource('userenquiry', 'Admin\SupportController');
	Route::get('datatable/userenquiry', ['as'=>'datatable.userenquiry','uses'=>'Admin\SupportController@datatable_content']);

	
	//Winners List
	Route::resource('winners', 'Admin\WinnerController');
	Route::get('datatable/winners', ['as'=>'datatable.winners','uses'=>'Admin\WinnerController@datatable_content']);
	
	
	//Winner Rank
	
	Route::resource('winner_rank', 'Admin\WinnerrankController');
	Route::get('datatable/winner_rank', ['as'=>'datatable.winner_rank','uses'=>'Admin\WinnerrankController@datatable_content']);
	 Route::post('winner_rank_mass_destroy', ['uses' => 'Admin\WinnerrankController@massDestroy', 'as' => 'winner_rank.mass_destroy']);
	Route::post('ajax_clone_winner','Admin\WinnerrankController@rank');
	//Settings 
	//Site Settings
	Route::get('site_set','Admin\SettingsController@site_set')->name('site_settings');
	Route::post('site_save','Admin\SettingsController@save_site')->name('save_site');
	
	
	Route::get('pay_set','Admin\SettingsController@pay_set')->name('payment_settings');
	Route::post('pay_save','Admin\SettingsController@save_pay')->name('save_payment_settings');
	
	Route::get('social_set','Admin\SettingsController@social_set')->name('social_settings');
	Route::post('social_save','Admin\SettingsController@save_social')->name('save_social_settings');
	
	
	Route::get('profile_set','Admin\SettingsController@profile_set')->name('profile_settings');
	Route::post('profile_save','Admin\SettingsController@profile_save')->name('save_profile_settings');
	
	Route::get('sms_set','Admin\SettingsController@sms_set')->name('sms_settings');
	Route::post('save_sms','Admin\SettingsController@save_sms')->name('save_sms_settings');
	Route::get('how_to_play','Admin\SettingsController@view_how')->name('how_to_play');
	Route::post('how_save','Admin\SettingsController@how_post')->name('how_save');
	Route::post('date_value','Admin\ReportController@dateval');
	Route::post('date_us','Admin\ReportController@dateus');
	
	Route::get('currency_settings','Admin\SettingsController@currency_avail')->name('currency_settings');
	Route::post('/store_currency','Admin\SettingsController@currency_set')->name('store_currency');
	Route::get('/add_currency','Admin\SettingsController@currency_add');
	Route::post('/currency_save','Admin\SettingsController@save_currency');

	
	
	
	
});


Route::get('/frnd_win', function () {
    Artisan::call('frndwin:cron');
});

Route::get('/cont_cron', function () {
    Artisan::call('win:cron');
});

Route::get('/pt_cron', function () {
    Artisan::call('demo:cron');
});


Route::get('pointcron', 'CronController@handle');
Route::get('wincron', 'CronController@winner');

//User Registration
Route::post('user-register', 'SiteController@store');

 
//Email Verification
Route::get('email-verification/{id}', 'SiteController@email_verification');


//fb login
Route::get('auth/{provider}', 'UserAuth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'UserAuth\LoginController@handleProviderCallback');


//Forgot Password
Route::post('forgot-password','SiteController@forgot_password');
Route::post('resend-otp','SiteController@resend_otp');

Route::post('otp','SiteController@o_t_p');
Route::post('reset-password1','SiteController@reset_password1');
Route::get('reset-password/{id}','SiteController@reset_password_view');

//Support
Route::get('about-us', 'SupportController@l_about');
Route::get('contact-us', 'SupportController@l_contact');
Route::post('l-contact-us', 'SupportController@l_contact_mail');
Route::get('faquestion', 'SupportController@l_faq');
Route::get('testimonial', 'SupportController@l_testimonial');
Route::get('u_testimonial', 'SupportController@u_testimonial');
Route::get('howtoplay', 'SupportController@l_htp');

Route::get('termsandconditions', 'SupportController@l_tc');
Route::get('privacypolicy', 'SupportController@l_policy');
Route::get('disclaimers', 'SupportController@l_disclaimer');
Route::get('winner-board', 'SupportController@view_winnerboard');
 
//Point system
Route::get('l-point', 'SupportController@l_point');
Route::get('artisan_pt', 'SupportController@artisan');
Route::get('artisan_win', 'SupportController@artisan_win');
Route::get('artisan_win12333', 'SupportController@artisan_win');
Route::get('l-point', 'SupportController@l_point'); 
Route::get('l_news', 'SupportController@l_news')->name('l_news');

//Live score 
Route::get('lscore', 'SiteController@lscore');
  Route::get('lresult', 'SiteController@lresult');
  
   //Document
  Route::get('l_document','SupportController@l_document_page');

Route::group(['middleware' => ['user']], function () {

 Route::get('main', 'SiteController@index');
 Route::post('series-post', 'SiteController@series_post');
 Route::post('contest-post', 'SiteController@contest_post');
 Route::post('mega_contest', 'SiteController@mega_contest_post');
 Route::post('ajax-filter', 'SiteController@ajax_filter');
 Route::get('score-post', 'SiteController@scorecard');
 
 Route::post('purcharse-credit', 'SiteController@credit_point_purchase');
 Route::get('withdraw-user', 'SiteController@view_withdraw');
 
 //Support Pages
 Route::get('about', 'SupportController@u_about');
 Route::get('contact', 'SupportController@u_contact');
 Route::post('u-contact', 'SupportController@u_contact_mail');
 Route::get('faq', 'SupportController@u_faq');
 Route::get('how-to-play', 'SupportController@u_htp');
 Route::get('terms-and-conditions', 'SupportController@u_tc');
 Route::get('privacy-policy', 'SupportController@u_policy');
 Route::get('disclaimer', 'SupportController@u_disclaimer');
 Route::get('u_testimonial', 'SupportController@u_testimonial');
 Route::get('u_news', 'SupportController@u_news');
 
 //Route::get('support', 'SupportController@view_support');
  Route::get('refertoearn', 'SupportController@view_refertoearn');
 
 //Point system
Route::get('u-point', 'SupportController@u_point'); 
 
 
 
 Route::post('resnd-verify-otp', 'SiteController@resnd_verifyotp');
 
 Route::post('withdraw-request', 'SiteController@withdraw_request');
 Route::get('bank-verify', 'SiteController@bank_verify');
 Route::post('bank-verify-otp', 'SiteController@bank_verify_otp');
 Route::post('otp-verify-number', 'SiteController@otp_verify_number');
 Route::post('verify-pancard', 'SiteController@verify_pancard');
 Route::post('verify-bank-details', 'SiteController@verify_bank_details');
 
 Route::get('test', 'SiteController@user_point_system');
 Route::get('winner-declare', 'SiteController@winner_list');
 
 //Invite Friends
 Route::post('invite-friend','SiteController@invite_friend');
 
 //paytm
 Route::post('payment-view','SiteController@view_payment');
 Route::post('payment', 'SiteController@order');
 Route::post('payment/status', 'SiteController@paymentCallback');
 Route::post('withdraw_pts', 'SiteController@withdraw_playpts');
 
 
 //payu
 
  Route::post('payment-post', 'PaymentController@payment_post');
  Route::post('payu-success', 'PaymentController@payu_success');
  Route::post('payu-failed', 'PaymentController@payu_failure');
  
  //ccavenue
  Route::post('ccavenue-post', 'SiteController@ccavenue_post');
  Route::post('ccavenue-success', 'SiteController@response');
  
  //instamojo
   Route::post('insta-post', 'PaymentController@insta_post');
  Route::get('insta-success', 'PaymentController@insta_success');
  Route::get('response', 'PaymentController@insta_response');
  Route::get('details', 'PaymentController@details');
  
  //PayPal
  
   Route::get('paypal-success', 'PaymentController@paypal_success');
   Route::get('paypal-cancel', 'PaymentController@paypal_failure');
  
 
 //Edit Profile
Route::post('edit-profile', 'SiteController@edit_profile');
Route::post('change-password', 'SiteController@change_password');


 //dinesh
 
 Route::get('create-team/{id}/{team}', 'SiteController@create_team');
 Route::post('user-create-team-post', 'SiteController@user_create_team_post');
 Route::post('user-update-team-post', 'SiteController@user_update_team_post');
 Route::post('user-join-contest', 'SiteController@user_join_contest');
 Route::post('select-view-team', 'SiteController@select_view_team');
 //Route::post('select-edit-team', 'SiteController@edit_select_substitute');
 
 Route::get('edit-team/{id}/{matchid}/{team}', 'SiteController@edit_team');
 
 Route::post('insert-selected-player', 'SiteController@insert_selected_player');
 Route::post('delete-selected-player', 'SiteController@delete_selected_player');
 Route::post('selected-team-player', 'SiteController@selected_team_player');
 Route::post('edit-selected-team-player', 'SiteController@edit_select_substitute');
 //Prasad Player Points
  Route::get('play-pts/{id}','SiteController@player_pts');
 
 //Series
 Route::post('change-series', 'SiteController@change_series');
 //capcha
 
 Route::get('capcha', 'SiteController@capcha');
 
 //live score
  Route::get('uscore', 'SiteController@uscore');
  Route::get('uresult', 'SiteController@uresult');
  
  //other team view
  Route::post('see-other-team','SiteController@see_other_team');
  Route::post('tooltip-ply-pt','SiteController@tooltip_ply_pt');
  //Refer History
  Route::get('refer_hist','SiteController@refer_history');
  //Challenge Frnd
  
  Route::post('challenge-frnd','SiteController@challenge_contest');
  Route::post('frnd-user-join-contest','SiteController@frnd_contest_post');
  Route::post('post_chal','SiteController@challenge_post');
  Route::post('challenge-form','SiteController@form_chal');
  Route::get('challenge_edit/{id}','SiteController@view_edit_challenge');
  Route::post('edit-challenge-contest','SiteController@edit_challenge');
  
  Route::post('edit_challenge_post','SiteController@edit_post_challenge');
  
  
  //Ajax Rank
  
  Route::post('ajax_rank','SiteController@rank_ajax');
  Route::post('ajax_rank1','SiteController@rank_ajax1');
  
  //User Create Contest
  
    Route::post('frnd_contest','SiteController@userfrnd_contest');
  //Document
  Route::get('document','SiteController@document_page');
  
  
  //Route::get('testing', 'SupportController@test');
  
});