@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->
@php($site=App\SiteSetting::findorfail(1))
   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">Users</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
      <h3 class="page-title"> {{$site->site_name}} Point System</h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
	{{-- @can('series_create')
       <p class="lr-add">
        <a href="{{ route('admin.fantasypoint.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a> 
       </p>
	@endcan  --}}
    </div>    
   </div>
  
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
                        <th>@lang('quickadmin.fantasy.fields.id')</th>
                        <th>@lang('quickadmin.fantasy.fields.match_type')</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
				
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
        "ajax": "{{ route('admin.datatable.fantasypoint') }}",
        "columns": [
		
            {data: 'id', name: 'id'},
            {data: 'match_type', name: 'match_type'},
           {data: 'action', name: 'action',searchable:'false'},
            

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
