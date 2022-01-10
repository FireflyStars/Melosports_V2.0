<div class="cd-main-content ">
<div class="row">
			
				 <div class="col-md-12 ">
				 
				 
				 
					
				 
					<div class="white-box">
						<div class="row">
							<div class="col-lg-4">
								<h4>Create your team for </h4>
							 
									<ul style="height:75px;padding-left: 0">
								<?php $query=DB::table('matches')->whereunique_id($match_id)->first(); ?>
					 
									<li>
										<div class="schd" >
											<div class="match">
												<div class="team">
													<div class="team1">
													@if(file_exists(public_path().'/site/image/flag/'.$query->team_1.'.png'))
														<img src="{{ URL::to('public/site/image/flag/',$query->team_1) }}.png"><br>
													@else
													<img src="{{ URL::to('public/site/image/flag/default.png') }}"><br>
														@endif		
															{{ $query->team_1 }}
													</div>	
													<div class="vs">
														VS
												
													</div>	
													<div class="team2">
													@if(file_exists(public_path().'/site/image/flag/'.$query->team_2.'.png'))
														<img src="{{ URL::to('public/site/image/flag/',$query->team_2) }}.png"><br>
														@else
													<img src="{{ URL::to('public/site/image/flag/default.png') }}"><br>
														@endif		
														{{ $query->team_2 }}
												
													</div>												
												</div>	
											
											</div>
											<div class="match_detail">
											
													<span><?php
												$subd=substr("$query->date",0,10);
												$subt=substr("$query->date",-13,-5);
												$time = strtotime($subt);
							$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;
												$d=explode('T',$query->date);
											$timo=substr($d[1],0,5);
										//$datee=date('h:m', strtotime($timo));
										//$real_time=$datee+(60*300);
									//	echo $timo;
									$real_time = date('G:i ', strtotime($timo)+18000);
												
												
											 $dates = $d[0]." ".$real_time;
											 
											$countdowns = date("M j, Y G:i",strtotime($dates));
												//echo date('Y-m-dH:i:s');
												//echo $con;
												//echo date('Y-m-d H:i:s') > $con;
												 ?>
								
												@if (date('Y-m-dH:i:s') < $con)
										<p class="match_time" id="demo_time"></p>

													
												<script>
// Set the date we're counting down to
//var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();
<?php
//$countdowns = date_format($dates,"F j, Y, g:i a"); ?> 
var datess ="<?php echo $countdowns ?>";
//alert(<?php echo $countdowns; ?>);
function countdownss(datess) {
	var datessss= datess;
var countDownDate = new Date(datess).getTime();
// Update the count down every 1 second
console.log(countDownDate);
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
//console.log(now);
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo_time").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x); 
    document.getElementById("demo_time").innerHTML = "EXPIRED";
  }
}, 1000);
//setTimeout(countdownss(datessss),1000);
}
countdownss(datess);
</script>
													@else
													<?php echo "Closed"; ?>
														@endif
													</span><br>
													@if (date('Y-m-dH:i:s') < $con)												
													<a href="">join</a>
													@else											
													<a href="">View Points</a>	
													@endif
													
												<div class="no_match">
													
													
												
												</div>	
													
											
											</div>
										</div>
									</li>
							</ul>

							</div>
						 
					 
						
					 
						 
					 
					
					<div class="col-md-2"></div>
					<div class="col-md-6">
								
								<table class="table table-striped" style="border:1px solid #e6e6e6">
									<tr>
										<td Colspan="5">Selection Criteria</td>
									</tr>
									<tr>
										<td></td>
										<td>WK</td>
										<td>Bat</td>
										<td>AR</td>
										<td>Bowl</td>
									</tr>
									<tr>
										<td>Min</td>
										<td>1</td>
										<td>3</td>
										<td>1</td>
										<td>3</td>
									</tr>
									<tr>
										<td>Max</td>
										<td>1</td>
										<td>5</td>
										<td>3</td>
										<td>5</td>
									</tr>
								</table>	
								
					</div>
					
				</div>
		
			</div>
			</div>
			</div>
			</div>