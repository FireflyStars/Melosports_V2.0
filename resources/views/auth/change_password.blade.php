@extends('layouts.app')

@section('content')
 <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">Change Password</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Change password</h3>
    </div> 
   
   </div>
   

    @if(session('success'))
        <!-- If password successfully show message -->
        <div class="row">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @else
        {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
        <!-- If no success message in flash session show change password form  -->
        <div class="panel panel-default">
            <div class="panel-heading">
              
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('current_password', 'Current password*', ['class' => 'control-label']) !!}
                        {!! Form::password('current_password', ['class' => 'form-control','required'=>'required','placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('current_password'))
                            <p class="help-block">
                                {{ $errors->first('current_password') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('new_password', 'New password*', ['class' => 'control-label']) !!}
                        {!! Form::password('new_password', ['class' => 'form-control','required'=>'required', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('new_password'))
                            <p class="help-block">
                                {{ $errors->first('new_password') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                        {!! Form::label('new_password_confirmation', 'New password confirmation*', ['class' => 'control-label']) !!}
                        {!! Form::password('new_password_confirmation', ['class' => 'form-control','required'=>'required', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('new_password_confirmation'))
                            <p class="help-block">
                                {{ $errors->first('new_password_confirmation') }}
                            </p>
                        @endif
                    </div>
                </div>

				 {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger save','id'=>'save']) !!}   
				
				
        {!! Form::close() !!}
            </div>
        </div>

       
    @endif		
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script>
	
	/* $('.save').click(function() 
	{					
	alert('Demo user doesnt have permission to change password');	
	return false;
	});
	 */
	
	</script>	
@stop

