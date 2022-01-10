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
								@foreach($all_players as $players)
									@if($players->player_role=='Bowler')
				 
		
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
				 
					<span class="tick" id="bowid_bow{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
				@endif
									
									@endforeach
									
								
								</tbody>
								
								
								</table>
								
			</div>