
<div id="tableContainer" class="tableContainer">

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">
								
									<thead class="fixedHeader">
									<tr>
										<th width="59px">Info</th>
										<th width="214px">Player</th>
										<th width="100px">Team</th>
										<th width="90px">Role</th>
										<th>Credits</th>
									</tr>
								</thead>
								<tbody class="scrollContent">				
				 @foreach($team_edit_list as $dd)																
				<?php $user_team_sa=json_decode($user_team->team_players); ?>
					@if($dd->player_role=='Bowling allrounder' || $dd->player_role=='Allrounder' || $dd->player_role=='Batting allrounder')	
						<tr class="select_tick <?php if(in_array($dd->player_id,$user_team_sa)){echo "active"; } else { echo "inactive"; } ?>" id="allrounder_id{{$dd->player_id}}" onclick="select_tick(this,'allrounder')">
					<td width="60px"><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td width="215px">{{$dd->player_name}}</td>					
					<td width="100px">{{$dd->player_team_name}}</td>	
					<td width="90px">{{$dd->player_role}}</td>		
					<td style="display:none;">				
					<input type="hidden" id="pteamname" value="{{$dd->player_team_name}}">	
					<input type="hidden" id="prole" value="{{$dd->player_role}}">		
					<input type="hidden" id="pid" value="{{$dd->player_id}}">			
					<input type="hidden" id="pname" value="{{$dd->player_name}}">	
					<input type="hidden" id="match_id" value="{{$dd->match_id}}">	
					<input type="hidden" id="player_type" value="allrounder">		
					<input type="hidden" id="credit_point" value="{{$dd->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 			
					</td>					
					<td width="100px">{{$dd->credit_point}} <span class="tick" id="allid_all{{$dd->player_id}}" <?php if(in_array($dd->player_id,$user_team_sa)){  } else { echo 'style="display:none"'; } ?> ><img  src="{{url('public/site/image/tick.png')}}"> </span></td>	
					</tr>									
				@endif		
				@endforeach 
								</tbody>
								
								
								</table>
								</table>
								
				</div>