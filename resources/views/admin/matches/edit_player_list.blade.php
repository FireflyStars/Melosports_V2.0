@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.matches.title')</h3>
 
 


	  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
		
      
        <div class="panel-body">
<form class="form-horizontal" method="post" action="{{url('admin/player_edit_post')}}">
{{ csrf_field() }}
<div class="row">
        <div class="form-group">
        <label class="col-sm-3">player name</label>
        
		
		<label class="col-sm-3">Team name</label>
        
        
		
        <label class="col-sm-3">player Role</label>
       
       
		
        <label class="col-sm-3">player credit</label>
       
        </div>
   </div>
   
@foreach($player_details as $play)
    <div class="row">
        <div class="form-group">
        <input type="hidden" name="player_id[]" value="{{$play->player_id}}">
        <div class="col-sm-3"><input type="text" name="player_name[]" class="form-control" readonly value="{{$play->player_name}}" /></div> 
        <div class="col-sm-3"><input type="text"  class="form-control" readonly value="{{$play->player_team_name}}" /></div> 
         
		
        
        <div class="col-sm-3">  
		<select class="form-control" name="player_role[]">
		@foreach($player_role as $role)
<option value="{{$role->player_role}}" @if($role->player_role==$play->player_role) selected @endif>{{$role->player_role}}</option>
@endforeach

</select>

{{-- <input type="text" class="form-control" value="{{$play->player_role}}"/>  --}}

</div>
       
        
        <div class="col-sm-3"><input type="text" name="player_credit[]" class="form-control" value="{{$play->credit_point}}"/></div>
        </div>
   </div>
   <br>
  @endforeach
     <input type="hidden" name="unique_id" value="{{$unique_id}}">
	 <div style="float:right">
	 <button class="btn btn-sm btn-danger">Submit</button>
	 </div>
</form>

</div>
</div>

@stop