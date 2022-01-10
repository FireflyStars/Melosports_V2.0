
                                 
					@if($users->deposite_status ==0)			
					<a href="{{url('admin/withsms',[$users->id,$users->user_id]) }}" data-id="{{ $users->user_id }}" id="active" role="button" class="btn btn-large @if($users->deposite_status ==0) btn-default @else btn-warning @endif " data-toggle="modal" >Process  </a>
						@else			 
						<a href="#" class="btn btn-warning">Done</a>	
@endif					


<!-- active Deatcvive -->
<div id="myModalActive{{ $users->id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to @if($users->deposite_status ==0) Process @endif {{ $users->withdraw_amount }}?</p>
                <p class="text-warning"><small></small></p>
            </div>
			<form  method="post" action="{{url('admin/withdraw-process')}}">
   
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