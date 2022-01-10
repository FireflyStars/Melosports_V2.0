@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Currency Settings</a></li>
       <li class="active">Currency Settings</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->
   
   @include('admin.flash')

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Currency Settings</h3>
    </div>     
   </div>
   
       <a href="{{url('public/document/payment_api.docx')}}" class="btn btn-primary" target="_blank" >Currency Settings Document</a>
       <a href="{{url('admin/add_currency')}}" id="curr" class="btn btn-primary"  >Add Currency</a>
	   
	   <br><br>
    
    
   {!! Form::open(['method' => 'POST', 'route' => ['admin.store_currency'],'autocomplete'=>'off']) !!}

	
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
                        <h5 class="section-title"> Currency Settings</h5>
                    </div>
					
			<div class="row">
			 <label class="col-xs-12 form-group">Select Currency*</label>
                <div class="col-xs-12 form-group">
                   <select name="currency_id" class="form-control">
					
					<option value="">Select Currency </option>
					
					@foreach($currency as $money)
					
					<option value="{{ $money->id}}" @if($setting->currency_id== $money->id) selected @endif >{{ $money->name}}</option>
					@endforeach
					</select> 
					
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
		
		$('#curr').click(function() {	
		
		alert('Demo user doesnt have permission to change settings');	
		return false;	
		
		});
    </script>
	

@stop