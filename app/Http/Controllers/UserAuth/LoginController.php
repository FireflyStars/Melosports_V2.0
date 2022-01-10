<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Socialite;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
	  public function showLoginForm()
    {
        return view('website.login-user');
    }
	 protected function guard()
    {
        return Auth::guard('userAuth');
    }
	
	 public function redirectToProvider($provider)
    {
		
        return Socialite::driver($provider)->redirect();
		
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
       $user = Socialite::driver($provider)->user();
	 

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
		
		
        if ($authUser) {
			
			$update=DB::table('users')->where('email',$authUser->email)->update(['last_login' => date('Y-m-d h:i:s')]);
			
            return $authUser;
        }
		
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            //'mobile_number'    => $user->mobile_number,
            'provider' => $provider,
            'provider_id' => $user->id,
            'role_id' => 2,
			'status' =>1,
			'credit_point' =>100,
            'last_login' => date('Y-m-d h:i:s')
        ]);
    }

}
