  
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
                        <a  class="btn btn-primary btn-sm" href="{{url('edit-team/'.base64_encode($team_players->id).'/'.base64_encode($team_players->match_id).'/'.base64_encode($team_players->team_no))}}">Edit Team 1</a>
            </div>

            @endif --}}
				
					@if (date('Y-m-dH:i:s') > $con) 
						<a href="{{url('play-pts',$unique_id)}}" class="btn btn-large btn-info" >Individual Player Points</a>
				@endif

				
				
				<div class="cs-pitch">
        		<div class="cs-pitch-content">
				
				
				<div class="cs-pitch-row-title">Wicketkeeper</div>
				@php($json_play=json_decode($team_players->team_players))
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Wicketkeeper batsman')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
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
				
				
				
				
						<div class="cs-pitch-row-title">Bats Man</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Opening batsman' || $all->player_role=='Batsman' || $all->player_role=='Top-order batsman' || $all->player_role=='Middle-order batsman' || $all->player_role=='No')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
							@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
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
						
						<div class="cs-pitch-row-title">All Rounder</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowling allrounder' || $all->player_role=='Allrounder')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
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
						
						<div class="cs-pitch-row-title">Bowler</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowler')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
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

   
