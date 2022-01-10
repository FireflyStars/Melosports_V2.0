@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Contest Category</a></li>
       <li class="active">View</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Contest Category</h3>
    </div>     
   </div>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>
		

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 lr-table">
				 <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                       

                        <th>Contest Name</th>
                        <th>Winning Prize</th>
                        <th>Enterence Amount</th>
						<th>Team Length</th>
						{{--<th>No.of Winner</th>--}}
                    </tr>
                </thead>
                
				 <tbody>
              
                        @foreach ($category as $cat)
						
						  <tr>
                                <td>{{ $cat->name }}</td>
						        <td>{{ $cat->winning_pirze }}</td>
                                <td>{{ $cat->enterence_amount }}</td>
								<td>{{ $cat->contest_team_length }}</td>
									{{--<td>{{ $cat->no_winner }}</td> --}}
                            </tr>
                        @endforeach
                  
                </tbody>  
            </table>
                   
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contestcategory.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop