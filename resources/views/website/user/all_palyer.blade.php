		<div id="tableContainer" class="tableContainer" style="height:495px;">
		
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">
			
				<thead class="fixedHeader">
				<tr>
					<th >Info</th> 
					<th >Player</th>
					<th >Team</th>
					<th >Role</th>
					<th>Credits</th>
				</tr>
			</thead>
			<tbody class="scrollContent" style="height:452px;">
			{{--$match_id--}}
			
			  
			@foreach($all_players as $players)
			 
				@if($players->player_role=='Opening batsman' || $players->player_role=='Batsman' || $players->player_role=='Top-order batsman' || $players->player_role=='Middle-order batsman')
				
				
				
		
					<tr class="select_tick inactive" id="batsmanid{{$players->player_id}}"  onclick="select_tick(this,'batsman');">
					<td width="60px"><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td width="215px">{{$players->player_name}}</td>
					<td width="100px">{{$players->player_team_name}}</td>
					<td width="90px">{{$players->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$players->player_team_name}}">
					<input type="hidden" id="prole" value="{{$players->player_role}}">
					<input type="hidden" id="pid" value="{{$players->player_id}}">
					<input type="hidden" id="pname" value="{{$players->player_name}}">
					<input type="hidden" id="match_id" value="{{$players->match_id}}">
					<input type="hidden" id="credit_point" value="{{$players->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					</td>
					<td width="100px">
					{{$players->credit_point}}
					<span class="tick" id="batid{{$players->player_id}}" style="display:none">
					<img  src="{{url('public/site/image/tick.png')}}"> 
					</span></td>
				</tr>
				 @elseif($players->player_role=='No')
				
				
				
		
					<tr class="select_tick inactive" id="batsmanid{{$players->player_id}}" onclick="select_tick(this,'batsman');">
					<td width="60px"><img  src="{{url('public/site/image/batsman_icon.png')}}"></td>
					<td width="215px">{{$players->player_name}}</td>
					<td width="100px">{{$players->player_team_name}}</td>
					<td width="90px">{{$players->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$players->player_team_name}}">
					<input type="hidden" id="prole" value="{{$players->player_role}}">
					<input type="hidden" id="pid" value="{{$players->player_id}}">
					<input type="hidden" id="pname" value="{{$players->player_name}}">
					<input type="hidden" id="match_id" value="{{$players->match_id}}">
					<input type="hidden" id="credit_point" value="{{$players->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					</td>
					<td width="100px">
					{{$players->credit_point}}
					<span class="tick" id="batid{{$players->player_id}}" style="display:none">
					<img  src="{{url('public/site/image/tick.png')}}">
					</span>
					</td>
				</tr>
				 
				@elseif($players->player_role=='Bowler')
				 
		
					<tr class="select_tick inactive" id="bowlerid{{$players->player_id}}" onclick="select_tick(this,'bowler');">
					<td width="60px"><img  src="{{url('public/site/image/bowler_icon.png')}}"></td>
					<td width="215px">{{$players->player_name}}</td>
					<td width="100px">{{$players->player_team_name}}</td>
					<td width="90px">{{$players->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$players->player_team_name}}">
					<input type="hidden" id="prole" value="{{$players->player_role}}">
					<input type="hidden" id="pid" value="{{$players->player_id}}">
					<input type="hidden" id="pname" value="{{$players->player_name}}">
					<input type="hidden" id="match_id" value="{{$players->match_id}}">
					<input type="hidden" id="credit_point" value="{{$players->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					</td>
					<td width="100px">{{$players->credit_point}}
				 
					<span class="tick" id="bowid{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					 
				 
				@elseif($players->player_role=='Bowling allrounder' || $players->player_role=='Allrounder' || $players->player_role=='Batting allrounder')
				 
				 
		
					<tr class="select_tick inactive" id="allrounderid{{$players->player_id}}" onclick="select_tick(this,'allrounder');">
					<td width="60px"><img  src="{{url('public/site/image/all_icon.png')}}"></td>
					<td width="215px">{{$players->player_name}}</td>
					<td width="100px">{{$players->player_team_name}}</td>
					<td width="90px">{{$players->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$players->player_team_name}}">
					<input type="hidden" id="prole" value="{{$players->player_role}}">
					<input type="hidden" id="pid" value="{{$players->player_id}}">
					<input type="hidden" id="pname" value="{{$players->player_name}}">
					<input type="hidden" id="match_id" value="{{$players->match_id}}">
					<input type="hidden" id="credit_point" value="{{$players->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					</td>
					<td width="100px">
					{{$players->credit_point}}
					<span class="tick" id="allid{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					
				@elseif($players->player_role=='Wicketkeeper batsman' || $players->player_role=='Wicketkeeper')
				 
				<tr class="select_tick inactive" id="wktickid{{$players->player_id}}" onclick="select_tick(this,'wicketkeeper');">
					<td width="60px"><img  src="{{url('public/site/image/wk_icon.png')}}"></td>
					<td width="215px">{{$players->player_name}}</td>
					<td width="100px">{{$players->player_team_name}}</td>
					<td width="90px">{{$players->player_role}}</td>
					<td style="display:none;">
					<input type="hidden" id="pteamname" value="{{$players->player_team_name}}">
					<input type="hidden" id="prole" value="{{$players->player_role}}">
					<input type="hidden" id="pid" value="{{$players->player_id}}">
					<input type="hidden" id="pname" value="{{$players->player_name}}">
					<input type="hidden" id="match_id" value="{{$players->match_id}}">
					<input type="hidden" id="credit_point" value="{{$players->credit_point}}">
					<input type="hidden" id="team_no" value="{{$team_no}}"> 
					</td>
					<td width="100px">
					{{$players->credit_point}}	
					<span class="tick" id="wkid{{$players->player_id}}" style="display:none"><img src="{{url('public/site/image/tick.png')}}"> 
					</span>
					</td>
				</tr>
				@endif
				
				@endforeach
				
			</tbody>
			
			
			</table>
			</div>