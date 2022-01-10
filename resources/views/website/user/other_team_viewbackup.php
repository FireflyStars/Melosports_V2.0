  
       <div class="create_team" style="height:646px;margin-top:12px;">
            <div class="team_bottom">

                <?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr($fetch->date,0,10);
					        $subt=substr($fetch->date,-13,-5);
					       //echo $subtminus=strtotime('-30 minutes', $subt);
$time = strtotime($subt);
$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;
							

									?>
									{{-- 
                    @if (date('Y-m-dH:i:s')
                    < $con) 
				<div class="create">
                        <a href="{{url('edit-team/'.base64_encode($team_players->id).'/'.base64_encode($team_players->match_id).'/'.base64_encode($team_players->team_no))}}">Edit Team 1</a>
            </div>

            @endif --}}
				
					@if (date('Y-m-dH:i:s') > $con) 
						<a href="{{url('play-pts',$unique_id)}}" class="btn btn-large btn-info" >Individual Player Points</a>
				@endif

				
				
				<div class="cs-pitch">
        		<div class="cs-pitch-content">
        			<div class="cs-pitch-row-title">Captain</div>
        			<div class="cs-pitch-row" >
        				<div class="cs-pitch-col" >
        				  <!-- Player  -->
        					<div class="cs-pitch-payer">
        						 <div class="cs-pitch-cap">C</div>
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								<?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id($unique_id)->whereplayer_id($team_players->captain)->first();?>
        						<div class="cs-pitch-payer-name" style="background: #ff9800">{{$c_name_list->player_name}}</div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        			
					
					
					<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        						<div class="cs-pitch-cap vc">VC</div> 
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								<?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id($unique_id)->whereplayer_id($team_players->vice_captain)->first();?>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$c_name_list->player_name}}</div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
						</div>
						<div class="cs-pitch-row-title">Bats Man</div>
				@php($json_play=json_decode($team_players->team_players))
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Opening batsman' || $all->player_role=='Batsman' || $all->player_role=='Top-order batsman' || $all->player_role=='Middle-order batsman' || $all->player_role=='No')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40" >
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
								
								@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
								
								
        						
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						<div class="cs-pitch-row-title">Bowler</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowler')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						<div class="cs-pitch-row-title">All Rounder</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowling allrounder' || $all->player_role=='Allrounder')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						
						<div class="cs-pitch-row-title">Wicketkeeper</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Wicketkeeper batsman')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
					<?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->whereplayer_id($team_players->substitute)->first();
 ?>
                    @if($c_name_list)
					<div class="cs-pitch-row-title">Substitute</div>
					<div class="cs-pitch-row" >
						 
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $c_name_list->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$c_name_list->player_name}}</div>
								@if (date('Y-m-dH:i:s') > $con)
 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($team_players->substitute)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						
							
							$bat_pt=$batting_json_replace->total[0];
						
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						
						
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						
							$field_pt=$fielding_json_replace->field_total[0];
						
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
					
					@endif
								</div>
        				 	<!-- Player End  -->
        				</div>
        				</div>
        			
					@endif
					
					
        			</div>
        			</div>
				
				
				
		   <div class="captain">
                <h5>Captain </h5>
                <center>
                    <div class="palyer_icon" style="width:100%;margin-left:0px;">

                        <div class="btn-group" style="width: 100%;">
                            <?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id($unique_id)->whereplayer_id($team_players->captain)->first();
 ?>
                                <button class="btn " style="border: 3px solid #b3b3b2;border-radius:0px;">@if($c_name_list){{$c_name_list->player_name}} @endif
                                </button>
                        </div>

                    </div>
                </center>
            </div>
            <div class="vc_captain">
                <h5>Vice Captain </h5>
                <center>
                    <div class="palyer_icon" style="width:100%;margin-left:0px;">

                        <div class="btn-group" style="width: 100%;">
                            <button class="btn " style="border: 3px solid #b3b3b2;border-radius:0px;">
                                <?php $vc_name_list= DB::table('fantasy_team_players')->wherematch_id($unique_id)->whereplayer_id($team_players->vice_captain)->first(); ?>
                                    @if($vc_name_list){{$vc_name_list->player_name}}  @endif</button>
                        </div>

                    </div>
                </center>
            </div>

            <?php $json_play=json_decode($team_players->team_players); ?>
                @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Opening batsman' || $all->player_role=='Batsman' || $all->player_role=='Top-order batsman' || $all->player_role=='Middle-order batsman' || $all->player_role=='No')

                <div class="batsman">

                    <div class="palyer_icon">
                        <div class="palyer_img">
						<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
						@if($team_players->replace_player==$all->player_id)
                            <!--  <img src="{{ url('public/site/image/in_bat_sub.png') }}">-->
					<?php	  $playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
                              <img src="{{ $url }}">
						@else
							<?php	  $playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
							<!--<img src="{{ url('public/site/image/in_bat.png') }}">-->
							<img src="{{ $url }}">
						@endif
                        </div>
                        <div>
                            <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$all->player_name}}">
@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
				  <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$indiual_player_sum}}">	  
@endif					 

					 </div>
                    </div>

                </div>

                @elseif($all->player_role=='Bowler')
                <div class="batsman">
                    <div class="palyer_icon">
                        <div class="palyer_img">
						<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
						@if($team_players->replace_player==$all->player_id)
							<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                            <!--  <img src="{{ url('public/site/image/in_bat_sub.png') }}">-->
						@else
							<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                          <!--  <img src="{{ url('public/site/image/in_bow.png') }}">-->
						@endif
                        </div>

                        <div>
                            <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$all->player_name}}">
                  @if (date('Y-m-dH:i:s') > $con)    
 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
  <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$indiual_player_sum}}">
@endif					

					</div>
                    </div>

                </div>
                @elseif($all->player_role=='Bowling allrounder' || $all->player_role=='Allrounder')
                <div class="batsman">
                    <div class="palyer_icon">
                        <div class="palyer_img">
						<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
							@if($team_players->replace_player==$all->player_id)
								<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                              <!--<img src="{{ url('public/site/image/in_bat_sub.png') }}">-->
						@else
							<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                          <!--  <img src="{{ url('public/site/image/in_all.png') }}">-->
						@endif
                        </div>
                        <div>
                            <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$all->player_name}}">
@if (date('Y-m-dH:i:s') > $con)                      
					  @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
  <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$indiual_player_sum}}">
					  
					  @endif
					  </div>
                    </div>

                </div>
                @elseif($all->player_role=='Wicketkeeper batsman')
                <div class="batsman">
                    <div class="palyer_icon">
                        <div class="palyer_img">
						<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
							@if($team_players->replace_player==$all->player_id)
								<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                            <!--  <img src="{{ url('public/site/image/in_bat_sub.png') }}">-->
						@else
							<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$all->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                           <!-- <img src="{{ url('public/site/image/in_wk.png') }}">-->
						@endif
                        </div>
                        <div>
                            <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$all->player_name}}">
							@if (date('Y-m-dH:i:s') > $con)
					  @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
  <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$indiual_player_sum}}"> 
					   
					   @endif
					   </div>
                    </div>
                </div>
				 
                @endif @endif @endforeach @endforeach
 
 
 
				   <!--Replace Player -->

                <!-- <div class="batsman">

									<div class="palyer_icon">

										<div class="palyer_img">
<?php //$c_name_list= DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->whereplayer_id($team_players->replace_player)->first();
 ?>
											<img src="{{ url('public/site/image/in_bat_sub.png') }}">
										</div>
										<div> 
											<input style="width:100%; border: none;text-align: center;font-size: 9px;"  type="text" readonly id="batsmanpname4" value="{{$c_name_list->player_name}}">

										</div>
									</div>

				</div> -->

                <!--Substitute Player -->
                <?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->whereplayer_id($team_players->substitute)->first();
 ?>
                    @if($c_name_list)
                    <div class="batsman">

                        <div class="palyer_icon">

                            <div class="palyer_img">
							<a href="#" class="hover_test" id="<?php echo $c_name_list->player_id .'-'. $team_players->id; ?>">
<?$playingrole = file_get_contents('http://cricapi.com/api/playerStats/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&pid='.$c_name_list->player_id);	
										$db = json_decode($playingrole,true);
										$url = $db['imageURL'];?>
										 <img src="{{ $url }}">
                             <!--   <img src="{{ url('public/site/image/in_bat_sub.png') }}">-->
                            </div>
                            <div>
                                <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$c_name_list->player_name}}">
 @if (date('Y-m-dH:i:s') > $con)
 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($team_players->substitute)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
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
						$bat_pt=0;
					}
					else{
						
							
							$bat_pt=$batting_json_replace->total[0];
						
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						
						
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						
							$field_pt=$fielding_json_replace->field_total[0];
						
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
  <input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname4" value="{{$indiual_player_sum}}">
@endif                           

						   </div>
                        </div>
		
                    </div>

                    @endif

        </div>
        </div>
		<script>
// jQuery( document ).ready(function( $ ) {

 $('.hover_test').tooltip({
   title: fetchData,
   html: true,
   placement: 'right'
  });

  function fetchData()
  {
   var fetch_data = '';
   var element = $(this);
   var id = element.attr("id");
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
    url:"tooltip-ply-pt",
    method:"POST",
    async: false,
    data:{id:id, _token: CSRF_TOKEN},
    success:function(data)
    {
     fetch_data = data;
    }
   });   
   return fetch_data;
  }
// });
</script>

   
