<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use App\Match;
class DemoCron_back_up extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';
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
        
		
		
		//$today = date('Y-m-d').'%';
		$today = date('Y-m-d',strtotime("+2 days"));
		$nxt_today = date('Y-m-d',strtotime("-5 days"));
	//	echo $today;
		$matches=Match::whereBetween('date',[$nxt_today ,$today])->get();
		//$matches=Match::whereunique_id(1086067)->get();
		
	
foreach($matches as	$matchlist)
{
	
 	
	//$team=DB::table('fantasy_user_create_team')->wherematch_id('1089420')->get();
	
    $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&unique_id='.$matchlist->unique_id);


           	
	$cricketMatches = json_decode($cricketMatchesTxt); 
	
	$test= $cricketMatches->data;
	
	$type=$cricketMatches->type;
	
	if($type=="Tests")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('test')->first();
		
	}
	elseif($type=="oneday-international")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('odi')->first();
	}
	elseif($type=="t20")
	{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('t20')->first();
	}
	else{
		$point_table=DB::table('fantasy_pointsystem')->wherematch_type('odi')->first();
	}
	
	
	
	//catch and bowled

	 foreach ($test->batting as $batting)
	 {
	 $pid=array();
		 foreach ($batting->scores as $scores)
	 {
		 
		if( in_array("catch & bowled",$batting->scores))
	{
	 $dismissal_by='dismissal-by';
	 $iii=$scores->$dismissal_by;
		foreach($iii as $discatbowl)
		{
			$pid=$discatbowl->pid;
			//$pid1=$discatbowl->name;

	    }
	//	Print_r($pid);
		//exit;
	}
	}
	 }
	 

	
	
	
	//batting
		 foreach ($test->batting as $batting)
	 {
	 
		 foreach ($batting->scores as $scores)
	 {
		
		 
		 if($scores->batsman!="Total" && $scores->batsman!="Extras")
		 {
		
$f="4s";
$s="6s";

	$pid=$scores->pid;
	$run=$scores->R*$point_table->each_run;
	$s4=$scores->$f*$point_table->each_four;
	$s6=$scores->$s*$point_table->each_six;
	//centure && half centry
	if($scores->R >=50 && $scores->R <=99)
	{
		$half_century=$point_table->half_century;
		$century=0;
	}
	elseif($scores->R >=100)
	{
			$half_century=0;
		$century=$point_table->century;
	}
	else {
		$century=0;
		$half_century=0;
	}
	//strike rate
	//if($scores->B > 10)
	//{ 
if($scores->SR  >=61 && $scores->SR <=70)
{
$strike_rate=$point_table->strike_rate_60_70;
	}
	elseif($scores->SR  >=50 && $scores->SR <=60)
	{
		$strike_rate=$point_table->strike_rate_50_60;
	}
	elseif($scores->SR < 50)
	{
		$strike_rate=$point_table->strike_rate_below_50;
		
	}
  else 
   {
	$strike_rate=0;
   }
	
//	}
		
	
		
		$total=$run+$s4+$s6+$half_century+$century+$strike_rate;
		
		$data = array();
//$data['pid'] = array($pid);
$data['total'] = array($total);
$data['s4'] = array($s4);
$data['run'] = array($run);
$data['s6'] = array($s6);
$data['half_century'] = array($half_century);
$data['century'] = array($century);
$data['strike_rate'] = array($strike_rate);
$batting_son= json_encode($data);

	$exist=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($pid)->first();
	if(!$exist){
		
		$insert=DB::table('fantasy_pointupdate_test')->insert([
		'batting'=>$batting_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$pid,
		
		]);
	}
	else 
	{
		$insert=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($pid)->update([
		'batting'=>$batting_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$pid,
		
		]);
	}
		 }
	
	 
		
	
	
	
	
		
	
		 
		
	  } 
	
	
}







 foreach ($test->bowling as $bowling)
	 {
	 
		 foreach ($bowling->scores as $scoresbowl)
	 {
		 
		 $maiden_over=$scoresbowl->M * $point_table->maiden_over;
	
	// wicket 4 or 5
	if($scoresbowl->W==4)
	{
		$wicket4or5=$point_table->wickets_4;
		
	}
	elseif($scoresbowl->W >=5)
	{
	$wicket4or5=$point_table->wickets_5;	
	}
	else
	{
	$wicket4or5=0;
	}	//each wicket
		$single_wicket= $scoresbowl->W *$point_table->per_wicket;
		
	if(array_key_exists('Econ',$scoresbowl) && $scoresbowl->O >=3)
	{
		 if($scoresbowl->Econ <= 4)
		{
		$econmcy=$point_table->economy_rate_below_4;
		}
		else if($scoresbowl->Econ >4 && $scoresbowl->Econ <= 5)
		{
		$econmcy=$point_table->economy_rate_4_5;
		}
		else if($scoresbowl->Econ >5 && $scoresbowl->Econ <= 6)
		{
		$econmcy=$point_table->economy_rate_5_6;
		}
		else if($scoresbowl->Econ >6 && $scoresbowl->Econ <= 7)
		{
		$econmcy=$point_table->economy_rate_6_7;
		} 
		else if($scoresbowl->Econ >7 && $scoresbowl->Econ <= 9)
		{
		$econmcy=$point_table->economy_rate_7_9;
		}
		else if($scoresbowl->Econ >9)
		{
		$econmcy=$point_table->economy_rate_above_9;
		} 
	}
	else
	{
	$econmcy=0;
    }	
		$bowl_total=$maiden_over+$single_wicket+$wicket4or5+$econmcy;
		 
      $bowling_array = array();
//$data['pid'] = array($pid);
//$bowling_array['O'] = array($scoresbowl->O);
$bowling_array['bowl_total'] = array($bowl_total);
$bowling_array['maiden_over'] = array($maiden_over);
$bowling_array['econmcy'] = array($econmcy);
$bowling_array['single_wicket'] = array($single_wicket);
$bowling_array['wicket4or5'] = array($wicket4or5);
$bowling_son= json_encode($bowling_array);

$exist_bowl=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresbowl->pid)->first();
	if(!$exist_bowl){
		
		$insert_bowl=DB::table('fantasy_pointupdate_test')->insert([
		'bowling'=>$bowling_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresbowl->pid,
		
		]);
	}
	else 
	{
		$insert_bowl=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresbowl->pid)->update([
		'bowling'=>$bowling_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresbowl->pid,
		
		]);
	}
		 }
	 }
	
	
	foreach ($test->fielding as $fielding)
	 {
	 
		 foreach ($fielding->scores as $scoresfield)
	 {
		 
		$catch= $scoresfield->catch * $point_table->catch;
		$stumping= $scoresfield->stumped * $point_table->stumping;
		$field_total= $stumping;
      $fielding_array = array();
//$data['pid'] = array($pid);
$fielding_array['catch'] = array($catch);
/* $fielding_array['lbw'] = array($scoresfield->lbw);
$fielding_array['bowled'] = array($scoresfield->bowled); */
$fielding_array['stumping'] = array($stumping);
$fielding_array['field_total'] = array($field_total);
$fielding_son= json_encode($fielding_array);

$exist_field=	DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresfield->pid)->first();
	if(!$exist_field){
		
		$insert_field=DB::table('fantasy_pointupdate_test')->insert([
		'fielding'=>$fielding_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresfield->pid,
		
		]);
	}
	else 
	{
		$insert_field=DB::table('fantasy_pointupdate_test')->wherematch_id($matchlist->unique_id)->whereplayer_id($scoresfield->pid)->update([
		'fielding'=>$fielding_son,
		'match_id'=>$matchlist->unique_id,
		'player_id'=>$scoresfield->pid,
		
		]);
	}
		 }
	 }
	 
	
	 
}
		
		

		
		
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}