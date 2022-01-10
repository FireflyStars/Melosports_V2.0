@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> How To Play</a></li>
       <li class="active">How To Play</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->
   @include('admin.flash')
   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">How To Play</h3>
    </div>     
   </div>
    
    
    {!! Form::model($support, ['method' => 'post', 'route' => ['admin.how_save'], 'enctype' => "multipart/form-data"]) !!}

	
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
                    {!! Form::label('how_play', 'How To Play', ['class' => 'control-label']) !!}
                  
					<textarea name="how_play"  class='form-control'>{!! Request::old('how_play', $support->how_play) !!}</textarea>
					<script>
            CKEDITOR.replace('how_play');
        </script>
                    <p class="help-block"></p>
                    @if($errors->has('how_play'))
                        <p class="help-block">
                            {{ $errors->first('how_play') }}
                        </p>
                    @endif
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('how_play_link', 'Yotube Link*', ['class' => 'control-label']) !!}
                    {!! Form::text('how_play_link', old('how_play_link'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_name'))
                        <p class="help-block">
                            {{ $errors->first('site_name') }}
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