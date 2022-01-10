@include('website.user.header')@include('website.user.menu1')
 


<div class="section-pad wid-bg">

@if( Session::has( 'success' ))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>success!</strong> {{ Session::get( 'success' ) }}.
</div>
@endif

	<div class="container" style="padding-top:10px">
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">Contact Us</h1>
			</div>
		</div>
	
		<div class="row">
		
			
				
				 <div class="col-md-6 col-md-offset-3 col-sm-12">
				 <div class="white-box">
				 
				<form  action="{{ URL('u-contact') }}" method="post"  id="contact_form" autocomplete="off">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					 

					

					<div class="form-group">
					   
					  
					  <input  name="name" required placeholder="Name" class="form-control"  type="text" pattern="[a-zA-Z0-9]+" title="30 characters minimum" placeholder="Name">
						 
					</div>

					<!-- Text input-->
	
					<!-- Text input-->
						   <div class="form-group">
						 
					  <input name="email" required placeholder="E-Mail Address" class="form-control"  type="email" placeholder="Email">
					 
					</div>


					<!-- Text input-->
						   
					<div class="form-group">
					 
							
					  <input name="mobile_no" required placeholder="Mobile Number" class="form-control" type="text" pattern="[789][0-9]{9}" placeholder="Mobile Number">
					 
					</div>
					
					<div class="form-group">
					   
							<textarea class="form-control" required name="message" placeholder="Message"></textarea>
					 
					</div>
					 


					<!-- Select Basic -->

					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->

					<div class="form-group">

					 

					 <button type="submit" class="btn btn-primary" >  Submit </button>

					  
					</div>

					
					</form>
					
				</div>
				</div>
		
			
			
			<div class="col-md-6">
		
			
		
		
			</div>	
		
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
@include('website.user.footer')

