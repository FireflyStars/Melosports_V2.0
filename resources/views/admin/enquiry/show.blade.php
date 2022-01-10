@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Enquiry</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
     <h3 class="page-title">User Enquiry</h3>
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
                            <th>Name</th>
                            <td>{{ $matches->name }}</td>
                        </tr>
						<tr>
                            <th>Email</th>
                            <td>{{ $matches->email }}</td>
                        </tr>
						<tr>
                            <th>Mobile</th>
                            <td>{{ $matches->mobile }}</td>
                        </tr>
						<tr>
                            <th>Message</th>
                            <td>{{ $matches->message }}</td>
                        </tr>
						
						
						
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.userenquiry.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop