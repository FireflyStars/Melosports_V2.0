


@php($currency_set=App\CurrencySetting::findorfail(1))	
				
@php($currency=App\Currency::whereid($currency_set->currency_id)->first())


<?php 

$site=App\SiteSetting::findorfail(1);


$fetch = DB::table('matches')

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





	



  @if (date('Y-m-dH:i:s') < $con && count($frnd_contest)>0) 
<?php $something=0; ?>
  @foreach($frnd_contest as $s)



 <?php   

$frnd_list=explode(',',$s->frnd_email);



if($s->user_id==Auth::user()->id)
{
	$something=$something+1;

 ?>
	  
	  
	  <div class="contest_list">

                 



                      



                            <div class="box11">

                                <div class="row">

                                    <div class="win">

                                        <p> @if($s->winner_prize_amt) {{$currency->symbol}} {{$s->winner_prize_amt}} {{$currency->code}}  @endif</p>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="pay">

                                        <p>@if($s->entrance_credit)Pay Credit {{$s->entrance_credit}}@else Pay Credit 0 @endif </p>

                                    </div>

                                    <div class="tol_tip">

                                       

                                        <a href="#" bubbletooltip="Confirm Contest This contest wont cancel">C</a>



                                    </div>

                                </div>

                                <div class="row">

                                    <?php $user_join_length=DB::table('frnd_user_join_contest')->wherefrnd_contest_id($s->id)->wherematch_id(Session::get('unique_id'))->count(); ?>

                                        <?php $xxxxxxx=DB::table('fantasy_user_create_team')->wherematch_id(Session::get('unique_id'))->whereuser_id(Auth::user()->id)->get();

					?>

                                   <?php $particular_unique_contest=DB::table('frnd_user_join_contest')->wherefrnd_contest_id($s->id)->whereuser_id(Auth::user()->id)->wherematch_id(Session::get('unique_id'))->count(); ?>      
								   <div class="select_team">

                                                <p>{{$user_join_length}}/{{$s->user_length}} teams </p>

                                                <div class="team_bar">

                                                    <span style="width:{{$user_join_length/$s->user_length *100}}%"></span>

                                                </div>



                                            </div>

                                </div>

                                <div class="row">

                                   

								  

                                    <div class="win_list" id="winner{{$s->id}}">



                                        <p><img src="{{url('public/site/image/winner.png')}}">{{$s->winner_length->team_length}} Winners</p>



                                    </div>

                                   

									

                                        <div class="box_jion">



                                           <a href="{{url('challenge_edit',$s->id)}}" class="popup_btn" >Edit </a>



                                        </div>

                                       



                                        <div class="win_tab" id="win_tab{{$s->id}}" style="display:none;">



                                            <table>

                                                <tr>

                                                    <td>Rank</td>

                                                    <td>Price</td>

                                                </tr>

                                                <?php $prize_list = json_decode($s->winner_length->position, true); ?>

                                                    <?php $rank = json_decode($s->winner_length->rank_amount, true); ?>

                                                        @for($i=0; $i<count($rank); $i++) <tr>

                                                            <td>Rank {{ $prize_list[$i] }}</td>
						<?php $money=$s->winner_prize_amt*$rank[$i]/100 ?>
                                                            <td>{{$currency->code}} {{ $money  }}</td>

                                                            </tr>

                                                            @endfor



                                            </table>



                                        </div>



                                </div>

								

								

								



                                <!-- Modal -->

                                

                                <div id="myModalaccess{{$s->id}}" class="modal fade" role="dialog" style="overflow-y: hidden;">

                                    <div class="modal-dialog">

                                        <input type="hidden" class="match_id" id="match_id{{$s->id}}" value="{{$unique_id}}">

                                        <input type="hidden" class="contest_id" id="contest_id{{$s->id}}" value="{{$s->id}}">

                                        <!-- Modal content-->

                                        <div class="modal-content">

                                            <div class="modal-header" >

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h4 class="modal-title">@if($s->winner_prize_amt) {{$currency->symbol}} {{$s->winner_prize_amt}} {{$currency->code}}  Contest <h3>  Pay Credit {{$s->entrance_credit}}</h3> @endif</h4>

                                            </div>

                                            <div class="modal-body" >


									
                                                
												




 

                                                

                                            </div>
											
                                            <div class="modal-footer">
                                                

												{{-- <button type="button" class="popup_btn join_contest_submit{{$s->id}}" id="join_contest_submit" >Update</button> --}}
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

                                url: "{{url('frnd-user-join-contest')}}",

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

					
<?php  } ?>
					

					@endforeach

					
					<?php 

					
					if($something==0)
            {
 ?>
		<p style="color:red">There is no challenge created by you or by your friend </p>			
<?php } ?>
					 @elseif(date('Y-m-dH:i:s') > $con)

						<p>Match closed</p>

					 @elseif(date('Y-m-dH:i:s') > $con) 

						 <p>There is no contest you have joined</p>

					 @else

						 <p>There is no contest Available</p>

					 @endif

					

				

					

					 

					