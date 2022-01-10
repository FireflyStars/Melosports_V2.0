@extends('layouts.app')

@section('content')
    <h3 class="page-title">Winner List</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>

                            <th>User Name</th>

                            <td>{{ $matches->user_name }}</td>

                        </tr>
						<tr>

                            <th>Match Id</th>

                            <td>{{ $matches->match_id }}</td>

                        </tr>
						<tr>

                            <th>Contest</th>

                            <td>{{ $matches->contest_name }}</td>

                        </tr>
						<tr>

                            <th>Amount</th>

                            <td>{{ $matches->prize_list }}</td>

                        </tr>
						<tr>

                            <th>Date</th>

                            <td>{{ $matches->match_date }}</td>

                        </tr>
						<tr>

                            <th>Points</th>

                            <td>{{ $matches->points }}</td>

                        </tr>
						<tr>

                            <th>Rank</th>

                            <td>{{ $matches->rank }}</td>

                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.winners.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop