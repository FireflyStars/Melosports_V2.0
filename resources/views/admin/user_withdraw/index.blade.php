@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->
@php($site=App\SiteSetting::findorfail(1))
   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">{{$site->site_name}} User Withdraw</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
     <h3 class="page-title">{{$site->site_name}} User Withdraw</h3>
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
                        <th>Withdraw Amount</th>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <th>Account Number</th>
                        <th>IFSC Code</th>
                        <th>Request Time</th>
                        <th>Withdraw Date</th>
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
        "ajax": "{{ route('admin.datatable.fantasyuserwithdraw') }}",
        "columns": [
		
            {data: 'user_id', name: 'user_id'},
            {data: 'name', name: 'name'},
            {data: 'withdraw_amount', name: 'withdraw_amount'},
            {data: 'bank_name', name: 'bank_name'},
            {data: 'branch_name', name: 'branch_name'},
            {data: 'bank_acc_no', name: 'bank_acc_no'},
            {data: 'ifsc_code', name: 'ifsc_code'},
            {data: 'withdraw_request_at', name: 'withdraw_request_at'},
            {data: 'deposited_on', name: 'deposited_on'},
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
