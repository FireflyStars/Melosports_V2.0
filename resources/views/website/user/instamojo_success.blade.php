
@include('website.user.header')
 
 
 <div class="col-crteam">

				<div class="create_team">
							
							<div class="team_top">
							@if($det=='Credit')
							<p>Status:Success</p><br>
						<p>	Payment Completed Sucessfully!!!!! </p>@else
								<p>	Payment status {{$det}} !!!!! </p>
							@endif
							
						<br>	<p>Transaction Id :{{$tra}}</p>
								
							</div>
							<div class="team_bottom">
							
								<div class="create"><a href="{{URL::to('main')}}">Go To Contest</a></div>
								
								</div>
								</div>
							
									
								
								</div>
				
@include('website.user.footer')