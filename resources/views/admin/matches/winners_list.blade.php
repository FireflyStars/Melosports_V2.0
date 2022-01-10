@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Winner List</a></li>
       <li class="active">Contest</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Contest</h3>
    </div>     
   </div>
    
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
                       

                        <th>Name</th>
                        <th>Amount</th>
                        
                        <th>Rank</th>
                    </tr>
                </thead>
                
                <tbody>
              
                        @foreach ($winner as $contest_list)
						@php($player=App\User::findorfail($contest_list->user_id))
						  <tr>
                                <td>{{ $player->name }}</td>
								
								<td>{{$contest_list->amount}}</td>
								   
                               
								
                                
                                <td>{{ $contest_list->rank }}</td>
                            </tr>
                        @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>
	<a href="javascript:history.back()" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
@stop

@section('javascript') 
    <script>
        @can('income_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.incomes.mass_destroy') }}';
        @endcan

    </script>
@endsection