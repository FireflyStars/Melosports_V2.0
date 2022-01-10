@include('website.login.header')



<div class="page_container">

	<div class="container" style="padding-top:10px">
	
		
		
		
		<div class="row">
		
			<div class="col-md-3">
			
			</div>
			
			<div class="col-md-6">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<form class="well form-horizontal" action="{{ URL('otp') }}" method="post"  style="margin-top:2px;">
<fieldset>
					 {{ csrf_field() }}
					
					

					

					<div class="form-group">
					  <label class="col-md-3 control-label ">Enter your OTP</label>
				       <div class="col-md-6 inputGroupContainer">
					  <div class="input-group">
					  <input  name="otp" class="form-control"  type="" >
					  <input  name="email" class="form-control" id="test_email" type="hidden" value="{{Session::get('forgetemail')}}"> 
					  
						</div>
					  </div>
					</div>
								  <div id="error">
								  </div>
								  <!-- Button -->
					<div class="form-group">
						<div class="col-md-3">
						</div>
					  <div class="col-md-4">
					  
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-warning value" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a id = "re-send" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRe-send OTP <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>


					  </div>
					</div>
								{{--  <div class="modal-footer">
								  <a type="button" class="popup_btn" data-dismiss="modal"></a>
									<a class="btn btn-danger value" >Submit</a>
									<a class="btn btn-danger value" >Re-send OTP</a> 

								  </div>--}}
								  
								  </fieldset>
								  </form>
								  </div>
		
		
			<div class="col-md-3">
			
			</div>
		
		
		</div>
		
		
		
		
	</div>
     
</div>
								  
								  
								  
							
							
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>							


<script>
		$('.value').click(function (e) {
			// var contest1=$(".mahi").text();
			 var credit=$('input[name="otp"]').val();
			 var mail=$('#test_email').val();
		console.log(credit);
   
	     if (credit == '' ) {
   var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please enter OTP</div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    return;
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'otp',
                type: 'POST',
                dataType: 'JSON',
                data: {otp: credit,email: mail,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {<?php $url2 = url('/'); ?>								//alert('<?php echo $url2;?>');
                    console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
						//alert(content.message);												  
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>OTP verified Thank You!!!! </div>').delay(10000).fadeOut();   				//setInterval(window.location.href ="<?php echo $url2; ?>/withdraw-user",3000);                     
   
					window.location.href = "<?php echo $url2; ?>/reset-password/"+mail;
					}
					else
					{
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Enter valid OTP </div>').delay(10000).fadeOut(); // Put the message content inside div
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
	// Resend password
		$('#re-send').click(function (e) {
			//alert('xfgfdg');
			// var contest1=$(".mahi").text();
			 //var credit=$('input[name="otp"]').val();
			 var mail=$('#test_email').val();
   //alert(mail);
  	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'resend-otp',
                type: 'POST',
                dataType: 'JSON',
                data: {email: mail,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    //console.log(content);
					if(content.message=='Success'){
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>OTP Verified  Thank You!!!! </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    
					//var res = $.base64.encode(email)
					//window.location.href = "http://omsakthisivamhumanhairs.com/fantasy/reset-password/"+mail;
					}
					
					}	
   
			
        });
		});
		
	</script>
	
	@include('website.user.footer')


