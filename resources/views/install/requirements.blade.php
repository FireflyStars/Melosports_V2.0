@extends('layouts.install')

@section('content')

<div class="login-content installation-page" >

		
	<div class="logo text-center" style="margin-bottom: 20px;"><img src="{{url('public/images/logo.png')}}" height="50"  style="background-color: #ff3838;"></div>
@include('errors.errors')

	<form class="loginform" action=" {{URL::to('update-details')}}" method="post"  id="install_form" name='registrationForm'>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row" >
<?php $isInstallable = 1; ?>
	 <div class="col-md-12">
	 <table class="table">
  <thead>
    <tr>
       
      <th>Requirement</th>
      <th>Status</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PHP Version >= 7.0.0 </th>
      
      <td>
	      	@if (version_compare(phpversion(), '7.0.0', '>'))  
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
      
    </tr>
  
    <tr>
      <th scope="row">max_execution_time</th>
      
      <td>
	      	@if(ini_get('max_execution_time'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    
    <tr>
      <th scope="row">zip</th>
      
      <td>
	      	@if(extension_loaded('zip')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">fileinfo</th>
      
      <td>
	      	@if(extension_loaded('fileinfo')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">openssl</th>
      
      <td>
	      	@if (extension_loaded('openssl')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">mbstring</th>
      
      <td>
	      	@if(extension_loaded('mbstring'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">tokenizer</th>
      
      <td>
	      	@if(extension_loaded('tokenizer'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">allow_url_fopen</th>
      
      <td>
	      	@if( ini_get('allow_url_fopen') )
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
  
  </tbody>
</table>
	 	
	 </div>
	
</div>
		
		


		

		
			@if($isInstallable)
		
			<div class="text-center buttons">

				<button type="button"  class="btn button btn-success btn-lg" onclick="submitForm();" >Next</button>

			</div>
			@else
			<p class="text-danger">Note: Please install/enable the above requirements to continue... </p>
			@endif

		</form>
		

		 <div class="loadingpage text-center" style="display: none;" id="after_display">
		 	
		 	<p>Please Wait...</p>

		 		<img width="50" src="{{url('public/images/loading.gif')}}">

		 </div>

	</div>

@stop



@section('footer_scripts')

	
 <script>
 	function submitForm() {
 		$('#install_form').hide();
 		$('#after_display').show();
 		$('#install_form').submit();
 	}
 </script>
@stop