@extends('layouts.app')

@section('content')

<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">News</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
      <h3 class="page-title">News INDEXZ</h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
       @can('user_create')
       <p class="lr-add"><a href="{{ route('admin.news.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a></p>
       @endcan
    </div>     
   </div>
   <!-- breadcrumb section -->
   
  
@include('admin.flash')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body lr-table table-responsive">
            <table id="users" class="table table-bordered table-striped  dt-select">
                <thead>
                    <tr>
					{{--   @can('income_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
					--}}

                        <th>Title</th>
                        <th width="320px;">Description</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
				{{--       <tbody>
                    @if (count($incomes) > 0)
                        @foreach ($incomes as $income)
                            <tr data-entry-id="{{ $income->id }}">
                                @can('income_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $income->income_category->name or '' }}</td>
                                <td>{{ $income->entry_date }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>
                                    @can('income_view')
                                    <a href="{{ route('admin.incomes.show',[$income->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('income_edit')
                                    <a href="{{ route('admin.incomes.edit',[$income->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('income_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.incomes.destroy', $income->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody> --}}
            </table>
        </div>
    </div>
	
@stop





@section('javascript') 
    <script>
        @can('income_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.incomes.mass_destroy') }}';
        @endcan

    </script>
	
	
	<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.datatable.news') }}",
        "columns": [
		
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action',searchable:'false',targets: 'no-sort',
          orderable: 'false'},

        ],
		dom: 'Bfrtip',
        buttons: [
            
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});

</script>
	
	
@endsection
