@include('website.user.header')



@include('website.user.menu1')
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
<div class="cd-main-content sub-nav">
<div class="section-pad wid-bg">

	<div class="container"  >
	
		
		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-head text-center"> <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Verify Your Account </h1>
			</div>
			
		 
		</div>
		
		
		
		
		   <div id="error-display"> </div>
		
		
		<div class="verify_page" style="margin-bottom: 80px">
		
				<div class="">
			
			
				<div class="tabbable" style="margin-bottom: 9px;">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#1a" data-toggle="tab">Mobile  Verification</a></li>
						 @if(!$bank)
							 <li><a href="#" data-toggle="modal" data-target="#pan_error">PAN Card</a></li>
						<li><a href="#" data-toggle="modal" data-target="#pan_bank_error">Bank Account Details</a></li>
						@elseif($bank->otp_verification_status==0 && $bank->pancard_verify_status==0)
							<li><a href="#" data-toggle="modal" data-target="#pan_error">PAN Card</a></li>
						<li><a href="#" data-toggle="modal" data-target="#pan_bank_error">Bank Account Details</a></li>
					
						  @elseif($bank->otp_verification_status==1 && $bank->pancard_verify_status==0)
					 <li><a href="#2a" data-toggle="tab">PAN Card </a></li>
						 <li><a href="#" data-toggle="modal" data-target="#pan_bank_error">Bank Account Details</a></li>
							
							
						  @else($bank->otp_verification_status==1 && $bank->pancard_verify_status==1)
							<li><a href="#2a" data-toggle="tab">PAN Card</a></li>
						<li><a href="#3a" data-toggle="tab">Bank Account Details</a></li>
						
					@endif
                    
					   
                        </ul>
                        <div class="tab-content"  >
                          <div class="tab-pane active" id="1a">
						  @if(!$bank)
							  <div class="wall_tableft">
							<div class="mobile-verify-input">
									<div class="form-group">
									  <label class="  control-label">Verify Your Mobile No :</label>  
										<div class="  inputGroupContainer">
										 										
									  <input name="mobile_number" placeholder="Enter mobile number" class="form-control mobile_number" type="number" value="{{Auth::user()->mobile_number}}" readonly>
										  <p style="color:green">Mobile number will be automatically fetched from profile if given </p> 
										 
									  </div>
									
									  
									  <div class="  inputGroupContainer">
										 											
									  <a  class="btn btn-warning otp_send" > Send OTP </a>
										 
									  </div>
									  
									</div>
									 
										
									</div>
									<div class="  inputGroupContainer">
										 										
									  <a class="btn btn-warning resnd_otp" >Resend OTP </a>
										 
									  </div>
									
									<div class="otp-verify-input" style="display:none">
									<div class="form-group">
									  <label class="  control-label">Enter Otp :</label>  
										<div class="  inputGroupContainer">
										 										
									  <input name="otp_number" placeholder="Enter mobile number" class="form-control" type="text" >
										 
									  </div>
									  
									  <div class="  inputGroupContainer">
										 										
									  <a  class="btn btn-warning otp_verify" >verify </a>
										 
									  </div>
									  
									</div>
									<p> OTP sent. </p>	
									</div>
									 
									
								
						  			
							</div>
						  @elseif($bank->otp_verification_status==0)
							<div class="wall_tableft">
							<div class="mobile-verify-input">
									<div class="form-group">
									  <label class="  control-label">Verify Your Mobile No :</label>  
										<div class="  inputGroupContainer">
										 										
									  <input name="mobile_number"  class="form-control mobile_number" type="number" value="{{Auth::user()->mobile_number}}" readonly>
										<!--  <p style="color:green">Mobile number will be automatically fetched from profile if given </p>  -->
										 
									  </div>
									  
									  <div class=" inputGroupContainer">
									 										
									  <a  class="btn btn-warning otp_send" > Send OTP </a>
										 
									  </div>
									  
									</div>
									<br><br>
									<br>
										
									</div>
									
									<div class="otp-verify-input" style="display:none">
									<div class="form-group">
									  <label class="col-md-12 control-label">Enter Otp :</label>  
										<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
									  <input name="otp_number"  class="form-control"  type="text">
										</div>
									  </div>
									  
									  <div class="col-md-3 inputGroupContainer">
										<div class="input-group">											
									  <a  class="btn btn-warning otp_verify" >verify </a>
										</div>
									  </div>
									   <div class="col-md-3 inputGroupContainer">
										<div class="input-group">											
									  <a class="btn btn-warning resnd_otp" >Resend OTP </a>
										</div>
									  </div>
									  
									</div>
									<p> OTP sent. </p>	
									</div>
									<br><br><br>
									
								
						  			
							</div>
							 @else	
									<h3> +91 {{$bank->mobile_no}} </h3>
									 <h4 style="color: #00d664"><i class="fa fa-check-circle fa-icn-sucess"> </i>Mobile Number Verified</h4> 
							@endif
									 
							{{--	<div class="wall_tabright">
							
								<h4> Verify Your Email ID </h4>
								<p> Verify instanly with</p>
								<div class="conn_login">
									<a class="fb" href="">Facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a class="google" href="">Google+</a>
								</div>
								<p>OR</p>
								<div class="form-group">
									  <label class="col-md-12 control-label">Enter Your Email :</label>  
										<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
									  <input name="enail"  class="form-control" type="email">
										</div>
										</div>
										<div class="col-md-3 inputGroupContainer">
										<div class="input-group">											
									  <button type="submit" class="btn btn-warning" > Verify </button>
										</div>
									  </div>
									  <div class="col-md-3 inputGroupContainer">
									  </div>
						  			
								</div><br><br><br>
								<p> Mobile verification has to be completed email verification We'll send an email with verification link.</p>
							
							</div> --}}
						
                        </div>
						<?php $firstYear = (int)date('Y') - 84;
											$lastYear = date('Y') ;
											?>
						
						<div class="tab-pane" id="2a">
						  @if(!$bank)  
							<div class="row">								
								<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label">Full Name :</label>  
									<div class="col-md-9 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_name" placeholder="" class="form-control" type="text">
										</div>
									</div>								  
								</div><br><br><br>
								<p class="col-md-12"> Your name must match the name of your PAN Card & Bank account.</p>
								<br>
								<div class="form-group"> 
									  <label class="col-md-12 control-label">Date Of Birth</label>
										<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="date" class="form-control selectpicker">
										  <option value="">Date</option>
										  <option>01</option>
										  <option>02</option>
										  <option >03</option>
										  <option >04</option>
										  <option >05</option>
										  <option >06</option>
										  <option >07</option>
										  <option >08</option>
										  <option >09</option>
										  <option >10</option>
										  <option >11</option>
										  <option >12</option>
										  <option >13</option>
										  <option >14</option>
										  <option >15</option>
										  <option >16</option>
										  <option >17</option>
										  <option >18</option>
										  <option >19</option>
										  <option >20</option>
										  <option >21</option>
										  <option >22</option>
										  <option >23</option>
										  <option >24</option>
										  <option >25</option>
										  <option >26</option>
										  <option >27</option>
										  <option >28</option>
										  <option >29</option>
										  <option >30</option>
										  <option >31</option>
										 
										</select>
									  </div>
									</div>
									
									<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="month" class="form-control selectpicker">
										  <option value="">Month</option>
										  <option>Jan</option>
										  <option>Feb</option>
										  <option >March</option>
										  <option >April</option>
										  <option >May</option>
										  <option >June</option>
										  <option >July</option>
										  <option >Aug</option>
										  <option >Sep</option>
										  <option >Act</option>
										  <option >Nov</option>
										  <option >Dec</option>
																				 
										</select>
									  </div>
									</div>
									
									<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="year" class="form-control selectpicker">
										  <option value="">Year</option>
											<?php 
											for($i=$firstYear;$i<=$lastYear;$i++)
											{
											echo '<option value='.$i.'>'.$i.'</option>';
											}?>
										
										 		 
										</select>
									  </div>
									</div>
									
									
									</div>
								
								
								<br><br><br>
								<p class="col-md-12"> For withdrawals, this should match the date of birth on PAN CARD.</p>
								<br>
								{{--	<div class="form-group">
									<div class="col-md-9 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_file" placeholder="" type="file"> 
										</div>
									</div>								  
								</div>
								<br><br><br>
								<p> <a href="">Why should I submit my PAN card ?</a></p>
								<p> <a href="">Dont't have PAN card ?</a></p>
								<p> - Maximum size 4MB. Formats - .jpg .jpeg .png .pdf only</p>
								<p> - We don't accept password-protected docs.</p>
								--}}
								<div class="col-md-12"><a class="sub_verify btn btn-primary" href="#">Submit for verification </a></div>
								
								
								
								
								</div>		
								<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label">PAN Card Number :</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_number" placeholder="" class="form-control" type="text">
										</div>
									</div>								  
								</div>
								<br><br><br><br>
								<div class="form-group">
									<label class="col-md-12 control-label">State :</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
<select name="state123" class="form-control selectpicker">
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
								</div>
								</div>
								
						@elseif($bank->pancard_verify_status==0)  
							<div class="row">								
								<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label">Full Name :</label>  
									<div class="col-md-9 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_name" placeholder="" class="form-control" type="text">
										</div>
									</div>								  
								</div><br><br><br>
								<p class="col-md-12"> Your name must match the name of your PAN Card & Bank account.</p>
								<br>
								<div class="form-group"> 
									  <label class="col-md-12 control-label">Date Of Birth</label>
										<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="date" class="form-control selectpicker">
										  <option value="">Date</option>
										  <option>01</option>
										  <option>02</option>
										  <option >03</option>
										  <option >04</option>
										  <option >05</option>
										  <option >06</option>
										  <option >07</option>
										  <option >08</option>
										  <option >09</option>
										  <option >10</option>
										  <option >11</option>
										  <option >12</option>
										  <option >13</option>
										  <option >14</option>
										  <option >15</option>
										  <option >16</option>
										  <option >17</option>
										  <option >18</option>
										  <option >19</option>
										  <option >20</option>
										  <option >21</option>
										  <option >22</option>
										  <option >23</option>
										  <option >24</option>
										  <option >25</option>
										  <option >26</option>
										  <option >27</option>
										  <option >28</option>
										  <option >29</option>
										  <option >30</option>
										  <option >31</option>
										 
										</select>
									  </div>
									</div>
									
									<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="month" class="form-control selectpicker">
										  <option value="">Month</option>
										  <option>Jan</option>
										  <option>Feb</option>
										  <option >March</option>
										  <option >April</option>
										  <option >May</option>
										  <option >June</option>
										  <option >July</option>
										  <option >Aug</option>
										  <option >Sep</option>
										  <option >Act</option>
										  <option >Nov</option>
										  <option >Dec</option>
																				 
										</select>
									  </div>
									</div>
									
									<div class="col-md-3 selectContainer">
										<div class="input-group">
										<select name="year" class="form-control selectpicker">
										  <option value="">Year</option>
										  <?php 
											for($i=$firstYear;$i<=$lastYear;$i++)
											{
											echo '<option value='.$i.'>'.$i.'</option>';
											}?>
										 		 
										</select>
									  </div>
									</div>
									
									
									</div>
								
								
								<br><br><br>
								<p class="col-md-12"> For withdrawals, this should match the date of birth on PAN CARD.</p>
								<br>
								{{--	<div class="form-group">
									<div class="col-md-9 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_file" placeholder="" type="file"> 
										</div>
									</div>								  
								</div>
								<br><br><br>
								<div class="col-md-12">
									<p> <a href="">Why should I submit my PAN card ?</a></p>
								<p> <a href="">Dont't have PAN card ?</a></p>
								<p> - Maximum size 4MB. Formats - .jpg .jpeg .png .pdf only</p>
								<p> - We don't accept password-protected docs.</p>
								</div>
								--}}
								<div class="col-md-12">
								<a class="sub_verify btn btn-primary" href="#">Submit for verification </a>
							</div>
								
								
								
								
								</div>		
								<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-12 control-label">PAN Card Number :</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
											<input name="pan_number" placeholder="" class="form-control" type="text">
										</div>
									</div>								  
								</div>
								<br><br><br><br>
								<div class="form-group">
									<label class="col-md-12 control-label">State :</label>  
									<div class="col-md-6 inputGroupContainer">
										<div class="input-group">											
											<select name="state123" class="form-control selectpicker">
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
								</div>
								</div>
								
								@else 
								<h4 style="color: #00d664"><i class="fa fa-check-circle fa-icn-sucess"> </i>Pancard Details Succesfully Verified</h4> 
							  
							  @endif
								
						  	</div>	

							<div class="tab-pane" id="3a">
							<div class="form-tab">
							
							<div class="row">								
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Bank Name :</label>  
									<div class="  inputGroupContainer">
										 											
											<input name="bank_name" placeholder="" class="form-control" type="text" value="@if($bank){{$bank->bank_name}}@else @endif">
										 
									</div>								  
								</div>
								 
								<div class="form-group">
									<label class="  control-label">Account Number :</label>  
									<div class="  inputGroupContainer">
										 										
											<input name="bank_acc_no" placeholder="" class="form-control" type="text" value="@if($bank){{$bank->bank_acc_no}}@else @endif">
										 
									</div>								  
								</div>
								 
								<div class="form-group">
									<label class="  control-label">IFSC Number :</label>  
									<div class="  inputGroupContainer">
										 										
											<input name="ifsc" placeholder="" class="form-control" type="text" value="@if($bank){{$bank->ifsc_code}}@else @endif">
										 
									</div>								  
								</div>
								
							
								
								
								
								
								
								
								</div>		
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Branch Name :</label>  
									<div class="  inputGroupContainer">
										 										
											<input name="branch_name" placeholder="" class="form-control" type="text" value="@if($bank){{$bank->branch_name}}@else @endif">
										 
									</div>								  
								</div>
							 
									<div class="form-group">
									<label class=" control-label">Account Holder Name :</label>  
									<div class=" inputGroupContainer">
										 											
											<input name="bank_holder_name" placeholder="" class="form-control" type="text" value="@if($bank){{$bank->bank_holder_name}}@else @endif">
										 
									</div>								  
								</div>						  
								</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<a href="#" class="btn btn-primary account_verify" id="account_verify">Submit for verification </a>
									</div>
								</div>
								</div>
								
						  
							</div>
							
								
                        </div>
						
						
						
                      </div> <!-- /tabbable -->
				
		</div>
		
	</div>
     
</div>
</div>
    <!--//page_container-->
	
@include('website.user.footer');


<!--error pop up -->


<div id="pan_error" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Pan Card Verification </h4>
								  </div>
								  <div class="modal-body">
									<p>To enable "Pan Card Details" please complete Mobile  verification </p>
								</div>

							  </div>
							</div> 
</div>


							<div id="pan_bank_error" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Bank Verification </h4>
								  </div>
								  <div class="modal-body">
									<p>To enable "Bank Account Details" please complete Mobile  verification and  PAN Card Details</p>
								</div>

							  </div>
							</div>  
</div>













<script>	

 //$('#otp-verify-input).hide();
		$('.otp_send').click(function (e) {
			
			
			// var contest1=$(".mahi").text();
			// var mobile=$('input[name="mobile_number"]').val();
		 var mobile=$('.mobile_number').val();
			 var mobile_length=$('.mobile_number').val().length;
		console.log(mobile);
		console.log(mobile_length);
   
	     if (mobile == ''  ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Update your mobile number in profile </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
else if(mobile_length !=10){
	
	 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Enter Vaild mobile number </div>').delay(10000).fadeOut(); 

   }
   else { 
   
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'bank-verify-otp',
                type: 'POST',
                dataType: 'JSON',
                data: {mobile: mobile,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (data) {
                    console.log(data);
					 	
					//$('#contest-ajax').html(content)	
					if(data.message=='Success'){

				 $('.otp-verify-input').show();
		 
				 $('.mobile-verify-input').hide();
				 // location.reload();
				 

   					}
						
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
					//alert(e.message);
					 $('.otp-verify-input').show();
		 
				 $('.mobile-verify-input').hide();
                }
            });
			}
        });
		
	</script>
	
	
	
	<script>	

 //$('#otp-verify-input).hide();
		$('.resnd_otp').click(function (e) {
			
			
			// var contest1=$(".mahi").text();
			// var mobile=$('input[name="mobile_number"]').val();
		 var mobile=$('.mobile_number').val();
			 var mobile_length=$('.mobile_number').val().length;
		console.log(mobile);
		console.log(mobile_length);
   
	     if (mobile == ''  ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Required Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
else if(mobile_length !=10){
	
	 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Enter Vaild mobile number </div>').delay(10000).fadeOut(); 

   }
   else { 
   
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'resnd-verify-otp',
                type: 'POST',
                dataType: 'JSON',
                data: {mobile: mobile,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (data) {
                    console.log(data);
					 	
					//$('#contest-ajax').html(content)	
					if(data.message=='Success'){

				// $('.otp-verify-input').show();
		 
				// $('.mobile-verify-input').hide();
				

   					}
						
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
					//alert(e.message);
					// $('.otp-verify-input').show();
		 
				// $('.mobile-verify-input').hide();
                }
            });
			}
        });
		
	</script>

<script>	

 //$('#otp-verify-input).hide();
		$('.otp_verify').click(function (e) {
			
			
			// var contest1=$(".mahi").text();
			 var otp=$('input[name="otp_number"]').val();
		console.log(otp);
   
	     if (otp == ''  ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'otp-verify-number',
                type: 'POST',
                dataType: 'JSON',
                data: {otp: otp,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						 var errName = $("#error-display"); //Element selector
   /* errName.html('<div class="alert alert-dismissable alert-suceess"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Your Withdraw Request is Proocessing!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div */
   //errName.addClass('error-msg'); //add a class to the element
    
				 $('.otp-verify-input').hide();		
				 $('.mobile-verify-input').hide();	
			  location.reload();
				
					}
					else
					{
						 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> Invaild otp !!!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
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
	
	
	
	
	<!-- pan cart verifications -->
	
	<script>	

 
		$('.sub_verify').click(function (e) {
			
			 var pan_name=$('input[name="pan_name"]').val();
			 var date=$('select[name="date"]').val();
			 var month=$('select[name="month"]').val();
			 var year=$('select[name="year"]').val();
			 var pan_number=$('input[name="pan_number"]').val();
			 var state=$('select[name="state123"]').val();
			 console.log(state);
		var pan_length=$('input[name="pan_number"]').val().length;
   
	     if (pan_name == '' || date == '' || month == '' || year == '' || pan_number == '' || state == ''   ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}

else if(pan_length !=10){
	 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Enter Vaild pan card number </div>').delay(10000).fadeOut(); 
}
	
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'verify-pancard',
                type: 'POST',
                dataType: 'JSON',
                data: {pan_name: pan_name,date: date,month: month,year: year,pan_number: pan_number,state: state,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						 var errName = $("#error-display"); //Element selector
    errName.html('<div class="alert alert-dismissable alert-suceess"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><p style="color:green">Pancard Verification successfully completed !!!! </p> </div>').delay(10000).fadeOut(); // Put the message content inside div */
   //errName.addClass('error-msg'); //add a class to the element
    
				 location.reload();
				
					}
					else
					{
						 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Whoops Somthing Went Wrong !!!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
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

	
	
	<!-- Bank verifications -->
	
	<script>	

 
		$('#account_verify').click(function (e) {
			//alert('hi');
			
			 var bank_name=$('input[name="bank_name"]').val();
			 var bank_acc_no=$('input[name="bank_acc_no"]').val();
			 var ifsc=$('input[name="ifsc"]').val();
			 var branch_name=$('input[name="branch_name"]').val();
			 var bank_holder_name=$('input[name="bank_holder_name"]').val();
			 
			
		var ifsc_len=$('input[name="ifsc"]').val().length;
   
	     if (bank_name == '' || bank_acc_no == '' || ifsc == '' || branch_name == '' || bank_holder_name == ''   ) {
   var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
  
}

/* else if(ifsc_len !=11){
	 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Enter Vaild IFSC Code </div>').delay(10000).fadeOut(); 
} */
	
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'verify-bank-details',
                type: 'POST',
                dataType: 'JSON',
                data: {bank_name: bank_name,bank_acc_no: bank_acc_no,ifsc: ifsc,branch_name: branch_name,bank_holder_name: bank_holder_name,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						 var errName = $("#error-display"); //Element selector
    errName.html('<div class="alert alert-dismissable alert-suceess"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button><p style="color:green">Bank  Account Save successfully !!!</p> </div>').delay(10000).fadeOut(); // Put the message content inside div */
   //errName.addClass('error-msg'); //add a class to the element
    
				 location.reload();
				
					}
					else
					{
						 var errName = $("#error-display"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Whoops Somthing Went Wrong !!!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
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
	
	
	