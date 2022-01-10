<?php
//$spilit=;
	$spilit_test=explode("-",$spilit);
	$point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($spilit_test[0])->wherematch_id(Session::get('unique_id'))->get();
	$team_players=DB::table('fantasy_user_create_team')->whereid($spilit_test[1])->first();
	  $indiual_player_sum=0;
	  $bat_pt=0;
	  $bowl_pt=0;
	  $field_pt=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt+=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt+=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt+=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt+=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt+=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt+=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt+=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt+=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt+=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt+=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt+=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt+=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}




  $ply_name= DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->whereplayer_id($spilit_test[0])->first();
 
 
 
   $output = '
  <p><label>Name : '.$ply_name->player_name.'</label></p>
  <p><label>Batting Point : '.$bat_pt.'</label></p>
  <p><label>Bowling Point : </label><br />'.$bowl_pt.'</p>
  <p><label>Fielding Point : </label>'.$field_pt.'</p>
   ';
 
 echo $output;

?>