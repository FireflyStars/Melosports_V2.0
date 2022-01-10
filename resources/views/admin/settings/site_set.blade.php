@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Site Settings</a></li>
       <li class="active">Site Settings</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->
   @include('admin.flash')
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Site Settings</h3>
    </div>     
   </div>
    
    
    {!! Form::model($users, ['method' => 'post', 'route' => ['admin.save_site'], 'enctype' => "multipart/form-data"]) !!}

	
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>
        <div class="panel-body">
             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('site_name', 'Site Name', ['class' => 'control-label']) !!}
                    {!! Form::text('site_name', old('site_name'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_name'))
                        <p class="help-block">
                            {{ $errors->first('site_name') }}
                        </p>
                    @endif
                </div>
            </div>
			
			  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('site_logo', 'Site Logo', ['class' => 'control-label']) !!}
                    {!! Form::file('site_logo', ['class' => 'form-control ', 'placeholder' => '']) !!}
					
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			<img src="{{url('public/adminlte/site_image',$users->site_logo)}}" style="height:100px;width:100px">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('favicon', 'Fav Icon', ['class' => 'control-label']) !!}
                    {!! Form::file('favicon', ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('favicon'))
                        <p class="help-block">
                            {{ $errors->first('favicon') }}
                        </p>
                    @endif
                </div>
            </div>
			<img src="{{url('public/favicon.ico')}}" style="height:100px;width:100px">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('meta_keyword', 'Meta Keyword', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_keyword',old('meta_keyword'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('meta_keyword'))
                        <p class="help-block">
                            {{ $errors->first('meta_keyword') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Meta Description', ['class' => 'control-label']) !!}
                  
					<textarea name="description"  class='form-control'>{!! Request::old('description', $users->meta_description) !!}</textarea>
					<script>
            CKEDITOR.replace('description');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('web_site', 'Website', ['class' => 'control-label']) !!}
                    {!! Form::text('website',old('website'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('web_site'))
                        <p class="help-block">
                            {{ $errors->first('web_site') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Social Links</h5>
                    </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('social_links', 'Facebook', ['class' => 'control-label']) !!}
                    {!! Form::text('social_links[fb]',old('social_links[fb]'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('social_links'))
                        <p class="help-block">
                            {{ $errors->first('social_links') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('social_links', 'Twitter', ['class' => 'control-label']) !!}
                    {!! Form::text('social_links[twi]',old('social_links[twi]'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('social_links'))
                        <p class="help-block">
                            {{ $errors->first('social_links') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('social_links', 'Google+', ['class' => 'control-label']) !!}
                    {!! Form::text('social_links[goog]',old('social_links[goog]'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('social_links'))
                        <p class="help-block">
                            {{ $errors->first('social_links') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('social_links', 'Youtube', ['class' => 'control-label']) !!}
                    {!! Form::text('social_links[you]',old('social_links[you]'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('social_links'))
                        <p class="help-block">
                            {{ $errors->first('social_links') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Contact Information</h5>
                    </div>
					
					<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                    {!! Form::text('address',old('address'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
			 <div class="col-xs-12 form-group">
                    {!! Form::label('city', 'city', ['class' => 'control-label']) !!}
                    {!! Form::text('city',old('city'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
			 <div class="col-xs-12 form-group">
                    {!! Form::label('zip_code', 'Zipcode', ['class' => 'control-label']) !!}
                    {!! Form::text('zip_code',old('zip_code'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('zip_code'))
                        <p class="help-block">
                            {{ $errors->first('zip_code') }}
                        </p>
                    @endif
                </div>
            </div>
					
					<div class="row">
			 <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::email('email',old('email'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
			 <div class="col-xs-12 form-group">
                    {!! Form::label('s_email', 'Support Email', ['class' => 'control-label']) !!}
                    {!! Form::email('support_email',old('support_email'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('s_email'))
                        <p class="help-block">
                            {{ $errors->first('s_email') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
			<div class="col-xs-12 form-group">
                    {!! Form::label('phone', 'phone', ['class' => 'control-label']) !!}
                    {!! Form::text('phone',old('phone'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="col s12 clearfix">
                        <h5 class="section-title">Footer Text</h5>
                    </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('footer_text', 'Footer Text', ['class' => 'control-label']) !!}
                  
					<textarea name="footer_text"  class='form-control'>{!! Request::old('footer_text', $users->footer_text) !!}</textarea>
					<script>
            CKEDITOR.replace('footer_text');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('footer_text'))
                        <p class="help-block">
                            {{ $errors->first('footer_text') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('terms_condition', 'Terms & Condition', ['class' => 'control-label']) !!}
                  
					<textarea name="terms_condition"  class='form-control'>{!! Request::old('terms_condition', $users->terms_condition) !!}</textarea>
					<script>
            CKEDITOR.replace('terms_condition');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('terms_condition'))
                        <p class="help-block">
                            {{ $errors->first('terms_condition') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('privacy_policy', 'Privacy Policy', ['class' => 'control-label']) !!}
                  
					<textarea name="privacy_policy"  class='form-control'>{!! Request::old('privacy_policy', $users->privacy_policy) !!}</textarea>
					<script>
            CKEDITOR.replace('privacy_policy');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('terms_condition'))
                        <p class="help-block">
                            {{ $errors->first('terms_condition') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Money to Points</h5>
                    </div>
	<div class="row">
			<div class="col-xs-12 form-group">
                    {!! Form::label('user_pts', 'User Play Points', ['class' => 'control-label']) !!}
                    {!! Form::number('user_pts',old('user_pts'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_pts'))
                        <p class="help-block">
                            {{ $errors->first('user_pts') }}
                        </p>
                    @endif
					<p style="color:green">
					Eg.1 Rs=10Pts
					</p>
                </div>
            </div>				
			<div class="row">			
			<div class="col-xs-12 form-group">    
			{!! Form::label('minimum_wallet_amount', 'Minimum Withdraw Wallet Amount', ['class' => 'control-label']) !!}                   
			{!! Form::number('minimum_wallet_amount',old('minimum_wallet_amount'), ['class' => 'form-control ', 'placeholder' => '']) !!}      
			<p class="help-block"></p>  
			@if($errors->has('minimum_wallet_amount'))      
				<p class="help-block">                      
			{{ $errors->first('minimum_wallet_amount') }}     
			</p>                  
			@endif				
			</div>            
			</div>			
			<div class="row">	
			<div class="col-xs-12 form-group">     
			{!! Form::label('minimum_play_point', 'Minimum Play Point', ['class' => 'control-label']) !!}                    {!! Form::number('minimum_play_point',old('minimum_play_point'), ['class' => 'form-control ', 'placeholder' => '']) !!}                    
			<p class="help-block"></p>  
			@if($errors->has('minimum_play_point'))   
				<p class="help-block">        
			{{ $errors->first('minimum_play_point') }}  
			</p>                   
			@endif				
			</div>        
			</div>	
					
           
          {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
            
        </div>
    </div>

   
@stop
<script type="text/javascript" src="{{ url('public/adminlte/plugins/ckeditor/ckeditor.js') }}"></script>
@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

	
	<script>
$('#save').click(function() {
		
		
		alert('Demo user doesnt have permission to change settings');
		
		return false;
	});
	
	 
	
	
	
	
	</script>
	
	
	
@stop