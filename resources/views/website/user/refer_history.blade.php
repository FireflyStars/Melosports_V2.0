@include('website.user.header')
@include('website.user.menu1')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
td,th {
    border: 1px solid black;
padding:10px;
}
</style>
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
			<div class="show_contest">
			<br>
			{{--	<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>--}}
			</div>		
		
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Referal History
				</div>
				
				
			</div>
		<p></p>
				
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="winner_list">
			
				<div class="col-md-12 playpoint">		
                  		
					
					<table border="1">
					
					@php($user_id=base64_encode(Auth::user()->id))
				<p style="float:right">	<b style="color:red">your Referal link:</b> http://<?php echo $_SERVER['SERVER_NAME']?>/refer/{{$user_id}}</p>
					
					
						<tr style="border:1px solid black; background-color:#eaeaea; color:black;">
						  
							
							
							<th>Name</th>
							<th>Date Joined</th>
							<th>Play Point</th>
							
							
							
						</tr>
						@if(count($r_history)!=0)
						@foreach($r_history as $refer)
						<tr>
							<td>{{$refer->name}}</td>				
							<td>{{$refer->created_at}}</td>				
							<td>100</td>				
											
							
							
						</tr>
						@endforeach
							@else
								<p>There are no referal</p>
							@endif
							
					</table>
					
				
				</div>
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

