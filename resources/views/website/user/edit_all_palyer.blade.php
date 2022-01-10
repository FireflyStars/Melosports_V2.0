		<div id="tableContainer" class="tableContainer" style="height:495px;">
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
			<tbody class="scrollContent" style="height:452px;">
			{{--$match_id--}}
			
			
					
			 @foreach($team_edit_list as $dd)	 	
				
			
			
					
						
			
				
				<?php $user_team_sa=json_decode($user_team->team_players); ?>
			
				@if($dd->player_role=='Opening batsman' || $dd->player_role=='Batsman' || $dd->player_role=='Top-order batsman' || $dd->player_role=='Middle-order batsman' || $dd->player_role=='No')
			
				
				
				
			<tr class="select_tick <?php if(in_array($dd->player_id,$user_team_sa)){echo "active"; } else { echo "inactive"; } ?>"  id="batsmanid{{$dd->player_id}}"  onclick="select_tick(this,'batsman');">
					<td width="60px"><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td width="215px">{{$dd->player_name}}</td>
					<td width="100px">{{$dd->player_team_name}}</td>
					<td width="90px">{{$dd->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$dd->player_team_name}}">
					<input type="hidden" id="prole" value="{{$dd->player_role}}">
					<input type="hidden" id="pid" value="{{$dd->player_id}}">
					<input type="hidden" id="pname" value="{{$dd->player_name}}">
					<input type="hidden" id="match_id" value="{{$dd->match_id}}">
					<input type="hidden" id="player_type" value="batsman">
					<input type="hidden" id="credit_point" value="{{$dd->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					<input type="hidden" id="epid" value="editbatsman{{$dd->player_id}}">
					</td>
					<td width="100px">{{$dd->credit_point}} <span class="tick"  id="batid{{$dd->player_id}}" <?php if(in_array($dd->player_id,$user_team_sa)){  } else { echo 'style="display:none"'; } ?> >
					<img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					
				
				
				@elseif($dd->player_role=='Bowler')
				
		
					<tr class="select_tick <?php if(in_array($dd->player_id,$user_team_sa)){echo "active"; } else { echo "inactive"; } ?>" id="bowlerid{{$dd->player_id}}" onclick="select_tick(this,'bowler');">
					<td width="60px"><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td width="215px">{{$dd->player_name}}</td>
					<td width="100px">{{$dd->player_team_name}}</td>
					<td width="90px">{{$dd->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$dd->player_team_name}}">
					<input type="hidden" id="prole" value="{{$dd->player_role}}">
					<input type="hidden" id="pid" value="{{$dd->player_id}}">
					<input type="hidden" id="pname" value="{{$dd->player_name}}">
					<input type="hidden" id="match_id" value="{{$dd->match_id}}">
					<input type="hidden" id="player_type" value="bowler">
					<input type="hidden" id="credit_point" value="{{$dd->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					<input type="hidden" id="epid" value="editbowler{{$dd->player_id}}">
					</td>
					<td width="100px">{{$dd->credit_point}} <span class="tick"  id="bowid{{$dd->player_id}}" <?php if(in_array($dd->player_id,$user_team_sa)){  } else { echo 'style="display:none"'; } ?> >
					<img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					
				
				@elseif($dd->player_role=='Bowling allrounder' || $dd->player_role=='Allrounder' || $dd->player_role=='Batting allrounder')
				
				
				
				
		
					<tr class="select_tick <?php if(in_array($dd->player_id,$user_team_sa)){echo "active"; } else { echo "inactive"; } ?>"  id="allrounderid{{$dd->player_id}}" onclick="select_tick(this,'allrounder');">
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
					<input type="hidden" id="epid" value="editallarounder{{$dd->player_id}}">
					</td>
					<td width="100px">{{$dd->credit_point}} <span class="tick" id="allid{{$dd->player_id}}" <?php if(in_array($dd->player_id,$user_team_sa)){  } else { echo 'style="display:none"'; } ?>><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					
				
				
				@elseif($dd->player_role=='Wicketkeeper batsman' || $dd->player_role=='Wicketkeeper')
				
		
					<tr class="select_tick <?php if(in_array($dd->player_id,$user_team_sa)){echo "active"; } else { echo "inactive"; } ?>" id="wktickid{{$dd->player_id}}" onclick="select_tick(this,'wicketkeeper');">
					<td width="60px"><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td width="215px">{{$dd->player_name}}</td>
					<td width="100px">{{$dd->player_team_name}}</td>
					<td width="90px">{{$dd->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$dd->player_team_name}}">
					<input type="hidden" id="prole" value="{{$dd->player_role}}">
					<input type="hidden" id="pid" value="{{$dd->player_id}}">
					<input type="hidden" id="pname" value="{{$dd->player_name}}">
					<input type="hidden" id="match_id" value="{{$dd->match_id}}">
					<input type="hidden" id="player_type" value="wicketkeeper">
					<input type="hidden" id="credit_point" value="{{$dd->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					<input type="hidden" id="epid" value="editwk{{$dd->player_id}}">
					</td>
					<td width="100px">{{$dd->credit_point}} <span class="tick" id="wkid{{$dd->player_id}}"  <?php if(in_array($dd->player_id,$user_team_sa)){  } else { echo 'style="display:none"'; } ?>><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				
				@endif
				@endforeach 
				
				<!--<tr onclick="select_tick(this,'batsman')" class="select_tick inactive">
					<td ><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8 <span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'batsman')">
					<td><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'batsman')">
					<td><img  src="{{url('public/site/image/batsman_icon.png')}}"> </td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8 <span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'batsman')">
					<td><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'batsman')">
					<td><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8 <span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'bowler')">
					<td><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'allrounder')">
					<td><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'wicketkeeper')">
					<td><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'wicketkeeper')">
					<td><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'wicketkeeper')">
					<td><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				<tr class="select_tick inactive" onclick="select_tick(this,'wicketkeeper')">
					<td><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td>Andile Phehlukwayo</td>
					<td>ENG</td>
					<td>80</td>
					<td>8<span class="tick" style="display:none"> <img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>-->
				
			</tbody>
								
								
								</table>
								</div>