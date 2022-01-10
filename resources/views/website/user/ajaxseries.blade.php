
												

								@foreach($query as $s)	
									
								
									<div class="item @if($loop->first) selected @endif" data-X10="{{$s->unique_id}}">
									
										<div class="schd">											
											<div class="match">												
												<div class="team">													
													<div class="team1">														
														<img src="{{ URL::to('public/site/image/RPS-CR1.png') }}"><br>														
														{{$s->team_1}}													
													</div>														
													<div class="vs">														
														VS																									
													</div>														
													<div class="team2">														
														<img src="{{ URL::to('public/site/image/RPS-CR1.png') }}"><br>														
														{{$s->team_2}}													
													</div>																								
												</div>													
												<div class="no_match">												
												41th Match												
												</div>											
											</div>											
											<div class="match_detail">												
												
												<?php
											$subd=substr("$s->date",0,10);
					                        $subt=substr("$s->date",-13,-5);
							                $con=$subd.$subt;
											
							                 ?>
							
											@if (date('Y-m-dH:i:s') < $con)
												<?php echo "Open"; ?>
												@else
											    <?php echo "Closed"; ?>
													@endif
												<br>
                                                @if (date('Y-m-dH:i:s') < $con)												
												<a href="">join</a>
                                                @else											
												<a href="">View Points</a>	
                                                @endif											
											</div>										
										</div>							
										</div>								
																	
								<!--	</li>-->	
								@endforeach																		
			


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>		
<script>	

 
		$('.item').click(function (e) {
			// var contest1=$(".mahi").text();
			 var contest1=$(this).attr("data-X10")
		console.log(contest1);

	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'contest-post',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: contest1,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                    console.log(content);
					$('#contest-ajax').html(content)
                  
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            });
        });
   	
	</script>		
							


							