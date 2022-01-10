@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 lr-bg">
            <div class="panel panel-default">
<?php $site=App\SiteSetting::findorfail(1)  ?>               
			   <div class="panel-heading lr-headding"><span class="logo-lg">
        <img src="{{url('public/adminlte/site_image',$site->site_logo)}}" style="height: 50px;width: 228px; margin-left: -25px;background-color:#fc6076;"></span>
        </div>
                <div class="panel-body">
				{{-- <div class="alert alert-warning">
                        Notice: this admin panel was generated with FREE TRIAL of QuickAdminPanel.
                        <br />
                        Please purchase a full version by choosing a plan at <a href="https://quickadminpanel.com" target="_blank">QuickAdminPanel.com</a> 
				</div> --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>  
                    @endif  
                       @if( Session::has( 'fail' ))
                        <div class="alert alert-danger alert-block">
                        	<button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ Session::get( 'fail' ) }}</strong>
                        </div>
					@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('adminLogin') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group lr-group">
                            <label class="col-md-12 control-label lr-label">Email</label>

                            <div class="col-md-12 lr-field">
                              <input type="email" placeholder="Enter User Name" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group lr-group">
                            <label class="col-md-12 control-label lr-label">Password</label>

                            <div class="col-md-12 lr-group lr-field">
                              <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group lr-group">
                            <div class="col-md-6 col-md-offset-3">
                            {{--    <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>--}}
                            </div>
                        </div>


						  <div class="form-group lr-group">
                            <div class="col-md-6 col-md-offset-3 lr-group">
                              <label class="lr-label">  
                                <input type="checkbox" name="remember" class="lr-group"> Remember me</label>
                            </div>
                        </div>

                        <div class="form-group lr-field">
                          <div class="col-md-6 col-md-offset-3 lr-bbtn">
                             <button type="submit" class="btn btn-primary" style="margin-right:15px;">  Login </button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	 
@endsection
 <script>
    window.onload = function () {
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
    }
 </script>

