	@include('website.user.header')
@include('website.user.menu1')


	
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
					Payment Status
				</div>
				
				
			</div>
		<p>Status:Failure</p><br>
						<p>	Payment Failed!!!!! </p>
								
		
		</div>
		
		
		
		</div>		
		
		
	</div>
     

    <!--//page_container-->
	
		@include('website.user.footer');


								
								
								
								
								
								
								
								
								
								
								
								
								
				
@include('website.user.footer')