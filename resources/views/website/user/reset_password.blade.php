@include('website.login.header')



<div class="page_container">

	<div class="container" style="padding-top:10px">
	
		
		
		
		<div class="row">
		
			<div class="col-md-3">
			
			</div>
			
			<div class="col-md-6">




<meta name="csrf-token" content="{{ csrf_token() }}" />

<form class="well form-horizontal" action="{{ URL('reset-password1') }}" method="post"  style="margin-top:2px;"> 
<fieldset>
					 {{ csrf_field() }}
					
					
					

					<div class="form-group">
					  <label class="col-md-3 control-label">New Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="newpass" class="form-control"  type="password" id="newpass" >
					  <input  name="email" class="form-control"  type="hidden" value="{{$id}}" id = "mailpass">
					  
						</div>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-3 control-label">Confirm Password</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					  
					  <input  name="conform" class="form-control"  type="password" id="conform">
					 
						</div>
					  </div>
					</div>
					<div id="error">
					</div>
					<div class="form-group">
						<div class="col-md-3">
						</div>
					  <div class="col-md-4">
					  
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn btn-warning" id="give" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT 						<span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
					  </div>
					</div>
								  
								 {{-- <div class="modal-footer">
								  <a type="button" class="popup_btn" data-dismiss="modal"></a>
									<a href="#" id="mmm" class="btn btn-danger" >Submit</a>
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

 
		$('#give').click(function () {
			//alert('ijiji');
   var newpassword=$('#newpass').val();
   var mailpassword=$('#mailpass').val();
   var conformpassword=$('#conform').val();
	console.log(conformpassword);
    /*  */
	
	 if (newpassword == ''&&conformpassword == '' ) {
   var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please enter password</div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
    
}
   else { 
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ URL('reset-password1') }}",
                type: 'POST',
                dataType: 'JSON',
                data: {newpassword: newpassword,mailpassword: mailpassword,conformpassword: conformpassword,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                  //  console.log(content);
					//$('#contest-ajax').html(content)
					if(content.message=='Success'){
										
					window.location.href ="{{ URL('/') }}";  
				
					}
					else
					{
						 var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Password mismatch</div>').delay(10000).fadeOut(); // Put the message content inside div
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

@include('website.user.footer')

	