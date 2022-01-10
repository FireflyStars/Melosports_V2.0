@include('website.login.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />
@include('website.login.flash')
    <!--//page_container-->
<div class="page_container">

	<div class="container" style="padding-top:10px">
				
	
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="winner_list">
			
				<div class="col-md-12">		
				
				 <a href="{{ URL::to('/') }}" class="button">HOME</a>
				
				</div>
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
	

@include('website.login.footer')



