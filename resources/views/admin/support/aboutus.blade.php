@extends('layouts.app')

@section('content')

<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">About Us</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.about_us.title')</h3>
    </div>     
   </div>
   <!-- breadcrumb section -->
   
    
    
{{ Form::open(array('action' => 'Admin\SupportController@about_us_update','method' => 'POST')) }}
	@include('admin.flash')	
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
                    {!! Form::label('page_info', 'Page Info', ['class' => 'control-label']) !!}
                  
					<textarea name="page_info" required class='form-control'>{!! Request::old('page_info', $about_us->page_info) !!}</textarea>
					<script>
            CKEDITOR.replace('page_info');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('page_info'))
                        <p class="help-block">
                            {{ $errors->first('page_info') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('meta_title', 'Meta Title', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_title',$about_us->meta_title, ['class' => 'form-control', 'placeholder' => '','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('meta_title'))
                        <p class="help-block">
                            {{ $errors->first('meta_title') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('meta_keywords', 'Meta keywords', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_keywords',$about_us->meta_keywords,  ['class' => 'form-control', 'placeholder' => '','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('meta_keywords'))
                        <p class="help-block">
                            {{ $errors->first('meta_keywords') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('meta_description', 'Meta Description', ['class' => 'control-label']) !!}
                    {!! Form::text('meta_description',$about_us->meta_description, ['class' => 'form-control', 'placeholder' => '','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('meta_description'))
                        <p class="help-block">
                            {{ $errors->first('meta_description') }}
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
	

@stop










