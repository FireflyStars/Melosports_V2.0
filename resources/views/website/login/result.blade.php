@include('website.login.header')
@include('website.login.menu')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
			<div class="show_contest">
			<br>
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>
		
		
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Result
				</div>
				
				
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="about_con">
			
			

			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.login.footer');

