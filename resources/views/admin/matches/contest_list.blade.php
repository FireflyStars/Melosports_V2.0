@extends('layouts.app')

@section('content')
<div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Match</a></li>
       <li class="active">Match Contest</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
       <h3 class="page-title"> View</h3>
    </div>     
   </div>
   <!-- breadcrumb section -->
   
    @can('income_create')
	{{-- <p>
        <a href="{{ route('admin.incomes.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p> --}}
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body lr-table table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                       

                        <th>Contest Name</th>
                        <th>Winning Prize </th>
                        <th>Enterence Amount</th>
                        <th>Team Length</th>
                        <th>No.of Winner</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
              
                        @foreach ($contest as $contest_list)
						
						  <tr>
                                <td>{{ $contest_list->name }}</td>
                                <td>{{ $contest_list->winning_pirze }}</td>
                                <td>{{ $contest_list->enterence_amount }}</td>
                                <td>{{ $contest_list->contest_team_length }}</td>
                                <td>{{ $contest_list->no_winner }}</td>
                                <td>
								 
								  <a href="{{ url('admin/view-contest',[$match->unique_id,$contest_list->id]) }}" class="btn btn-xs btn-primary">View</a>
								  <a href="{{ url('admin/winners-list',[$match->unique_id,$contest_list->id]) }}" class="btn btn-xs btn-primary">Winners</a>
                                    
                                    
                                  
                                  
                                   {{--  @can('matches_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.incomes.destroy', $income->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
								@endcan --}}
                                </td>
                            </tr>
                        @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>
	<a href="{{ route('admin.matches.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
@stop

