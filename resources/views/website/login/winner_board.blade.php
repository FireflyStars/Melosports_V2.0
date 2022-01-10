@include('website.login.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
td,th {
    border: 1px solid #e6e6e6;
padding:10px;
}
</style>
	
<div class="section-pad wid-bg">

	<div class="container" style="padding-top:10px">
	
	<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">Winner Board</h1>
			</div>
		</div>				
		 
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="winner_list">
			
				<div class="col-md-12">		
                   <div class="table-resposive scroll white-bg">		
					
					<table border="1" class="table table-striped">
					
						<tr class="bg-light-green">
							<th>Winner</th> 
							<th>Team1</th>
							<th>Team2</th>
							<th>Amount</th>
							<th>Date</th>
						</tr>
						@foreach($admin as $win)
						<tr>
					<!--			<td>
						<div class="winner_d1img">						
								<img src="{{url('public/site/image/profile.jpg')}}">
							</div> 
							</td> -->
							<td>{{ $win -> username }}</td>
							<td>{{ $win -> team_1 }}</td>
							<td>{{ $win -> team_2 }}</td>
							<td>{{ round($win -> user_amount,2) }}</td>
					<?php  $subd=substr("$win->wdate",0,10);  ?>
							<td>{{ $subd }}</td>
						</tr>
						@endforeach
					</table>
				
				</div>
				
				</div>
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.login.footer');

