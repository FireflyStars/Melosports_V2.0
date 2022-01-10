  <div class="modal-body drpnselected" style="height: 125px;float:left;width: 50%;">
													Select Substitute Player <br><button class="btn dropdown-toggle btn-select" id="substitute_player" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;" >Select Substitute <span class="caret"></span></button>
											  <ul class="dropdown-menu" id="substitute_player" style="min-width: 90%;border-radius:0px;padding: 0px 0;margin: 0px 0 0; height: 242px; overflow: scroll;  overflow-x: hidden;top: 58%;left: 16px;width:90%;">
											  
								
											 @foreach($substitute_players as $playerselected)
												@php($players=DB::table('fantasy_team_players')->whereplayer_id($playerselected)->first())
											@if($players->player_role=='Opening batsman' || $players->player_role=='Batsman' || $players->player_role=='Top-order batsman' || $players->player_role=='Middle-order batsman')
									
											  
											  
											  	<li style="line-height: 41px;font-size: 10px;display:block;">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="nselected_id_batting1" value="{{$players->player_id}}"> 
												<input type="hidden" class="selected_name"  id="nselected_name_batting1" value="{{$players->player_name}}">
												<input type="hidden" class="credit_point_subs" value="{{$players->credit_point}}">
												<span id="view_player_name_batting_nselected1"> {{$players->player_name}}</span>/ <span>{{$players->credit_point}}</span>
												</li>
												
											 @elseif($players->player_role=='No')	
												
												
												<li style="line-height: 41px;font-size: 10px;display:block;"">&nbsp;&nbsp;
												<img src="{{url('public/site/image/batsman_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="nselected_id_batting1" value="{{$players->player_id}}"> 
												<input type="hidden" class="selected_name"  id="nselected_name_batting1" value="{{$players->player_name}}">
												<input type="hidden" class="credit_point_subs" value="{{$players->credit_point}}">
												<span id="view_player_name_batting_nselected1"> {{$players->player_name}}</span>/ <span>{{$players->credit_point}}</span>
												</li>
												 
												
												<!-- bowling -->
												
													@elseif($players->player_role=='Bowler')
													
												<li style="line-height: 41px;font-size: 10px;display:block;" id="player_bowler_nselected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/bowler_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="nselected_id_bowler1" value="{{$players->player_id}}"> 
												<input type="hidden" class="selected_name"  id="nselected_name_bowler1" value="{{$players->player_name}}">
												<input type="hidden" class="credit_point_subs" value="{{$players->credit_point}}">
												<span id="view_player_name_bowler_nselected1"> {{$players->player_name}}</span>/ <span>{{$players->credit_point}}</span>
												</li>
												 
												
												<!-- allrounder -->
												@elseif($players->player_role=='Bowling allrounder' || $players->player_role=='Allrounder')
												
												<li style="line-height: 41px;font-size: 10px;display:block;" id="player_allrounder_nselected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/all_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="nselected_id_allrounder1" value="{{$players->player_id}}"> 
												<input type="hidden" class="selected_name"  id="nselected_name_allrounder1" value="{{$players->player_name}}">
												<input type="hidden" class="credit_point_subs" value="{{$players->credit_point}}">
												<span id="view_player_name_allrounder_nselected1">{{$players->player_name}}</span> / <span>{{$players->credit_point}}</span>
												</li>
											 
												
												<!-- wicketkeeper -->
												@elseif($players->player_role=='Wicketkeeper batsman')
												
												<li style="line-height: 41px;font-size: 10px;display:block;" id="player_wicketkeeper_nselected1">&nbsp;&nbsp;
												<img src="{{url('public/site/image/wk_icon.png')}}" style="width:26px;">
												<input type="hidden" class="selected_id" id="nselected_id_wicketkeeper1" value="{{$players->player_id}}"> 
												<input type="hidden" class="selected_name"  id="nselected_name_wicketkeeper1" value="{{$players->player_name}}">
												<input type="hidden" class="credit_point_subs" value="{{$players->credit_point}}">
												<span id="view_player_name_wicketkeeper_nselected1">{{$players->player_name}}</span> / <span>{{$players->credit_point}}</span>
												</li>
												@endif
												
									@endforeach
									</ul>
											  <script>
										$("#substitute_player li").click(function(){
										  var selid = $(this).find('.selected_id').val();
										  var selname = $(this).find('.selected_name').val();
										  var substitute_credit_point = $(this).find('.credit_point_subs').val();
										  var replace_credit_point = $('#selected_credit_point').val();

										  if(substitute_credit_point==replace_credit_point)
										  {
											   $('#error_not_same_credit_point').hide();
										  $(this).parents('.drpnselected').find('.dropdown-toggle').html('<input type="hidden" name="selected_substitute_player_id" id="selected_substitute_player_id" value="'+selid+'">'+selname+' <span class="caret"></span>');
										  }
										  else
										  {
											  $('#error_not_same_credit_point').show();
										  }
										})
										</script>
												  </div>