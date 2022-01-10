@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
     <?php  $site=App\SiteSetting::findorfail(1)?>	<li><a href="#"><i class="fa fa-home"></i> {{$site->site_name}} Point System</a></li>
       <li class="active">Add</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.matches.title')</h3>
    </div>     
   </div>
    
    {!! Form::open(['method' => 'POST', 'route' => ['admin.fantasypoint.store']]) !!}

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
					<select name="match_type" class="form-control">
				   <option value="">Select Match Type </option>
				   <option value="odi">ODI</option>
				   <option value="test">Test</option>
				   <option value="T20">T20</option>
				  </select>


				   <p class="help-block"></p>
                    @if($errors->has('match_type'))
                        <p class="help-block">
                            {{ $errors->first('match_type') }}
                        </p>
                    @endif
                </div>
            </div>


		 <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Every Run*', ['class' => 'control-label']) !!}
                    {!! Form::number('each_run', old('each_run'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('name', 'Every Boundary Hit*', ['class' => 'control-label']) !!}
                    {!! Form::number('each_four', old('each_four'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('each_four'))
                        <p class="help-block">
                            {{ $errors->first('each_four') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Every Six Hit*', ['class' => 'control-label']) !!}
                    {!! Form::number('each_six', old('each_six'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('century', old('century'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('half_century', old('half_century'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('per_wicket', old('per_wicket'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('caught_bowled', old('caught_bowled'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('dismissal_for_duck', old('dismissal_for_duck'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('maiden_over', old('maiden_over'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('wickets_4', old('wickets_4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('wickets_5', old('wickets_5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('stumping', old('stumping'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('run_out', old('run_out'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('economy_rate_below_4', old('economy_rate_below_4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('name', 'Economy Rate Between 4 to 4.99*', ['class' => 'control-label']) !!}
                    {!! Form::number('economy_rate_4_5', old('economy_rate_4_5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('name', 'Economy Rate Between 5 to 5.99*', ['class' => 'control-label']) !!}
                    {!! Form::number('economy_rate_5_6', old('economy_rate_5_6'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_5_6'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_5_6') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Economy Rate Between 6 to 6.99*', ['class' => 'control-label']) !!}
                    {!! Form::number('economy_rate_6_7', old('economy_rate_6_7'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::label('name', 'Economy Rate Between 7 to 9*', ['class' => 'control-label']) !!}
                    {!! Form::number('economy_rate_7_9', old('economy_rate_7_9'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('economy_rate_above_9', old('economy_rate_above_9'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('economy_rate_above_9'))
                        <p class="help-block">
                            {{ $errors->first('economy_rate_above_9') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Strike Rate Between 61 to 70*', ['class' => 'control-label']) !!}
                    {!! Form::number('strike_rate_60_70', old('strike_rate_60_70'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('strike_rate_60_70'))
                        <p class="help-block">
                            {{ $errors->first('strike_rate_60_70') }}
                        </p>
                    @endif
                </div>
            </div><div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Strike Rate Between 50 to 60*', ['class' => 'control-label']) !!}
                    {!! Form::number('strike_rate_50_60', old('strike_rate_50_60'), ['class' => 'form-control ', 'placeholder' => '']) !!}
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
                    {!! Form::number('strike_rate_below_50', old('strike_rate_below_50'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('strike_rate_below_50'))
                        <p class="help-block">
                            {{ $errors->first('strike_rate_below_50') }}
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
	
	
	<script>
  $(function () {
    //Initialize Select2 Elements
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
	
	
	
	
	
	
	   
@stop