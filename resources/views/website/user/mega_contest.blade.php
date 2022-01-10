
@if(count($contest)>0)
	
@php($currency_set=App\CurrencySetting::findorfail(1))	
				
@php($currency=App\Currency::whereid($currency_set->currency_id)->first())

<?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr("$fetch->date",0,10);
					        $subt=substr("$fetch->date",-13,-5);
							//$tim=strtotime("+330 minutes", strtotime($subt));
										//	$tim=date('h:i:s',strtotime("+330 minutes",$subt));
										
										
										$time = strtotime($subt);
										$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;

									?>


	


  @foreach($contest as $s)
  @if (date('Y-m-dH:i:s') < $con) 
<div class="contest_list">
                    <!--     <div class="box"></div> <div class="box11"></div> -->

                      

                            <div class="box11">
                                <div class="row">
                                    <div class="win">
                                        <p> @if($s->winning_pirze) {{$currency->symbol}}{{$s->winning_pirze}} {{$currency->code}} @else Practice Contest @endif</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pay">
                                        <p>@if($s->enterence_amount)Pay Credit {{$s->enterence_amount}}@else Pay Credit 0 @endif </p>
                                    </div>
                                    <div class="tol_tip">
                                        @if($s->is_confirm_contest==1)
                                        <a href="#" bubbletooltip="Confirm Contest This contest wont cancel">C</a> @endif @if($s->is_multi_entry==1)
                                        <a href="#" bubbletooltip="Multiple contest You Can Join Multiple Time">M</a> @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <?php $user_join_length=DB::table('fantasy_user_join_contest')->wherecontest_id($s->id)->wherematch_id(Session::get('unique_id'))->count(); ?>
                                        <?php $xxxxxxx=DB::table('fantasy_user_create_team')->wherematch_id(Session::get('unique_id'))->whereuser_id(Auth::user()->id)->get();
					?>
                                   <?php $particular_unique_contest=DB::table('fantasy_user_join_contest')->wherecontest_id($s->id)->whereuser_id(Auth::user()->id)->wherematch_id(Session::get('unique_id'))->count(); ?>         <div class="select_team">
                                                <p>{{$user_join_length}}/{{$s->contest_team_length}} teams </p>
                                                <div class="team_bar">
                                                    <span style="width:{{$user_join_length/$s->contest_team_length *100}}%"></span>
                                                </div>

                                            </div>
                                </div>
                                <div class="row">
                                    @if($s->is_practise_contest==0)
                                    <div class="win_list" id="winner{{$s->id}}">

                                        <p><img src="{{url('public/site/image/winner.png')}}">{{$s->no_winner}} Winners</p>

                                    </div>
                                    @endif 
									@if($s->is_multi_entry ==0 && $particular_unique_contest >= 1)
                                    <div class="box_jion">
                                        <a href="#">Joined</a>
                                    </div>
									 @elseif(count($xxxxxxx) ==0)
                                        <div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModal_zero{{$s->id}}">Join</a>
                                        </div>
                                    @elseif($user_join_length >= $s->contest_team_length)
                                    <div class="box_jion">
                                        <a href="" data-toggle="modal" data-target="#myModaljoinfull">Join</a>
                                    </div>
                                    @elseif(Auth::user()->credit_point < $s->enterence_amount)
									@if( (Auth::user()->user_wallet_current_amount*10) < $s->enterence_amount)
										<div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModalwallet">Join</a>
                                        </div>
										@else
                                        <div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModalcr_pt">Join</a>
                                        </div>
										@endif
										
                                       

                                        @else
                                        <div class="box_jion">

                                            <a href="" data-toggle="modal" data-target="#myModalaccess{{$s->id}}">Join</a>

                                        </div>
                                        @endif

                                        <div class="win_tab" id="win_tab{{$s->id}}" style="display:none;">

                                            <table>
                                                <tr>
                                                    <td>Rank</td>
                                                    <td>Price</td>
                                                </tr>
                                                <?php $prize_list = json_decode($s->prize_list, true); ?>
                                                    <?php $rank = json_decode($s->rank_list, true); ?>
                                                        @for($i=0; $i
                                                        < count($rank); $i++) <tr>
                                                            <td>Rank {{ $rank[$i] }}</td>
                                                            <td>{{$currency->code}}.{{ $prize_list[$i] }}</td>
                                                            </tr>
                                                            @endfor

                                            </table>

                                        </div>

                                </div>
								
								
								

                                <!-- Modal -->
                                <div id="myModal_zero{{$s->id}}" class="modal fade" role="dialog" style="overflow-y: hidden;">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header"  >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">@if($s->is_practise_contest==0) {{$currency->symbol}} {{$s->winning_pirze}} {{$currency->code}} Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>

                                            </div>
                                            <div class="modal-body">
                                                <h4>Please create your team for this match and join contest.</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="create" style="margin-left: 29%; width: 39%;">
                                                    <a class="btn btn-primary" href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode('1'))}}" style="text-decoration:none;">Create Your Team</a></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="myModalaccess{{$s->id}}" class="modal fade" role="dialog" style="overflow-y: hidden;">
                                    <div class="modal-dialog">
                                        <input type="hidden" class="match_id" id="match_id{{$s->id}}" value="{{$unique_id}}">
                                        <input type="hidden" class="contest_id" id="contest_id{{$s->id}}" value="{{$s->id}}">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">@if($s->is_practise_contest==0) {{$currency->symbol}} {{$s->winning_pirze}} {{$currency->code}} Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>
                                            </div>
                                            <div class="modal-body" >

                                                <div class="dropdown">
                                                    <h4>Join Contest with</h4>
                                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Team 
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu " id="select_team">
                                                    
                                                   <!-- batting-->
                                                    @php($i=1) @foreach($view_team as $data)
                                                    <li style="line-height: 41px;" id="player_batting_c1">&nbsp;&nbsp;
                                                        <input type="hidden" class="team_id" value="{{$data->id}}">
                                                        <input type="hidden" class="teamname" value="Team{{$i}}">
                                                        <span id="view_player_name_batting_c1">Team {{$i}}</span>
                                                    </li>
                                                    @php($i++) @endforeach

                                                </ul>
                                                </div>

<!-- 
                                                Join Contest with
                                                <button class="btn dropdown-toggle btn-select" id="captain" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;">Select Team <span class="caret"></span></button> <br><br>
                                                
												<ul class="dropdown-menu " id="select_team">
													
												 
                                                    @php($i=1) @foreach($view_team as $data)
                                                    <li style="line-height: 41px;" id="player_batting_c1">&nbsp;&nbsp;
                                                        <input type="hidden" class="team_id" value="{{$data->id}}">
                                                        <input type="hidden" class="teamname" value="Team{{$i}}">
                                                        <span id="view_player_name_batting_c1">Team {{$i}}</span>
                                                    </li>
                                                    @php($i++) @endforeach
 -->
                                                </ul>
                                            </div>
											 <div class="already_join_team_mutiple_contest{{$s->id}}">

    </div>
                                            <div class="modal-footer">
                                                <?php 
                                                //$add_team=DB::table('fantasy_user_create_team')->
                                                    $j=$team_count+1;
                                                    if($team_count<6)
                                                        {
                                                            ?>
                                                    <a href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode($j))}}" class="btn btn-secondary pull-left btn-sm" >Add Team {{$j++}} </a>
                                                   <?php
                                                        }?>

                                                <button type="button" class="popup_btn join_contest_submit{{$s->id}}" id="join_contest_submit" >Join</button>
                                            </div>
                                        </div>
                                       
                                        <script>
                                            $("#select_team li").click(function() {
                                                var selid = $(this).find('.team_id').val();
                                                var selname = $(this).find('.teamname').val();

                                                $(this).parents('.modal-body').find('.dropdown-toggle').html('<input type="hidden" name="select_team_id" id="select_team_id" value="' + selid + '">' + selname + ' <span class="caret"></span>');

                                            })
                                        </script>
                                    </div>
                                </div>

                            </div>
                       
                    </div>
					  <script>
                        $('.join_contest_submit<?php echo $s->id; ?>').click(function() {
                            //alert('hai');
                            var matchid = $("#match_id<?php echo $s->id; ?>").val();
                            var contestid = $("#contest_id<?php echo $s->id; ?>").val();
                            var teamid = $("#select_team_id").val();
                            //var playersjson=$('input[name="playersid[]"]').map(function(){return $(this).val();}).get();
                            //var playersid=JSON.parse(playersjson);
                            //console.log(playersid);
                            //var captainid=$("#captain_id").val();
                            //var vicecaptainid=$("#vicecaptain_id").val();

                            console.log(contestid);
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                url: "{{url('user-join-contest')}}",
                                type: 'POST',
                                // dataType: 'JSON',
                                data: {
                                    matchid: matchid,
                                    contestid: contestid,
                                    teamid: teamid,
                                    _token: CSRF_TOKEN
                                }, //get model dan ukuran
                                success: function(content) {
                                    //console.log(content);
                                    //$('#change-filter').html(content)

                                    //window.location.href="http://localhost/dinesh/fantasy_cricket/main";
                                    if (content.message == "success") {
                                        $('#myModalsuccess').html('<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Successfully joined contest.</div>');
                                        location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        });
                                    } 
									else if (content.message == "failure") {
                                        $('#myModalsuccess').html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Low credit points.</div>');
                                        location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        });
                                    }
									else if (content.message == "already_exist") {
                                        $('.already_join_team_mutiple_contest'+contestid).html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Team Already Exist In Contest.</div>');
										
										$('#already_join_team_mutiple_contest').fadeIn(800, function() {
                                            $('#already_join_team_mutiple_contest').fadeOut().delay(3000);

                                        });
                                        /* location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        }); */
                                    }

                                }
                            });
                        });
                    </script>
					<script>
                        $(document).ready(function() {
                            $("#winner<?php echo $s->id; ?>").click(function() {
                                $("#win_tab<?php echo $s->id; ?>").toggle();
                            });
                        });
                    </script>
					
					
					
					
					 @elseif($user_team_total && date('Y-m-dH:i:s') > $con)
						<p>Match closed</p>
					 @elseif(date('Y-m-dH:i:s') > $con) 
						 <p>There is no contest you have joined</p>
					
					
					@endif
					@endforeach
					
					 
					 @else 
						 <p>There is no contest Available</p>
					 @endif