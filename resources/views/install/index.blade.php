@extends('layouts.install')
@section('header_scripts')
<style>
	.error {
      color: red;
   }

</style>
@stop
@section('content')

<div class="login-content installation-page" >

	<div class="logo text-center" style="margin-bottom: 20px;"><img src="{{url('public/images/logo.png')}}" height="50"  style="background-color: blue;"></div>

		<form class="loginform" action=" {{URL::to('install')}}" method="post"  id="install_form" name='registrationForm'>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
<div class="row" >
	<div class="col-md-8 col-md-offset-2">
	<div class="info"><br>
		<h4>Server Hosting Details</h4>
<p>Please enter server login details to install this system </p><br>
</div>
		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-server" aria-hidden="true"></i></div>
			{{ Form::text('host_name', $value = null , $attributes = array('class'=>'form-control',
				'placeholder' => 'Host Name',
				
				'required'=> 'true', 
			
			)) }}
		
		</div>
		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-database" aria-hidden="true"></i></div>
			{{ Form::text('database_name', $value = null , $attributes = array('class'=>'form-control',
				'placeholder' => 'Database Name',
				
				'required'=> 'true', 
				
			)) }}
		
		</div>

		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>

			{{ Form::text('user_name', $value = null , $attributes = array('class'=>'form-control',
				'placeholder' => 'Database Username',
				
				'required'=> 'true', 
				
			)) }}
			
		</div>


		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
			{{ Form::password('password', $attributes = array('class'=>'form-control',
				'placeholder' => 'Database Password',
				
			)) }}
			 
		</div>

		
		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></div>
			{{ Form::text('port_number', '3306' , $attributes = array('class'=>'form-control',
				'placeholder' => 'Port Number',
				
				'required'=> 'true', 
			
			)) }}
		
		</div>

		<div class="input-group">
		
				<input type="hidden" name="sample_data" value="1" >
		</div>

	</div>
	
</div>
		
		


		

		

		
			<div class="text-center buttons">

				<button type="submit" class="btn btn-primary btn-shadow">Next</button>

			</div>

		{!! Form::close() !!}
		

		 <div class="loadingpage text-center" style="display: none;" id="after_display">
		 	
		 	<p>Please Wait...</p>
		 	<img width="50" src="{{url('public/images/loading.gif')}}">

		 </div>

	</div>

@stop



@section('footer_scripts')

{{--  <script>
 	function submitForm() {
 		$('#install_form').hide();
 		$('#after_display').show();
 		$('#install_form').submit();
 	}
 </script> --}}

 <script src='https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js'></script>
 <script>
        $(function() {
                  
                  $("form[name='registrationForm']").validate({
                   
                    rules: {
                     
                      host_name: "required",
                      database_name: "required",
                      user_name: "required",
                    
                    },
                   
                    messages: {
                      host_name: "Please enter your Host Name",
                      database_name: "Please enter your DataBase Name",
                      user_name: "Please enter your Database Username",
                   
                    },
                    
                    submitHandler: function(form) {
                      form.submit();
                    }
                  });
                });
 </script>
@stop