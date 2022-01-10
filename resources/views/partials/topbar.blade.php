<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
		@php($application=App\SiteSetting::findorfail(1))
        <span class="logo-mini">
          {{$application->site_name}}  </span>
      
        <span class="logo-lg">
        <img src="{{url('public/adminlte/site_image',$application->site_logo)}}" style="height: 50px;width: 228px; margin-left: -25px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top clearfix">
	  <span class="pull-right" style="padding-top: 15px;padding-right: 15px;"> Last Login: {{Auth::user()->last_login}}</span> 
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span>
        </a>

        

    </nav>
</header>


