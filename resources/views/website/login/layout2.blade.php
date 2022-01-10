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