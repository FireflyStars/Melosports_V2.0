@include('website.login.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />
	
		<div class="section-pad wid-bg">

	<div class="container" >
				
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">Point System</h1>
			</div>
		</div>	
		 
		
		<div class="row" >
		
			<div class="col-sm-12">
			<div class="about-box-content">
				
				 <p>Here’s how your team earns points:</p>
				<div class="table-responsive">
					<table border="1" class="table table-striped">  
						<tbody>
							<tr class="bg-light-green">
							<th>Type of Points</th>
							<th>T20</th>
							<th>ODI</th>
							<th>Test</th>
						</tr>  
						</tbody>      
						{{--	<tr>
							<td>For being part of the Starting XI &nbsp; <a href="#">**</a></td>
							<td>2</td>
							<td>2</td>
							<td>2</td>
						</tr> --}}
						<tr>
							<td>For every run scored</td>
							<td>{{ $t20->each_run }}</td>
							<td>{{ $odi->each_run }}</td>
							<td>{{ $test->each_run }}</td>
						</tr>
						<tr>
							<td>Wicket (excluding run-out)</td>
							<td>{{ $t20->per_wicket }}</td>
							<td>{{ $odi->per_wicket }}</td>
							<td>{{ $test->per_wicket }}</td>
						</tr>
						<tr>
							<td>Catch</td>
							<td>{{ $t20->catch }}</td>
							<td>{{ $odi->catch }}</td>
							<td>{{ $test->catch }}</td>
						</tr>
						<tr>
							<td>Caught &amp; Bowled</td>
							<td>{{ $t20->caught_bowled }}</td>
							<td>{{ $odi->caught_bowled }}</td>
							<td>{{ $test->caught_bowled }}</td>
						</tr>
						<tr>
							<td>Stumping</td>
							<td>{{ $t20->stumping }}</td>
							<td>{{ $odi->stumping }}</td>
							<td>{{ $test->stumping }}</td>
						</tr>
						<tr>
							<td>Run-out</td>
							<td>{{ $t20->run_out }}</td>
							<td>{{ $odi->run_out }}</td>
							<td>{{ $test->run_out }}</td>
						</tr>
						<tr>
							<td>Dismissal for duck</td>
							<td>{{ $t20->dismissal_for_duck }}</td>
							<td>{{ $odi->dismissal_for_duck }}</td>
							<td>{{ $test->dismissal_for_duck }}</td>
						</tr>
					</table>
				</div>
				<br>
				<h4>Bonus Point</h4>
				<table border="1" class="table table-striped">  
						<thead>
							<tr class="bg-light-green">
						
							<td>Type of Points</td>
							<td>T20</td>
							<td>ODI</td>
							<td>Test</td>
						</tr> 
						<thead>       
						<tr>
							<td>Every boundary hit</td>
							<td>{{ $t20->each_four }}</td>
							<td>{{ $odi->each_four }}</td>
							<td>{{ $test->each_four }}</td>
						</tr>
						<tr>
							<td>Every six hit</td>
							<td>{{ $t20->each_six }}</td>
							<td>{{ $odi->each_six }}</td>
							<td>{{ $test->each_six }}</td>
						</tr>
						<tr>
							<td>Half century</td>
							<td>{{ $t20->half_century }}</td>
							<td>{{ $odi->half_century }}</td>
							<td>{{ $test->half_century }}</td>
						</tr>
						<tr>
							<td>Century</td>
							<td>{{ $t20->century }}</td>
							<td>{{ $odi->century }}</td>
							<td>{{ $test->century }}</td>
						</tr>
						<tr>
							<td>Maiden over</td>
							<td>{{ $t20->maiden_over }}</td>
							<td>{{ $odi->maiden_over }}</td>
							<td>{{ $test->maiden_over }}</td>
						</tr>
						<tr>
							<td>4 wickets</td>
							<td>{{ $t20->wickets_4 }}</td>
							<td>{{ $odi->wickets_4 }}</td>
							<td>{{ $test->wickets_4 }}</td>
						</tr>
						<tr>
							<td>5 wickets</td>
							<td>{{ $t20->wickets_5 }}</td>
							<td>{{ $odi->wickets_5 }}</td>
							<td>{{ $test->wickets_5 }}</td>
						</tr>
					</table>
			
				<br>
				
				<h4>Economy Rate</h4>
				<table border="1" class="table table-striped">  
						<thead>
							<tr class="bg-light-green">
							<td>Type of Points</td>
							<td>T20</td>
							<td>ODI</td>
							<td>Test</td>
						</tr>  
						</thead>      
					{{--	<tr>
							<td>Applicable for players bowling minimum overs</a></td>
							<td>2 overs</td>
							<td>5 overs</td>
							<td>NA</td>
						</tr>
						<tr>
							<td>Between 6 and 5 runs per over</td>
							<td>1</td>
							<td>&nbsp;</td>
							<td>NA</td>
						</tr>
						<tr>
							<td>Between 4.99 and 4 runs per over</td>
							<td>2</td>
							<td>&nbsp;</td>
							<td>NA</td>
					</tr>  --}}
						<tr>
							<td>Below 4 </td>
							<td>{{ $t20->economy_rate_below_4 }}</td>
							<td>{{ $odi->economy_rate_below_4 }}</td>
							<td>{{ $test->economy_rate_below_4 }}</td>
						</tr>
						<tr>
							<td>Between 4 and 5 </td>
							<td>{{ $t20->economy_rate_4_5 }}</td>
							<td>{{ $odi->economy_rate_4_5 }}</td>
							<td>{{ $test->economy_rate_4_5 }}</td>
						</tr>
						<tr>
							<td>Between 5 and 6 </td>
							<td>{{ $t20->economy_rate_5_6 }}</td>
							<td>{{ $odi->economy_rate_5_6 }}</td>
							<td>{{ $test->economy_rate_5_6 }}</td>
						</tr>
					{{--	<tr>
							<td>Above 11 runs per over</td>
							<td>-3</td>
							<td>&nbsp;</td>
							<td>NA</td>
					</tr>  --}}
						<tr>
							<td>Between 6 and 7 </td>
							<td>{{ $t20->economy_rate_6_7 }}</td>
							<td>{{ $odi->economy_rate_6_7 }}</td>
							<td>{{ $test->economy_rate_6_7 }}</td>
						</tr>
						<tr>
							<td>Between 7 and 9 </td>
							<td>{{ $t20->economy_rate_7_9 }}</td>
							<td>{{ $odi->economy_rate_7_9 }}</td>
							<td>{{ $test->economy_rate_7_9 }}</td>
						</tr>
					{{--	<tr>
							<td>Below 2.5 runs per over</td>
							<td>&nbsp;</td>
							<td>3</td>
							<td>NA</td>
						</tr>
						<tr>
							<td>Between 7 and 8 runs per over</td>
							<td>&nbsp;</td>
							<td>-1</td>
							<td>NA</td>
						</tr>
						<tr>
							<td>Between 8.1 and 9 runs per over</td>
							<td>&nbsp;</td>
							<td>-2</td>
							<td>NA</td>
					</tr>  --}}
						<tr>
							<td>Above 9 </td>
							<td>{{ $t20->economy_rate_above_9 }}</td>
							<td>{{ $odi->economy_rate_above_9 }}</td>
							<td>{{ $test->economy_rate_above_9 }}</td>
						</tr>
					</table>
				
				
				<br>
				<h4>Strike Rate</h4>
				<table border="1" class="table table-striped">  
						<tbody>
							<tr class="bg-light-green">
							<th>Type of Points</th>
							<th>T20</th>
							<th>ODI</th>
							<th>Test</th>
						</tr>        
					</tbody>
				{{--		<tr>
							<td>Applicable for players batting minimum balls</td>
							<td>10 balls</td>
							<td>20 balls</td>
							<td>NA</td>
				</tr>  --}}
						<tr>
							<td>Between 60 and 70 </td>
							<td>{{ $t20->strike_rate_60_70 }}</td>
							<td>{{ $odi->strike_rate_60_70 }}</td>
							<td>{{ $test->strike_rate_60_70 }}</td>
						</tr>
					{{--	<tr>
							<td>Between 50 and 59.9 runs per 100 balls</td>
							<td>-2</td>
							<td>&nbsp;</td>
							<td>NA</td>
					</tr> --}}
						
						<tr>
							<td>Between 50 and 60</td>
							<td>{{ $t20->strike_rate_50_60 }}</td>
							<td>{{ $odi->strike_rate_50_60 }}</td>
							<td>{{ $test->strike_rate_50_60 }}</td>
						</tr>
						
						<tr>
							<td>Below 50</td>
							<td>{{ $t20->strike_rate_below_50 }}</td>
							<td>{{ $odi->strike_rate_below_50 }}</td>
							<td>{{ $test->strike_rate_below_50 }}</td>
						</tr>
						
				{{--		<tr>
							<td>Between 40 and 49.9 runs per 100 balls</td>
							<td>&nbsp;</td>
							<td>-2</td>
							<td>NA</td>
						</tr>
						<tr>
							<td>Below 40 runs per 100 balls</td>
							<td>&nbsp;</td>
							<td>-3</td>
							<td>NA</td>
				</tr> --}}
					</table>
				</div>

			</div>
			</div>
		
		</div>		
		
		
	</div>
     
</div>

 
     
</div>
    <!--//page_container-->
	
		@include('website.login.footer');

