@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> SMS Settings</a></li>
       <li class="active">SMS Settings</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->
   
   @include('admin.flash')

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">SMS Settings</h3>
    </div>     
   </div>
       <a href="{{url('public/document/sms_api.docx')}}" class="btn btn-primary" target="_blank" >Sms Settings Document</a>
    
    
    {!! Form::model($user, ['method' => 'post', 'route' => ['admin.save_sms_settings']]) !!}

	
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
			 
			 <label class="col-xs-12 form-group">Allow SmsGateway *</label>
                <div class="col-xs-12 form-group">
                    <select name="enable_sms" class="form-control">
					<option value="1" @if($user->enable_sms==1) selected @endif > No</option>
					<option value="0"  @if($user->enable_sms==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div> 
		
		
		
		
		
		
		
		
		
		<label> Sms Gateway: </label>

			  <div class="row">

                <div class="col-xs-2 form-group">

                <label>

				91sms &nbsp;&nbsp;&nbsp;

                <input type="radio" name="sms_gateway"  id="one_nine" @if($user->ninems_status==0) checked @endif class="flat-red" value="1"  >

                </label>

				</div>

				 <div class="col-xs-2 form-group">

                <label>

				Twilio &nbsp;&nbsp;&nbsp;

                  <input type="radio" name="sms_gateway" id="tw_lio" @if($user->twilio_status==0) checked @endif   class="flat-red" value="2" >

                </label>

              </div>

			  <div class="col-xs-2 form-group">

                <label>

				Shakthi &nbsp;&nbsp;&nbsp;

                  <input type="radio" name="sms_gateway" id="shakthi" @if($user->shakthi_status==0) checked @endif   class="flat-red" value="3" >

                </label>

              </div>

              </div>
            


			{{-- <div class="row">
			 
			 <label class="col-xs-12 form-group">Allow 91SMS*</label>
                <div class="col-xs-12 form-group">
                    <select name="ninems_status" class="form-control">
					<option value="1" @if($user->ninems_status==1) selected @endif > No</option>
					<option value="0"  @if($user->ninems_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div>  --}}
			
			  <div class="col s12 clearfix">

                        <h5 class="section-title"> 91 Sms</h5>

                    </div>
			 


			 <div id="n_one">
			  
			  
			  
			  <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ninems_credentials', '91Sms Auth', ['class' => 'control-label']) !!}
                    {!! Form::text('ninems_credentials[auth]',old('ninems_credentials[auth]'),['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('ninems_credentials', '91Sender Id', ['class' => 'control-label']) !!}
                    {!! Form::text('ninems_credentials[s_id]',old('ninems_credentials[s_id]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_logo'))
                        <p class="help-block">
                            {{ $errors->first('site_logo') }}
                        </p>
                    @endif
                </div>
            </div>
            
			
			
			
			
			
			</div>
			
			
			
			
			
			
			{{--	 <div class="row">
			 <label class="col-xs-12 form-group">Allow Twilio*</label>
                <div class="col-xs-12 form-group">
                    <select name="twilio_status" class="form-control">
					<option value="1" @if($user->twilio_status==1) selected @endif > No</option>
					<option value="0"  @if($user->twilio_status==0) selected @endif >Yes</option>
					</select>
					
                </div>
            </div> --}}
			
			<div class="col s12 clearfix">

                        <h5 class="section-title"> Twilio</h5>

                    </div>
			
			
			<div id="twi_cr">
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('twilio_credentials', 'SId', ['class' => 'control-label']) !!}
                    {!! Form::text('twilio_credentials[s_id]',old('twilio_credentials[s_id]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('twilio_credentials'))
                        <p class="help-block">
                            {{ $errors->first('twilio_credentials') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('twilio_credentials', 'Token Id', ['class' => 'control-label']) !!}
                    {!! Form::text('twilio_credentials[token]',old('twilio_credentials[token]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('twilio_credentials'))
                        <p class="help-block">
                            {{ $errors->first('twilio_credentials') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('twilio_credentials', 'Twilio Number', ['class' => 'control-label']) !!}
                    {!! Form::text('twilio_credentials[t_no]',old('twilio_credentials[t_no]'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('twilio_credentials'))
                        <p class="help-block">
                            {{ $errors->first('twilio_credentials') }} 
                        </p>
                    @endif 
                </div>
            </div>
           




		   </div>
		   
		   
		   <div class="col s12 clearfix">

                        <h5 class="section-title"> Shakthi Tech</h5>

                    </div>
		   
		   
		   <div id="shakthi">
		   
		   <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('shakthi_credentials', 'Sender Id', ['class' => 'control-label']) !!}
                    {!! Form::text('shakthi_credential',old('shakthi_credential'),['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('shakthi_credentials'))
                        <p class="help-block">
                            {{ $errors->first('shakthi_credentials') }} 
                        </p>
                    @endif 
                </div>
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
	
	
	
	
	<script>
	
	/* $("#n_one").hide();
	$("#twi_cr").hide();
	
	$('[name^=sms_gateway]').change(function(){
		
		var g_val=$(this).val();
		//alert(g_val);
		if(g_val==1)
		{
		
		$("#n_one").show();
		$("#twi_cr").hide();
		
		} 
		else
		{
		$("#twi_cr").show();
		$("#n_one").hide();
		}
		
		
		
		
	}); */
	
	
	
	
	
	
	</script>
	

@stop