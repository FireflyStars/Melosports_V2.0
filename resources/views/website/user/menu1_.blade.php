<div class="wrap">
						
						 <div class="col-md-12 menu2">                        	
                           <div class="container">
								<div class="head_top">
                                <ul>
                                  <!--  <li><a href="#">Get Rs.100</a></li>  -->
									<li><a  href="{{URL::to('withdraw-user')}}"><img src="{{url('public/site/image/widthdraw.png')}}">&nbsp;&nbsp;Withdraw Amount</a></li>
                                    <li><a target="_blank" href="{{URL::to('bank-verify')}}"><img src="{{url('public/site/image/verify.png')}}">&nbsp;Verify Now</a></li>
                                 <!--   <li><a href="#">Help</a></li>  -->
                                    
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
                                <!--    <li><a href="#">Notifications</a></li>   -->
								<li><a href="#" data-toggle="modal" data-target="#myModalcrdit"><img src="{{url('public/site/image/credit.png')}}">&nbsp;Credit Purchase</a>&nbsp;&nbsp;<b style="color:#da1812">{{ Auth::user()->credit_point }} Credit </b></li>
								 
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
									<h4 class="modal-title">Purchase Credit Point </h4>
								  </div>
								  <div class="modal-body">
									<form class="well form-horizontal"    style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Credit Point</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <select  name="credit" class="form-control" requried>
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
					<h5 class="modal-title">User Profile</h5>
				</div>
				<div class="modal-body" style="padding:0pc 5px;">
					
					
					
					<form class="well form-horizontal" action="{{ URL('edit-profile') }}" method="post"  style="margin-top:2px;">
					 {{ csrf_field() }}
					
					<fieldset>

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Name</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="name" placeholder="" class="form-control"  type="text" value="{{ Auth::user()->name }}" readonly >
						</div>
					  </div>
					</div>
					
					{{--	<div class="form-group">
					  <label class="col-md-3 control-label">Team Name</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
						</div>
					  </div>
					</div> --}}

					{{--
					--}}
					<!-- Text input-->
					
					
					<div class="form-group">
					  <label class="col-md-3 control-label">Gender</label>  
					  <div class="col-md-4 inputGroupContainer">
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
					  <label class="col-md-3 control-label">E-Mail</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
						
					  <input name="email" placeholder="" readonly class="form-control"  type="text" value="{{ Auth::user()->email }}">
						</div>
					  </div>
					</div>
					
					   


					<!-- Text input-->
						   
					<div class="form-group">
					  <label class="col-md-3 control-label">Contact No.</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							
					  <input name="mobile_number" placeholder="" readonly class="form-control" type="text" value="{{ Auth::user()->mobile_number }}">
						</div>
					  </div>
					</div>
					
				{{--	<div class="form-group">
					
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							
					  <input name="contact_no" placeholder="(639)" class="form-control" type="checkbox" style="width:15px;height:15px;">&nbsp;&nbsp;&nbsp;All SMS Notifications
						</div>
					  </div>
					</div>
					
						<div class="form-group">
					  <label class="col-md-3 control-label">Address.</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							<textarea>  </textarea>
						</div>
					  </div>
					</div> --}}

					<div class="form-group">
					  <label class="col-md-3 control-label">Address</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							
					  <input name="address" placeholder="" class="form-control" type="text" value="{{ Auth::user()->address }}">
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-3 control-label">City</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							
					  <input name="city" placeholder="" class="form-control" type="text" value="{{ Auth::user()->city }}">
						</div>
					  </div>
					</div>
					
					<div class="form-group"> 
									  <label class="col-md-3 control-label">State</label>
										<div class="col-md-9 selectContainer">
										<div class="input-group">
										<select name="state" class="form-control selectpicker">
										  <option value="{{ Auth::user()->state }}" >Select State</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
										 
										</select>
									  </div>
									</div>
					
								</div>
								
								<div class="form-group">
					  <label class="col-md-3 control-label">Pin Code</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
							
					  <input name="pincode" placeholder="" class="form-control" type="text" value="{{ Auth::user()->pincode }}">
						</div>
					  </div>
					</div>
								
					<div class="form-group">
					  <label class="col-md-3 control-label">Country</label>  
						<div class="col-md-9 inputGroupContainer">
						<div class="input-group">
						
					  <input name="country" value="INDIA" readonly class="form-control"  type="text">
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
						
						<button type="submit" class="btn btn-warning"> Update Profile</button>
						
						</div> 
						 {{-- <div class="col-md-6">
						<button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#myModal"> Update Profile</button>
						</div>--}} 
					</div>

					</fieldset>
					</form>
					
				</div>
			
			</div>
		</div>
	</div>	

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
					<h5 class="modal-title">Change Password</h5>
				</div>
				<div class="modal-body" style="padding:0pc 5px;">
					
					
					
					<form class="well form-horizontal" action="{{ URL('change-password') }}" method="post"  style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label">Old Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="op" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-3 control-label">New Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="np" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-md-3 control-label">Re-Enter New Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="rnp" required class="form-control"  type="password" >
						</div>
					  </div>
					</div>										
					
					<div class="col-md-6">
						
						<button type="submit" class="btn btn-warning" > Change Password</button>
						
						</div>
						
						</form>
					
					</div>										
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
								<h4 class="modal-title">Add funds to your account</h4>
							  </div>
							  
							  <div class="modal-body" >
								<p>Add cash to your account to join this contest.</p>
							
							  <form  class="well form-horizontal" action="{{URL::to('payment-view')}}" method ="post" style="margin-top:2px;">
							    {{ csrf_field() }}
							 
							  <div class="form-group">
					  <label class="col-md-3 control-label">Amount</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					<input type="text" class="content form-control" value="31" name="cash">
						</div>
					  </div>
					</div>
							  
							 ADD MORE CASH
							  <ul class="amtOptions">
							  
							     <a class="button price-btn"   data-saravana="115">Rs.115</a>
								 <a class="button price-btn"   data-saravana="250">Rs.250</a>
								 <a class="button price-btn"   data-saravana="600">Rs.600</a>
								
							  </ul>
							  </div>
							  <div class="modal-footer">
							<!--	<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>-->
								<button type="submit" class="popup_btn" >Ok</button>
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
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Successfully Purchased Thank You!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    
						
					window.location.href = "http://omsakthisivamhumanhairs.com/fantasy/main";
					}
					else
					{
						 var errName = $("#error"); //Element selector
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