@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Profile Settings</a></li>
       <li class="active">Profile Settings</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Profile Settings</h3>
    </div>     
   </div>
    
    
    {!! Form::model($users, ['method' => 'post', 'route' => ['admin.save_profile_settings']]) !!}

	
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
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('city', 'City', ['class' => 'control-label']) !!}
                    {!! Form::text('city', old('city'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('zip_code', 'Zip Code', ['class' => 'control-label']) !!}
                    {!! Form::text('zip_code', old('zip_code'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
		/* $('#save').click(function() {			
		alert('Site is under testing mode.You cant change any settings');	
		return false;	
		});	 */
		
    </script>

@stop