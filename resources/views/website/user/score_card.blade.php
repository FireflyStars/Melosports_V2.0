@include('website.user.header')
<?
$today = date('Y-m-d').'%';
$mat_contest=App\Match::where('date','like',$today)->get();
		foreach($mat_contest as $s)
		{
		
 $mat_scorecard=file_get_contents('http://cricapi.com/api/cricketScore/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&unique_id='.$s->unique_id);
$score=json_decode($mat_scorecard);  
		if(array_key_exists('score',$score))
{

echo $score->score;
//exit;
echo "/<br>";

 /* foreach ($score as  $card)
   

{
	echo $card->score;
	
 
 
}   */
 
}

		}
 if(count($score)>= 0)
{
$message="Currently No Matches available";
echo $message;
}
?>


	





@include('website.user.footer')



