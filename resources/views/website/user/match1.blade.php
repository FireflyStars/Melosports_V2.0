 
 <style>
.item { display:none;}



</style>

 
 <meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">
	<div class="col-md-12"  >
        <div class="tabbable" style="margin-bottom: 9px;">
            <ul class="nav nav-tabs" style="margin-bottom:0px;border-bottom:none">
                <li class="active"><a href="#1" data-toggle="tab"><img src="{{ URL::to('public/site/image/cricket_bat2.png') }}"> &nbsp;Cricket</a></li>
            </ul>
            <div class="tab-content" >
                <div class="tab-pane active" id="1">
					<div class="row news_block">
						<div class="col-md-2 series">
						<form method="post" action="{{url('change-series')}}" id="myform" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<select  name="series">
						
							<option value="all">All Series</option>
							@foreach($series as $s)
											
										<?php 
											 $dates1= DB::table('series')
											->join('matches', 'series.id', '=', 'matches.series_id')
											->select('matches.date','matches.unique_id')->where('matches.series_id',$s->id )->orderBy('matches.date','desc')->first();					
											
											
																					 
											 ?>
<option value="{{ $s->id }}" <?php if($s->id == Session::get('series')) echo "selected"; ?> >{{ $s->name }}  </option>

																				

								@endforeach
							</select>
					
							</form>
						</div> 
			 
						<div class="col-md-10" >
							
							<div class="overlay">
							</div>
								 <!-- Slider -->
								 
							
								 <div class="ajax-match">
							<div class="slider responsive">
							
								
								@foreach($matches as $s)    
								<?php
											 $subd=substr("$s->date",0,10);
					                        $subt=substr("$s->date",-13,-5);
										//	$tim=strtotime("+330 minutes", strtotime($subt));
										//	$tim=date('h:i:s',strtotime("+330 minutes",$subt));
										$time = strtotime($subt);
										$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							             $con=$tim_sar;
							            // $con=$subd.$tim;
							             //   $con1=$subd.$tim;
											 $d=explode('T',$s->date);
											$timo=substr($d[1],0,5);
										//$datee=date('h:m', strtotime($timo));
										//$real_time=$datee+(60*300);
									//	echo $timo;
									$real_time = date('G:i ', strtotime($timo)+18000);
									//echo $real_time;
									//echo $d[0];
									
									
											//echo $datee;
											//$timy=strtotime("+330 minutes", strtotime($timo));
											//$datee=date('h:m', strtotime($timy));
											
											//echo $timy;
											 $dates = $d[0]." ".$real_time;
											 
										
							                //echo date('Y-m-dH:i:s');
							                //echo $con;
							                //echo date('Y-m-d H:i:s') > $con;
												
											 $today = date('Y-m-dH:i:s');	 
																			
											//$newDate = date($dates,strtotime("+2 day"));	
											//$closedate = $newDate-$dates;
									    	$now = time(); // or your date as well
											$your_date = strtotime($d[0].$d[1]); 
										$your_date_add=strtotime("+7 days", $your_date);
										
										if($your_date_add > $now)
											{ 
											 $datediff = $now - $your_date;
										 $closedate = floor($datediff / (60 * 60 * 24));
							            /*   if($closedate <=0 || $closedate == 1 || $closedate == 2  )   */
										  
										  
										?>  
										
										 
										@if ( $today < $con )
											@if(!Session::has('unique_id'))
										<?php $mmm=	DB::table('matches')->whereis_delete(0)->whereis_active(1)->orderBy('date','asc')->where('abandon','!=',1)->where('date','<',$today )->first();  ?>	
									@if($mmm->unique_id)
										<?php Session::put('unique_id',$s->unique_id); ?>
											@elseif($loop->last)
											<?php Session::put('unique_id',$s->unique_id); ?>
										@endif
										@endif
											
								<div class=" item @if($s->unique_id==Session::get('unique_id')) selected @endif" data-X10="{{$s->unique_id}}"  >
								
							         @else
									 {{--<div class="item" data-X10="{{$s->unique_id}}" >--}}
								<div class=" item @if($s->unique_id==Session::get('unique_id')) selected @endif" data-X10="{{$s->unique_id}}"  >
									  @endif	
									<div class="schd">
										<div class="match">
											<div class="team">
												<div class="team1">
												
												@if(file_exists(public_path().'/site/image/flag/'.$s->team_1.'.png'))
													<img src="{{ URL::to('public/site/image/flag/',$s->team_1) }}.png"><br>
												@else
													<img src="{{ URL::to('public/site/image/flag/default.png') }}"><br>
														@endif														
													{{$s->team_1}}
													
												</div>	
												<div class="vs">
													VS												
												</div>	
												<div class="team2">
											@if(file_exists(public_path().'/site/image/flag/'.$s->team_2.'.png'))
													<img src="{{ URL::to('public/site/image/flag/',$s->team_2) }}.png"><br>
												@else
													<img src="{{  URL::to('public/site/image/flag/default.png') }}"><br>
														@endif															
													{{$s->team_2}}											
												</div>												
											</div>	
											
										</div>
										
											
										<div class="match_detail">
											@if ($today < $con)
												
													<?php // echo "Open";
													
								$countdowns = date("M j, Y G:i:s",strtotime($tim_sar));
													
								
 ?>							
												<span id="sapn{{$s->unique_id}}" hidden>{{$countdowns}}</span>
													
<script>
// Set the date we're counting down to


// Update the count down every 1 second
var x = setInterval(function() {
	
	var sapn=$('#sapn'+{{$s->unique_id}}).text();
//console.log(sapn);
var countDownDate = new Date(sapn).getTime();

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
   //console.log(distance);
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     if (distance > 0) {
    // Output the result in an element with id="demo"
    document.getElementById("demo"+{{$s->unique_id}}).innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
	 }
    // If the count down is over, write some text 
    if (distance < 0) {
	//	alert(days+"ddd");
        //clearInterval(x);
        document.getElementById("demo"+{{$s->unique_id}}).innerHTML ="Close";
    }
	
}, 1000);
</script>
<div class="match_time" id="demo{{$s->unique_id}}"></div>

												@else
															
											<?php 
												//if($your_date_add > $now)
											//{
												?>
											   <!-- <p class="match_time"><?php //echo "Closed"; ?></p>
													<a href="#">View Points</a> -->
												<?php //} ?>
												

													@endif
												
                                                @if ($today < $con)												
												<a href="#">join </a>
												
                                                @else	
												 <p class="match_time"><?php echo "Closed"; ?></p>
													<a href="#">View Points</a>		
												
                                                @endif	

											<div class="no_match">
											
												
											
											</div>

 
												
										</div>
									</div>
								</div>
										  <?php }  ?>			
							@endforeach   
							</div>
								
								
							</div>
										 <!-- control arrows -->
							<div class="prev">
								<img src="{{url('public/site/image/right.png')}}">
							</div>
							<div class="next">
								<img src="{{url('public/site/image/left.png')}}">
							</div>
						
						</div>
						     		
					</div>
							
                </div>
                       
            </div>
        </div> <!-- /tabbable -->
    </div>
   
			
				 
</div>






<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

	<script>	
		
$(document).ready(function(){
	
   $('#series').change(function () {
     var series1=$(this).val();
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'series-post',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: series1,_token:CSRF_TOKEN}, //get model dan ukuran
                success: function (content) {
                  //  console.log(content);
					$('.responsive').html(content)
                  
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            });
        });
        });
   	
	</script>
						<!-- auto select first element in match -->
<script>	

 //setInterval(LoadFinance, 30000);
	
	
  //function LoadFinance() {
			var contest1 = $('.selected').attr("data-X10");
			 
		//console.log(contest1);
   
	     
    
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'contest-post',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: contest1,_token:CSRF_TOKEN}, //get model dan ukuran
				 beforeSend: function() {
              $("#loadingmessage").show();
           },
                success: function (content) {
                   // console.log(content);
					$('#contest-ajax1').html(content);
					$('#c_matchid').val(contest1);
					 $("#loadingmessage").hide();
					  callB();
                  
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            
     });
  //}
  
  function callB()
  {
	  //function LoadFinance() {
			var contest1 = $('.selected').attr("data-X10");
			 
		//console.log(contest1);
   
	     
    
	   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'mega_contest',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: contest1,_token:CSRF_TOKEN}, //get model dan ukuran
				 beforeSend: function() {
              $("#loadingmessage").show();
           },
                success: function (content) {
                
                 $(".mega_bottom").html(content);
				  $("#loadingmessage").hide();
				 callC();
                  
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            
     });  
	  }
 
	</script>	
	
	<script>
	
	function callC(){
		
		var contest1 = $('.selected').attr("data-X10");
			 
		//console.log(contest1);
   
	     
    
	   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'challenge-frnd',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: contest1,_token:CSRF_TOKEN}, //get model dan ukuran
				 beforeSend: function() {
              $("#loadingmessage").show();
           },
                success: function (content) {
                
                 
				  $("#loadingmessage").hide();
					$('#c_frnd').html(content);
                  
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
                }
            
     });
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<!-- click to select match -->
<script>	

 
		$('.item').click(function (e) {
			
			 var contest1=$(this).attr("data-X10")
		//console.log(contest1);
		$(".selected").css({
    "background-color": "", 
    "color": "", 
    "font-weight"     : ""
});
		
		 $('.selected').removeClass('selected');
		 
		//$('.selected').stopPropagation();
		 $(this).addClass('selected');
		 $('.item').fadeOut(800, function(){
                             $('.item').fadeIn().delay(2000);
                   });
		 
    
	
	$(".selected").css({
    "background-color": "#a20505", 
    "color": "#0950a8", 
    "font-weight"     : "600"
});
	    
    
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	//$('#loadingmessage').show();  // show the loading message.
            $.ajax({
                url: 'contest-post',
                type: 'POST',
               // dataType: 'JSON',
                data: {input_field: contest1,_token:CSRF_TOKEN}, //get model dan ukuran
				 beforeSend: function() {
              $("#loadingmessage").show();
           },
                success: function (content) {
                   // console.log(content);
					$('#contest-ajax1').html(content);
					$('#c_matchid').val(contest1);
	  /* $('#contest-ajax').fadeOut(800, function(){
                             $('#contest-ajax').fadeIn().delay(2000);
                   }); */
				   $('#loadingmessage').hide(); // hide the loading message
				   callB();
                },
                error: function (e) {
                    //called when there is an error
                    console.log(e.message);
					
                }
            });
        });
		
   	
	</script>
	
	<script>
	$(document).ready(function()
	{
	$('select[name="series"]').change(function(){
	$('#myform').trigger('submit');
	});
	}); 
	
	
	</script>		


<script type = "text/javascript">  
$(window).load(function() {
    setTimeout(function() {
        $("#item").show('fadeIn', {}, 500)
    }, 2000);
});
</script>
<script>
 $(document).ready(function()
	{
		$(window).load(function() {
			
			//alert('aasd');
  // e.preventDefault();
   var contest1 = $('.selected').attr("data-slick-index");
 //  var slideno = $(this).data('slide');
   $('.slick-slider').slick('slickGoTo', contest1);
 });
 });
</script>
<script>
$(".selected").css({
    "background-color": "#a20505", 
    "color": "#0950a8", 
    "font-weight"     : "600"
});
</script>
