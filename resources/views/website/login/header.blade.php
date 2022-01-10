<!doctype html>
<html lang="en">
@php($application=App\SiteSetting::findorfail(1))
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$application->meta_description}}">
    <meta name="author" content="{{$application->site_name}}">
  <title>
{{$application->site_name}}</title>

  <link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap.min.css') }}">
<link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrap-theme.min.css') }}">
<link rel='stylesheet prefetch' href="{{ URL::to('public/site/css/bootstrapValidator.min.css') }}">

      <link rel="stylesheet" href="{{ URL::to('public/site/css/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/animate.min.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/venobox.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/style.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/cs-navbar.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/custom-style.css') }}">
	  
	  <!--  <link rel="stylesheet" href="css/team_slide.css">  -->
      <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.css') }}">
      <link rel="stylesheet" href="{{ URL::to('public/site/css/font/css/font-awesome.min.css') }}">
	  
	    <link href="{{ URL::to('public/site/css/tab_table.css') }}" rel="stylesheet">

		<link rel="shortcut icon" href="{{url('public/favicon.ico')}}" type="image/x-icon" />
  
</head>

<body class="layout-three">
<!--loader-->
<!--<div class="loader"></div>-->

    <header class="cd-auto-hide-header">
    		@if( Session::has( 'fail' ))
<div class="alert alert-danger alert-block alert-fixed">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get( 'fail' ) }}</strong>
</div>
							@endif
<form class="form-horizontal" action=" {{URL::to('userLogin')}}" method="post"  id="contact_form">
        <div class="container subnav-primary-pad">
        	<a class="navbar-brand-subnav" href="{{url('/')}}"><img src="{{url('public/adminlte/site_image',$application->site_logo)}}" height="50"  ></a>
        	
        <nav class="cd-primary-nav  " style="padding-top: 20px;padding-bottom: 5px">
        <a href="#cd-navigation" class="nav-trigger">
            <span>
                <em aria-hidden="true"></em>
                Menu
            </span>
        </a> <!-- .nav-trigger --> 

        <ul id="cd-navigation">
            <li><a href="" data-toggle="modal" data-target="#myModal" class="btn btn-link">Forgot Password</a></li>
           <li> <input type="hidden" name="_token" value="{{ csrf_token() }}"></li>
           


		   <li>  
            	<input name="email" placeholder="E-Mail Address" class="form-control mr-sm-2"  type="email" value="{{ old('email') }}">
      			<!-- <input class="form-control mr-sm-2" type="text" placeholder="Email Address"> -->
		<?php  $message = Session::get('error'); ?>
		
		<p style="color:red">@if ($message){{ $message }}@endif</p>
				<p style="color:green">@if(Session::get('password')==1) Password Changed Successfully @endif</p>
     		</li>
            <li>  
            	<input name="password" placeholder="Password" class="form-control mr-sm-2"  type="password">
      			<!-- <input class="form-control mr-sm-2" type="password" placeholder="Password"> -->
		     </li>

             <li><a onClick="$('#contact_form').submit();" class="mr-2  btn btn-yellow btn-round  nav-btn my-2 my-sm-0 nav-login" >Login</a></li>
                     </ul>
                
    </nav> <!-- .cd-primary-nav -->

    </div></form>
    <nav class="cd-secondary-nav">

        <ul>
        	<li class="second-logo">
        		<a  href="{{url('/')}}"><img src="{{url('public/site/image/logo1.png')}}"  height="30px"  ></a>
        	</li>
            <li class="nav-item ">
                <a class="nav-link active" href="{{URL::to('/')}}">Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{URL::to('howtoplay')}}">How to Play</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('faquestion')}}">FAQs</a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link" href="#">Refer to Earn</a>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('winner-board')}}">Winner board</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('about-us')}}">About Company</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show Contest</a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link" href="#">Support</a>
            </li>--}}
            
        </ul>
    </nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->

<div class="cd-main-content sub-nav">


	  	<!-- header  
     <div class="header"  >
    	<div class="wrap">
        	<div class="navbar navbar_ clearfix">
					
					<div class="container">
					
							<div class="row">
							 <div class="col-md-6">
									<div class="logo"><a href="http://www.leaguerocks.com/"><img src="{{url('public/site/image/cricket_logo.png')}}" alt="" /></a></div>                  
								</div>
							<div class="col-md-6">
								@if( Session::has( 'fail' ))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ Session::get( 'fail' ) }}</strong>
</div>
							@endif
							
							<form class="form-horizontal" action=" {{URL::to('userLogin')}}" method="post"  id="contact_form">
								  <input type="hidden" name="_token" value="{{ csrf_token() }}">
								  
									<div class="row">
									
							


								  <div class="col-md-2 login_home" style="width:13%">
									<button type="submit" class="btn_login btn-success" >Log in</button>
								  </div>
								  {{--	 <div class="col-md-2">
									<button type="submit" class="btn btn-danger" >Join Now</button>
								  </div>--}}
								  
								  	<div class="col-md-4 inputGroupContainer login_home">
									<div class="input-group">
								  <input name="password" placeholder="Password" class="form-control"  type="password">
									</div>
								  </div>
								  
								  
								   <div class="col-md-4 inputGroupContainer login_home">
								  <div class="input-group">
								  <input name="email" placeholder="E-Mail Address" class="form-control"  type="email" value="{{ old('email') }}">
									</div>
									<div> <p style="color:red">@if ($message = Session::get('error')){{ $message }}@endif</p></div>
									
								  </div>
								  
								  
								  </div>
								  
								  <div class="row">
								  <div class="col-md-2 login_home" style="width:13%">
								  </div>
								  <div class="col-md-4 login_home">
									
										<a href="" data-toggle="modal" data-target="#myModal">Forgot Password?</a>
									</div>
								  
							 
									
									
									
											
								</div>
											
							</form>
							
							
							{{--  <div class="top_menu">
							  
								  <a href="">Cricket</a>
								  <a href="">Football</a>
								  <a href="">Hockey</a>
								  <a href="">Volleyball</a>
							  
							</div> --}}
															
						
							</div>
							</div>
						
							
					</div>
                    
                       
                     
                    </div>                
              
             
        </div>    
    </div>  -->
     

	<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content pad20">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="color: #232323">Forgot Password</h4>
								  </div>
								  <div class="modal-body">

									<form class="  form-horizontal" action="{{ URL('forgot-password') }}" method="post"  style="margin-top:2px;">
					 {{ csrf_field() }}
					
					

					

					<div >
					   
					  
					  <input  name="email" class="form-control"  type="email" placeholder="Email Address" >
						 
					 
					</div>
								  </div>
								  <div class="modal-footer">
								  {{--<a type="button" class="popup_btn" data-dismiss="modal"></a>--}}
									<button type="submit" class="btn btn-primary fz16 " >Submit</button>
								  </div>
								  </form>
								</div>

							  </div>
							</div>


</div>

