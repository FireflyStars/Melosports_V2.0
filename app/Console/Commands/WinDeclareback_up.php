<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use App\SocialSetting;
use App\SiteSetting;
use App\Match;
use App\Contest;
use App\User;
use App\CreditPurchase;
use App\PaymentUser;
use App\Fantasyinvite;
use App\WithdrawRequest;
use App\BankVerify;
use PaytmWallet;

use Session;
use Response;
use Auth;
use Hash;
use Mail;
class WinDeclare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'win:cron';
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
			 $manofthematch=$cricketMatches->data->{'man-of-the-match'};
			 if (array_key_exists("winner_team",$cricketMatches->data) || (!empty($manofthematch)))
			 {
		 		 $con=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->get();
				 
				//echo $con;
				// echo count($con);
				 //print_r($con);
				 foreach($con as $c)
				 {
					 $contest=Contest::where('id',$c->contest_id)->whereis_practise_contest(0)->get();
					// print_r($contest);
					 foreach($contest as $test)
					 {
						
						 
						 
						 $con_1=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->wherecontest_id($test->id)->wherenon_confirm_contest(0)->get();
						 
						
						  $al_exist=DB::table('fantasy_user_winning_details')->wherematch_id($s->unique_id)->wherecontest_id($test->id)->whereNull('contest_type')->get();
									if(count($al_exist)==0)
									{
										
						 foreach($con_1 as $mans)
						 {
							// $vals = array_count_values($mans->rank);
						//print_r($con_1);
							  
							$winning_amount=json_decode($test->prize_list);
							$rank_list=json_decode($test->rank_list);
							//print_r($winning_amount);
							//exit;
							//	$i=0;
							foreach($rank_list as $index => $rank)
							{
								
							
								
								if($rank==$mans->rank)
								{
								 
					//	 $test_count=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->wherecontest_id($test->id)->groupby('rank')->select(DB::raw("COUNT(rank) count,rank"))->get();
						 $test_count=DB::table('fantasy_user_join_contest')->where('match_id',$s->unique_id)->wherecontest_id($test->id)->groupby('rank')->select(DB::raw("COUNT(rank) count,rank"))->get();
						print_r($test_count); 
						//exit;
					//	print_r($mans->rank);
						//exit;
									for($i=0;$i<count($test_count);$i++)
									{
									if($test_count[$i]->rank==$mans->rank) 
									{
										//print_r($test_count[$i]->count);
										
										if($test_count[$i]->count > 1)
										{
										
										$no_winner=$test->no_winner;
										$rank_minus=$mans->rank-1;
										
									 $c_dcup=$test_count[$i]->count;
									
									//stdobject array convert in to array
									$array =  (array) $winning_amount;
									
		 							$output = array_slice($array,$rank_minus, $c_dcup);
									print_r($output);	
									
									$divide_amount=array_sum($output);
									//exit;
								echo $user_get=$divide_amount/$c_dcup;
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
								//echo "ahdiajhdi";
								//exit;
								//echo $mans->user_id;
								
							//echo	$test_count[$i]->rank;
							//exit;
						//	$j=$test_count[$i]->rank;
								//print_r($winning_amount);
								
								$winamt=$winning_amount->$i;
							echo	$user_get=$winamt; 
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
									]);   

									
									
									$current_user=User::whereid($mans->user_id)->first();
									$update_amount=$user_get+$current_user->user_wallet_current_amount;
									
									$update=User::findorFail($mans->user_id);
									$update->user_wallet_current_amount=$update_amount;
									$update->save();
									
									
									 $data['admin'] = array('email'=>$current_user->email,'name' =>$current_user->name,'amount' =>$user_get,'contest_id'=>$test->id,'match_id'=>$s->unique_id ,'from' =>$site->support_email, 'from_name' =>$site->site_name,'type' => 'admin' );
		 Mail::send('website.user.winnermail', $data, function($message ) use ($data)
		{
		   
		   
		   $message->to($data['admin']['email'],$site->site_name)->from( $data['admin']['from'],$site->site_name)->subject('Winning Amount');
		   
		});  
									
								}
								
									}
									
									
								}
								
							elseif (strpos($rank, '-') !== false) 
							{
							$str =	explode("-",$rank);
							for($i=$str[0]; $i<=$str[1]; $i++) {
								
								if($i==$mans->rank)
								{
									$array =  (array) $winning_amount;
									$winamt=$winning_amount->$index;
							echo	$user_get=$winamt; 
							$tds=0;
								if($user_get >9999.99)
								{
									$percentToGet = 30.90;
									$percentInDecimal = $percentToGet / 100;

//Get the result.
$tds = $percentInDecimal * $user_get;
$user_get=$user_get-$tds;
								}
							
							 $insert_winning=DB::table('fantasy_user_winning_details')->insert([
									'match_id'=>$s->unique_id,
									'contest_id'=>$test->id,
									'user_id'=>$mans->user_id,
									'rank'=>$mans->rank,
									'amount'=>$user_get,
									'tds'=>$tds,
									]);   

									
									
									$current_user=User::whereid($mans->user_id)->first();
									$update_amount=$user_get+$current_user->user_wallet_current_amount;
									
									$update=User::findorFail($mans->user_id);
									$update->user_wallet_current_amount=$update_amount;
									$update->save();
									
									
									  $data['admin'] = array('email'=>$current_user->email,'name' =>$current_user->name,'amount' =>$user_get,'contest_id'=>$test->id,'match_id'=>$s->unique_id ,'from' =>$site->support_email, 'from_name' =>$site->site_name,'type' => 'admin' );
		Mail::send('website.user.winnermail', $data, function($message ) use ($data)
		{
		   
		   
		   $message->to($data['admin']['email'],$site->site_name)->from( $data['admin']['from'],$site->site_name)->subject('Winning Amount');
		   
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
		}	
		$this->info('win:cron Cummand Run successfully!');
		}
	
	////////
	
	
	
	}
	

	
	
	
	
	
	
		
		
