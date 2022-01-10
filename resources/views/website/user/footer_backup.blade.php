<!--footer-->   
 

	<footer class="cs-footer" style="background-image: url(images/footer-bg.png)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="cs-footer-logo"><img src="{{ url('public/site/image/foot.png') }}"></div>
                        <ul class="cs-footer-links">
                            <li><a href="{{URL::to('about-us')}}">About Us</a></li>
                            <li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{URL::to('howtoplay')}}">How to Play Leaguerocks</a>	</li>
                        </ul>

                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Resources</h4>
                        <ul class="cs-footer-links">
                            <li><a href="{{URL::to('l-point')}}">Point System</a></li>
                            <li><a href="{{url::to('lscore')}}">Live Scores</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Our Services</h4>
                        <ul class="cs-footer-links">
                            <li><a href="{{url('testimonial')}}">Testimonial</a> </li>
                            <li><a href="{{url::to('l_news')}}">News</a>  </li>
                            <li><a href="{{URL::to('faquestion')}}">FAQs</a></li>
                        </ul>
                    </div>
					<?php $site=App\SiteSetting::findorfail(1) ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <h4 class="footer-head text-white font-bold">Contact Us</h4>
                        <ul class="footer-share-it mt-3">
                               <li class="shate-it-item"><a target="_blank" href=@if($site->social_links['fb']) "{{$site->social_links['fb']}}" @endif class="btn btn-share-sm bg-facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="shate-it-item"><a target="_blank" href=  @if($site->social_links['twi'])"{{$site->social_links['twi']}}" @endif class="btn btn-share-sm bg-twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="shate-it-item"><a target="_blank" href= @if($site->social_links['you'])"{{$site->social_links['you']}}" @endif class="btn btn-share-sm bg-google"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                    </div>
                </div>
              
                <div class="copyright-bar clearfix">
                	  <div class="row">
                		<div class="col-sm-12">
                				
								
								<p>{!! $site->footer_text !!} </p>
                		</div>
                	</div>

                  
                </div>
                  <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="copy-text">Copyright 	&#169; {{$site->site_name}} . All Rights Reserved. </div>
                        </div>
                        <div class="col-lg-6">
                         <ul class="text-right-md ">  <a target="_blank"  class="text-white mr-2" href="{{URL::to('privacypolicy')}}"> Privacy Policy </a> | 
						<a target="_blank" class="text-white ml-2"  href="{{URL::to('termsandconditions')}}">Terms & Conditions </a> 
					</ul>
                        </div>
                    </div>
            </div>
        </footer>
	
	

  <script src="{{ url('public/site/js/jquery.min.js') }}"></script>



 
 
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
 
<script src="{{ url('public/site/js/cs-navbar.js') }}"></script>
    <script src="{{ url('public/site/js/offcanvas.js') }}"></script>
 
<!--<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>-->
<!--<script src="{{ url('public/site/js/bootstrapvalidator.min.js') }}"></script>-->

<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		  
 <script type="text/javascript">
$(document).ready(function(){
    
	$(function() {	
        $( ".win_list" ).click(function() {
            $( ".win_tab" ).toggle();
			
			
            
        });
		
    });
	
	$(function() {	
	 $( "#select_team" ).click(function() {
            $( "#team_drapdown" ).show();
            $( "#select_team" ).hide();	
            
        });
	  });
	
});
</script>-->

<!-- BridgeSlide Start -->

	<!--<script src="{{ url('public/site/js/jquery.bridgeSlide.js') }}"></script>
	
	
		<script type="text/javascript">
		
		jQuery(document).ready(function() {
			$('#bridgeSlide').bridgeSlide({
				width: 700,
				visibleItems: 4,
				itemMargin: 6
			});
		});
		
		</script>
-->
		
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js'></script>

 <script src="{{ url('public/site/js/item_slide.js') }}"></script>

	<!--	<script src="{{ url('public/site/js/slide/slidejquery.min.js') }}"></script>

		 <script type="text/javascript" src="{{ url('public/site/js/slide/camera.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/site/s/slide/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/site/js/slide/jquery.jcarousel.js') }}"></script>
    <script type="text/javascript">
		$(document).ready(function(){	
			//Slider
			$('#camera_wrap_1').camera();
			
			//Featured works & latest posts
			$('#mycarousel, #mycarousel2, #newscarousel').jcarousel();													
		});		
	</script>
		-->
		
		<!-- <script type="text/javascript" src="{{ url('public/site/js/thumbnail-slider.js') }}"></script> -->
		

   <!-- <script src="{{ url('public/site/js/index.js') }}"></script>-->
    
	
	<script>
/* var $theElements = $('#tableContainer tbody tr');
$.each($theElements,function (){
 // $('#tableContainer tbody tr ').trigger('click');
  //console.log( $( this ).text() );
    //do some stuff 
 select_tick(e,type)

 }); */
/*  
 $('#tableContainer table tbody tr').each(function(e){
//   $(this).trigger('click');
//var type="batsman";
	//select_tick(e,type);
	 $(this).data("type", 'wicketkeeper');
	 $("#tableContainer table tbody tr").trigger("click").data("type") //2
    // Will check all the checkbox and trigger the event
}); */






</script>
	

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>


<script>
var batsman=0;
var bowler=0;
var allrounder=0;
var wicketkeeper=0;
var batsmans;
  
var credit=100;
function select_tick(e,type)
{
 var pid=$(e).find('#pid').val();
 var pname=$(e).find('#pname').val();
 var pteamname=$(e).find('#pteamname').val();
 var prole=$(e).find('#prole').val();  
 var matchid=$(e).find('#match_id').val();
 var teamno=$(e).find('#team_no').val();
 
 var credit_point=$(e).find('#credit_point').val();

 //console.log(credit_point);  
//console.log(credit); 
var pcount_error_msg=$('.palyer_icon .pactive').length;

 if((type=="batsman") && ($(e).hasClass("inactive")) && credit > 0 )
 {
	 //credit -= credit_point;
//	console.log(credit);
	
		
		
		if(allrounder<=3 && batsman<=2 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
		
			credit -= credit_point;
			//credit1 = credit-credit_point;
			//console.log(credit1);
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');

			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}

		}
		else if(allrounder<=3 && batsman<=3 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			//batsmans=batsman+1;
			//alert(batsmans);
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=2 && bowler<=5 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=3 && bowler<=5 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//batsman.blade.php
		
		 $('#batid'+pid).show();
		 $('#batid_bat'+pid).show();
		$('#batsmanid'+pid).removeClass("inactive").addClass("active");
		$('#batsman_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			batsman++;
			$("#batsman_count_total").text('('+batsman+')');
			count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point);
			}
			else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		
		
		else if(allrounder==2 && batsman==3 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			//setTimeout($('.error_test'),3000);
			setTimeout(function(){ $('.error_test').hide(); }, 1000);
		}
		
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==0 && batsman==4 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 Allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==5 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==4 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==3 && batsman==4 && bowler==1 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Maximum 3 Allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==3 && batsman==4 && bowler==1 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Maximum 3 Allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		
		else
		{
			 console.log('Maximum 5 batsman');
			$('.error_test').show();
			$('.error_test').text('Maximum 5 batsman'); 
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

			
			//batsman--;
			//credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
 
else if((type=="bowler") && ($(e).hasClass("inactive")) && credit > 0 )
 {
		
		if(allrounder<=3 && batsman<=3 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=3 && batsman<=4 && bowler<=2 && credit > 0)
		{
			
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=4 && bowler<=3 && credit > 0)
		{
			
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=5 && bowler<=3 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=1 && batsman<=4 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=3 && bowler<=4 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(allrounder<=2 && batsman<=5 && bowler<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//bowler.blade.php
		
		 $('#bowid'+pid).show();
		 $('#bowid_bow'+pid).show();
		$('#bowlerid'+pid).removeClass("inactive").addClass("active");
		$('#bowler_id'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			bowler++;
			$("#bowler_count").text('('+bowler+')');
			count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==2 && batsman==5 && bowler==3 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==0 && batsman==5 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 Allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(allrounder==2 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==0 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==1 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else
		{
			console.log('Select atleast one all rounder');
			$('.error_test').show();
			$('.error_test').text('Select maximum 5 bowler'); 
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }
 
else if((type=="allrounder") && ($(e).hasClass("inactive")) && credit > 0 )
 {
		
		if(batsman<=5 && bowler<=3 && allrounder<=1 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=3 && bowler<=5 && allrounder<=1 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=4 && bowler<=3 && allrounder<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=3 && bowler<=4 && allrounder<=2 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=5 && bowler<=4 && allrounder<=0 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		else if(batsman<=4 && bowler<=5 && allrounder<=0 && credit > 0)
		{
			credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			$(e).find('.tick').show();
			//allrounder.blade.php
		
		 $('#allid'+pid).show();
		 $('#allid_all'+pid).show();
		$('#allrounderid'+pid).removeClass("inactive").addClass("active");
		$('#all_rounderid'+pid).removeClass("inactive").addClass("active");
			credit -= credit_point;
			allrounder++;
			$("#allrounder_total").text('('+allrounder+')');
			count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper and Minimum 3 batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowler required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==5 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==0 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 allrounder required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==4 && bowler==5 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==1 && batsman==5 && bowler==4 && wicketkeeper==0)
		{
			$('.error_test').show();
			$('.error_test').text('Atleast 1 wicket keeper required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==4 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==2 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==2 && bowler==5 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==2 && batsman==5 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==3 && bowler==2 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==2 && bowler==3 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==4 && bowler==0 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Bowlers required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else if(allrounder==3 && batsman==0 && bowler==4 && wicketkeeper==1)
		{
			$('.error_test').show();
			$('.error_test').text('Minimum 3 Batsman required');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		else
		{
			 console.log('Maximum 3 all rounder');
				$('.error_test').show();
				$('.error_test').text('Maximum 3 all rounder'); 
				setTimeout(function(){ $('.error_test').hide(); }, 2000);

			//allrounder--;
		//	credit =parseInt(credit) +parseInt(credit_point);
		}
 }

 else if((type=="wicketkeeper") && ($(e).hasClass("inactive")) && credit > 0 )
 {
   
	 
		
		if(wicketkeeper==0 && credit > 0)
		{
			 credit_dummy=credit-credit_point;
			if(credit_dummy >= 0)
			{
			
			
			$(e).removeClass("inactive").addClass("active");
			
			
			$(e).find('.tick').show();
			
			//wk.blade.php
			
			$('#wkid'+pid).show();
			$('#wkid_wk'+pid).show();
			$('#wktickid'+pid).removeClass("inactive").addClass("active"); 
			$('#wktick_id'+pid).removeClass("inactive").addClass("active"); 
			
			credit -= credit_point;
			wicketkeeper++;
			$("#wicketkeeper_total").text('('+wicketkeeper+')');
			count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno,credit_point);
		}
		else {
				$('.error_test').show();
			$('.error_test').text('Credit Point Exceed');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
			}
		}
		
		
		else if(pcount_error_msg==11)
		{
		$('.error_test').show();
			$('.error_test').text('Maximum 11 players');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);

		}
		
		else
		{
		//	credit =parseInt(credit) +parseInt(credit_point);
			console.log('max 1 wk ');
			$('.error_test').show();
			$('.error_test').text('Maximum 1 WicketKeeper');
			setTimeout(function(){ $('.error_test').hide(); }, 2000);
		//	wicketkeeper--;
			
			
		}
 
 }
 
 
 else
 {
	 if((type=="batsman") && ($(e).hasClass("active")))
	 {
		$(e).removeClass("active").addClass("inactive");
		$(e).find('.tick').hide();	
        credit =parseFloat(credit) +parseFloat(credit_point);	
//batsman.blade.php
		
		 $('#batid'+pid).hide();
		 $('#batid_bat'+pid).hide();
		$('#batsmanid'+pid).removeClass("active").addClass("inactive");		
		$('#batsman_id'+pid).removeClass("active").addClass("inactive");

		
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		
		

$("#plid"+pid).remove();
$("#batapp").append("<div class='palyer_icon' id='rembat"+batsman+"'><div class='palyer_img' id='batsman"+batsman+"'><img  src='{{url('public/site/image/batsman.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='batsmanp"+batsman+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname"+batsman+"' value=''>	</div>		</div>");

		
		count_batsman_hide(pid,matchid,teamno);
	 }
	 else if((type=="bowler") && ($(e).hasClass("active")))
	 {
		 $(e).removeClass("active").addClass("inactive");
		 credit =parseFloat(credit) +parseFloat(credit_point);
		$(e).find('.tick').hide();
		//bowler.blade.php
		
		 $('#bowid'+pid).hide();
		 $('#bowid_bow'+pid).hide();
		$('#bowlerid'+pid).removeClass("active").addClass("inactive");
		$('#bowler_id'+pid).removeClass("active").addClass("inactive");
	


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});






	
$("#plid"+pid).remove();
$("#bowapp").append("<div class='palyer_icon' id='rembow"+bowler+"'><div class='palyer_img' id='bowler"+bowler+"'><img  src='{{url('public/site/image/bowler.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='bowlerp"+bowler+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname"+bowler+"' value=''></div></div>");


		count_bowler_hide(pid,matchid,teamno);
	 }
	else if((type=="allrounder") && ($(e).hasClass("active")))
	 {
		  $(e).removeClass("active").addClass("inactive");
		  credit =parseFloat(credit) +parseFloat(credit_point);
		$(e).find('.tick').hide();
		 //allrounder.blade.php
		
		 $('#allid'+pid).hide();
		 $('#allid_all'+pid).hide();
		$('#allrounderid'+pid).removeClass("active").addClass("inactive");
		$('#all_rounderid'+pid).removeClass("active").addClass("inactive");
		
		
		
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
		
		
		
		
$("#plid"+pid).remove();
$("#allapp").append("<div class='palyer_icon' id='remall"+allrounder+"' style='width:30%;'><div class='palyer_img' id='allrounder"+allrounder+"'><img  src='{{url('public/site/image/allrounder.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='allrounderp"+allrounder+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname"+allrounder+"' value=''></div></div>");

		
		count_allrounder_hide(pid,matchid,teamno);
	 }
	else if((type=="wicketkeeper") && ($(e).hasClass("active")))
	 {
		
		 $(e).removeClass("active").addClass("inactive");
		 
		 credit =parseFloat(credit) +parseFloat(credit_point);
		
		$(e).find('.tick').hide();
		
		//wk.blade.php
		
		 $('#wkid'+pid).hide();
		 $('#wkid_wk'+pid).hide();
		$('#wktickid'+pid).removeClass("active").addClass("inactive"); 
			$('#wktick_id'+pid).removeClass("active").addClass("inactive");
			
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
			
			
			
			$("#plid"+pid).remove();
$("#wkapp").append("<div class='palyer_icon' id='remwk"+wicketkeeper+"' style='width:54%;margin-left:20%;'><div class='palyer_img' id='wicketkeeper"+wicketkeeper+"'><img  src='{{url('public/site/image/wicketkeeper.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='wicketkeeperp"+wicketkeeper+"' value=''><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname"+wicketkeeper+"' value=''></div></div>");
		
		count_wicketkeeper_hide(pid,matchid,teamno);
	 
	  } 
	 
	 
	 
	
 }
/* 	 
 if(type=="batsman")
 {
 count_batsman();
 }
 else if(type=="bowler")
 {
 count_blower();
 }
 else if(type=="allrounder")
 {
 count_allrounder();
 }
else if(type=="wicketkeeper")
 {
 count_wicketkeeper();
 }
  */
  $('#left_credit_point').text(credit); 
}
//console.log(credit);
function count_batsman_hide(matchid,teamno,pid)
{
	
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

 /* $("#batsman"+batsman).empty();
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/in_bat.png')}}'>");
$("#batsmanp"+batsman).val('');
$("#batsmanpname"+batsman).val('');

$("#batsman"+batsman).addClass("pactive"); */
 

//$("#plid"+pid).remove();
//$("#batapp").append("<div class='palyer_icon' id='rembat"+batsman+"'><div class='palyer_img' id='batsman"+batsman+"'><img  src='{{url('public/site/image/batsman.png')}}'>	</div><div><input type='hidden' name='playersid[]' id='batsmanp"+batsman+"' value=''>			<input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname"+batsman+"' value=''>	</div>		</div>");



var pcount=$('.palyer_icon .pactive').length;
//alert(pcount);
$("#players_count").val(pcount);

$("#allplayer_count_total").text(pcount);


//captain select

$("#player_batting_c"+batsman).css('display','none');
$("#captain_id_batting_c"+batsman).val('');
$("#captain_name_batting_c"+batsman).val('');
$("#captain_name_batting_credit_c"+batsman).val('');
$("#view_player_name_batting_c"+batsman).text('');
$("#view_player_name_batting_credit_c"+batsman).text('');
$("#view_player_team_name_batting_c"+batsman).text('');

// end

// vice captain  select

$("#player_batting_vc"+batsman).css('display','none');
$("#captain_id_batting_vc"+batsman).val('');
$("#captain_name_batting_vc"+batsman).val('');
$("#captain_name_batting_credit_vc"+batsman).val('');
$("#view_player_name_batting_vc"+batsman).text('');
$("#view_player_name_batting_credit_vc"+batsman).text('');
$("#view_player_team_name_batting_vc"+batsman).text('');

// end

//Replace Player
 
$("#player_batting_selected"+batsman).css('display','none');
$("#selected_id_batting"+batsman).val('');
$("#selected_name_batting"+batsman).val('');
$("#selected_name_batting_credit"+batsman).val('');
$("#view_player_name_batting_selected"+batsman).text('');
$("#view_player_name_batting_selected_credit"+batsman).text('');
$("#view_player_team_name_batting_selected"+batsman).text('');

//end

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}
//credit =parseInt(credit) + parseInt(credit_point);
 batsman--;
 
 $("#batsman_count_total").text('('+batsman+')');
 
 //console.log(credit);
}
function count_batsman(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});

		
		
/* $("#batsman"+batsman).empty();
$("#batsman"+batsman).append("<img  src='{{url('public/site/image/in_bat.png')}}'>");
$("#batsmanp"+batsman).val(pid);
$("#batsmanpname"+batsman).val(pname);
//$("#batsman"+batsman).addClass("pactive");
$("#batsman"+batsman).addClass("pactive"); */

$("#rembat"+batsman).remove();
$("#batapp").prepend("<div class='palyer_icon' id='plid"+pid+"'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_bat.png')}}'></div><div><input type='hidden' name='playersid[]' id='batsmanp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='batsmanpname' value='"+pname+"'></div></div>");


var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);
//$("#batsman_count_total").text('('+pcount+')');
 
//captain select
// console.log(credit);
$("#player_batting_c"+batsman).css('display','block');
$("#captain_id_batting_c"+batsman).val(pid);
$("#captain_name_batting_c"+batsman).val(pname);
$("#captain_name_batting_credit_c"+batsman).val(credit_point);
$("#view_player_name_batting_c"+batsman).text(pname);
$("#view_player_name_batting_credit_c"+batsman).text(credit_point);
$("#view_player_team_name_batting_c"+batsman).text(pteamname);

//end
 //vice captain select
 
$("#player_batting_vc"+batsman).css('display','block');
$("#captain_id_batting_vc"+batsman).val(pid);
$("#captain_name_batting_vc"+batsman).val(pname);
$("#captain_name_batting_credit_vc"+batsman).val(credit_point);
$("#view_player_name_batting_vc"+batsman).text(pname);
$("#view_player_name_batting_credit_vc"+batsman).text(credit_point);
$("#view_player_team_name_batting_vc"+batsman).text(pteamname);

//end
 
 //Replace Player
 
$("#player_batting_selected"+batsman).css('display','block');
$("#selected_id_batting"+batsman).val(pid);
$("#selected_name_batting"+batsman).val(pname);
$("#selected_name_batting_credit"+batsman).val(credit_point);
$("#view_player_name_batting_selected"+batsman).text(pname);
$("#view_player_name_batting_selected_credit"+batsman).text(credit_point);
$("#view_player_team_name_batting_selected"+batsman).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
	alert("Please select the captain and vice captain");
	//$("#testtrigger").onclick();
	
	//$('.error_test').text('You have selected 11 Players');
	
}

//credit -= credit_point;
}
function count_bowler_hide(matchid,teamno,pid)
{
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/bowler.png')}}'>");
$("#bowlerp"+bowler).val('');
$("#bowlerpname"+bowler).val('');
$("#bowler"+bowler).removeClass("pactive"); */
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);


if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}


//captain select
 
$("#player_bowler_c"+bowler).css('display','none');
$("#captain_id_bowler_c"+bowler).val('');
$("#captain_name_bowler_c"+bowler).val('');
$("#captain_name_bowler_credit_c"+bowler).val('');
$("#view_player_name_bowler_c"+bowler).text('');
$("#view_player_name_bowler_credit_c"+bowler).text('');
$("#view_player_team_name_bowler_c"+bowler).text('');

//end
//vice captain select
 
$("#player_bowler_vc"+bowler).css('display','none');
$("#captain_id_bowler_vc"+bowler).val('');
$("#captain_name_bowler_vc"+bowler).val('');
$("#captain_name_bowler_credit_vc"+bowler).val('');
$("#view_player_name_bowler_vc"+bowler).text('');
$("#view_player_name_bowler_credit_vc"+bowler).text('');
$("#view_player_team_name_bowler_vc"+bowler).text('');

//end

//Replace Player
 
$("#player_bowler_selected"+bowler).css('display','none');
$("#selected_id_bowler"+bowler).val('');
$("#selected_name_bowler_credit"+bowler).val('');
$("#selected_name_bowler"+bowler).val('');
$("#view_player_name_bowler_selected_credit"+bowler).text('');
$("#view_player_name_bowler_selected"+bowler).text('');
$("#view_player_team_name_bowler_selected"+bowler).text('');

//end



//credit =parseInt(credit) + parseInt(credit_point);
 bowler--;
$("#bowler_count").text('('+bowler+')');
}
function count_bowler(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
/* $("#bowler"+bowler).empty();
$("#bowler"+bowler).append("<img  src='{{url('public/site/image/in_bow.png')}}'>");
$("#bowlerp"+bowler).val(pid);
$("#bowlerpname"+bowler).val(pname);
$("#bowler"+bowler).addClass("pactive"); */

$("#rembow"+bowler).remove();
$("#bowapp").prepend("<div class='palyer_icon' id='plid"+pid+"'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_bow.png')}}'></div><div><input type='hidden' name='playersid[]' id='bowlerp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='bowlerpname' value='"+pname+"'></div></div>");


var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);
//$("#bowler_count").text('('+pcount+')');


//captain select
 
$("#player_bowler_c"+bowler).css('display','block');
$("#captain_id_bowler_c"+bowler).val(pid);
$("#captain_name_bowler_c"+bowler).val(pname);
$("#captain_name_bowler_credit_c"+bowler).val(credit_point);
$("#view_player_name_bowler_credit_c"+bowler).text(credit_point);
$("#view_player_name_bowler_c"+bowler).text(pname);
$("#view_player_team_name_bowler_c"+bowler).text(pteamname);

//end

//vice captain select
 
$("#player_bowler_vc"+bowler).css('display','block');
$("#captain_id_bowler_vc"+bowler).val(pid);
$("#captain_name_bowler_credit_vc"+bowler).val(credit_point);
$("#captain_name_bowler_vc"+bowler).val(pname);
$("#view_player_name_bowler_credit_vc"+bowler).text(credit_point);
$("#view_player_name_bowler_vc"+bowler).text(pname);
$("#view_player_team_name_bowler_vc"+bowler).text(pteamname);

//end
//Replace Player
 
$("#player_bowler_selected"+bowler).css('display','block');
$("#selected_id_bowler"+bowler).val(pid);
$("#selected_name_bowler"+bowler).val(pname);
$("#selected_name_bowler_credit"+bowler).val(credit_point);
$("#view_player_name_bowler_selected"+bowler).text(pname);
$("#view_player_name_bowler_selected_credit"+bowler).text(credit_point);
$("#view_player_team_name_bowler_selected"+bowler).text(pteamname);

//end

if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
		alert("Please select the captain and vice captain");
		//$("#testtrigger").onclick();
		
		//$('.error_test').text('You have selected 11 Players');

}
//credit -= credit_point;
}
function count_allrounder_hide(matchid,teamno,pid)
{
/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/all_rounder.png')}}'>");
$("#allrounderp"+allrounder).val('');
$("#allrounderpname"+allrounder).val('');
$("#allrounder"+allrounder).removeClass("pactive"); */

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//captain select
 
$("#player_allrounder_c"+allrounder).css('display','none');
$("#captain_id_allrounder_c"+allrounder).val('');
$("#captain_name_allrounder_c"+allrounder).val('');
$("#captain_name_allrounder_credit_c"+allrounder).val('');
$("#view_player_name_allrounder_c"+allrounder).text('');
$("#view_player_name_allrounder_credit_c"+allrounder).text('');
$("#view_player_team_name_allrounder_c"+allrounder).text('');

//end
//vice captain select
 
$("#player_allrounder_vc"+allrounder).css('display','none');
$("#captain_id_allrounder_vc"+allrounder).val('');
$("#captain_name_allrounder_vc"+allrounder).val('');
$("#captain_name_allrounder_credit_vc"+allrounder).val('');
$("#view_player_name_allrounder_vc"+allrounder).text('');
$("#view_player_name_allrounder_credit_vc"+allrounder).text('');
$("#view_player_team_name_allrounder_vc"+allrounder).text('');

//end
//Replace Player
 
$("#player_allrounder_selected"+allrounder).css('display','none');
$("#selected_id_allrounder"+allrounder).val('');
$("#selected_name_allrounder"+allrounder).val('');
$("#selected_name_allrounder_credit"+allrounder).val('');
$("#view_player_name_allrounder_selected"+allrounder).text('');
$("#view_player_name_allrounder_selected_credit"+allrounder).text('');
$("#view_player_team_name_allrounder_selected"+allrounder).text('');

//end

if(pcount!=11)
{
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
}
//credit =parseInt(credit) + parseInt(credit_point);
 allrounder--;
 $("#allrounder_total").text('('+allrounder+')');
 
}
function count_allrounder(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
/* $("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append("<img  src='{{url('public/site/image/in_all.png')}}'>");
$("#allrounderp"+allrounder).val(pid);
$("#allrounderpname"+allrounder).val(pname);
$("#allrounder"+allrounder).addClass("pactive"); */

$("#remall"+allrounder).remove();
$("#allapp").prepend("<div class='palyer_icon' id='plid"+pid+"'style='width:30%;'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_all.png')}}'></div><div><input type='hidden' name='playersid[]' id='allrounderp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='allrounderpname' value='"+pname+"'></div></div>");

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);
//$("#allrounder_total").text('('+pcount+')');


//captain select
 
$("#player_allrounder_c"+allrounder).css('display','block');
$("#captain_id_allrounder_c"+allrounder).val(pid);
$("#captain_name_allrounder_c"+allrounder).val(pname);
$("#captain_name_allrounder_credit_c"+allrounder).val(credit_point);
$("#view_player_name_allrounder_c"+allrounder).text(pname);
$("#view_player_name_allrounder_credit_c"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_c"+allrounder).text(pteamname);

//end
//vice captain select
 
$("#player_allrounder_vc"+allrounder).css('display','block');
$("#captain_id_allrounder_vc"+allrounder).val(pid);
$("#captain_name_allrounder_vc"+allrounder).val(pname);
$("#captain_name_allrounder_credit_vc"+allrounder).val(credit_point);
$("#view_player_name_allrounder_vc"+allrounder).text(pname);
$("#view_player_name_allrounder_credit_vc"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_vc"+allrounder).text(pteamname);

//end
//Replace Player
 
$("#player_allrounder_selected"+allrounder).css('display','block');
$("#selected_id_allrounder"+allrounder).val(pid);
$("#selected_name_allrounder"+allrounder).val(pname);
$("#selected_name_allrounder_credit"+allrounder).val(credit_point);
$("#view_player_name_allrounder_selected"+allrounder).text(pname);
$("#view_player_name_allrounder_selected_credit"+allrounder).text(credit_point);
$("#view_player_team_name_allrounder_selected"+allrounder).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
		alert("Please select the captain and vice captain");
		//$("#testtrigger").onclick();
		
		//$('.error_test').text('You have selected 11 Players');

}
//credit -= credit_point;
}
function count_wicketkeeper_hide(matchid,teamno,pid)
{
	/* var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('delete-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		}); */

/* $("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val('');
$("#wicketkeeperpname"+wicketkeeper).val('');
$("#wicketkeeper"+wicketkeeper).removeClass("pactive"); */
var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);


//captain select
 
$("#player_wicketkeeper_c"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_c"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_credit_c"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_credit_c"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text('');

//end
//vice captain select
 
$("#player_wicketkeeper_vc"+wicketkeeper).css('display','none');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val('');
$("#captain_name_wicketkeeper_credit_vc"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_credit_vc"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text('');

//end
//Replace Player
$("#player_wicketkeeper_selected"+wicketkeeper).css('display','none');
$("#selected_id_wicketkeeper"+wicketkeeper).val('');
$("#selected_name_wicketkeeper"+wicketkeeper).val('');
$("#selected_name_wicketkeeper_credit"+wicketkeeper).val('');
$("#view_player_name_wicketkeeper_selected"+wicketkeeper).text('');
$("#view_player_name_wicketkeeper_selected_credit"+wicketkeeper).text('');
$("#view_player_team_name_wicketkeeper_selected"+wicketkeeper).text('');

//end

if(pcount!=11)
{
	
	/* $("#change_buttton").removeClass("button_save");
	$("#change_buttton").addClass("button_disabled");
	$('#change_buttton').prop('disabled', true); */
	$('#captain').prop('disabled', true);
	$('#vicecaptain').prop('disabled', true);
	$('#substitute').prop('disabled', true);
		

}
//credit =parseInt(credit) + parseInt(credit_point);
 wicketkeeper--;
 $("#wicketkeeper_total").text('('+wicketkeeper+')');

}
function count_wicketkeeper(pid,pname,pteamname,prole,matchid,teamno,credit_point)
{
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
			url:"{{url('insert-selected-player')}}",
			type: 'POST',
		   // dataType: 'JSON',
			data: {matchid: matchid,pid: pid,teamno: teamno,_token:CSRF_TOKEN}, //get model dan ukuran
			success: function (content) {
				 
			  
			}
		});
/* $("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append("<img  src='{{url('public/site/image/in_wk.png')}}'>");
$("#wicketkeeperp"+wicketkeeper).val(pid);
$("#wicketkeeperpname"+wicketkeeper).val(pname);
$("#wicketkeeper"+wicketkeeper).addClass("pactive"); */

$("#remwk"+wicketkeeper).remove();
$("#wkapp").prepend("<div class='palyer_icon' id='plid"+pid+"' style='width:54%;margin-left:20%;'><div class='palyer_img pactive'><img  src='{{url('public/site/image/in_wk.png')}}'></div><div><input type='hidden' name='playersid[]' id='wicketkeeperp' value='"+pid+"'><input type='text' style='width:100%; border: none;text-align: center;font-size: 9px;'  readonly id='wicketkeeperpname' value='"+pname+"'></div></div>");

var pcount=$('.palyer_icon .pactive').length;
$("#players_count").val(pcount);
$("#allplayer_count_total").text(pcount);

//$("#wicketkeeper_total").text('('+pcount+')');

//captain select
 
$("#player_wicketkeeper_c"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_c"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_c"+wicketkeeper).val(pname);
$("#captain_name_wicketkeeper_credit_c"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_c"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_credit_c"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_c"+wicketkeeper).text(pteamname);

//end
//vice captain select
 
$("#player_wicketkeeper_vc"+wicketkeeper).css('display','block');
$("#captain_id_wicketkeeper_vc"+wicketkeeper).val(pid);
$("#captain_name_wicketkeeper_vc"+wicketkeeper).val(pname);
$("#captain_name_wicketkeeper_credit_vc"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_vc"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_credit_vc"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_vc"+wicketkeeper).text(pteamname);

//end
//Replace Player
 
$("#player_wicketkeeper_selected"+wicketkeeper).css('display','block');
$("#selected_id_wicketkeeper"+wicketkeeper).val(pid);
$("#selected_name_wicketkeeper"+wicketkeeper).val(pname);
$("#selected_name_wicketkeeper_credit"+wicketkeeper).val(credit_point);
$("#view_player_name_wicketkeeper_selected"+wicketkeeper).text(pname);
$("#view_player_name_wicketkeeper_selected_credit"+wicketkeeper).text(credit_point);
$("#view_player_team_name_wicketkeeper_selected"+wicketkeeper).text(pteamname);

//end
if(pcount==11)
{
	/* $("#change_buttton").removeClass("button_disabled");
	$("#change_buttton").addClass("button_save");
	$('#change_buttton').prop('disabled', false); */
	$('#captain').prop('disabled', false);
	$('#vicecaptain').prop('disabled', false);
	$('#substitute').prop('disabled', false);
	$('#playercount').val(pcount);
		alert("Please select the captain and vice captain");
		 //$("#testtrigger").onclick();
		 
		 //$('.error_test').text('You have selected 11 Players');

}
//credit -= credit_point;


}

 
</script>





</body>
</html>