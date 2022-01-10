@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->
@php($site=App\SiteSetting::findorfail(1))
   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> {{$site->site_name}} User Payment</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
     <h3 class="page-title">{{$site->site_name}} User Payment</h3>
    </div> 
   
   </div>
   

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Id</th>
                            <td>{{ $matches->id }}</td>
                        </tr>
						<tr>
                            <th>User Id</th>
                            <td>{{ $matches->user_id }}</td>
                        </tr>
						<tr>
                            <th>Amount</th>
                            <td>{{ $matches->payment_amount }}</td>
                        </tr>
						<tr>
                            <th>Payment Method</th>
                            <td>{{ $matches->payment_method }}</td>
                        </tr>
						{{--	<tr>
                            <th>Bank Name</th>
                            <td>{{ $matches->bank_name }}</td>
                        </tr>
						<tr>
                            <th>Address</th>
                            <td>{{ $matches->address }}</td>
                        </tr>  --}}
						<tr>
                            <th>Name</th>
                            <td>{{ $matches->name }}</td>
                        </tr>
						<tr>
                            <th>Email</th>
                            <td>{{ $matches->email }}</td>
                        </tr>
						<tr>
                            <th>Mobile</th>
                            <td>{{ $matches->mobile_no }}</td>
                        </tr>
						<tr>
                            <th>Transaction Id</th>
                            <td>{{ $matches->transaction_id }}</td>
                        </tr>
						{{--	<tr>
                            <th>Order Id</th>
                            <td>{{ $matches->order_id }}</td>
                        </tr>
						<tr>
                            <th>Card Number</th>
                            <td>{{ $matches->card_number }}</td>
                        </tr>  --}}
						<tr>
                            <th>Payment Status</th>
                            <td>{{ $matches->payment_status }}</td>
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

            <a href="{{ route('admin.fantasyuserpayment.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop