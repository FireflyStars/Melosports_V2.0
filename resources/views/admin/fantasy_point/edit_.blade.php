@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> League Rocks Point System</a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.fantasy.title')</h3>
    </div>     
   </div>
   
    {!! Form::model($series, ['method' => 'PUT', 'route' => ['admin.fantasypoint.update', $series->id]]) !!}

	
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
                    {!! Form::label('name', 'Each Run*', ['class' => 'control-label']) !!}
                    {!! Form::text('each_run', old('each_run'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('each_run'))
                        <p class="help-block">
                            {{ $errors->first('each_run') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Each Four*', ['class' => 'control-label']) !!}
                    {!! Form::text('each_four', old('each_four'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('each_four'))
                        <p class="help-block">
                            {{ $errors->first('each_four') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Each Six*', ['class' => 'control-label']) !!}
                    {!! Form::text('each_six', old('each_six'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('each_six'))
                        <p class="help-block">
                            {{ $errors->first('each_six') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Century*', ['class' => 'control-label']) !!}
                    {!! Form::text('century', old('century'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('century'))
                        <p class="help-block">
                            {{ $errors->first('century') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Half Century*', ['class' => 'control-label']) !!}
                    {!! Form::text('half_century', old('half_century'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('half_century'))
                        <p class="help-block">
                            {{ $errors->first('half_century') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Per Wicket*', ['class' => 'control-label']) !!}
                    {!! Form::text('per_wicket', old('per_wicket'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('per_wicket'))
                        <p class="help-block">
                            {{ $errors->first('per_wicket') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Caught Bowled*', ['class' => 'control-label']) !!}
                    {!! Form::text('caught_bowled', old('caught_bowled'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('caught_bowled'))
                        <p class="help-block">
                            {{ $errors->first('caught_bowled') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Dismissal For Duck*', ['class' => 'control-label']) !!}
                    {!! Form::text('dismissal_for_duck', old('dismissal_for_duck'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dismissal_for_duck'))
                        <p class="help-block">
                            {{ $errors->first('dismissal_for_duck') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Maiden Over*', ['class' => 'control-label']) !!}
                    {!! Form::text('maiden_over', old('maiden_over'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('maiden_over'))
                        <p class="help-block">
                            {{ $errors->first('maiden_over') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', '4 Wickets*', ['class' => 'control-label']) !!}
                    {!! Form::text('wickets_4', old('wickets_4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wickets_4'))
                        <p class="help-block">
                            {{ $errors->first('wickets_4') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', '5 Wickets*', ['class' => 'control-label']) !!}
                    {!! Form::text('wickets_5', old('wickets_5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wickets_5'))
                        <p class="help-block">
                            {{ $errors->first('wickets_5') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Stumping*', ['class' => 'control-label']) !!}
                    {!! Form::text('stumping', old('stumping'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stumping'))
                        <p class="help-block">
                            {{ $errors->first('stumping') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Run Out*', ['class' => 'control-label']) !!}
                    {!! Form::text('run_out', old('run_out'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('run_out'))
                        <p class="help-block">
                            {{ $errors->first('run_out') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate Below 4*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_below_4', old('economy_rate_below_4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_below_4'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_below_4') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate 4 5*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_4_5', old('economy_rate_4_5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_4_5'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_4_5') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate 5 6*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_5_6', old('economy_rate_5_6'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_5_6'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_5_6') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate 6 7*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_6_7', old('economy_rate_6_7'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_6_7'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_6_7') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate 7 9*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_7_9', old('economy_rate_7_9'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_7_9'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_7_9') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate Above 9*', ['class' => 'control-label']) !!}
                    {!! Form::text('economy_rate_above_9', old('economy_rate_above_9'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_above_9'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_above_9') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Strike Rate 60 70*', ['class' => 'control-label']) !!}
                    {!! Form::text('strike_rate_60_70', old('strike_rate_60_70'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('strike_rate_60_70'))
                        <p class="help-block">
                            {{ $errors->first('strike_rate_60_70') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Strike Rate 50 60*', ['class' => 'control-label']) !!}
                    {!! Form::text('strike_rate_50_60', old('strike_rate_50_60'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('strike_rate_50_60'))
                        <p class="help-block">
                            {{ $errors->first('strike_rate_50_60') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Strike Rate Below 50*', ['class' => 'control-label']) !!}
                    {!! Form::text('strike_rate_below_50', old('strike_rate_below_50'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('strike_rate_below_50'))
                        <p class="help-block">
                            {{ $errors->first('strike_rate_below_50') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Match Type*', ['class' => 'control-label']) !!}
                    {!! Form::text('match_type', old('match_type'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('match_type'))
                        <p class="help-block">
                            {{ $errors->first('match_type') }}
                        </p>
                    @endif
                </div>
            </div>
		
		
	
	
			         
			

		
		</div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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