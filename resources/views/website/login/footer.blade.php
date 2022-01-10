<!--footer-->   
 
<?php $site=App\SiteSetting::findorfail(1) ?>
	<footer class="cs-footer" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="cs-footer-logo"><img src="{{ url('public/adminlte/site_image',$site->site_logo) }}" height="40"></div>
                        <ul class="cs-footer-links">
                            <li><a href="{{URL::to('about-us')}}">About Us</a></li>
                            <li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
                            <li><a href="{{URL::to('howtoplay')}}">How to Play {{$site->site_name}}</a>	</li>
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
                            <li><a href="{{URL::to('l_document')}}">Document</a></li>
                        </ul>
                    </div>
					
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
<script src="{{ url('public/site/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/site/js/venobox.min.js') }}"></script>
<script src="{{ url('public/site/js/cs-navbar.js') }}"></script>
    <script src="{{ url('public/site/js/offcanvas.js') }}"></script>
    <script src="{{ url('public/site/js/owl.carousel.js') }}"></script>
	<script src="{{ url('public/site/js/owl.carousel.js') }}"></script>
<script src="{{ url('public/site/js/bootstrapvalidator.min.js') }}"></script>


		  
          <script type="text/javascript">
              $('.venobox').venobox();
              //Testimonial crousel
       
            $(".ad_testimonial_crousel").owlCarousel({
                loop:true,
                autoplay: true,
                items: 5,
                touchDrag: true,
                responsiveClass: true,
                dots: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                },
                autoplayTimeout: 2000,
                autoplaySpeed: 1500,
                slideSpeed: 2000,
                smartSpeed:1500,
                 
            });
            
            $('.home-slider').owlCarousel({
                
                loop:true,
                autoplay: true,
               items: 1, 
                dots: true,
                nav: false,
            })
        
          </script>
 <script type="text/javascript">
$(document).ready(function(){
    

	$(function() {	
        $( "#winner" ).click(function() {
            $( "#win_tab" ).toggle();
			
			
            
        });
		
    });
	
	$(function() {	
	 $( "#select_team" ).click(function() {
            $( "#team_drapdown" ).show();
            $( "#select_team" ).hide();	
            
        });
	  });
	
});
</script>

	<script src="{{ url('public/site/js/jquery.bridgeSlide.js') }}"></script>
	
	
	<!-- BridgeSlide Start -->
		<script type="text/javascript">
		jQuery(document).ready(function() {
			$('#bridgeSlide').bridgeSlide({
				width: 700,
				visibleItems: 4,
				itemMargin: 6
			});
		});
		</script>

    <script src="{{ url('public/site/js/index.js') }}"></script> 
    
	
	
	

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
function select_tick(e,type)
{


$(e).find('.tick').show();
 
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
 
}

function count_batsman()
{
batsman++;

$("#batsman"+batsman).empty();
$("#batsman"+batsman).append('<img src="{{ url('public/site/image/in_bat.png') }}">');
}

function count_blower()
{
bowler++;
$("#bowler"+bowler).empty();
$("#bowler"+bowler).append('<img src="{{ url('public/site/image/in_bow.png') }}">');
}

function count_allrounder()
{
allrounder++;
$("#allrounder"+allrounder).empty();
$("#allrounder"+allrounder).append('<img src="{{ url('public/site/image/in_all.png') }}">');
}

function count_wicketkeeper()
{
wicketkeeper++;
$("#wicketkeeper"+wicketkeeper).empty();
$("#wicketkeeper"+wicketkeeper).append('<img src="{{ url('public/site/image/in_wk.png') }}">');
}


</script>



	<script>
	// script to prevent back button in browser
	
   /*  window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('newjibberish', null, null);
            };
        } else {
            var ignoreHashChange = true;
            window.onhashchange = function () {
                if (!ignoreHashChange) {
                    ignoreHashChange = true;
                    window.location.hash = Math.random();
                } else {
                    ignoreHashChange = false;   
                }
            };
        }
    } */
 </script>
	



<script type="text/javascript">
function parseJSAtOnload() {
var links = ["https://www.youtube.com/yts/jsbin/player-vflIfz8pB/en_US/base.js", "https://www.gstatic.com/recaptcha/api2/r20171212152908/recaptcha__en_gb.js", "https://www.gstatic.com/recaptcha/api2/r20171212152908/recaptcha__en_gb.js", "https://code.jquery.com/jquery-2.1.1.min.js", "https://www.youtube.com/yts/jsbin/www-embed-player-vflAnlwU2/www-embed-player.js", "https://www.youtube.com/embed/z34mKEYJ9aI", "http://www.leaguerocks.com/public/site/js/api.js"],
headElement = document.getElementsByTagName("head")[0],
linkElement, i;
for (i = 0; i < links.length; i++) {
linkElement = document.createElement("script");
linkElement.src = links[i];
headElement.appendChild(linkElement);
}
}
if (window.addEventListener)
window.addEventListener("load", parseJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", parseJSAtOnload);
else window.onload = parseJSAtOnload;
</script>



</body>
</html>