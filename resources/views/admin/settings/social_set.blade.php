@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> API Settings</a></li>
       <li class="active">API Settings</li>
     </ul>
   </div> 
 @include('admin.flash')
   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">API Settings</h3>
    </div>     
   </div>
    <a href="{{url('public/document/api_settings.docx')}}" class="btn btn-primary" target="_blank" >API Settings Document</a>
    
    {!! Form::model($user, ['method' => 'post', 'route' => ['admin.save_social_settings']]) !!}

	
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
		<div class="col s12 clearfix">
                        <h5 class="section-title">Facebook</h5>
                    </div>
             <div class="row">
			 <label class="col-xs-12 form-group">Allow FB Login*</label>
                <div class="col-xs-12 form-group">
                    <select name="fb_status" class="form-control">
					<option value="1" @if($user->fb_status==1) selected @endif > No</option>
					<option value="0"  @if($user->fb_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fb_credential', 'App Id', ['class' => 'control-label']) !!}
                    {!! Form::text('fb_credential[app]',old('fb_credential[app]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			
				  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fb_credential', 'Secret Id', ['class' => 'control-label']) !!}
                    {!! Form::text('fb_credential[secret]',old('fb_credential[secret]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Google Map</h5>
                    </div>
			
			 <div class="row">
			 <label class="col-xs-12 form-group">Allow Google Map*</label>
                <div class="col-xs-12 form-group">
                    <select name="gmap_status" class="form-control">
					<option value="1" @if($user->gmap_status==1) selected @endif > No</option>
					<option value="0"  @if($user->gmap_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gmap_credential', 'Gmail Map Credential', ['class' => 'control-label']) !!}
                    {!! Form::text('gmap_credential[key]',old('gmap_credential[key]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="col s12 clearfix">
                        <h5 class="section-title">Google Login</h5>
                    </div>
			 <div class="row">
			 <label class="col-xs-12 form-group">Allow Google Login*</label>
                <div class="col-xs-12 form-group">
                    <select name="glogin_status" class="form-control">
					<option value="1" @if($user->glogin_status==1) selected @endif > No</option>
					<option value="0"  @if($user->glogin_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('glogin_credential', 'Google Client Id', ['class' => 'control-label']) !!}
                    {!! Form::text('glogin_credential[id]',old('glogin_credential[id]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>	
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('glogin_credential', 'Google Client Secret', ['class' => 'control-label']) !!}
                    {!! Form::text('glogin_credential[secret]',old('glogin_credential[secret]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Google Recapcha</h5>
                    </div>
			 <div class="row">
			 <label class="col-xs-12 form-group">Allow Google Recapcha*</label>
                <div class="col-xs-12 form-group">
                    <select name="recapcha_status" class="form-control">
					<option value="1" @if($user->recapcha_status==1) selected @endif > No</option>
					<option value="0"  @if($user->recapcha_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('recapcha_credential', 'Reacapcha API Key', ['class' => 'control-label']) !!}
                    {!! Form::text('recapcha_credential[api]',old('recapcha_credential[api]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>	
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('recapcha_credential', 'Reacapcha Secret Key', ['class' => 'control-label']) !!}
                    {!! Form::text('recapcha_credential[secret]',old('recapcha_credential[secret]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
					
					<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cric_api_key', 'Cricket Api Key', ['class' => 'control-label']) !!}
                    {!! Form::text('cric_api_key',old('cric_api_key'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cric_api_key'))
                        <p class="help-block">
                            {{ $errors->first('cric_api_key') }} 
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
		
		$('#save').click(function() {		
		alert('Demo user doesnt have permission to change settings');	
		return false;
		});	
    </script>

@stop