
@include('website.user.header')
@include('website.user.menu1')
@php($site=App\SiteSetting::findorfail(1))
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
@if ($messages = Session::get('match_success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $messages }} </strong>
</div>
@endif
@if ($messages = Session::get('match_fail'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $messages }} </strong>
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="section-pad extra">
	<div class="container" style="padding-top:10px">
		
		<div class="row wall_dd2">
			<div class="col-sm-12">
			<div class="acc_head">
				Account Balance :
			</div>
			</div>
			{{--<div class="wall_verify">
				<a href="{{URL::to('bank-verify')}}"> Verify Now  </a>
			</div>--}}
		</div>
		<div class="row wall_dd3">
		<div class="col-sm-4">
			<div class="state-box">
				<h4> Your Play Point </h4>
				<p class="font-bold">@if(Auth::user()->credit_point) {{Auth::user()->credit_point}} @else 0 @endif </p>
				<p style="Color:red">Withdraw Play Points <a href="" data-toggle="modal" data-target="#withdraw_pts" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i>
 Withdraw Play Points</a> </p>  </p>
			</div>
		</div>
		 
		@php($currency_set=App\CurrencySetting::findorfail(1))
		@php($currency=App\Currency::whereid($currency_set->currency_id)->first())
							  
						
		<?php //echo $currency_set->currency->code; ?>
		
		
		<div class="col-sm-4">
			<div class="state-box">
				<h4> Your Wallet Amount 2</h4>
			@if($currency->symbol_format==0)	<p class="font-bold">@if(Auth::user()->user_wallet_current_amount) {{$currency->symbol}} {{round(Auth::user()->user_wallet_current_amount,2)}}  {{$currency->code}} @else 0 @endif</p>@else
				<p class="font-bold">@if(Auth::user()->user_wallet_current_amount)  {{$currency->code}} {{round(Auth::user()->user_wallet_current_amount,2)}} {{$currency->symbol}} @else 0 @endif</p>@endif
				
			</div>
		</div>
		 
		<div class="col-sm-4">
			<div class="state-box">
				<h4> Total Balance </h4>
				
				
				@if($currency->symbol_format==0)<p class="font-bold">@if(Auth::user()->user_wallet_current_amount)  {{$currency->symbol}} {{round(Auth::user()->user_wallet_current_amount,2)}}  {{$currency->code}} @else 0 @endif</p>								
			@else	<p class="font-bold">@if(Auth::user()->user_wallet_current_amount) {{$currency->code}} {{round(Auth::user()->user_wallet_current_amount,2)}}  {{$currency->symbol}} @else 0 @endif</p>		@endif						
				
				
               
				
				@if(!$bank)				
					<a href="{{URL::to('bank-verify')}}">Withdraw </a>			
				@elseif($bank->bank_verify_status==1 && Auth::user()->user_wallet_current_amount>50 )
				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModalwithdraw">Withdraw </a>
				@elseif(Auth::user()->user_wallet_current_amount<50)
				<a href="#" data-toggle="modal" data-target="#myModalalert">Withdraw </a>
						@else
				<a href="{{URL::to('bank-verify')}}">Withdraw </a>
			@endif
			</div>	
		</div>
		</div>
		
		<div class="wall_tab">
			<div class="tabbable" style="margin-bottom: 9px;">
							
				<ul class="nav nav-tabs">								
					<li class="active"><a href="#1a" data-toggle="tab">Winning History</a></li>
					<li><a href="#2a" data-toggle="tab">Withdraw Status</a></li>				
					<li><a href="#3a" data-toggle="tab">Point Withdraw Status</a></li>
					<li><a href="#4a" data-toggle="tab">Abandon Match List</a></li>	
					<li><a href="#5a" data-toggle="tab">Cancel Contest </a></li>	
					<li><a href="#6a" data-toggle="tab">User Payment</a></li>	
					   
				</ul>
                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="1a">						  
						<div class="wall_tableft">							
							<div class="table_wa">								
								<div class="table_top">									
									<div class="table_th">
										User Name
									</div>										
									<div class="table_th">
										Contest Name
									</div>										
									<div class="table_th">
										Match Name
									</div>										
									<div class="table_th">
										Amount
									</div>										
									<div class="table_th" style="border-right:none;">
										Date
									</div>									
								</div>
									
								<div class="table_bottom">						
									@foreach($winning as $win)									
									<div class="table_td">
										{{$win->name}}
									</div>										
									<div class="table_td">
										{{$win->contest_name}}
									</div>										
									<div class="table_td">
										{{$win->team_1}} vs {{$win->team_2}}
									</div>										
									<div class="table_td">
										{{round($win->amount,2)}} <!--<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.leaguerocks.com%2Fwithdraw-user&layout=button&size=small&mobile_iframe=false&appId=143651329047384&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>  -->
										
									</div>
									
									<?php  $subd=substr("$win->win_date",0,10);  ?>
									<div class="table_td_last">
										{{$subd}}
									</div>
										{{--<table>										
											<tr>											
												<td>{{$win->contest_name}}</td>
												<td>{{$win->contest_name}}</td>
												<td>{{$win->team_1}} vs {{$win->team_2}}</td>
												<td>{{$win->amount}}</td>
												<td>{{$win->win_date}}</td>
											</tr>
										</table>--}}
									@endforeach
								</div>								
							</div>  	
						</div>						  			
					</div> 
						   
					<div class="tab-pane" id="2a">						  
						<div class="wall_tableft">							
							<div class="table_wa">								
								<div class="table_top">									
									<div class="table_th">
										Name
									</div>										
									<div class="table_th">
										Amount
									</div>										
									<div class="table_th">
										Date
									</div>									
									<div class="table_th" style="border-right:none;">
										Status
									</div>										
								</div>
									
								<div class="table_bottom">
									@foreach($user_withdraw as $draw)
									<div class="table_td1">
										{{$draw->user_name}}
									</div>										
									<div class="table_td1">
										{{round($draw->withdraw_amount,2)}}
									</div>
									<?php  $subd=substr("$draw->withdraw_request_at",0,10);  ?>
									<div class="table_td1">
										{{$subd}}
									</div>									
									<div class="table_td1_last">
										@if(($draw->deposite_status)== 1)
										Completed
									    @endif
									</div>									
									@endforeach	
								</div>	
							
							</div>
						</div>							
                    </div>			
					<div class="tab-pane" id="3a">	
					<div class="wall_tableft">													
					<div class="table_wa">										
					<div class="table_top">									
					<div class="table_th">Playpoint</div>										
					<div class="table_th">Amount</div>												
					<div class="table_th">Status</div>		
					<div class="table_th" style="border-right:none;">Date</div>		
					</div>																
					<div class="table_bottom">									
					@foreach($withdraw_pts as $pts)								
					<div class="table_td1">	{{$pts->play_pt}}</div>	
					<div class="table_td1">	{{round($pts->amount,2)}}</div>		
					<div class="table_td1">	
					@if(($pts->status)== 1)Completed	@elseif($pts->status==2)			
						Declined									
					@else															
						Pending														
					@endif								
					</div>															
					<div class="table_td1_last">						
					{{$pts->updated_at}}								
					</div>												
					@endforeach									
					</div>											
					</div>					
					</div>							      
					</div>
					
					
						   
					<div class="tab-pane" id="4a">						  
						<div class="wall_tableft">							
							<div class="table_wa">								
								<div class="table_top">									
									<div class="table_th">
										User Name 
									</div> 
									<div class="table_th">
										Match Name
									</div>										
									<div class="table_th">
										Contest Name 
									</div>										
									<div class="table_th">
										Refunded 
									</div>										
									<div class="table_th">
										Match Date
									</div>									
																
								</div>
									
								<div class="table_bottom">
									
									<?php
									   $match=App\Match::whereabandon(1)->get();
									   foreach($match as $ab_match)
									   {
									   
									   $user_join= DB::table('fantasy_user_join_contest')->wherematch_id($ab_match->unique_id)->whereuser_id(Auth::user()->id)->get();
									   if($user_join)
									   {
										   foreach($user_join as $join_user)
										   {
									   $contest= DB::table('fantasy_contests')->whereid($join_user->contest_id)->first();
										$con_sub=DB::table('fantasy_user_create_team')->whereid($join_user->team_id)->first();
										if(!empty($con_sub->substitute) && $contest->is_practise_contest==0)
										{
	
										//$user->credit_point=$contest->enterence_amount+10;
										$ref_amt=$contest->enterence_amount+10;
										
										//$user->save();
										}
										else if($contest->is_practise_contest==0)
										{
										$ref_amt=$contest->enterence_amount;
									//	$user->save();
										
										}															   
									?>
						   
									
									
									@php($user_nam=App\User::findorfail(Auth::user()->id))
										<div class="table_td">
										{{ $user_nam->name }}
										</div> 
										
										@php($var=App\Match::whereunique_id($ab_match->unique_id)->first())
										<div class="table_td">
										{{$var->team_1}} VS {{$var->team_2}}
										</div>
										@php($contest=App\Contest::findorfail($join_user->contest_id))
										<div class="table_td">
										{{ $contest->name }}
										</div>
										
										<div class="table_td">
										{{ $ref_amt}}
										</div>
										
										
										<?php
									$da=$var->date;
									$real_date=substr("$var->date",0,10);
										
										
										?>
										
										
										
										<div class="table_td_last">
										{{ $real_date }}
										</div>
										
										
								
										
																		
										<?php

							   }										
										}
						   
						   }
						   
						   ?>
						
									
								
								</div>
								
							</div>
								
                         
						  
						
                        </div>
                        </div>
						<!--<div class="tab-pane active" id="3a"> -->
						  <div class="tab-pane" id="5a">
							<div class="wall_tableft">
							
								<div class="table_wa">
								
									<!--<div class="table_wa"> -->
									<div class="table_top">
									
										<div class="table_th">
										User Name
										</div>
										
										<div class="table_th">
										Contest Name
										</div>
										
										<div class="table_th">
										Match Name
										</div>
										
										<div class="table_th">
										Refunded Points
										</div>
										
										<div class="table_th" style="border-right:none;">
										Date
										</div>
									
									</div>
									
									<div class="table_bottom">
									<?php
									
									$fant_cont=DB::table('fantasy_user_join_contest')->whereuser_id(Auth::user()->id)->wherenon_confirm_contest(1)->get();
									foreach($fant_cont as $fc)
									{
						
										$team_player=DB::table('fantasy_user_create_team')->whereid($fc->team_id)->first();
										$contest=App\Contest::whereid($fc->contest_id)->first();
									if(!empty($team_player->substitute) && $contest->is_practise_contest==0)
	{
	
	
	
	
	$ref_amt=$contest->enterence_amount+10;
	

	
	
	}
	
	
	else if($contest->is_practise_contest==0)
	{
	
	
	$ref_amt=$contest->enterence_amount;
	

	
	
	}
									
											?>
									
									
									@php($user_name=App\User::findorfail(Auth::user()->id))
									
										<div class="table_td">
										{{ $user_name->name }}
										
										</div>
										@php($contest_name=App\Contest::findorfail($fc->contest_id))
										<div class="table_td">
										{{ $contest_name->name }}
										
										</div>
										@php($match=App\Match::whereunique_id($fc->match_id)->first())
										
										<div class="table_td">
									@if($match)	{{$match->team_1 }} VS {{ $match->team_2 }} @else Match Not in Table @endif
										
										<?php  //dd('sfds') ?>
										</div>
										
										<div class="table_td">
										@if($ref_amt){{ $ref_amt }} @else 0 @endif
										</div>
								
										<div class="table_td_last">
									@if($match)	{{$match->date }}  @else Match Not in Table @endif
										</div>
									
										
										
										
										
								<?php
									}								
										
									?>
									
									
									
									
									
								
								</div>  	
						  			
							</div>
							
                      </div> <!-- /tabbable -->
                      </div> <!-- /tabbable -->
					  
					  
					  
					 
					  
					   <div class="tab-pane" id="6a">						  
						<div class="wall_tableft">							
							<div class="table_wa">								
								<div class="table_top">									
									<div class="table_th">
										User Name
									</div>										
									<div class="table_th">
										Payment Amount
									</div>										
									<div class="table_th">
										Payment Method
									</div>										
									<div class="table_th">
										Transaction Id
									</div>
                                   <div class="table_th" style="border-right:none;">
										Payment Status
									</div>									
																	
								</div>
									
								<div class="table_bottom">						
									@foreach($payment_history as $pay_his)									
									<div class="table_td">
										{{$pay_his->name}}
									</div>										
									<div class="table_td">
										{{$pay_his->payment_amount}}
									</div>										
									<div class="table_td">
										{{$pay_his->payment_method}}
									</div>	
									<div class="table_td">
										{{$pay_his->transaction_id}}
									</div>
									<div class="table_td_last">
										{{$pay_his->payment_status}}
									</div>	
                                   
									
									@endforeach
								</div>								
							</div>  	
						</div>						  			
					</div> 
					
					
					
					
				
		</div>
		
	</div>
	
	
	
	
	
	
     
</div>
</div>
</div>
    <!--//page_container-->
	
@include('website.user.footer');

<div id="myModalwithdraw" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Withdraw Amount </h4>
								  </div>
								  <div class="modal-body">
									<form class="well form-horizontal"    style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Enter Amount</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  <input type="number"  name="withdraw_amount" class="form-control" required>
					 
						</div>
					  </div>
					</div>
					<br>
					<div id="error-display"> </div>
								  </div>
								  <div class="modal-footer">
								  {{--<a type="button" class="popup_btn" data-dismiss="modal"></a>--}}
									<a  class="btn btn-danger withdraw" >Submit</a>
								  </div>
								  </form>
								</div>

							  </div>
							</div>
							
<div id="myModalalert" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">x</button>
									<h4 class="modal-title">Low Balance Alert</h4>
								  </div>
								  <div class="modal-body">
									Your balance is below 50
								</div>

							  </div>
							</div>  
							</div>  
							
							
							
							
							<!-- Modal Content  -->
	
	<div id="withdraw_pts" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Withdraw Play Point </h4>
								  </div>
								  <div class="modal-body">
									
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Enter Playpt </label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  <input type="number"  name="play_pt" id="play_pt" class="form-control" required>
					 
						</div>
					  </div>
					</div>
					<br>
					<div id="error"> </div>
								  </div>
								  <div class="modal-footer">
								  {{--<a type="button" class="popup_btn" data-dismiss="modal"></a>--}}
									<a  class="btn btn-danger"  id="sub">Submit</a>
								  </div>
								 
								</div>

							  </div>
							</div>

<script>	

 
		$('.withdraw').click(function (e) {
			// var contest1=$(".mahi").text();
			 var withdraw=$('input[name="withdraw_amount"]').val();
		console.log(withdraw);
   
	     if (withdraw == '' ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
else if (withdraw <= 0  ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please enter valid amount </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'withdraw-request',
                type: 'POST',
                dataType: 'JSON',
                data: {withdraw_amount: withdraw,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-suceess"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><p style="color:green">Your Withdraw Request is Processing!!!!</p> </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    
						/* var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]; */

<?php $url2 = url('/'); ?>
                  //window.location.href ="<?php echo $url2; ?>/main";
				setInterval(window.location.href ="<?php echo $url2; ?>/withdraw-user",3000);
					}
					else
					{
						 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Your Wallet Amount Low !!!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
   
					}
						
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            });
			}
        });
		
	</script>
	
	
	
	
	
<script>	

 
		$('#sub').click(function (e) {
			// var contest1=$(".mahi").text();
			 var playpt=$('#play_pt').val();
			 
		
	     if (playpt == '' ) {
   var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'withdraw_pts',
                type: 'POST',
                dataType: 'JSON',
                data: {playpt: playpt,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='success'){
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Request has been successfully.. Thank You!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    
						//var hostname = window.location.origin+window.location.pathname;
						/* var getUrl = window.location;
 var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
					window.location.href =baseUrl+"/main"; */
					
					<?php $url2 = url('/'); ?>
                  
				setInterval(window.location.href ="<?php echo $url2; ?>/withdraw-user",3000);
					} 
					
					
					else
					{
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>The request playpoint is Low.Please enter more than <?php echo $site->minimum_play_point; ?> </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
   <?php $url2 = url('/'); ?>
                  
				setInterval(window.location.href ="<?php echo $url2; ?>/withdraw-user",3000);
   
					}
						
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            });
			}
        });
		
	</script>	