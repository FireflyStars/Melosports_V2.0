@extends('layouts.app')

@section('content')
    <h3 class="page-title">Winners List</h3>
   
@include('admin.flash')
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table id="users" class="table table-bordered table-striped  dt-select">
                <thead>
                    <tr>
					{{--   @can('income_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan
					--}}
                        
                        <th>User Name</th>
                        <th>Match Id</th>
                        <th>Contest</th>
                        <th>Point</th>
                        <th>Rank</th>
                        <th>Amount</th>
                        <th>Date</th>
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
        "ajax": "{{ route('admin.datatable.winners') }}",
        "columns": [
		
            
            {data: 'user_name', name: 'user_name'},
            {data: 'match_id', name: 'match_id'},
            {data: 'contest_name', name: 'contest_name'},
            {data: 'points', name: 'points'},
            {data: 'rank', name: 'rank'},
            {data: 'prize_list', name: 'prize_list'},
            {data: 'match_date', name: 'match_date'},
           {data: 'action', name: 'action',searchable:'false'},
            

        ],
		dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                 columns: ':contains("Office")'
                }
            },
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});

</script>
	
	
@endsection
