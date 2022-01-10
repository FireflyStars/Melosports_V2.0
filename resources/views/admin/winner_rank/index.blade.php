@extends('layouts.app')

@section('content')

 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">Winner Rank </li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
      <h3 class="page-title">Winner Rank </h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
     @can('series_create')
     <p class="lr-add">
        <a href="{{ route('admin.winner_rank.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
     </p>
     @endcan
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

                        <th>Winner Length</th>
                        <th>Rank </th>
                        <th>Amount</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                
				      <tbody>
                    @if (count($winners) > 0)
                        @foreach ($winners as $winner)
                            <tr data-entry-id="{{ $winner->id }}">
                                

                                <td>{{ $winner->team_length }}</td>
                               @php($rank=json_decode($winner->position))
							   <td> @for($j=0;$j<count($rank);$j++){{$rank[$j] }} , @endfor</td>
                                
								
								  @php($amount=json_decode($winner->rank_amount))
							   <td> @for($k=0;$k<count($amount);$k++){{$amount[$k] }} , @endfor</td>
                               
                                <td>
								{{-- @can('income_view')
                                    <a href="{{ route('admin.winner_rank.show',[$winner->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
								@endcan  --}}
                                    @can('income_edit')
                                    <a href="{{ route('admin.winner_rank.edit',[$winner->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('income_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.winner_rank.destroy', $winner->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody> 
            </table>
        </div>
    </div>
@stop

@section('javascript') 

                        
    <script>
        @can('income_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.winner_rank.mass_destroy') }}';
        @endcan

    </script>
		
	<script type="text/javascript">
/* $(document).ready(function() {
    oTable = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('admin.datatable.winner_rank') }}",
		
        "columns": [
		
            {data: 'name', name: 'name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action',searchable:'false',targets: 'no-sort',
          orderable: 'false'},

        ],
		dom: 'Bfrtip',
        buttons: [
		{{--  {
                extend: 'copyHtml5',
                exportOptions: {
                 columns: ':contains("Office")'
                }
		},--}}
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
}); */

</script>
	
	
@endsection
