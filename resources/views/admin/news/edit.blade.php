@extends('layouts.app')

@section('content')

<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> News</a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
      <h3 class="page-title">News Edit</h3>
    </div> 

    <!-- <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
       @can('user_create')
       <p class="lr-add"><a href="{{ route('admin.news.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a></p>
       @endcan
    </div>   -->   
   </div>
   
    
    {!! Form::model($news, ['method' => 'PUT', 'route' => ['admin.news.update', $news->id]]) !!}

	
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
            @lang('quickadmin.qa_create')
        </div>
		
      
        <div class="panel-body">
		
		
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control ', 'placeholder' => 'Enter title','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div> 
			
			  
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Description*', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control ', 'placeholder' => 'Enter description','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
			
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
			
        </div>
    </div>

@stop

@section('javascript')
    @parent
   
@stop