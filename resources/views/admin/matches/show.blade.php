@extends('layouts.app')

@section('content')
<div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Matches View</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.matches.title')</h3>
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
                            <th>@lang('quickadmin.matches.fields.series_id')</th>
                            <td>{{ $matches->series_name }}</td>
                        </tr>
						<tr>
                            <th>@lang('quickadmin.matches.fields.name')</th>
                            <td>{{ $matches->name }}</td>
                        </tr> 
						<tr>
                            <th>@lang('quickadmin.matches.fields.team_1')</th>
                            <td>{{ $matches->team_1 }}</td>
                        </tr> 
						<tr>
                            <th>@lang('quickadmin.matches.fields.team_2')</th>
                            <td>{{ $matches->team_2 }}</td>
                        </tr> 
						<tr>
                            <th>@lang('quickadmin.matches.fields.date')</th>
                            <td>{{ $matches->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.matches.fields.time')</th>
                            <td>{{ $matches->time }}</td>
                        </tr>
						<tr>
						    <th>@lang('quickadmin.matches.fields.contest')</th>
							<td>@for ($i = 0; $i <= contest_id.length; $i++) 
								{{ $matches->time }}
							   @endfor
								
							     </td>
					    </tr>
						
                       
                    </table>
                </div>
            </div>
			

            <p>&nbsp;</p>

            <a href="{{ route('admin.matches.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop