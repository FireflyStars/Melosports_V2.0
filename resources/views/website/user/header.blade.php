<!doctype html>
<html lang="en">
@php($application=App\SiteSetting::findorfail(1))
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$application->meta_description}}">
    <meta name="author" content="Dreamsports">
  <title>
{{$application->site_name}}</title>
  
  
  
  
 


  
  <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap.min.css') }}">
<!-- <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap-theme.min.css') }}"> -->
<link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrapValidator.min.css') }}">

       <link rel="stylesheet" href="{{ URL::to('public/site/css/style.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/cs-navbar.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/custom-style.css') }}">
	  
	  <!--  <link rel="stylesheet" href="css/team_slide.css">  -->
      <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.min.css') }}">
	  
	    <link href="{{ URL::to('public/site/css/tab_table.css') }}" rel="stylesheet">	
		<!-- support page css -->
	    <link href="{{ URL::to('public/site/css/tab.css') }}" rel="stylesheet">					
		<!-- SLIDE -->				
		<!--<link href="{{ URL::to('public/site/css/slide_item.css') }}" rel="stylesheet">-->
		
		<link href="{{ URL::to('public/site/css/item_slide.css') }}" rel="stylesheet">
		
	<!--	<link href="{{ URL::to('public/site/css/thumbnail-slider.css') }}" rel="stylesheet">-->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js'></script>

 <script src="{{ url('public/site/js/item_slide.js') }}"></script>

 <link rel="shortcut icon" href="{{url('public/favicon.ico')}}" type="image/x-icon" />
<!-- For dropdown series match loading time --> 


 <script>
  $('.ajax-match').hide(); 
 $('.ajax-match').css('display','none');
 setTimeout(function(){ 
 $(".ajax-match").load(".ajax-match");  
 $('.ajax-match').css('display','block'); }, 5000);
 </script>
 
 
  
</head>@php($currency_set=App\CurrencySetting::findorfail(1))	
				
@php($currency=App\Currency::whereid($currency_set->currency_id)->first())



<body class="layout-three">
<style>

#loader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 999999;
    height: 3666px;
 }

#status  {
     width: 700px;
     height: 700px;
     position: fixed;
     left: 30%;
     top: 10%;
     background-image: url("{{url('public/site/image/loadimage.gif')}}");
	 background-size: 128px 128px;
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
 }
 @media  only screen and (min-width: 320px) and (max-width: 479px){
 #loader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 999999;
    height: 3666px;
 }

#status  {
     width: 800px;
     height: 800px;
     position: fixed;
     left:0%;
     top: 10%;
      background-image: url("{{url('public/site/image/loadimage.gif')}}");
	 background-size: 128px 128px;
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -150px;
 }
 }

</style>
  

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">

jQuery(window).load(function() { 
	jQuery("#status").fadeOut("fast"); 
	jQuery("#loader").delay(999).fadeOut(); 
})

</script>




<div id="loader">
<div id="status"></div>
</div>

    <header class="cd-auto-hide-header">
<form class="form-horizontal" action=" {{URL::to('userLogin')}}" method="post"  id="contact_form">
        <div class="container subnav-primary-pad">
  <a class="navbar-brand-subnav" href="{{url('/')}}"><img src="{{url('public/adminlte/site_image',$application->site_logo)}}" height="50"  ></a>
        	
        <nav class="cd-primary-nav  " style="padding-top: 20px;">
        <a href="#cd-navigation" class="nav-trigger">
            <span>
                <em aria-hidden="true"></em>
                Menu
            </span>
        </a> <!-- .nav-trigger -->

        <ul id="cd-navigation">
             @if($currency->symbol_format==0)		  
				 <li class="nav-left-tr"><a  class="btn btn-link">Balance:{{$currency->symbol}} {{round(Auth::user()->user_wallet_current_amount,2)}} {{$currency->code}}</a></li>          
			 @else		   
				 <li class="nav-left-tr"><a  class="btn btn-link">Balance: {{$currency->code}}  {{round(Auth::user()->user_wallet_current_amount,2)}} {{$currency->symbol}}</a></li>          
			 @endif
            <li class="nav-left-tr"><a href="" data-toggle="modal" data-target="#myModal_addwallet" class="btn btn-link"><img class="wallet-icn" src="{{url('public/site/image/wallet.svg')}}">Add Money</a></li>
           <li class="nav-left-tr"> <input type="hidden" name="_token" value="{{ csrf_token() }}"></li>
         
           	<li  class="nav-left-tr dropdown prodfile-dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="nav-user-icon" src="{{url('public/site/image/profile.png')}}"><span class=""><?php echo Auth::user()->name; ?></span> </a>
				<ul class="dropdown-menu">
				   
				   <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModaledit">Edit Profile</a> 
				   <a class="dropdown-item" href="{{url('refer_hist')}}" >Referal Friend</a> 
				  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal3"> Change Password</a> 
				  {!! Form::open (['url' => '/userlogout']) !!}
				  {{ csrf_field() }}
				 <a class="dropdown-item" style="display: none"><button class="logout_user" type="submit"> Logout</button></a>
					  {!! Form::close() !!}

             {!! Form::open (['url' => '/userlogout']) !!}
                      {{ csrf_field() }}
                       <button class="logout_user logout-link" type="submit"><img src="{{url('public/site/image/logout.png')}}">&nbsp;&nbsp;Logout</button> 
                        {!! Form::close() !!}
				</ul>
			  </li>

            </ul>
                 

    </nav> <!-- .cd-primary-nav -->

    </div></form>
    <nav class="cd-secondary-nav">

      
         <ul>
             <li class="second-logo">
        		<a  class="nav-link active" href="{{url('/')}}"><img src="{{url('public/adminlte/site_image',$application->site_logo)}}"  height="30"  ></a>
        	</li>
				<li class="nav-item "><a  class="nav-link" href="{{URL::to('withdraw-user')}}"> <i class="fa fa-money fr"></i>Withdraw Amount</a></li>
				<li class="nav-item text-lit"><a>|</a></li>
                <li class="nav-item "><a class="nav-link" target="_blank" href="{{URL::to('bank-verify')}}"> <i class="fa fa-check-circle fr"></i>Verify Now</a></li>
                <li class="nav-item text-lit"><a>|</a></li>
                <li class="nav-item "><a class="nav-link" href="#" data-toggle="modal" data-target="#myModalcrdit"><i class="fa fa-database fr"></i>Play Points {{ Auth::user()->credit_point }} Credits </a></li>
<li class="nav-item">
                <a class="nav-link" href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show Contest</a>
            </li>

			
            
			 
            </ul>
    </nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->

 
	  	<!--header-->
    
 
	
	
	

	