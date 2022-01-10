

                                 

							
@if($users->pt_status==0)
					
					<a href="#myModalActive{{ $users->withdraw_id }}" data-id="{{ $users->user_id }}" id="accept" role="button" class="btn btn-large  btn btn-large btn-info  " data-toggle="modal" >  Accept  </a>


<a href="#myModalDecline{{ $users->withdraw_id }}" data-id="{{ $users->user_id }}" id="decline" role="button" class="btn btn-large btn-danger" data-toggle="modal" >  Decline  </a>
@elseif($users->pt_status==1)
<a href="#" class="btn btn-large  btn btn-large btn-info" >Accepted</a>
@else
<a href="#" class="btn btn-large btn-danger" >Declined</a>@endif

					





<!-- active Deatcvive -->

<div id="myModalActive{{ $users->withdraw_id }}" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Confirmation</h4>

            </div>

            <div class="modal-body">

                <p>Are you sure to accept the withdrawal?</p>

                <p class="text-warning"><small></small></p>

            </div>

			<form  method="post" action="{{url('admin/pt_withdrawal_post')}}">

   

        <input type="hidden" name="active_id" class="form-control" value="{{ $users->withdraw_id }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

   



            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                <button type="submit" class="btn btn-primary">Yes</button>

				

            </div>

			</form>

        </div>

    </div>

</div>			



<!-- Decline -->


<div id="myModalDecline{{ $users->withdraw_id }}" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Confirmation</h4>

            </div>

            <div class="modal-body">

                <p>Are you sure to decline the withdrawal?</p>

                <p class="text-warning"><small></small></p>

            </div>

			<form  method="post" action="{{url('admin/pt_withdrawal_decline')}}">

   

        <input type="hidden" name="active_id" class="form-control" value="{{ $users->withdraw_id }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

   



            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                <button type="submit" class="btn btn-primary">Yes</button>

				

            </div>

			</form>

        </div>

    </div>

</div>								