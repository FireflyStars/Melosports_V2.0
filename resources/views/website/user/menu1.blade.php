<div class="wrap">
						
						 <div class="col-md-12 menu2">                        	
                           <div class="container">
								<div class="head_top">
                                <ul>
                                  
									<li><a  href="{{URL::to('withdraw-user')}}"><img src="{{url('public/site/image/widthdraw.png')}}">&nbsp;&nbsp;Withdraw Amount</a></li>
                                    <li><a target="_blank" href="{{URL::to('bank-verify')}}"><img src="{{url('public/site/image/verify.png')}}">&nbsp;Verify Now</a></li>
                                 
                                    <li><a href="#" data-toggle="modal" data-target="#myModalcrdit"><img src="{{url('public/site/image/credit.png')}}">&nbsp;Play Points</a>&nbsp;&nbsp;<b style="color:#bdbaba">{{ Auth::user()->credit_point }} Credits </b></li>
									<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{url('public/site/image/profile.png')}}">&nbsp;&nbsp;<?php echo Auth::user()->name; ?><span class="caret"></span></a>
										<ul class="dropdown-menu">
										  <li><a href="#" data-toggle="modal" data-target="#myModaledit"><img src="{{url('public/site/image/edit_pro.png')}}">&nbsp;&nbsp;Edit Profile</a></li>
										  <li><a href="#" data-toggle="modal" data-target="#myModal3"><img src="{{url('public/site/image/change_pass.png')}}">&nbsp;&nbsp;Change Password</a></li>
										  {!! Form::open (['url' => '/userlogout']) !!}
										  {{ csrf_field() }}
										  <li><button class="logout_user" type="submit"><img src="{{url('public/site/image/logout.png')}}">&nbsp;&nbsp;Logout</button></li>
											  {!! Form::close() !!}
										</ul>
									  </li>
                               
								 
                                </ul>
								</div> 
							</div>
                        </div>
	</div>  
	  
	  
	<!-- Modal -->
							<div id="myModalcrdit" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Purchase Play Point </h4>
								  </div>
								  <div class="modal-body">
									<form class="well form-horizontal"    style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Play Point</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <select  name="credit" class="form-control" required style="height:30px;">
					  <option value=""></option>
				<?php 	  $number = range(50,10000,50);
  foreach($number as $n){				?>
					  <option value="{{$n}}">{{$n}}</option>
  <?php } ?>
					  </select>
						</div>
					  </div>
					</div>
					<br>
					<div id="error"> </div>
								  </div>
								  <div class="modal-footer">
								  {{--<a type="button" class="popup_btn" data-dismiss="modal"></a>--}}
									<a  class="btn btn-danger credit" >Submit</a>
								  </div>
								  </form>
								</div>

							  </div>
							</div>  
	  
	  
	  
	  <!-- user profile -->
	  <!-- Modal -->
	<div id="myModaledit" class="modal fade" role="dialog" style="top:0%;">
											  
		<div class="modal-dialog">
												<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">User Profile</h4>
				</div>
				<div class="modal-body" >
					
					
					
					<form class="well form-horizontal" action="{{ URL('edit-profile') }}" method="post"  style="margin-top:2px;">
					 {{ csrf_field() }}
					
					<fieldset>

					

					<div class="form-group">
					  <label class="col-md-4 control-label">Name</label>  
					  <div class="col-md-8 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="name" placeholder="" class="form-control"  type="text" value="{{ Auth::user()->name }}" readonly >
						</div>
					  </div>
					</div>
					
					{{--	<div class="form-group">
					  <label class="col-md-4 control-label">Team Name</label>  
					  <div class="col-md-8 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
						</div>
					  </div>
					</div> --}}

					{{--
					--}}
					<!-- Text input-->
					
					
					<div class="form-group">
					  <label class="col-md-4 control-label">Gender</label>  
					  <div class="col-md-8 inputGroupContainer">
					  <div class="input-group radio_button">
					  
						<input  name="gender" value="Male" <?php if (Auth::user()->gender=="Male") echo 'checked="checked"'; ?>  class="form-control"  type="radio" style="width:15px;height:15px;">Male&nbsp;
						
						</div>
					  </div>
					  
					  <div class="col-md-4 inputGroupContainer">
					  <div class="input-group radio_button">
					  
						<input  name="gender" value="Female" <?php if (Auth::user()->gender=="Female") echo 'checked="checked"'; ?>  class="form-control"  type="radio" style="width:15px;height:15px;">Female
						
						</div>
					  </div>
					</div>
	
					<!-- Text input-->
						   <div class="form-group">
					  <label class="col-md-4 control-label">E-Mail</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
						
					  <input name="email" placeholder="" readonly class="form-control"  type="text" value="{{ Auth::user()->email }}">
						</div>
					  </div>
					</div>
					
					   


					<!-- Text input-->
						   
					<div class="form-group">
					  <label class="col-md-4 control-label">Contact No.</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							
					  <input name="mobile_number" placeholder="" class="form-control" type="text" value="{{ Auth::user()->mobile_number }}" required>
						</div>
					  </div>
					</div>
					
				{{--	<div class="form-group">
					
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							
					  <input name="contact_no" placeholder="(639)" class="form-control" type="checkbox" style="width:15px;height:15px;">&nbsp;&nbsp;&nbsp;All SMS Notifications
						</div>
					  </div>
					</div>
					
						<div class="form-group">
					  <label class="col-md-4 control-label">Address.</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							<textarea>  </textarea>
						</div>
					  </div>
					</div> --}}

					<div class="form-group">
					  <label class="col-md-4 control-label">Address</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							
					  <input name="address" placeholder="" class="form-control" type="text" value="{{ Auth::user()->address }}" required>
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-4 control-label">City</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							
					  <input name="city" placeholder="" class="form-control" type="text" value="{{ Auth::user()->city }}">
						</div>
					  </div>
					</div>
					
					<div class="form-group"> 
									  <label class="col-md-4 control-label">State</label>
										<div class="col-md-8 selectContainer">
										<div class="input-group">
										<input name="state" placeholder="" class="form-control" type="text" value="{{ Auth::user()->state }}">
									  </div>
									</div>
					
								</div>
								
								<div class="form-group">
					  <label class="col-md-4 control-label">Pin Code</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
							
					  <input name="pincode" placeholder="" class="form-control" type="text" pattern="[0-9]{6}" value="{{ Auth::user()->pincode }}">
						</div>
					  </div>
					</div>
								
					<div class="form-group">
					  <label class="col-md-4 control-label">Country</label>  
						<div class="col-md-8 inputGroupContainer">
						<div class="input-group">
						
					  <input name="country" value="INDIA" readonly class="form-control"  type="text" required>
						</div>
					  </div>
					</div>
								
								
					
					<!-- Select Basic -->

					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->
					<div class="form-group">
					{{--<div class="col-md-6">
						<a href=""> Change password</a>
					</div>--}}
						<div class="col-md-6">
						
						
						
						</div> 
						 {{-- <div class="col-md-6">
						<button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#myModal"> Update Profile</button>
						</div>--}} 
					</div>

					</fieldset>
					
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="popup_btn"> Update Profile</button>
				</div>
			
			</div>
		</div>
	</div>	
</form>
                                   <!-- Modal -->
											<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Profile Updated</h4>
												  </div>
												  <div class="modal-body">
													<p>Your profile has been successfully updated.</p>
												  </div>
												  <div class="modal-footer">
													<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>
												  </div>
												</div>

											  </div>
											</div>	
											
	
	
	
	<!-- Modal -->
	<div id="myModal3" class="modal fade" role="dialog" style="top:0%;">
											  
		<div class="modal-dialog">
												<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Change Password</h4>
				</div>
				<div class="modal-body" >
					
					
					
					<form class="well form-horizontal" action="{{ URL('change-password') }}" method="post"  style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

<!--					<div class="form-group">
					  <label class="col-md-3 control-label">Old Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="op" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>-->
					
					<div class="form-group">
					  <label class="col-md-6 control-label">New Password</label>  
					  <div class="col-md-6 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="np" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-6 control-label">Re-Enter New Password</label>  
					  <div class="col-md-6 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="rnp" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>										
					
				 
						
						
					
					</div>	
					<div class="modal-footer">
						<button type="submit" class="popup_btn" > Change Password</button>
					</div>	
					</form>								
					</div>										
					</div>										
					</div>
	  
	  
	  
	  
	  
	  
	  {{-- <div class="box_jion">
						  <a href="" data-toggle="modal" data-target="#myModal">Wallet</a>
	  </div>--}}
	  <!-- Modal -->
				   <div id="myModal_addwallet" class="modal fade" role="dialog" style="top:0%;">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add cash to your account</h4>
							  </div>
							  
							  <div class="modal-body">
								<p>Add cash to your account to join  contest.</p>
							
							  <form  class="well form-horizontal" action="{{URL::to('payment-view')}}" method ="post" style="margin-top:2px;">
							    {{ csrf_field() }}
							 
							  <div class="form-group">
					  <label class="col-md-3 control-label">Amount</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					<input type="number" class="content form-control" value="31" name="cash" min="10" autocomplete="off" required >
						</div>
					  </div>
					</div>
							  
						
							  @php($currency_set=App\CurrencySetting::findorfail(1))
					@php($currency=App\Currency::whereid($currency_set->currency_id)->first())
							  
						@if($currency->symbol_format==0)
							  <ul class="amtOptions">
							  
							     <a href="#" class="button btn-price"   data-saravana="115">{{$currency->symbol}}115 {{$currency->code}}</a>
								 <a href="#" class="button btn-price"   data-saravana="250">{{$currency->symbol}}250 {{$currency->code}}</a>
								 <a href="#" class="button btn-price"   data-saravana="600">{{$currency->symbol}}600 {{$currency->code}}</a>
								
							  </ul>
							  
							  @else
								  
							  <ul class="amtOptions">
							   
							     <a href="#" class="button btn-price"   data-saravana="115">{{$currency->code}} 115{{$currency->symbol}}</a>
								 <a href="#" class="button btn-price"   data-saravana="250">{{$currency->code}} 250{{$currency->symbol}}</a>
								 <a href="#" class="button btn-price"   data-saravana="600">{{$currency->code}} 600 {{$currency->symbol}}</a>
								
							  </ul>
							  
							  @endif
							  </div>
							  <div class="modal-footer">
							<!--	<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>-->
								<button type="submit" class="popup_btn" >Add Cash</button>
							  </div>
							
							</form>
  </div>
						  </div>
						</div>
						
						
						<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
				<script type="text/javascript">

 $("input[name='cash']").keyup(function(){
 var theTotal = $("input[name='cash']").val();
$('.button').click(function(){
   theTotal = Number(theTotal) + Number($(this).attr("data-saravana"));
    $('.content').val(theTotal);        
});
});

$('.content').val(theTotal);

</script>	

<script type="text/javascript">
 var theTotal = $("input[name='cash']").val();
$('.button').click(function(){
   theTotal = Number(theTotal) + Number($(this).attr("data-saravana"));
    $('.content').val(theTotal);        
});


$('.content').val(theTotal);

</script>		


<script>	

 
		$('.credit').click(function (e) {
			// var contest1=$(".mahi").text();
			 var credit=$('select[name="credit"]').val();
		console.log(credit);
   
	     if (credit == '' ) {
   var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'purcharse-credit',
                type: 'POST',
                dataType: 'JSON',
                data: {credit: credit,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Successfully Purchased Thank You!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    /* var getUrl = window.location;var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];					window.location.href =baseUrl+"/main"; */
						/* var hostname = window.location.origin;
					window.location.href =hostname+"/main"; */
					<?php $url2 = url('/'); ?>
                  window.location.href ="<?php echo $url2; ?>/main";
					}
					else
					{
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Your Wallet Amount Low.Please Add in Wallet </div>').delay(10000).fadeOut(); // Put the message content inside div
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