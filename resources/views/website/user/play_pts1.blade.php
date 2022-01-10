@include('website.user.header')
@include('website.user.menu1')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
td,th {
    border: 1px solid black;
padding:10px;
}
</style>
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
			<div class="show_contest">
			<br>
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>		
		
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Player Points
				</div>
				@php($match=DB::table('matches')->whereunique_id($match_id)->first())
				
			</div>
		<p></p>
				
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="winner_list">
			
				<div class="col-md-12 playpoint">		
                  		
					
					<table border="1">
					<tr style="background-color:#264462; color:white;">
					
					<th colspan="17">{{$match->team_1}} Vs {{$match->team_2}} </th>
					
					</tr>
					<tr style="border:1px solid black; background-color:#eaeaea; color:black;"> 
					
					<th colspan="1"> Player name</th>
					
					<th colspan="7" align="center"> Batting</th>
					<th colspan="5"> Bowling</th>
					<th colspan="3"> Fielding</th>
					<th colspan="1"> Total Points  </th>
					
					
					
						<tr style="border:1px solid black; background-color:#eaeaea; color:black;">
						  
							<th></th> 
							
							<th>Runs</th>
							<th>4s</th>
							<th>6s</th>
							<th>Strike Rate</th>
							<th>Century </th>
							<th>Half Century </th>
							<th>Batting Total</th>
							<th>Wickets</th>
							<th> Maiden  </th>
							<th> Economy </th> 
							<th> 4 or 5 Wickets </th> 
							<th> Bowling Total </th> 
							<th> Catches </th> 
							<th> Stumping </th> 
							<th> Fielding Total </th> 
							<th></th> 
							
						</tr>
											
							<?php
							if(count($point_sys)>0)
							{
							foreach($point_sys as $ps)
							{
								$batting_json=json_decode($ps->batting);
								//print_r($batting_json);
								$bowling_json=json_decode($ps->bowling);
								$fielding_json=json_decode($ps->fielding);
								
								// $ps->player_id;
								//exit;
								
								
								
							
							?>
						<tr>
						
						@php($py=DB::table('fantasy_team_players')->whereplayer_id($ps->player_id)->first())
						 	@if($py)
							<td>{{ $py->player_name }}</td>  
							@endif
							
							<?php
							if($batting_json!=null)
							{
								?>
						
							<td>{{$batting_json->run[0] }}</td>
							<td>{{ $batting_json->s4[0] }}</td>
					
							<td>{{ $batting_json->s6[0] }}</td>
							<td>{{$batting_json->strike_rate[0]}}</td>
							<td>{{$batting_json->century[0]}}</td>
							<td>{{$batting_json->half_century[0]}}</td>
							<td>{{$batting_json->total[0] }}</td>
							   
							<?php
							}else
							{
								
							?>
							
							<td>0</td>
							<td>0</td>
					
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<?php
							
							
							}?>
							<?php
							if($bowling_json!=null)
							{
							?>
							<td>{{$bowling_json->single_wicket[0] }}</td>
							<td>{{$bowling_json->maiden_over[0] }}</td>
							<td>{{$bowling_json->econmcy[0] }}</td>
							<td>{{$bowling_json->wicket4or5[0] }}</td>
							<td>{{$bowling_json->bowl_total[0] }}</td>
							<?php
							}  else 
							{?>
						<td>0</td>
							<td>0</td>
					
							<td>0</td>
							<td>0</td>
							<td>0</td>
							<?php
							}
							?>
							<?php
							if($fielding_json!=null)
							{
							?>
							<td>{{$fielding_json->catch[0] }}</td>
							<td>{{$fielding_json->stumping[0] }}</td>
							<td>{{$fielding_json->field_total[0] }}</td>
							<?php
							}  else
							{  ?>
						<td>0</td>
							<td>0</td>
					
							<td>0</td>
							<?php
							
							}?>
							<?php
							if($batting_json==NULL)
					{
						$bat_pt=0;
					}
					else{
						
							
							$bat_pt=$batting_json->total[0];
						
					}
					if($bowling_json==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						
						
							
							$bowl_pt=$bowling_json->bowl_total[0];
						
						
					}
					if($fielding_json==NULL)
					{
							$field_pt=0;
					}
					else
					{
						
							$field_pt=$fielding_json->field_total[0];
						
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum=$bat_pt+$bowl_pt+$field_pt;
							
							
							
							
							
							
							
							
							
							
						
						
						?>
						<td>{{ $indiual_player_sum }}</td>
							
						</tr>
						<?php
							}
							} else
							{
						?>
					<p>There is no data available .Please wait ..</p>
					
					<?php
							}
							?>
					</table>
					<p>
				
				</div>
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

