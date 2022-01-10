
@include('website.login.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--//page_container-->

        <div class="bg-2">
        <div class="section-pad mt-80">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-5 col-sm-12">
                        <div class=" text-center"> <img src="{{url('public/site/image/video-icon.png')}}" alt="">
                            <h1 class="mb-3">Testimonials on MeloSports</h1>
                            <p class="text-gray">MeloSports is actually a fun game and i enjoy playing it a lot. I found the site when my friend told me about MeloSports fantasy and it was...
Harry</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-12"></div>
				   <div class="col-lg-5 col-sm-12">
                        <div class="about-popup max-width">
                            <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/embed/Yk8bvI0dZa4"> <img src="{{url('public/site/image/video-intro.jpg')}}" alt="" class="img-responsive"> <img src="{{url('public/site/image/play-btn.png')}}" alt="" class="play-btn"> </a>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class="bg-1">
        <div class="section-pad mt-80">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-sm-12" style="padding-right: 30px">
                        <div class="about-popup pad20 clearfix">

                            <div class="ad_testimonial_crousel">

                                <?php $test=App\Testmonials::whereis_status(0)->get();?>

                                @if(count($test) > 0)

                                @foreach($test as $tests)

                            <div class="item"> <span class="test_icon">
                               <img src="{{url('public/site/image/pro_test.jpg')}}">
                            </span>
                               

                                <p> {{$tests->description}}</p>
                                <h4>- {{$tests->name}} -</h4> 

                            </div>

                            @endforeach

                            @else
                            
                            <p>There is no testimonial to show </p>

                            @endif
                           
                             
                        </div>
                    </div>
                    </div>
                  
                    
                    <div class="col-lg-5 col-sm-12">
                        <div class="about-details text-center"> <img src="{{url('public/site/image/quote-icon.png')}}" alt="" style="margin-top: 50px">
                            <h1 class="mb-3">From fans to cricket players, they all love MeloSports. </h1>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
	
 
	
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	
	
	
	
	
	
	
@include('website.login.footer');
