@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->
@php($site=App\SiteSetting::findorfail(1))
   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">{{$site->site_name}} User Payment</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
     <h3 class="page-title">{{$site->site_name}} User Payment</h3> 
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
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Time</th>
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
        "ajax": "{{ route('admin.datatable.fantasyuserpayment') }}",
        "columns": [
		
            {data: 'user_id', name: 'user_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile_no', name: 'mobile_no'},
            {data: 'payment_amount', name: 'payment_amount'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'payment_status', name: 'payment_status'},
            {data: 'created_at', name: 'created_at'},
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
