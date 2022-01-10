@extends('layouts.app')

@section('content')
<div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Publish Upcoming Matches</a></li>
       <li class="active">Contest</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Contest</h3>
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

                            <th>Contest Name</th>

                            <td>{{ $contest->name }}</td>

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

                            <th>Team Length</th>

                            <td>{{ $contest->contest_team_length }}</td>

                        </tr>
						<tr>

                            <th>No.of Winner</th>

                            <td>{{ $contest->no_winner }}</td>

                        </tr>
						
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

			 <a href="{{ route('admin.matches.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a> 
        </div>
    </div>
@stop