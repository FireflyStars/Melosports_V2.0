@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> </a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
       <h3 class="page-title">@lang('quickadmin.matches.title')</h3>
    </div>     
   </div>
   
    
    {!! Form::model($matches, ['method' => 'PUT', 'route' => ['admin.matches.update', $matches->id]]) !!}

	
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
				{!! Form::label('name', 'Series*', ['class' => 'control-label']) !!}
                    <select name="series" class ="form-control">
        @foreach($matches1 as $cat)
        <option value="{{$cat->id}}" @if($cat->id==$matches->series_id)selected @endif>{{ $cat->name }}</option>
        @endforeach
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('series'))
                        <p class="help-block">
                            {{ $errors->first('series') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Match*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Contest*', ['class' => 'control-label']) !!}
                    <select name="contest" class ="form-control" multiple="multiple">
        @foreach($contests as $cat)
	<?php	print_r( $json=json_decode($matches->contest_id, true)); ?>
        <option value="{{$cat->id}}" @if($cat->id==$json)selected @endif>{{ $cat->name }}</option>
        @endforeach
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('series'))
                        <p class="help-block">
                            {{ $errors->first('series') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Team 1*', ['class' => 'control-label']) !!}
                    {!! Form::text('team_1', old('team_1'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('team_1'))
                        <p class="help-block">
                            {{ $errors->first('team_1') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Team 2*', ['class' => 'control-label']) !!}
                    {!! Form::text('team_2', old('team_2'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('team_2'))
                        <p class="help-block">
                            {{ $errors->first('team_2') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('time', 'Time*', ['class' => 'control-label']) !!}
                    {!! Form::text('time', old('time'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('time'))
                        <p class="help-block">
                            {{ $errors->first('time') }}
                        </p>
                    @endif
                </div>
            </div>
           
           {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger','id'=>'save']) !!}
    {!! Form::close() !!}
            
        </div>
    </div>

  
@stop

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