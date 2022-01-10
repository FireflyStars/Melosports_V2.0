<style>
	tr.active{
		background:#e1e2fb;
	}

</style>

<div class="col-lg-6">
					
							<!-- <div class="credit">
								 
								<h4 class="credit-text">Credits Left. <span id="left_credit_point"> 
							
								</span></h4>
								<span class="float-right">
									All (<span id="allplayer_count_total"></span>/11)
								</span>
							</div> -->

							<div class="bg-white">
							<div class="clearfix">
								<div class="pull-left">
									<div class="cs-credits-left">Credits Left<span id="left_credit_point">0</span></div>
								</div>
								<div class="pull-right">
									<div class="cs-players-left">All (<span id="allplayer_count_total">0</span>/11)</div>
								</div>
							</div>
						</div>
							
							<div class="player">
							
							</div>
							
							<div class="select_player">
							
										<div class="tabbable" style="margin-bottom: 9px;">
                        <ul class="nav nav-tabs nav-player-tabs nav-justified">
                        	<!-- <li class="active"><a class="cs-player-total" href="#5a" data-toggle="tab">All (<span id="allplayer_count_total"></span>/11)</a></li> -->
                          <li><a  href="#1a" data-toggle="tab">
                          	<div class="cs-player-img-count"><img src="{{url('public/site/image/player-wk.png')}}" width="40"><span class="cs-player-total" id="wicketkeeper_total">0</span></div>
                          	 
                          	WK </a></li>
							<li><a  href="#2a" data-toggle="tab">
								<div class="cs-player-img-count">
								<img src="{{url('public/site/image/player-bt.png')}}" width="40">
								<span class="cs-player-total" id="batsman_count_total">0</span>
							</div>
								Batsman </a></li>
                          <li ><a  href="#3a" data-toggle="tab">
                          	<div class="cs-player-img-count">
                          	<img src="{{url('public/site/image/player-ar.png')}}" width="40">
                          	<span class="cs-player-total" id="allrounder_total">0</span>
                          </div>
                          	All-Roundrs </a></li>
							<li><a  href="#4a" data-toggle="tab">
								<div class="cs-player-img-count">
								<img src="{{url('public/site/image/player-bw.png')}}" width="40">
								<span class="cs-player-total" id="bowler_count">0</span>
							</div>
								Bowlers</a></li>
							 
					   
                        </ul>
                        <div class="tab-content tab-content-custom">
                          <div class="tab-pane" id="1a">
						  
						  		 

								<!-- @include('website.user.wk') -->
	<div id="tableContainer" class="table-responsive scrollTable">
	
	<table class="table" >
								
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
	@if($players->player_role=='Wicketkeeper batsman')
		<tr class="select_tick inactive" id="wktick_id{{$players->player_id}}" onclick="select_tick(this,'wicketkeeper');">
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
					<span class="tick" id="wkid_wk{{$players->player_id}}" style="display:none"><img src="{{url('public/site/image/tick.png')}}"> 
					</span></td>
				</tr>
				@endif
		
		@endforeach
	</tbody>
	
	
	</table>
						
				</div>
<script>

</script>
								 	
				
							
                          </div>
						   <div class="tab-pane" id="2a">
						  
								 

								<!--@include('website.user.batsman')-->
								 
								 
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
			 
				@if($players->player_role=='Opening batsman' || $players->player_role=='Batsman' || $players->player_role=='Top-order batsman' || $players->player_role=='Middle-order batsman')
				
				
				
		
					<tr class="select_tick inactive" id="batsman_id{{$players->player_id}}" onclick="select_tick(this,'batsman');">
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
					<span class="tick" id="batid_bat{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}">
					</span>
					</td>
				</tr>
				 @elseif($players->player_role=='No')
				
				
				
		
					<tr class="select_tick inactive" id="batsman_id{{$players->player_id}}" onclick="select_tick(this,'batsman');">
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
					<span class="tick" id="batid_bat{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> 
					</span>
					</td>
				</tr>
				
				@endif
				
				@endforeach
	
				
			</tbody>
			
			
			</table>
								
	</div>			

								 
							 			
                          </div>
						  
						   <div class="tab-pane" id="3a">
						  
									 

									 <!--@include('website.user.all_rounder')-->
									 
									 
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
				@if($players->player_role=='Bowling allrounder' || $players->player_role=='Allrounder')
					<tr class="select_tick inactive" id="all_rounderid{{$players->player_id}}" onclick="select_tick(this,'allrounder')">
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
<td width="100px">{{$players->credit_point}}
				 
					<span class="tick" id="allid_all{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
			@endif
									
									@endforeach
					
				
				</tbody>
				
				
				</table>
								
				</div>

								 
				
							
                          </div>
						  <div class="tab-pane" id="4a">
						  
								 

								 <!--@include('website.user.bowler')-->
								 
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
				 
		
					<tr class="select_tick inactive" id="bowler_id{{$players->player_id}}" onclick="select_tick(this,'bowler');">
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

								 		
				
							
                          </div>
						   
						   <div class="tab-pane active" id="5a">
						  
								 

								<!-- @include('website.user.all_palyer') -->
										<div id="tableContainer" class="tableContainer" style="height:495px;">
		
			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="scrollTable">
			
				<thead class="fixedHeader">
				<tr>
					<th width="59px">Info</th> 
					<th width="210px">Player</th>
					<th width="100px">Team</th>
					<th width="96px">Role</th>
					<th>Credits</th>
				</tr>
			</thead>
			<tbody class="scrollContent" style="height:452px;">
			{{--$match_id--}}
			
			  
			@foreach($all_players as $players)
			 
				@if($players->player_role=='Opening batsman' || $players->player_role=='Batsman' || $players->player_role=='Top-order batsman' || $players->player_role=='Middle-order batsman')
				
				
				
		
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
					<td width="100px">{{$players->credit_point}}<span class="tick" id="batid{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
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
					<td width="100px">{{$players->credit_point}}<span class="tick" id="batid{{$players->player_id}}" style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
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
				 
					<span class="tick" id="bowid{{$players->player_id}}"  style="display:none"><img  src="{{url('public/site/image/tick.png')}}"> </span></td>
				</tr>
					 
				 
				@elseif($players->player_role=='Bowling allrounder' || $players->player_role=='Allrounder')
				 
				 
		
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
					
				@elseif($players->player_role=='Wicketkeeper batsman')
				 
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
					</span></td>
				</tr>
				@endif
				
				@endforeach
				
			</tbody>
			
			
			</table>
			</div>

								 		
							
                          </div>
                        
						
                        </div>
                      </div> <!-- /tabbable -->
							
							
							</div>
							
					
					</div>