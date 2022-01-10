@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Series</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.series.title')</h3>
    </div>    
   </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

		<?php
           $subd=substr("$series->created_at",0,10);
		?>
							
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 lr-table">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.series.fields.name')</th>
                            <td>{{ $series->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.series.fields.created_at')</th>
                            <td>{{ $subd }}</td>
                        </tr>
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.series.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop