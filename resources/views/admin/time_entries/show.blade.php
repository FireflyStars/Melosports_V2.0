@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-entries.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.time-entries.fields.work-type')</th>
                            <td>{{ $time_entry->work_type->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.time-entries.fields.project')</th>
                            <td>{{ $time_entry->project->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.time-entries.fields.start-time')</th>
                            <td>{{ $time_entry->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.time-entries.fields.end-time')</th>
                            <td>{{ $time_entry->end_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.time_entries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop