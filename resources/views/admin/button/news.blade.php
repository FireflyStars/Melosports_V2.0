@can('user_view')
                                    <a href="{{ route('admin.news.show',[$users->id]) }}" class="btn btn-large btn-primary">@lang('quickadmin.qa_view')</a>
                                   @endcan
								   @can('user_view')
                                    <a href="{{ route('admin.news.edit',[$users->id]) }}" class="btn btn-large btn-info">@lang('quickadmin.qa_edit')</a>
                                 
								
				<!--	<a href="#myModalActive{{ $users->id }}" data-id="{{ $users->id }}" id="active" role="button" class="btn btn-large @if($users->is_active ==1) btn-default @else btn-warning @endif " data-toggle="modal" >@if($users->is_active ==1)Deactive @else Active @endif </a> -->
									 @endcan		
									@can('user_delete')
									<a href="#myModal{{ $users->id }}" data-id="{{ $users->id }}" id="delete" role="button" class="btn btn-large btn-danger" data-toggle="modal" >Delete</a>
									@endcan
									
								
								
									


	<!-- Delete -->										
<div id="myModal{{ $users->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to Delete {{ $users->title }}?</p>
                <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
            </div>
			<form  method="post" action="{{url('admin/news-delete')}}">
   
        <input type="hidden" name="delete_id" class="form-control" value="{{ $users->id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
   

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
				
            </div>
			</form>
        </div>
    </div>
</div>



<!-- active Deatcvive -->
<div id="myModalActive{{ $users->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to @if($users->is_active ==1) Deactive @else active @endif {{ $users->title }}?</p>
                <p class="text-warning"><small></small></p>
            </div>
			<form  method="post" action="{{url('admin/news-active')}}">
   
        <input type="hidden" name="active_id" class="form-control" value="{{ $users->id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
   

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
				
            </div>
			</form>
        </div>
    </div>
</div>									