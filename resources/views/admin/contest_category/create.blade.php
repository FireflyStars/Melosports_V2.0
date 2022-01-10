@extends('layouts.app')

@section('content')

  <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Users</a></li>
       <li class="active">Add</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
       <h3 class="page-title">Contest Category</h3>
    </div>     
   </div>

   
    {!! Form::open(['method' => 'POST', 'route' => ['admin.contestcategory.store'],'autocomplete'=>'off']) !!}

<!--	  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
	
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
		
      
        <div class="panel-body">
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Contest Category*', ['class' => 'control-label']) !!}
                    {!! Form::text('contest_category', old('contest_category'), ['class' => 'form-control ', 'placeholder' => '','pattern'=>'[a-zA-Z0-9 ]+']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contest_category'))
                        <p class="help-block">
                            {{ $errors->first('contest_category') }}
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
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop