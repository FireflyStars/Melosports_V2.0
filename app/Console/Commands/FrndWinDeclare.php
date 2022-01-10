<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

use App\SocialSetting;

use App\Match;

use App\Contest;

use App\User;

use App\CreditPurchase;

use App\PaymentUser;

use App\Fantasyinvite;

use App\WithdrawRequest;

use App\BankVerify;

use PaytmWallet;

use App\SiteSetting;




use Session;

use Response;

use Auth;

use Hash;

use Mail;

class FrndWinDeclare extends Command

{

    /**

     * The name and signature of the console command.

     *

     * @var string

     */

    protected $signature = 'frndwin:cron';

    /**

     * The console command description.

     *

     * @var string

     */

    protected $description = 'Command description';

    /**

     * Create a new command instance.

     *

     * @return void

     */

    public function __construct()

    {

        parent::__construct();

    }

    /**

     * Execute the console command.

     *

     * @return mixed

     */ 

    public function handle()

    {

		

	 $pay_apikey=SocialSetting::findorfail(1);

$apikey=$pay_apikey->cric_api_key;

 $site=SiteSetting::findorfail(1);

        

		//DB::table('users')->insert(['name'=>'hello new']);

		

		//$today = date('Y-m-d').'%';

		$today = date('Y-m-d',strtotime("+2 days"));

		$nxt_today = date('Y-m-d',strtotime("-20 days"));

	//	echo $today;

		$matches=Match::whereBetween('date',[$nxt_today ,$today])->get();

		//$matches=Match::whereunique_id('1121275')->get();

		

	//	print_r($matches);

		//exit;

		

	//DB::table('users')->insert(['name'=>'hello new']);	

foreach($matches as $s)

		{

			//DB::table('users')->insert(['name'=>'hello new win']);

//	echo		$s->unique_id;

		 $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey='.$apikey.'&&unique_id='.$s->unique_id);

		// $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey='.$apikey.'&&unique_id=1122723');

		 $cricketMatches = json_decode($cricketMatchesTxt);

		 foreach($cricketMatches->data as $item) {

			 $manofthematch=$cricketMatches->data->man_of_the_match;

			// if (array_key_exists("winner_team",$cricketMatches->data) || (!empty($manofthematch)))
 if (!empty($cricketMatches->data->winner_team) || (!empty($manofthematch)))
			 
			 {

		 		 $con=DB::table('frnd_user_join_contest')->where('match_id',$s->unique_id)->get();

				 

				//echo $con;

				// echo count($con);

				 //print_r($con);

				 foreach($con as $c)

				 {

					 $contest=DB::table('user_frnd_contests')->where('id',$c->frnd_contest_id)->get();

					// print_r($contest);

					 foreach($contest as $test)

					 {

						

						 

						 

						 $con_1=DB::table('frnd_user_join_contest')->where('match_id',$s->unique_id)->wherefrnd_contest_id($test->id)->get();

						 

						

						  $al_exist=DB::table('fantasy_user_winning_details')->wherematch_id($s->unique_id)->wherecontest_id($test->id)->wherecontest_type('friend')->get();

									if(count($al_exist)==0)

									{

										

						 foreach($con_1 as $mans)

						 {
							$winning_amount=$test->winner_prize_amt;

							$winner_length_id=$test->winner_length_id;	

							 $length=DB::table('winner_lengths')->where('id',$winner_length_id)->first();
							 
							 $rank_list=json_decode($length->position);
							 $rank_amount=json_decode($length->rank_amount);
							 
							 
							 for($k=0;$k<count($rank_list);$k++)
								 
								 {
									if($rank_list[$k]==$mans->rank)

								{ 
								 $test_count=DB::table('frnd_user_join_contest')->where('match_id',$s->unique_id)->wherefrnd_contest_id($test->id)->groupby('rank')->select(DB::raw("COUNT(rank) count,rank"))->get();	 
								
								for($i=0;$i<count($test_count);$i++)

									{

									if($test_count[$i]->rank==$mans->rank) 

									{

										//print_r($test_count[$i]->count);

										//exit;

										if($test_count[$i]->count > 1)

										{
											
											$no_winner=$length->team_length;

										$rank_minus=$mans->rank-1;

										

									 $c_dcup=$test_count[$i]->count;
									 
									$output = array_slice($rank_amount,$rank_minus, $c_dcup);
									$divide_pertage=array_sum($output);
									 
									 $user_get_pernt=$divide_pertage/$c_dcup;
									
									 $count_of_join=count($con_1);
									$user_length= $test->user_length;
									if($user_length > $count_of_join)
									{
										$join_percentage=($count_of_join/$user_length*100);
										$winning_amount=($winning_amount*$join_percentage/100);
										
									}
									
									 
									 $user_get=($winning_amount*$user_get_pernt/100);
									 
									$tds=0;

								if($user_get >9999.99)

								{

									$percentToGet = 30;

									$percentInDecimal = $percentToGet / 100;



//Get the result.

$tds = $percentInDecimal * $user_get;

$user_get=$user_get-$tds;

								}
										}
										
										
										else

									{
										
										
                    $winamt=$rank_amount[$k];
				 
$user_length= $test->user_length;
 $count_of_join=count($con_1);

                     if($user_length > $count_of_join)
									{
										 $join_percentage=($count_of_join/$user_length*100);
										$winning_amount=($winning_amount*$join_percentage/100);
										
									}
  $user_get=($winning_amount*$winamt/100);
//exit; 

$tds=0;

								if($user_get >9999.99)

								{

									$percentToGet =30.90;

									$percentInDecimal = $percentToGet / 100;



//Get the result.

$tds = $percentInDecimal * $user_get;

$user_get=$user_get-$tds;

								}

									

									

									

									}
									
									
									
								 $insert_winning=DB::table('fantasy_user_winning_details')->insert([

									'match_id'=>$s->unique_id,

									'contest_id'=>$test->id,

									'user_id'=>$mans->user_id,

									'rank'=>$mans->rank,

									'amount'=>$user_get,

									'tds'=>$tds,
									'contest_type'=>'friend',

									]);   



									

									

									$current_user=User::whereid($mans->user_id)->first();

									$update_amount=$user_get+$current_user->user_wallet_current_amount;

									

									$update=User::findorFail($mans->user_id);

									$update->user_wallet_current_amount=$update_amount;

									$update->save();
									
									

									

									

									 $data['admin'] = array('email'=>$current_user->email,'name' =>$current_user->name,'amount' =>$user_get,'contest_id'=>$test->id,'match_id'=>$s->unique_id ,'from' =>$site->support_email, 'from_name' =>$site->site_name,'type' => 'admin' );

		 Mail::send('website.user.winnermail', $data, function($message ) use ($data)

		{

		   

		   

		   $message->to($data['admin']['email'],$data['admin']['from_name'])->from( $data['admin']['from'],$data['admin']['from_name'])->subject('Winning Amount');

		   

		});  

								
								
								}	 
								 }

						 }

						 

						

						 

					 }

				 }

			

				 

			 }

		 

				 }
				 
				 }
				 
				 }

		}	

		$this->info('win:cron Cummand Run successfully!');

		}

	

	////////

	

	

	

	}

	
}


	

	

	

	

	

	

		

		

