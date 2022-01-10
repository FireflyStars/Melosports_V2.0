@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.time-work-types.title')</h3>
    @can('time_work_type_create')
    <p>
        <a href="{{ route('admin.time_work_types.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($time_work_types) > 0 ? 'datatable' : '' }} @can('time_work_type_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('time_work_type_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.time-work-types.fields.name')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($time_work_types) > 0)
                        @foreach ($time_work_types as $time_work_type)
                            <tr data-entry-id="{{ $time_work_type->id }}">
                                @can('time_work_type_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $time_work_type->name }}</td>
                                <td>
                                    @can('time_work_type_view')
                                    <a href="{{ route('admin.time_work_types.show',[$time_work_type->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('time_work_type_edit')
                                    <a href="{{ route('admin.time_work_types.edit',[$time_work_type->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('time_work_type_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.time_work_types.destroy', $time_work_type->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('time_work_type_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.time_work_types.mass_destroy') }}';
        @endcan

    </script>
@endsection