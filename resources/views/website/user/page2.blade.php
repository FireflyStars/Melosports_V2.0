
@include('website.user.header')

@include('website.user.menu1')


<div class="page_container">

	<div class="container" style="padding-top:10px">
	
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
@if ($message = Session::get('select_match'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif	

			@include('website.user.criteria')
 
 <div class="alert alert-danger  alert-block error_test" hidden>
 <button type="button" class="close"  data-dismiss="alert">×</button>
        <strong></strong>
		</div>
		<div id="playercount"></div>
			{{-- <div class="error_test" style ="color:red;margin-left:238px;padding-top:16px;"></div> --}}
		<div class="dd3">
		
			 
			 
			@include('website.user.player_select')

			 
			
			 

			@include('website.user.active_player')

			 	
				
		</div>	
		
	</div>
     
</div>
    <!--//page_container-->
	

@include('website.user.footer')
 

