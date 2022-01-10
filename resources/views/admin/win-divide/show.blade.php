@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Winner Divide Contest</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.contest.title')</h3>
    </div> 
   
   </div>
  
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>
<?php
                           $subd=substr("$contest->created_at",0,10);
							?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contest.fields.name')</th>
                            <td>{{ $contest->name }}</td>
                        </tr>
						<tr>
                            <th>Contest Category</th>
                            <td>{{ $contest->contest_category }}</td>
                        </tr>
						<tr>
                            <th>Match Name</th>
                            <td>{{ $contest->match_name }}</td>
                        </tr>
						<tr>
                            <th>Type</th>
                            <td>{{ $contest->type }}</td>
                        </tr>
						<tr>
                            <th>Match Date</th>
                            <td>{{ $contest->match_date }}</td>
                        </tr>
						<tr>
                            <th>Winning Prize</th>
                            <td>{{ $contest->winning_pirze }}</td>
                        </tr>
						<tr>
                            <th>Enterence Amount</th>
                            <td>{{ $contest->enterence_amount }}</td>
                        </tr>
						<tr>
                            <th>Contest Team Length</th>
                            <td>{{ $contest->contest_team_length }}</td>
                        </tr>
						<tr>
                            <th>No Of Winners</th>
                            <td>{{ $contest->no_winner }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contest.fields.created_at')</th>
                            <td>{{ $subd }}</td>
                        </tr>
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.winner_divide.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop