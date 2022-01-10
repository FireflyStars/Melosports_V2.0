@if($contest)
@foreach($contest as $s)
<div class="contest_list">

                        <div class="box">

                            <div class="box11">
                               <div class="row">
                                    <div class="win">
                                        <p> @if($s->winning_pirze){{$s->winning_pirze}} Rs @else Practice Contest @endif</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pay">
                                        <p>@if($s->enterence_amount)pay Credit {{$s->enterence_amount}}@else pay Credit 0 @endif </p>
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
                                                <p>{{$user_join_length}}/{{$s->contest_team_length}}teams </p>
                                                <div class="team_bar">
                                                    <span style="width:{{$user_join_length/$s->contest_team_length *100}}%"></span>
                                                </div>

                                            </div>
                                </div>
                                <div class="row">
                                    @if($s->is_practise_contest==0)
                                    <div class="win_list" id="winner{{$s->id}}">

                                        <p><img src="{{url('public/site/image/winner.png')}}">{{$s->no_winner}} winners</p>

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
                                                            <td>Rs.{{ $prize_list[$i] }}</td>
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
                                                <h4 class="modal-title">@if($s->is_practise_contest==0){{$s->winning_pirze}} Rs Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>

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
                                        <input type="hidden" class="match_id" id="match_id{{$s->id}}" value="{{Session::get('unique_id')}}">
                                        <input type="hidden" class="contest_id" id="contest_id{{$s->id}}" value="{{$s->id}}">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">@if($s->is_practise_contest==0){{$s->winning_pirze}} Rs Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>
                                            </div>
                                            <div class="modal-body" style="height: 125px;">
                                                Join Contest with
                                                <button class="btn dropdown-toggle btn-select" id="captain" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;">Select Team <span class="caret"></span></button>
                                                <ul class="dropdown-menu " id="select_team">

                                                    <!-- batting-->
                                                    @php($i=1) @foreach($view_team as $data)
                                                    <li style="line-height: 41px;" id="player_batting_c1">&nbsp;&nbsp;
                                                        <input type="hidden" class="team_id" value="{{$data->id}}">
                                                        <input type="hidden" class="teamname" value="Team{{$i}}">
                                                        <span id="view_player_name_batting_c1">Team{{$i}}</span>
                                                    </li>
                                                    @php($i++) @endforeach

                                                </ul>
                                            </div>
											 <div class="already_join_team_mutiple_contest{{$s->id}}">

    </div>
                                            <div class="modal-footer">
                                                <button type="button" class="popup_btn join_contest_submit{{$s->id}}" id="join_contest_submit" >Join</button>
                                            </div>
                                        </div>
                                        <style>
                                            .dropdown-menu li:hover {
                                                background-color: #bababa;
                                            }
                                        </style>
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
						</div>
								<!-- contest list full error -->
                    <div id="myModaljoinfull" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Contest Full </h4>
                                </div>
                                <div class="modal-body">
                                    <p>The contest is already full! Join another contest</p>
                                </div>

                            </div>
                        </div>
                    </div>

                            
                    
@endforeach
@else
	No results found. Try something else!!!!!!!!!!!!!!!!


@endif


@if($contest->count()==0)
	


No results found. Try something else!


@endif