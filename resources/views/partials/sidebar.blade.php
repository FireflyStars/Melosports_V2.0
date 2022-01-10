@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="nav nav-stacked sidebar-menu" id="accordion1">
             <?php
             $is_home = '';
            if(isset($active_home)){

                $active_home == 'home';
                $is_home = 'active';
            }
            ?>
              <li class="{{$is_home}}">
              <a href="{{ url('/admin/home') }}">
                <span class="breadcrumb-arrow">
                <b class="bg-danger"></b>
                </span>
              <i class="fa fa-home"></i> Dash Board </a>
            </li>
            
            <?php
             $is_active = '';
            if(isset($active_class)){
                $active_class == 'users';
                $is_active = 'active';
            }
            ?>
            <li class="{{$is_active}}">
                <a href="{{ url('/admin/users') }}">
                 <span class="breadcrumb-arrow">
                 <b class="bg-info"></b>
                 </span>
                <i class="fa fa-users"></i>  Users </a>
            </li>
			
			
			
			            <!-- accordian section ends here -->
        <!--    <li class="{{ $request->segment(2) == 'winners' ? 'active' : '' }}">
                <a href="{{ url('admin/winners') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Winner List</span>
                </a>
            </li> -->

         
			              <li class="{{ $request->segment(2) == 'how_to_play' ? 'active' : '' }}">
                <a href="{{ route('admin.how_to_play') }}">
                  <span class="breadcrumb-arrow">
                   <b class="bg-warning"></b>
                  </span>
                  <i class="fa fa-play"></i> How To Play
                </a>
            </li>
 <li class="{{ $request->segment(2) == 'series' ? 'active' : '' }}">
                <a href="{{ url('admin/series') }}">
                  <span class="breadcrumb-arrow">
                   <b class="bg-warning"></b>
                  </span>
                  <i class="fa fa-list"></i> @lang('quickadmin.series.title')
                </a>
            </li>
              
			  
			  
			  <li> <a data-toggle="collapse" class="lr-dropdown" data-parent="#accordion1" href="#nexaLink">
                 <span class="breadcrumb-arrow">
                    <b class="bg-info"></b>
                  </span><i class="fa fa-briefcase"></i>  @lang('quickadmin.contest.title')</a>

                <ul id="nexaLink" class="collapse lr-subb">
                   
				<li class="{{ $request->segment(2) == 'contest' ? 'active' : '' }}">
                <a href="{{ url('admin/contest') }}">
                 
                  <i class="fa fa-asterisk"></i> @lang('quickadmin.contest.title')
                </a>
            </li>
				 
            <li class="{{ $request->segment(2) == 'contestcategory' ? 'active' : '' }}">
             <a href="{{ url('admin/contestcategory') }}">
             
              <i class="fa fa-briefcase"></i> Contest Category</a>
            </li>  


				<li class="{{ $request->segment(2) == 'winner_rank' ? 'active' : '' }}">
               <a href="{{ url('admin/winner_rank') }}">
                 
                <i class="fa fa-crosshairs"></i>Friend Contest Winner Rank </a>
            </li>
			
			<li class="{{ $request->segment(2) == 'winner_rank' ? 'active' : '' }}">
               <a href="{{ url('admin/winner_divide') }}">
                 
                <i class="fa fa-crosshairs"></i>Winning Amount Divide Contest </a>
            </li>
            
           
                </ul>
              
            </li>
			  
		
                <li class="{{ $request->segment(2) == 'matches' ? 'active' : '' }}">
                <a href="{{ url('admin/matches') }}">
                  <span class="breadcrumb-arrow">
                   <b class="bg-warning"></b>
                  </span>
                  <i class="fa fa-bookmark"></i> @lang('quickadmin.matches.title') </a>
            </li>
           
		   <li class="{{ $request->segment(2) == 'matches-list' ? 'active' : '' }}">
               <a href="{{ url('admin/matches-list') }}">
                 <span class="breadcrumb-arrow">
                   <b class="bg-primary"></b>
                 </span>
                <i class="fa fa-crosshairs"></i> UpComing Match List </a>
            </li>

		  <li class="{{ $request->segment(2) == 'fantasypoint' ? 'active' : '' }}">
                <a href="{{ url('admin/fantasypoint') }}">
                  <span class="breadcrumb-arrow">
                   <b class="bg-danger"></b>
                  </span>
                  <?php $site=App\SiteSetting::findorfail(1)  ?> 
				  <i class="fa fa-life-bouy"></i>{{$site->site_name}} Point System</a>
            </li>
            <li class="{{ $request->segment(2) == 'fantasyuserpayment' ? 'active' : '' }}">
                <a href="{{ url('admin/fantasyuserpayment') }}">
                     <span class="breadcrumb-arrow">
                    <b class="bg-info"></b>
                  </span>
                    <i class="fa fa-credit-card"></i> User Payment
                </a>
            </li>						 <li> <a data-toggle="collapse" class="lr-dropdown" data-parent="#accordion1" href="#thirdLink1">                <span class="breadcrumb-arrow">                   <b class="bg-warning"></b>                  </span>                <i class="fa fa-arrows"></i> Withdraw </a>                <ul id="thirdLink1" class="collapse lr-subb">                   <li class="{{ $request->segment(2) == 'fantasyuserwithdraw' ? 'active' : '' }}">                <a href="{{ url('admin/fantasyuserwithdraw') }}">                    <i class="fa fa-arrows"></i>                    <span class="title"> User Withdraw </span>                </a>            </li>                        <li class="{{ $request->segment(2) == 'playpt_withdraw' ? 'active' : '' }}">                <a href="{{ url('admin/playpt_withdraw') }}">                    <i class="fa fa-key"></i>                    <span class="title">Withdraw PlayPoint</span>                </a>                        </li>                                                   </ul>            </li>												
             

             <!-- accordian section -->
            
            <li> <a data-toggle="collapse" class="lr-dropdown" data-parent="#accordion1" href="#secondLink1">
                <span class="breadcrumb-arrow">
                   <b class="bg-warning"></b>
                  </span>
                <i class="fa fa-arrows"></i> News</a>

                <ul id="secondLink1" class="collapse lr-subb">

                   <li class="{{ $request->segment(2) == 'news' ? 'active' : '' }}">
                <a href="{{ url('admin/news') }}">
                    <i class="fa fa-arrows"></i>
                    <span class="title"> News</span>
                </a>
            </li>
            

            <li class="{{ $request->segment(2) == 'news' ? 'active' : '' }}">
                <a href="{{ url('admin/faq_questions') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">FAQ</span>
                </a>            
            </li>
            
            
            <li class="{{ $request->segment(2) == 'news' ? 'active' : '' }}">
                <a href="{{ url('admin/testimonials') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Testimonials</span>
                </a>            
            </li>
                </ul>
            </li>
           
            
    <!--        <li class="{{ $request->segment(2) == 'contactus' ? 'active' : '' }}">
                <a href="{{ url('admin/contactus') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.contact_us.title')</span>
                </a>
            </li> -->
            <li class="{{ $request->segment(2) == 'aboutus' ? 'active' : '' }}">
                <a href="{{ url('admin/aboutus') }}">
                    <span class="breadcrumb-arrow">
                    <b class="bg-primary"></b>
                  </span>
                    <i class="fa fa-info-circle"></i> @lang('quickadmin.about_us.title')
                </a>
            </li>

            <li> <a data-toggle="collapse" class="lr-dropdown" data-parent="#accordion1" href="#firstLink">
                 <span class="breadcrumb-arrow">
                    <b class="bg-info"></b>
                  </span><i class="fa fa-question"></i> Enquiry</a>

                <ul id="firstLink" class="collapse lr-subb">
                    <li class="{{ $request->segment(2) == 'userenquiry' ? 'active' : '' }}">
                <a href="{{ url('admin/userenquiry') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Enquiry</span>
                </a>
            </li>
            
            <li class="{{ $request->segment(2) == 'report_incoming' ? 'active' : '' }}">
                <a href="{{ url('admin/report_incoming') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Report Incoming Amount</span>
                </a>
            </li>
            
            <li class="{{ $request->segment(2) == 'userenquiry' ? 'active' : '' }}">
                <a href="{{ url('admin/report_winning') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Winning Amount Report</span>
                </a>
            </li>
            
            
            <li class="{{ $request->segment(2) == 'userenquiry' ? 'active' : '' }}">
                <a href="{{ url('admin/match_wise') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Matchwise Winning Amount </span>
                </a>
            </li>
                </ul>
              
            </li>
			
			 <li> <a data-toggle="collapse" class="lr-dropdown" id="#set" data-parent="#accordion2" href="#secondLink">
                <span class="breadcrumb-arrow">
                   <b class="bg-warning"></b>
                  </span>
                <i class="fa fa-cogs"></i> Settings</a>

                <ul id="secondLink" class="collapse lr-subb">

                   <li class="{{ $request->segment(2) == 'site_settings' ? 'active' : '' }}">
                <a href="{{ route('admin.site_settings') }}">
                    <i class="fa fa-key"></i>
                    <span class="title"> Site Settings</span>
                </a>
            </li>
            

            <li class="{{ $request->segment(2) == 'payment_settings' ? 'active' : '' }}">
                <a href="{{ route('admin.payment_settings') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Payment Settings</span>
                </a>            
            </li>
            
            
            <li class="{{ $request->segment(2) == 'sms_settings' ? 'active' : '' }}">
                <a href="{{ route('admin.sms_settings') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Sms Settings</span>
                </a>            
            </li>
			
			 <li class="{{ $request->segment(2) == 'social_settings' ? 'active' : '' }}">
                <a href="{{ route('admin.social_settings') }}">
                    <i class="fa fa-key"></i>
                    <span class="title"> API Settings</span>
                </a>            
            </li>
			
			 <li class="{{ $request->segment(2) == 'currency_settings' ? 'active' : '' }}">
                <a href="{{ route('admin.currency_settings') }}">
                    <i class="fa fa-key"></i>
                    <span class="title"> Currency Settings</span>
                </a>            
            </li>
			
			
                </ul>
            </li>
            
            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
              <a href="{{ route('auth.change_password') }}">
                <span class="breadcrumb-arrow">
                 <b class="bg-success"></b>
                </span>
               <i class="fa fa-key"></i> Change password </a>
            </li>
            
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                     <span class="breadcrumb-arrow">
                <b class="bg-danger"></b>
                </span>
                    <i class="fa fa-arrow-left"></i>
                    @lang('quickadmin.qa_logout')
                </a>
            </li>
        </ul>
    </section>
	</aside>
	
	
{!! Form::open(['url' => 'adminlogout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
	{!! Form::close() !!}  
