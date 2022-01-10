@include('website.login.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />
	
<div class="section-pad wid-bg">

 
	<div class="container" >
				
		<div class="row">
			<div class="col-lg-12">
				<?php $site=App\SiteSetting::findorfail(1) ?>				
				<h1 class="page-head text-center">About {{$site->site_name}}</h1>
				
			</div>
		</div>	
		 
		
		<div class="row" >
		
			<div class="col-sm-12">
			<div class="about-box-content">
				
				<?php $sup=App\Support::wherename('about_us')->first(); ?>
				{!!$sup->page_info!!} 


			</div>
			</div>
		
		</div>		
		
		
	</div>
     
</div>

 <div class="" style="margin-bottom: 80px;padding-bottom: 80px">
            <div class="container">
                           <div class="row text-center">
                    <div class="col-sm-4">
                        <div class="intro-box">
                            <img src="{{url('public/site/image/intro/intro1.svg')}}"  class="center-block intro-img" alt="" style="height:100px">
                            <div class="fixed-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="402px" height="320px" viewBox="0 0 102 80"><filter filterUnits="objectBoundingBox" x="-27.40" y="-37.04" width="154.79" height="174.07" id="filter0"><feGaussianBlur in="SourceAlpha" stdDeviation="10.00" result="dsBlurOut1"/><feFlood flood-color="rgb(0,1,1)" flood-opacity="0.05" result="dsFloodOut1"/><feComposite in="dsFloodOut1" in2="dsBlurOut1" operator="in" result="dsShadow1"/><feOffset in="dsShadow1" dx="2.00" dy="3.46" result="dsOffset1"/><feComposite in="dsOffset1" in2="SourceAlpha" operator="out" result="dropShadow1"/><feBlend in="dropShadow1" in2="SourceGraphic" mode="normal" result="sourceGraphic"/></filter><path fillRule="evenodd" d="M 21 9C 21 9 82 16 82 16 85.31 16 88 18.69 88 22 88 22 88 50 88 50 88 53.31 85.31 56 82 56 82 56 21 63 21 63 17.69 63 15 60.31 15 57 15 57 15 15 15 15 15 11.69 17.69 9 21 9Z" fill="rgb(71,133,255)" opacity="0.20" filter="url(#filter0)"/></svg>
                            </div>
                            <h2>Total Users <br> <i class="fa fa-users fr"> &nbsp; 521K</i></h2>
                        </div>
                    </div>
                
                    <div class="col-sm-4">
                        <div class="intro-box">
                            <img src="{{url('public/site/image/intro/intro2.svg')}}"  class="center-block intro-img" alt="" style="height:100px">
                            <div class="fixed-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="402px" height="320px" viewBox="0 0 102 80"><filter filterUnits="objectBoundingBox" x="-27.40" y="-37.04" width="154.79" height="174.07" id="filter0"><feGaussianBlur in="SourceAlpha" stdDeviation="10.00" result="dsBlurOut1"/><feFlood flood-color="rgb(0,1,1)" flood-opacity="0.05" result="dsFloodOut1"/><feComposite in="dsFloodOut1" in2="dsBlurOut1" operator="in" result="dsShadow1"/><feOffset in="dsShadow1" dx="2.00" dy="3.46" result="dsOffset1"/><feComposite in="dsOffset1" in2="SourceAlpha" operator="out" result="dropShadow1"/><feBlend in="dropShadow1" in2="SourceGraphic" mode="normal" result="sourceGraphic"/></filter><path fillRule="evenodd" d="M 21 9C 21 9 82 16 82 16 85.31 16 88 18.69 88 22 88 22 88 50 88 50 88 53.31 85.31 56 82 56 82 56 21 63 21 63 17.69 63 15 60.31 15 57 15 57 15 15 15 15 15 11.69 17.69 9 21 9Z" fill="rgb(71,133,255)" opacity="0.20" filter="url(#filter0)"/></svg>
                            </div>
                            <h2>Total Contests<br> <i class="fa fa-trophy fr"> &nbsp; 3000</i></h2>
                        </div>
                    </div>
                 
                    <div class="col-sm-4">
                        <div class="intro-box">
                            <img src="{{url('public/site/image/intro/intro3.svg')}}"  class="center-block intro-img" alt="" style="height:100px">
                            <div class="fixed-svg">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="402px" height="320px"  viewBox="0 0 102 80"><filter filterUnits="objectBoundingBox" x="-27.40" y="-37.04" width="154.79" height="174.07" id="filter0"><feGaussianBlur in="SourceAlpha" stdDeviation="10.00" result="dsBlurOut1"/><feFlood flood-color="rgb(0,1,1)" flood-opacity="0.05" result="dsFloodOut1"/><feComposite in="dsFloodOut1" in2="dsBlurOut1" operator="in" result="dsShadow1"/><feOffset in="dsShadow1" dx="2.00" dy="3.46" result="dsOffset1"/><feComposite in="dsOffset1" in2="SourceAlpha" operator="out" result="dropShadow1"/><feBlend in="dropShadow1" in2="SourceGraphic" mode="normal" result="sourceGraphic"/></filter><path fillRule="evenodd" d="M 21 9C 21 9 82 16 82 16 85.31 16 88 18.69 88 22 88 22 88 50 88 50 88 53.31 85.31 56 82 56 82 56 21 63 21 63 17.69 63 15 60.31 15 57 15 57 15 15 15 15 15 11.69 17.69 9 21 9Z" fill="rgb(71,133,255)" opacity="0.20" filter="url(#filter0)"/></svg>
                            </div>
                            <h2>Prize Money <br><i class="fa fa-inr fr"> &nbsp; 124848K</i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--//page_container-->



	
		@include('website.login.footer');

