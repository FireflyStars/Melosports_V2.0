@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Fantasy User Withdraw</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Fantasy User Withdraw</h3>
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
                            <th>User Id</th>
                            <td>{{ $matches->user_id }}</td>
                        </tr>
						<tr>
                            <th>User Name</th>
                            <td>{{ $name->name }}</td>
                        </tr>
						<tr>
                            <th>Withdraw Amount</th>
                            <td>{{ $matches->withdraw_amount }}</td>
                        </tr>
						<tr>
                            <th>Request Time</th>
                            <td>{{ $matches->withdraw_request_at }}</td>
                        </tr>
						<tr>
                            <th>Deposit Status</th>
                            <td>{{ $matches->deposite_status }}</td>
                        </tr>
						<tr>
                            <th>Deposited On</th>
                            <td>{{ $matches->deposited_on }}</td>
                        </tr>
						<tr>
                            <th>User Verification Status</th>
                            <td>{{ $matches->user_verification_status }}</td>
                        </tr>
						<tr>
                            <th>Created At</th>
                            <td>{{ $matches->created_at }}</td>
                        </tr>
						<tr>
                            <th>Updated At</th>
                            <td>{{ $matches->updated_at }}</td>
                        </tr>
						
						
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.fantasyuserwithdraw.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop