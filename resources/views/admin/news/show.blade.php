@extends('layouts.app')

@section('content')
<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> News</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
       <h3 class="page-title">News View</h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
       @can('user_create')
       <p class="lr-add"><a href="{{ route('admin.news.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a></p>
       @endcan
    </div>     
   </div>
   <!-- breadcrumb section -->
   
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>
    <?php
       $subd=substr("$news->created_at",0,10);
	 ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Title</th>
                            <td>{{ $news->title }}</td>
                        </tr>
						<tr>
                            <th>Description</th>
                            <td>{{ $news->description }}</td>
                        </tr>
						
                        <tr>
                            <th>@lang('quickadmin.news.fields.created_at')</th>
                            <td>{{ $subd }}</td>
                        </tr>
                       
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.news.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop