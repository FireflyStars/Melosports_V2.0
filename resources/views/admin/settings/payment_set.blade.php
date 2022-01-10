@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Payment Settings</a></li>
       <li class="active">Payment Settings</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->
   
   @include('admin.flash')

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Payment Settings</h3>
    </div>     
   </div>
   
       <a href="{{url('public/document/payment_api.docx')}}" class="btn btn-primary" target="_blank" >Payment Settings Document</a>
    
    
    {!! Form::model($user, ['method' => 'post', 'route' => ['admin.save_payment_settings']]) !!}

	
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
                        <h5 class="section-title"> Payment Gateway</h5>
                    </div>
             <div class="row">
			 <label class="col-xs-12 form-group">Allow Payment Gateway*</label>
                <div class="col-xs-12 form-group">
                    <select name="gateway_status" class="form-control">
					<option value="1" @if($user->gateway_status==1) selected @endif > No</option>
					<option value="0"  @if($user->gateway_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Pay Pal</h5>
                    </div>
             <div class="row">
			 <label class="col-xs-12 form-group">Allow PayPal*</label>
                <div class="col-xs-12 form-group">
                    <select name="pay_pal_status" class="form-control">
					<option value="1" @if($user->pay_pal_status==1) selected @endif > No</option>
					<option value="0"  @if($user->pay_pal_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pay_pal_credential', 'Paypal Credential', ['class' => 'control-label']) !!}
                    {!! Form::text('pay_pal_credential[key]',old('pay_pal_credential[key]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="col s12 clearfix">
                        <h5 class="section-title">Payu Money</h5>
                    </div>
					
			 <div class="row">
			 <label class="col-xs-12 form-group">Allow Payu*</label>
                <div class="col-xs-12 form-group">
                    <select name="payu_status" class="form-control">
					<option value="1" @if($user->payu_status==1) selected @endif > No</option>
					<option value="0"  @if($user->payu_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			
			<div class="row">
			 <label class="col-xs-12 form-group">Payu Test Mode</label>
                <div class="col-xs-12 form-group">
                    <select name="payu_test" class="form-control">
					<option value="1" @if($user->payu_test==1) selected @endif > No</option>
					<option value="0"  @if($user->payu_test==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payu_credential', 'Merchand ID', ['class' => 'control-label']) !!}
                    {!! Form::text('payu_credential[merchant]',old('payu_credential[merchant]'),['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('payu_credential', 'Secret ID', ['class' => 'control-label']) !!}
                    {!! Form::text('payu_credential[secret]',old('payu_credential[secret]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payu_credential'))
                        <p class="help-block">
                            {{ $errors->first('payu_credential') }} 
                        </p>
                    @endif
                </div>
            </div>
			<div class="col s12 clearfix">
                        <h5 class="section-title">InstaMojo</h5>
                    </div>
			
			 <div class="row">
			 <label class="col-xs-12 form-group">Instamojo Status*</label>
                <div class="col-xs-12 form-group">
                    <select name="instamojo_status" class="form-control">
					<option value="1" @if($user->instamojo_status==1) selected @endif > No</option>
					<option value="0"  @if($user->instamojo_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			<div class="row">
			 <label class="col-xs-12 form-group">InstaMojo Test Mode</label>
                <div class="col-xs-12 form-group">
                    <select name="test_instamojo" class="form-control">
					<option value="1" @if($user->test_instamojo==1) selected @endif > No</option>
					<option value="0"  @if($user->test_instamojo==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('instamojo_credential', 'API Key', ['class' => 'control-label']) !!}
                    {!! Form::text('instamojo_credential[api_key]',old('instamojo_credential[api_key]'),['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('instamojo_credential', 'Auth Token', ['class' => 'control-label']) !!}
                    {!! Form::text('instamojo_credential[auth]',old('instamojo_credential[auth]'),['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('instamojo_credential', 'Private Salt', ['class' => 'control-label']) !!}
                    {!! Form::text('instamojo_credential[salt]',old('instamojo_credential[salt]'),['class' => 'form-control ', 'placeholder' => '']) !!}
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
		
		  $('#save').click(function() {	
		alert('Demo user doesnt have permission to change settings');
		return false;	
		
		});	  
    </script>

@stop