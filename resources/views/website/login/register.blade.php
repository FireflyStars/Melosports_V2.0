<div class="wrap banner section-pad">
<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="home-slider owl-theme">
					<div class="item"><img src="{{url('public/site/image/slider/slider-1.png')}}"></div>
					<div class="item"><img src="{{url('public/site/image/slider/ipl-team.png')}}"></div>
					<div class="item"><img src="{{url('public/site/image/slider/slider-2.png')}}"></div>
					<div class="item"><img src="{{url('public/site/image/slider/slider-3.png')}}"></div>
					
				</div>
			</div>
			<div class="col-lg-5">
				<div class="regester-box">
<?php $social=App\SocialSetting::findorfail(1) ?>	
								
									<div class="conn_login">
											<span class="connect-text">Connect With</span>
											@if($social->fb_status==0)
										 <a class="fb social-btn" target="_blank" href="{{ url('auth/facebook') }}">Facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 @endif
										 @if($social->glogin_status==0)
										 <a class="google social-btn" target="_blank" href="{{ url('auth/google') }}">Google+</a>
										@endif
									</div>
										@if (count($errors) > 0)
    
            @foreach ($errors->all() as $error)
                
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
			
			<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
			<script>	
			$(function () {
    
        // make it not dissappear
        toastr.error("{{ $error }}", "ERROR", {
            "timeOut": "0",
            "extendedTImeout": "0"
        });
    
    
});
	</script>			
            @endforeach
       
									@endif 
@if($message = Session::get( 'success' ))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{$message}}</strong>  
</div>
@endif
@if( $message = Session::get( 'error' )) 
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>{{$message}}</strong>  
</div>
@endif
			<div class="clearfix">
				<div class="ddd"><span class="sign"> (or) Sign Up </span></div>
			</div>
			<form class="form-horizontal clearfix" action="{{ URL('user-register') }}" method="post"  id="contact_form1">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<!-- Text input-->
				<div class="form-group mb-2">	
			  <!-- <label class="col-md-12 control-label">Name</label>   -->
				<div class="col-md-12 inputGroupContainer">
				<div class="input-group">
				
			  <input name="name" required placeholder="Name" class="form-control" value="{{old('name')}}" type="text" pattern="^[a-zA-Z]+$">
				</div>
			  </div>
			</div>
			<div class="form-group mb-2">	
			  <!-- <label class="col-md-12 control-label">E-Mail</label>   -->
				<div class="col-md-12 inputGroupContainer">
				<div class="input-group">
				
			  <input name="email" required placeholder="E-Mail Address" class="form-control"  value="{{old('email')}}"  type="email">
				</div>
			  </div>
			</div>
			
			<!-- Text input-->

			<div class="form-group mb-2">
			  <!-- <label class="col-md-12 control-label" >Password</label>  -->
				<div class="col-md-12 inputGroupContainer">
				<div class="input-group">
			  <input name="password" id="password" required placeholder="Password" class="form-control"  type="password">
				</div>
			  </div>
			</div>
			<div class="form-group mb-2">
			  <!-- <label class="col-md-12 control-label" >Confirm Password</label>  -->
				<div class="col-md-12 inputGroupContainer">
				<div class="input-group">
			  <input name="password_confirmation" id="password_confirmation" required placeholder="Confirm Password" class="form-control"  type="password">
				</div>
			  </div>
			</div>
			<input type="hidden" name="refer_id" value="{{Session::get('refer_id')}}">
				<div class="form-group mb-2">
			  <!-- <label class="col-md-12 control-label" >Mobile Number</label>  -->
				<div class="col-md-12 inputGroupContainer">
				<div class="input-group">
			  <input name="mobile_number" required placeholder="Mobile Number" value="{{old('mobile_number')}}"  pattern = "[789][0-9]{9}" class="form-control"  type="text">
				</div>
			  </div>
			</div> 
<div class="g-recaptcha" 
           data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
</div>

		<script src='https://www.google.com/recaptcha/api.js'></script>

		{{--  <div class="form-group"> 
			  <label class="col-md-12 control-label">Date Of Birth</label>
				<div class="col-md-4 selectContainer">
				<div class="input-group">
				<select name="date" required class="form-control selectpicker">
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
			
			<div class="col-md-4 selectContainer">
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
			
			<div class="col-md-4 selectContainer">
				<div class="input-group">
				<select name="year" class="form-control selectpicker">
				  <option value="">Year</option>
				  <option>2017</option>
				  <option>2016</option>
				  <option >2015</option>
				  <option >2014</option>
				  <option >2013</option>
				  <option >2012</option>
				  <option >2011</option>
				  <option >2010</option>
				  <option >2009</option>
				  <option >2008</option>
				  <option >2007</option>
				  <option >2006</option>
														 
				</select>
				
				  
									  </div>
									</div>
									
									
									</div> --}}
									
							<div>		
							{{--	<label>Captcha</label> 
				<span id="captcha-info" class="info"></span><br/>
				<input type="text" name="captcha" id="captcha" class="demoInputBox"><br>
				</div>
				<div>
		<img id="captcha_code" src="{{url('capcha')}}" /><a name="submit" class="btnRefresh" onClick="refreshCaptcha();">Refresh Captcha</a>
							</div>		 --}}
									
									<div class="form-group">
									
									  <div class="col-md-6">
										<input type="checkbox" name="term_condition" required>&nbsp;&nbsp; I Agree <a target="_blank" href="{{ URL('termsandconditions') }}" >T&C <a/></button>
										
									  </div>
									  <div class="col-md-6">
			  <button type="submit" class="btn btn-yellow font-bold fz16" >Start Playing</button>
									  </div>
									</div>

									<!-- Select Basic -->

									<!-- Success message -->
									<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

									<!-- Button -->
									
									
								<!--	<div class="form-group">
									
									  <div class="col-md-12">
										<div class="invite_form"><p>Invite by a friend?<a href="#">&nbsp;Click here</a></p></div>
									  </div>
									</div>  -->
									

									</form>
				</div>
			</div>
		</div>
</div>
</div>
</div>
</div>
 
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		
<script>
function sendContact() {
	var valid;	
	valid = validateContact();
	if(valid) {
		jQuery.ajax({
		url: "contact_mail.php",
		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$("#content").val()+'&captcha='+$("#captcha").val(),
		type: "POST",
		success:function(data){
		$("#mail-status").html(data);
		},
		error:function (){}
		});
	}
}

function validateContact() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userName").val()) {
		$("#userName-info").html("(required)");
		$("#userName").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(required)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(invalid)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(required)");
		$("#subject").css('background-color','#FFFFDF');
		valid = false;
	}
	if($("#password").val() != $("#password_confirmation").val()) {
		$("#password_confirmation-info").html("(required)");
		$("#password_confirmation").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#content").val()) {
		$("#content-info").html("(required)");
		$("#content").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#captcha").val()) {
		$("#captcha-info").html("(required)");
		$("#captcha").css('background-color','#FFFFDF');
		
		valid = false;
	}
	
	return valid;
}
function refreshCaptcha() {
	$("#captcha_code").attr('src','{{url("capcha")}}');
}

/* $('#captcha').keyup(function() {
	//alert ("hi manager");
	
if($(this).val()==$("#captcha_code").attr('id')){
	alert ("hi manager");
}
});
 */
</script>
<script src="{{ url('public/site/js/api.js') }}"></script>