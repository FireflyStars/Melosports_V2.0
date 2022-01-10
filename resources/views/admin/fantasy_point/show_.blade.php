@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->
   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> League Rocks Point System</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

  <!-- breadcrumb section -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.fantasy.title')</h3>
    </div>     
   </div>
  
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.fantasy.fields.id')</th>
                            <td>{{ $matches->id }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.each_run')</th>
                            <td>{{ $matches->each_run }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.each_four')</th>
                            <td>{{ $matches->each_four }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.each_six')</th>
                            <td>{{ $matches->each_six }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.century')</th>
                            <td>{{ $matches->century }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.half_century')</th>
                            <td>{{ $matches->half_century }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.per_wicket')</th>
                            <td>{{ $matches->per_wicket }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.caught_bowled')</th>
                            <td>{{ $matches->caught_bowled }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.dismissal_for_duck')</th>
                            <td>{{ $matches->dismissal_for_duck }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.maiden_over')</th>
                            <td>{{ $matches->maiden_over }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.wickets_4')</th>
                            <td>{{ $matches->wickets_4 }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.wickets_5')</th>
                            <td>{{ $matches->wickets_5 }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.stumping')</th>
                            <td>{{ $matches->stumping }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.run_out')</th>
                            <td>{{ $matches->run_out }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_below_4')</th>
                            <td>{{ $matches->economy_rate_below_4 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_4_5')</th>
                            <td>{{ $matches->economy_rate_4_5 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_5_6')</th>
                            <td>{{ $matches->economy_rate_5_6 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_6_7')</th>
                            <td>{{ $matches->economy_rate_6_7 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_7_9')</th>
                            <td>{{ $matches->economy_rate_7_9 }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.economy_rate_above_9')</th>
                            <td>{{ $matches->economy_rate_above_9 }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.strike_rate_60_70')</th>
                            <td>{{ $matches->strike_rate_60_70 }}</td>
                        </tr><tr>
                            <th>@lang('quickadmin.fantasy.fields.strike_rate_50_60')</th>
                            <td>{{ $matches->strike_rate_50_60 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.strike_rate_below_50')</th>
                            <td>{{ $matches->strike_rate_below_50 }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.match_type')</th>
                            <td>{{ $matches->match_type }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.created_by')</th>
                            <td>{{ $name->name }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.fantasy.fields.created_at')</th>
                            <td>{{ $matches->created_at }}</td>
                        </tr>
						
						
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.fantasypoint.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop