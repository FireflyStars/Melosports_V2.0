@extends('layouts.app')

@section('content')

<div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">FAQ</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6 lr-title-user">
       <h3 class="page-title">Testimonial</h3>
    </div> 

    <div class="col-md-6 col-sm-6 col-xs-6 lr-add_new clearfix">
      <p class="lr-add"> <a href="{{ route('admin.testimonials.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>  </p>
    </div>     
   </div>
   <!-- breadcrumb section -->

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list') 
        </div>

        <div class="panel-body lr-table table-responsive">
            <table class="table table-bordered table-striped {{ count($user) > 0 ? 'datatable' : '' }} @can('user') dt-select @endcan">
                <thead>
                    <tr>
                        @can('users_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>Name</th>
                        <th>Testimonial</th>
                  
                        <th width="400px">&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($user) > 0)
                        @foreach ($user as $users)
                            <tr data-entry-id="{{ $users->id }}">
                                @can('users_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $users->name }}</td>
                                <td>{!! $users->description !!}</td>
                            
                                <td style="width:400px;">
                                   
                                    <a href="{{ route('admin.testimonials.show',[$users->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                  
                                    
                                    <a href="{{ route('admin.testimonials.edit',[$users->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    
                                   
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.testimonials.destroy', $users->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    
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
        @can('users_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.testimonials.mass_destroy') }}';
        @endcan

    </script>
@endsection