@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-entries.title')</h3>
    @can('time_entry_create')
    <p>
        <a href="{{ route('admin.time_entries.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($time_entries) > 0 ? 'datatable' : '' }} @can('time_entry_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('time_entry_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.time-entries.fields.work-type')</th>
                        <th>@lang('quickadmin.time-entries.fields.project')</th>
                        <th>@lang('quickadmin.time-entries.fields.start-time')</th>
                        <th>@lang('quickadmin.time-entries.fields.end-time')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($time_entries) > 0)
                        @foreach ($time_entries as $time_entry)
                            <tr data-entry-id="{{ $time_entry->id }}">
                                @can('time_entry_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $time_entry->work_type->name or '' }}</td>
                                <td>{{ $time_entry->project->name or '' }}</td>
                                <td>{{ $time_entry->start_time }}</td>
                                <td>{{ $time_entry->end_time }}</td>
                                <td>
                                    @can('time_entry_view')
                                    <a href="{{ route('admin.time_entries.show',[$time_entry->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('time_entry_edit')
                                    <a href="{{ route('admin.time_entries.edit',[$time_entry->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('time_entry_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.time_entries.destroy', $time_entry->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('time_entry_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.time_entries.mass_destroy') }}';
        @endcan

    </script>
@endsection