
<style>
	tr.active{
		background:#ffefca91;
	}

</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="col-crteam">
		<script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
				<style>
				.button_save
				{
				background-color: #a20505;color: white;border: none;width: 33%;height: 33px;
				}
				.button_disabled
				{
				background-color: #b3b3b2;color: white;border: none;width: 33%;height: 33px;
				}
				
				.dropdown-menu li:hover
				{
					background-color:#bababa;
				}
				
				</style>
						<div class="create_team" @if($user_team->replace_player) style="height:673px;" @else  style="height:550px;" @endif>
							<div class="team_top11">
								<p>	Update Team   </p> 
								
								
								
								
								  <div id="msg" style="display:none;">
								  
						<span style="color:red;">Vice Captain And Captain Must Be Different</span>
						</div>
						<div id="msg1" style="display:none;">
						<span style="color:red;">Replace Player And Captain Must Be Different</span>
					
							</div> 
							<div id="msg2" style="display:none;">
						<span style="color:red;">Replace Player should not be captain or vice captain</span>
					
							</div> 
							<div id="cant-empty-sub" style="display:none;">
						<span style="color:red;">Replace Player And subStitute should not be Empty </span>
					
							</div> 
								{{--@if($user_team->replace_player)
									<div class="btn-group" style="width: 25%;">
											  <button class="btn dropdown-toggle btn-select"  id="substitute" data-toggle="modal" data-target="#subStitute" style="border: 3px solid #b3b3b2;border-radius:0px;background-color: #efef3d;" disabled>
											  Substitute</button>
											  
											</div>
								@endif --}}
								
								
								
								
							</div>
							
							<!--  Player Selection Pitch  -->
			<div class="cs-pitch">
        		<div class="cs-pitch-content">
        			<div class="cs-pitch-row-title">Wiket Keeper</div>
        			<div class="cs-pitch-row" id="wkapp_new">
        				<div class="cs-pitch-col" id="remwk_new1">
        				  <!-- Player  -->
        					<div class="cs-pitch-payer">
        						<!-- <div class="cs-pitch-cap">C</div> -->
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name" style="background: #ff9800"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        			</div>

        			<div class="cs-pitch-row-title">Batsmen</div>
        			<div class="cs-pitch-row" id="batapp_new">
        				<div class="cs-pitch-col" id="rembat_new1">
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col" id="rembat_new2">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col" id="rembat_new3">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col" id="rembat_new4">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        			</div>
        			
        			<div class="cs-pitch-row-title">All Rounders</div>
        			<div class="cs-pitch-row" id="allapp_new">
        				<div class="cs-pitch-col" id="remall_new1">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name" style="background: #ff9800"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col" id="remall_new2">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col" id="remall_new3">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        			</div>
        			
        			<div class="cs-pitch-row-title">Bowlers</div>
        			<div class="cs-pitch-row" id="bowapp_new">
        				<div class="cs-pitch-col" id="rembow_new1">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col"  id="rembow_new2">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        				<div class="cs-pitch-col"  id="rembow_new3">
        				 	<!-- Player  -->
        					<div class="cs-pitch-payer">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
        						<div class="cs-pitch-payer-name"></div>
        						<div class="cs-pitch-payer-points"></div>
        					</div>
        				 	<!-- Player End  -->
        				</div>
        			</div>
        		</div>
        	</div>
		<!--  /Player Selection Pitch  -->
							
							
							
							
							
							
							<div class="team_bottom">
							
							   <div class="create" style="margin-left:0px;background:none;width:100%;"><button class="button_disabled" id="change_buttton" disabled>Update Team</button>
							   <input type="hidden" name="match_id" id="match_id" value="{{$match_id}}">	
							   <input type="hidden" name="team_no" id="team_no" value="{{$team_no}}">
							   <input type="hidden" name="players_count" id="players_count" value=""></div>
							 
							
								<div class="captain" style=" width: 38%; float: left;">
									 <h5>Captain </h5>
									<center>
		<div class=" " style="width:100%;margin-left:0px;">
										<div class=" " style="border: none;">
				 <div class="btn-group" style="width: 100%;">
				  <button class="btn dropdown-toggle btn-select" id="captain" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;" disabled><input type="hidden" name="captain_id" id="captain_id" value="{{$user_team->captain}}"><?php $cap=DB::table('fantasy_team_players')->whereplayer_id($user_team->captain)->wherematch_id($match_id)->first();?><span class="removing_cap"> {{$cap->player_name}} </span><span class="caret"></span></button>
				  <ul class="dropdown-menu"  id="click_captain" style="min-width: 100%;border-radius:0px;padding: 0px 0;margin: 0px 0 0; height: 242px; overflow: scroll;    overflow-x: hidden;">
				  
				  <!-- batting-->
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_c1">&nbsp;&nbsp;
					<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_batting_c1" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_batting_c1" value="">
					<span id="view_player_name_batting_c1"></span> / <span id="view_player_team_name_batting_c1"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_c2">&nbsp;&nbsp;
					<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_batting_c2" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_batting_c2" value="">
					<span id="view_player_name_batting_c2"></span> / <span id="view_player_team_name_batting_c2"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_c3">&nbsp;&nbsp;
					<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_batting_c3" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_batting_c3" value="">
					<span id="view_player_name_batting_c3"></span> / <span id="view_player_team_name_batting_c3"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_c4">&nbsp;&nbsp;
					<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_batting_c4" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_batting_c4" value="">
					<span id="view_player_name_batting_c4"></span> / <span id="view_player_team_name_batting_c4"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_c5">&nbsp;&nbsp;
					<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_batting_c5" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_batting_c5" value="">
					<span id="view_player_name_batting_c5"></span> / <span id="view_player_team_name_batting_c5"></span>
					</li>
					
					<!-- bowling -->
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_c1">&nbsp;&nbsp;
					<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_bowler_c1" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_bowler_c1" value="">
					<span id="view_player_name_bowler_c1"></span> / <span id="view_player_team_name_bowler_c1"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_c2">&nbsp;&nbsp;
					<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_bowler_c2" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_bowler_c2" value="">
					<span id="view_player_name_bowler_c2"></span> / <span id="view_player_team_name_bowler_c2"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_c3">&nbsp;&nbsp;
					<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_bowler_c3" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_bowler_c3" value="">
					<span id="view_player_name_bowler_c3"></span> / <span id="view_player_team_name_bowler_c3"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_c4">&nbsp;&nbsp;
					<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_bowler_c4" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_bowler_c4" value="">
					<span id="view_player_name_bowler_c4"></span> / <span id="view_player_team_name_bowler_c4"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_c5">&nbsp;&nbsp;
					<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_bowler_c5" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_bowler_c5" value="">
					<span id="view_player_name_bowler_c5"></span> / <span id="view_player_team_name_bowler_c5"></span>
					</li>
					
					
					<!-- allrounder -->
					
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_c1">&nbsp;&nbsp;
					<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_allrounder_c1" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_allrounder_c1" value="">
					<span id="view_player_name_allrounder_c1"></span> / <span id="view_player_team_name_allrounder_c1"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_c2">&nbsp;&nbsp;
					<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_allrounder_c2" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_allrounder_c2" value="">
					<span id="view_player_name_allrounder_c2"></span> / <span id="view_player_team_name_allrounder_c2"></span>
					</li>
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_c3">&nbsp;&nbsp;
					<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_allrounder_c3" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_allrounder_c3" value="">
					<span id="view_player_name_allrounder_c3"></span> / <span id="view_player_team_name_allrounder_c3"></span>
					</li>
					
					<!-- wicketkeeper -->
					
					<li style="line-height: 41px;font-size: 10px;display:none;" id="player_wicketkeeper_c1">&nbsp;&nbsp;
					<img src="{{url('public/site/image/wk_icon.png')}}" style="width:26px;">
					<input type="hidden" class="captainid" id="captain_id_wicketkeeper_c1" value=""> 
					<input type="hidden" class="captainname"  id="captain_name_wicketkeeper_c1" value="">
					<span id="view_player_name_wicketkeeper_c1"></span> / <span id="view_player_team_name_wicketkeeper_c1"></span>
					</li>
					
				  </ul>
				</div>
			</div>
										<script>
										$(document).ready(function(){
											
										$("#click_captain").on("click",".test",  function(){
											//alert("testing");
										  var vcid=$('#vicecaptain_id').val();
										  var replace_id=$('#selected_replace_player_id').val();
										
										  var selid = $(this).find('.captainid').val();
										  var selname = $(this).find('.captainname').val();
										  $('#change_buttton').prop('disabled', false);
										   if(vcid==selid ){
											    $('#msg').show();
											   setTimeout(function() {
												   $('#msg').hide(); 
      // Do something every 5 seconds
                                                      }, 5000);
											   
											 console.log('Vice Captain And Captain Must Be Different');
										  }
										  else if(replace_id==selid)
										  {
											   $('#msg1').show();
											   setTimeout(function() {
												   $('#msg1').hide(); 
      // Do something every 5 seconds
                                                      }, 5000); 
											   console.log('Replace Player And Captain Must Be Different');
										  } 
										  
										  else
										  {
										  $(this).parents('.btn-group').find('.dropdown-toggle').html('<input type="hidden" name="captain_id" id="captain_id" value="'+selid+'">'+selname+' <span class="caret"></span>');
										  }
										});
										});
										</script>
										
										
									</div>
									</center>						
								</div>
								
								<div class="vc_captain" style=" width: 40%; float: left;">
								<h5>Vice Captain </h5>
									<center>
									<div class=" " style="width:100%;margin-left:0px;">
										<div class=" " style="border: none;">
											 <div class="btn-group" style="width: 100%;">
											  <button class="btn dropdown-toggle btn-select" id="vicecaptain" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;" disabled>
											  <input type="hidden" name="vicecaptain_id" id="vicecaptain_id" value="{{$user_team->vice_captain}}"><?php $cap=DB::table('fantasy_team_players')->whereplayer_id($user_team->vice_captain)->wherematch_id($match_id)->first();?><span class="removing_vice"> {{$cap->player_name}} </span><span class="caret"></span></button>
											  <ul class="dropdown-menu" id="click_vicecaptain" style="min-width: 100%;border-radius:0px;padding: 0px 0;margin: 0px 0 0; height: 242px; overflow: scroll;  overflow-x: hidden;">
											  
											  <!-- batting-->
											  	<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_vc1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_batting_vc1" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_batting_vc1" value="">
												<span id="view_player_name_batting_vc1"></span> / <span id="view_player_team_name_batting_vc1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_vc2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_batting_vc2" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_batting_vc2" value="">
												<span id="view_player_name_batting_vc2"></span> / <span id="view_player_team_name_batting_vc2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_vc3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_batting_vc3" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_batting_vc3" value="">
												<span id="view_player_name_batting_vc3"></span> / <span id="view_player_team_name_batting_vc3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_vc4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_batting_vc4" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_batting_vc4" value="">
												<span id="view_player_name_batting_vc4"></span> / <span id="view_player_team_name_batting_vc4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_vc5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_batting_vc5" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_batting_vc5" value="">
												<span id="view_player_name_batting_vc5"></span> / <span id="view_player_team_name_batting_vc5"></span>
												</li>
												
												<!-- bowling -->
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_bowler_vc1" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_bowler_vc1" value="">
												<span id="view_player_name_bowler_vc1"></span> / <span id="view_player_team_name_bowler_vc1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_bowler_vc2" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_bowler_vc2" value="">
												<span id="view_player_name_bowler_vc2"></span> / <span id="view_player_team_name_bowler_vc2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_bowler_vc3" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_bowler_vc3" value="">
												<span id="view_player_name_bowler_vc3"></span> / <span id="view_player_team_name_bowler_vc3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_bowler_vc4" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_bowler_vc4" value="">
												<span id="view_player_name_bowler_vc4"></span> / <span id="view_player_team_name_bowler_vc4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_bowler_vc5" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_bowler_vc5" value="">
												<span id="view_player_name_bowler_vc5"></span> / <span id="view_player_team_name_bowler_vc5"></span>
												</li>
												
												
												<!-- allrounder -->
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_vc1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_allrounder_vc1" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_allrounder_vc1" value="">
												<span id="view_player_name_allrounder_vc1"></span> / <span id="view_player_team_name_allrounder_vc1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_vc2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_allrounder_vc2" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_allrounder_vc2" value="">
												<span id="view_player_name_allrounder_vc2"></span> / <span id="view_player_team_name_allrounder_vc2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_vc3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_allrounder_vc3" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_allrounder_vc3" value="">
												<span id="view_player_name_allrounder_vc3"></span> / <span id="view_player_team_name_allrounder_vc3"></span>
												</li>
												
												<!-- wicketkeeper -->
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_wicketkeeper_vc1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/wk_icon.png')}}" style="width:26px;">
												<input type="hidden" class="captainid" id="captain_id_wicketkeeper_vc1" value=""> 
												<input type="hidden" class="captainname"  id="captain_name_wicketkeeper_vc1" value="">
												<span id="view_player_name_wicketkeeper_vc1"></span> / <span id="view_player_team_name_wicketkeeper_vc1"></span>
												</li>
												
											  </ul>
											</div>
										</div>
										<script>
										$(document).ready(function(){

										$("#click_vicecaptain").on("click",".test",  function(){
											//alert("test");
											
										  var cid=$('#captain_id').val();
										    var replace_id=$('#selected_replace_player_id').val();
										  var selid = $(this).find('.captainid').val();
										  var selname = $(this).find('.captainname').val();
										  $('#change_buttton').prop('disabled', false);
										  if(cid==selid ){
											   $('#msg').show(); 
											  setTimeout(function() {
												   $('#msg').hide(); 
      // Do something every 5 seconds
                                                      }, 5000);
											  console.log('Captain And ViceCaptain Must Be Different');
										  }
										   else if(replace_id==selid)
										  {
											  $('#msg1').show(); 
											 setTimeout(function() {
												   $('#msg1').hide(); 
      // Do something every 5 seconds
                                                      }, 5000);
											   console.log('Replace Player And ViceCaptain Must Be Different');
										  } 
										  else
										  {
										  $(this).parents('.btn-group').find('.dropdown-toggle').html('<input type="hidden" name="vicecaptain_id" id="vicecaptain_id" value="'+selid+'">'+selname+' <span class="caret"></span>');
										  }
										   if(cid=='' || selid==''  ){
											 $('#change_buttton').prop('disabled', true); 
										  }
										}); 
										}); 
										</script>
									</div>
									</center>							
								</div>
								
								@if($user_team->replace_player)
								<div class="captain">
								<h5>Replace Player </h5>
									<center>
									<div class=" " style="width:100%;margin-left:0px;">
										<div class=" " style="border: none;">
											 <div class="btn-group drpselected" style="width: 100%;">
									<button class="btn dropdown-toggle btn-select" id="replace_player" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;" >Select Replace <span class="caret"></span></button>
											  <ul class="dropdown-menu" id="replace_player" style="min-width: 90%;border-radius:0px;padding: 0px 0;margin: 0px 0 0; height: 242px; overflow: scroll;  overflow-x: hidden;top: 58%;left: 16px;width:90%">
											  
											  <!-- batting-->
											  	<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit1" value="">
												<span id="view_player_name_batting_selected1"></span> / <span id="view_player_name_batting_selected_credit1"></span> / <span id="view_player_team_name_batting_selected1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit2" value="">
												<span id="view_player_name_batting_selected2"></span> / <span id="view_player_name_batting_selected_credit2"></span> / <span id="view_player_team_name_batting_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit3" value="">
												<span id="view_player_name_batting_selected3"></span> / <span id="view_player_name_batting_selected_credit3"></span> / <span id="view_player_team_name_batting_selected3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting4" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting4" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit4" value="">
												<span id="view_player_name_batting_selected4"></span> / <span id="view_player_name_batting_selected_credit4"></span> / <span id="view_player_team_name_batting_selected4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting5" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting5" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit5" value="">
												<span id="view_player_name_batting_selected5"></span> / <span id="view_player_name_batting_selected_credit5"></span> / <span id="view_player_team_name_batting_selected5"></span>
												</li>
												
												<!-- bowling -->
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit1" value="">
												<span id="view_player_name_bowler_selected1"></span> / <span id="view_player_name_bowler_selected_credit1"></span> / <span id="view_player_team_name_bowler_vc1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit2" value="">
												<span id="view_player_name_bowler_selected2"></span> / <span id="view_player_name_bowler_selected_credit2"></span> / <span id="view_player_team_name_bowler_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit3" value="">
												<span id="view_player_name_bowler_selected3"></span> / <span id="view_player_name_bowler_selected_credit3"></span> / <span id="view_player_team_name_bowler_selected3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler4" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler4" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit4" value="">
												<span id="view_player_name_bowler_selected4"></span> / <span id="view_player_name_bowler_selected_credit4"></span> / <span id="view_player_team_name_bowler_selected4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler5" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler5" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit5" value="">
												<span id="view_player_name_bowler_selected5"></span> / <span id="view_player_name_bowler_selected_credit5"></span> / <span id="view_player_team_name_bowler_selected5"></span>
												</li>
												
												
												<!-- allrounder -->
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit1" value="">
												<span id="view_player_name_allrounder_selected1"></span> / <span id="view_player_name_allrounder_selected_credit1"></span> / <span id="view_player_team_name_allrounder_selected1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit2" value="">
												<span id="view_player_name_allrounder_selected2"></span> / <span id="view_player_name_allrounder_selected_credit2"></span> / <span id="view_player_team_name_allrounder_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit3" value="">
												<span id="view_player_name_allrounder_selected3"></span> / <span id="view_player_name_allrounder_selected_credit3"></span> / <span id="view_player_team_name_allrounder_selected3"></span>
												</li>
												
												<!-- wicketkeeper -->
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_wicketkeeper_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/wk_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_wicketkeeper1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_wicketkeeper1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_wicketkeeper_credit1" value="">
												<span id="view_player_name_wicketkeeper_selected1"></span> / <span id="view_player_name_wicketkeeper_selected_credit1"></span> / <span id="view_player_team_name_wicketkeeper_selected1"></span>
												</li>
												
											  </ul>
											  </div>	
											  </div>	
											  <script>
										$("#replace_player li").click(function(){
										  var selid = $(this).find('.selected_id').val();
										  var selname = $(this).find('.selected_name').val();
										  var credit_point = $(this).find('.selected_credit').val();
										   var cid=$('#captain_id').val();
										   
										  // alert('sdfsdf');
										   var vicecaptain_id=$('#vicecaptain_id').val();
										 if(selid != cid &&  selid != vicecaptain_id)
										 {
											 
											
											// selid='mahi';
										$('#error_not_same_credit_point').hide();
										  $(this).parents('.drpselected').find('.dropdown-toggle').html('<input type="hidden" name="selected_replace_player_id" id="selected_replace_player_id" value="'+selid+'"><input type="hidden" name="selected_credit_point" id="selected_credit_point" value="'+credit_point+'">'+selname+' <span class="caret"></span>');
										  
										  $('#substitute_player').html('Select Substitute <span class="caret"></span>');
										  $('#err_captain_vice_select').hide();
										 
										 $('#selected_substitute_player_id').removeAttr('value');
											 $('#substitute_player').text('Select substitute');
										 }
										 else
										 {
											 $('#msg2').show();
											  setTimeout(function() {
												   $('#msg2').hide(); 
      // Do something every 5 seconds
                                                      }, 5000);
											$('#err_captain_vice_select').show(); 
										 }
										 
										})
										</script>
									
									</div>
									</center>
									
								</div>	
								
								<div class="vc_captain">
								<h5>Substitute Player </h5>
									<center>
									<div class="palyer_icon" style="width:100%;margin-left:0px;">
										<div class="palyer_img" style="border: none;height:50px;">
											 <div class="btn-group drpnselected" style="width: 100%;">
									<div class="substitute_players">
												   
												  </div>
								</div>
								</div>
								</div>
								</div>
								
								@endif
								
								
								
								
								
								
								
								{{--	<div class="batsman" id="batapp">
								
									
									<div class="palyer_icon" id="rembat1">
										<div class="palyer_img" id="batsman1">
											<img  src="{{url('public/site/image/batsman.png')}}">
											
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="batsmanp1" value="">
											<input type="text" style="width:100%; border: none;text-align: center;font-size: 9px;"  readonly id="batsmanpname1" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembat2">
										<div class="palyer_img" id="batsman2">
											<img  src="{{url('public/site/image/batsman.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="batsmanp2" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;"  type="text" readonly id="batsmanpname2" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembat3">
										<div class="palyer_img" id="batsman3">
											<img  src="{{url('public/site/image/batsman.png')}}">
										</div>
										<div>
											<input  type="hidden"  name="playersid[]" id="batsmanp3" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;"  type="text" readonly id="batsmanpname3" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembat4">
										<div class="palyer_img" id="batsman4">
											<img  src="{{url('public/site/image/batsman.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]"  id="batsmanp4" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;"  type="text" readonly id="batsmanpname4" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembat5">
										<div class="palyer_img" id="batsman5">
											<img  src="{{url('public/site/image/batsman.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="batsmanp5" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="batsmanpname5" value="">
											
										</div>
									</div>
								
								</div>  
								
								<div class="bowler" id="bowapp">
								
									
									<div class="palyer_icon" id="rembow1">
										<div class="palyer_img" id="bowler1">
											<img  src="{{url('public/site/image/bowler.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="bowlerp1" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="bowlerpname1" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembow2" >
										<div class="palyer_img" id="bowler2">
											<img  src="{{url('public/site/image/bowler.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="bowlerp2" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="bowlerpname2" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembow3">
										<div class="palyer_img" id="bowler3">
											<img  src="{{url('public/site/image/bowler.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="bowlerp3" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="bowlerpname3" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembow4">
										<div class="palyer_img" id="bowler4">
											<img  src="{{url('public/site/image/bowler.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="bowlerp4" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="bowlerpname4" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="rembow5">
										<div class="palyer_img" id="bowler5">
											<img  src="{{url('public/site/image/bowler.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="bowlerp5" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="bowlerpname5" value="">
											
										</div>
									</div>
								
								</div> 
								
								<div class="allrounder" id="allapp">
								
									
									<div class="palyer_icon" id="remall1" style="width:30%;">
										<div class="palyer_img"  id="allrounder1">
											<img  src="{{url('public/site/image/all_rounder.png')}}">
										</div>
										<div>
											<input type="hidden"  name="playersid[]" id="allrounderp1" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="allrounderpname1" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="remall2" style="width:30%;">
										<div class="palyer_img"  id="allrounder2">
											<img  src="{{url('public/site/image/all_rounder.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="allrounderp2" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="allrounderpname2" value="">
											
										</div>
									</div>
									<div class="palyer_icon" id="remall3" style="width:30%;">
										<div class="palyer_img"  id="allrounder3">
											<img  src="{{url('public/site/image/all_rounder.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="allrounderp3" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="allrounderpname3" value="">
											
										</div>
									</div>
																
								</div>
								
								<div class="wicketkeeper" id="wkapp">
								
									
									<div class="palyer_icon" id="remwk1" style="width:54%;margin-left:20%;">
										<div class="palyer_img"  id="wicketkeeper1">
											<img  src="{{url('public/site/image/wk.png')}}">
										</div>
										<div>
											<input type="hidden" name="playersid[]" id="wicketkeeperp1" value="">
											<input style="width:100%; border: none;text-align: center;font-size: 9px;" type="text" readonly id="wicketkeeperpname1" value="">
											
										</div>
									
									</div>
																	
								</div> --}}
								
								
								<div class="substitute" style=" width: 22%; float: left;">
								
								<!--<h5>Substitute</h5>-->
									<center>
									<div class="palyer_icon" style="width:100%;margin-left:0px;">
										<div class="palyer_img" style="border: none;">
											
											
											
											
										</div>
										 <!--substitute
										 <div id="subStitute" class="modal fade" role="dialog" style="overflow-y: hidden;    top: 5%;">
											  <div class="modal-dialog">
												 
												
												<div class="modal-content" style="margin-left: 0px;width:100%;height: 410px">
												  <div class="modal-header"  >
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Substitute Selection</h4>
												  </div>					
												  <div class="modal-header" id="error_not_same_credit_point" style="display:none;">
													 <span style="color:red;">Please select player with same credit point  !!</span>
												  </div> 
												  <div class="modal-header" id="err_captain_vice_select" style="display:none;">
													 <span style="color:red;">Captain and Vice captain cannot be replaced!!</span>
												  </div>
												 
												  <div style="width:100%;">
												  
												  <div class="modal-body drpselected" style="height: 125px;float:left;width: 50%;">
												  Select Replace Player <br><button class="btn dropdown-toggle btn-select" id="replace_player" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;" >Select Replace <span class="caret"></span></button>
											  <ul class="dropdown-menu" id="replace_player" style="min-width: 90%;border-radius:0px;padding: 0px 0;margin: 0px 0 0; height: 242px; overflow: scroll;  overflow-x: hidden;top: 58%;left: 16px;width:90%">
											  
											 
											  	<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit1" value="">
												<span id="view_player_name_batting_selected1"></span> / <span id="view_player_name_batting_selected_credit1"></span> / <span id="view_player_team_name_batting_selected1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit2" value="">
												<span id="view_player_name_batting_selected2"></span> / <span id="view_player_name_batting_selected_credit2"></span> / <span id="view_player_team_name_batting_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit3" value="">
												<span id="view_player_name_batting_selected3"></span> / <span id="view_player_name_batting_selected_credit3"></span> / <span id="view_player_team_name_batting_selected3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting4" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting4" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit4" value="">
												<span id="view_player_name_batting_selected4"></span> / <span id="view_player_name_batting_selected_credit4"></span> / <span id="view_player_team_name_batting_selected4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_batting_selected5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_batting5" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_batting5" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_batting_credit5" value="">
												<span id="view_player_name_batting_selected5"></span> / <span id="view_player_name_batting_selected_credit5"></span> / <span id="view_player_team_name_batting_selected5"></span>
												</li>
												
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit1" value="">
												<span id="view_player_name_bowler_selected1"></span> / <span id="view_player_name_bowler_selected_credit1"></span> / <span id="view_player_team_name_bowler_vc1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit2" value="">
												<span id="view_player_name_bowler_selected2"></span> / <span id="view_player_name_bowler_selected_credit2"></span> / <span id="view_player_team_name_bowler_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit3" value="">
												<span id="view_player_name_bowler_selected3"></span> / <span id="view_player_name_bowler_selected_credit3"></span> / <span id="view_player_team_name_bowler_selected3"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_selected4">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler4" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler4" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit4" value="">
												<span id="view_player_name_bowler_selected4"></span> / <span id="view_player_name_bowler_selected_credit4"></span> / <span id="view_player_team_name_bowler_selected4"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_bowler_vc5">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_bowler5" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_bowler5" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_bowler_credit5" value="">
												<span id="view_player_name_bowler_selected5"></span> / <span id="view_player_name_bowler_selected_credit5"></span> / <span id="view_player_team_name_bowler_selected5"></span>
												</li>
												
												
												
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit1" value="">
												<span id="view_player_name_allrounder_selected1"></span> / <span id="view_player_name_allrounder_selected_credit1"></span> / <span id="view_player_team_name_allrounder_selected1"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected2">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder2" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder2" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit2" value="">
												<span id="view_player_name_allrounder_selected2"></span> / <span id="view_player_name_allrounder_selected_credit2"></span> / <span id="view_player_team_name_allrounder_selected2"></span>
												</li>
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_allrounder_selected3">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_allrounder3" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_allrounder3" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_allrounder_credit3" value="">
												<span id="view_player_name_allrounder_selected3"></span> / <span id="view_player_name_allrounder_selected_credit3"></span> / <span id="view_player_team_name_allrounder_selected3"></span>
												</li>
												
												
												
												<li style="line-height: 41px;font-size: 10px;display:none;" id="player_wicketkeeper_selected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/wk_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="selected_id_wicketkeeper1" value=""> 
												<input type="hidden" class="selected_name"  id="selected_name_wicketkeeper1" value="">
												<input type="hidden" class="selected_credit"  id="selected_name_wicketkeeper_credit1" value="">
												<span id="view_player_name_wicketkeeper_selected1"></span> / <span id="view_player_name_wicketkeeper_selected_credit1"></span> / <span id="view_player_team_name_wicketkeeper_selected1"></span>
												</li>
												
											  </ul>
											  <script>
										$("#replace_player li").click(function(){
										  var selid = $(this).find('.selected_id').val();
										  var selname = $(this).find('.selected_name').val();
										  var credit_point = $(this).find('.selected_credit').val();
										   var cid=$('#captain_id').val();
										   
										   var vicecaptain_id=$('#vicecaptain_id').val();
										 if(selid != cid &&  selid != vicecaptain_id)
										 {
											// selid='mahi';
										$('#error_not_same_credit_point').hide();
										  $(this).parents('.drpselected').find('.dropdown-toggle').html('<input type="hidden" name="selected_replace_player_id" id="selected_replace_player_id" value="'+selid+'"><input type="hidden" name="selected_credit_point" id="selected_credit_point" value="'+credit_point+'">'+selname+' <span class="caret"></span>');
										  
										  $('#substitute_player').html('Select Substitute <span class="caret"></span>');
										  $('#err_captain_vice_select').hide();
										 }
										 else
										 {
											$('#err_captain_vice_select').show(); 
										 }
										 
										})
										</script>
												  
												  </div>
												  <div class="substitute_players">
												   
												  </div>
												  </div>
												
												  <div class="modal-footer">
													<button class="button_disabled" id="change_buttton1" disabled style="margin-left: 0px; color:#fff; margin-top: 35%;">Save Team</button>
												  </div>
												</div>
												<style>
												
												.dropdown-menu li:hover
												{
													background-color:#bababa;
												}
												</style>
											
											  </div>
											</div>
										 
										 <!-- end substitute--> 
										 
									</div>
									</center>							
								</div>
								<script>
										//$("#substitute").click(function(){
										$(document).ready(function(){
											
										  var cid=$('#captain_id').val();
										 // var selid = $(this).find('.captainid').val();
										 // var selname = $(this).find('.captainname').val();
										  var matchid = $('#match_id').val();
										  var team_no = $('#team_no').val();
										  
										  
											  $("#change_buttton").removeClass("button_disabled");
												$("#change_buttton").addClass("button_save");
												$('#change_buttton').prop('disabled', false);
												
												$("#change_buttton1").removeClass("button_disabled");
												$("#change_buttton1").addClass("button_save");
												$('#change_buttton1').prop('disabled', false);
												
												
										  
										   var vicecaptain_id=$('#vicecaptain_id').val();
										  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
											$.ajax({
												url:"{{url('edit-selected-team-player')}}",
												type: 'POST',
											   // dataType: 'JSON',
												data: {matchid: matchid,team_no: team_no,cid: cid,vicecaptain_id: vicecaptain_id,_token:CSRF_TOKEN}, //get model dan ukuran
												success: function (content) {
													//alert('adasdasd');
													 $(".substitute_players").html(content);
												  
												}
											});
										
										});
										 
										</script>
										
										
										
										<script>
									//$("#substitute").click(function(){
										$("#click_captain li,#click_vicecaptain li").click(function(){
											
										  var cid=$('#captain_id').val();
										 // var selid = $(this).find('.captainid').val();
										 // var selname = $(this).find('.captainname').val();
										  var matchid = $('#match_id').val();
										  var team_no = $('#team_no').val();
										  
										  
											  $("#change_buttton").removeClass("button_disabled");
												$("#change_buttton").addClass("button_save");
												$('#change_buttton').prop('disabled', false);
												
												$("#change_buttton1").removeClass("button_disabled");
												$("#change_buttton1").addClass("button_save");
												$('#change_buttton1').prop('disabled', false);
												
											 
										  
										   var vicecaptain_id=$('#vicecaptain_id').val();
										  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
											$.ajax({
												url:"{{url('edit-selected-team-player')}}",
												type: 'POST',
											   // dataType: 'JSON',
												data: {matchid: matchid,team_no: team_no,cid: cid,vicecaptain_id: vicecaptain_id,_token:CSRF_TOKEN}, //get model dan ukuran
												success: function (content) {
													//alert('adasdasd');
													 $(".substitute_players").html(content);
													 $('#selected_substitute_player_id').removeAttr('value');
											 $('#substitute_player').text('Select substitute');	
												  
												}
											});
										
										});
										
										</script>
								
							
							</div>
							
						
						</div>
						
				
				</div>	
				
				

				
				<script>
				/* 
				$("#change_buttton").click(function(this) {
				
				var matchid=$("#match_id"").val();
				var playersjson=$('input[name="playersid[]"]').val();
				var playersid=JSON.parse(playersjson);
				var captainid=$("#captain_id").val();
				var vicecaptainid=$("#vicecaptain_id").val();
				
				
				
				var saveData = $.ajax({
					type: 'POST',
					url: "{{url('user-create-team-post')}}",
					data: matchid,playersid,captainid,vicecaptainid,
					dataType: "text",
					success: function(resultData) { 
					alert("Save Complete"); }
					});
					saveData.error(function() { 
					alert("Something went wrong");
					});
					}); */
					
				</script>
					<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

					
<script>

	$("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false);

		$('#change_buttton,#change_buttton1').click(function () {
			
			
				var matchid=$("#match_id").val();
				var playersjson=$('input[name="playersid[]"]').map(function(){return $(this).val();}).get();
				//var playersid=JSON.parse(playersjson);
				//console.log(playersid);
				//var inps = document.getElementsByName('playersid[]');
				//alert(inps.length);
				
				var captainid=$("#captain_id").val();
				var vicecaptainid=$("#vicecaptain_id").val();
var teamno=$("#team_no").val();


	var selected_replace_player_id=$("#selected_replace_player_id").val();
				var selected_substitute_player_id=$("#selected_substitute_player_id").val();
				
				<?php if($user_team->replace_player){ ?>
				if(!selected_replace_player_id || !selected_substitute_player_id)
				{
					  $('#cant-empty-sub').show(); 
											 setTimeout(function() {
												   $('#cant-empty-sub').hide(); 
      // Do something every 5 seconds
                                                      }, 5000);
													  return false;
				}
				<?php } ?>
					
    
	 //console.log(unique);
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"{{url('user-update-team-post')}}",
                type: 'POST',
               // dataType: 'JSON',
                data: {matchid: matchid,playersjson: playersjson,captainid: captainid,vicecaptainid: vicecaptainid,teamno :teamno,selected_replace_player_id: selected_replace_player_id,selected_substitute_player_id: selected_substitute_player_id,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    //console.log(content);
					//$('#change-filter').html(content)
				
					/* var hostname = window.location.origin
					window.location.href=hostname+"/main";  */					var getUrl = window.location;var baseUrl = /* getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];					window.location.href =baseUrl+"/main"; */
					<?php $url2 = url('/'); ?>
                  window.location.href ="<?php echo $url2; ?>/main";
                }
            });
        });
   	
	</script>
	