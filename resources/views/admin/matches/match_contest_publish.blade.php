@extends('layouts.app')

@section('content')
<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">	
	 <?php $site=App\SiteSetting::findorfail(1) ?>
       <li><a href="#"><i class="fa fa-home"></i> {{$site->site_name}}  Point System</a></li>
       <li class="active">Match</li>
     </ul>
   </div> 

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.matches.title')</h3>
    </div>     
   </div>
   <!-- breadcrumb section -->
    
 <!--  {!! Form::open(['method' => 'POST', 'action' => ['Admin\MatchController@insert_regular_contest']]) !!} -->
  {!! Form::open(['method' => 'POST', 'action' => ['Admin\MatchnewController@insert_regular_contest']]) !!} 


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
		<div class="row">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Series*', ['class' => 'control-label']) !!}
		            <select name="series" class ="form-control">
        @foreach($series as $cat)
        <option value="{{$cat->id}}">{{ $cat->name }}</option>
        @endforeach
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('series'))
                        <p class="help-block">
                            {{ $errors->first('series') }}
                        </p>
                    @endif
                </div>
            </div>
		<div class="row">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Select Contest*', ['class' => 'control-label']) !!}
		            <select name="contest_type" id ="contest_type" class ="form-control">
       
        <option value="regular">Regular</option>
        <option value="customize">Customize</option>
       
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('contest_type'))
                        <p class="help-block">
                            {{ $errors->first('contest_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
			<div class="row" id="set-category">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Category*', ['class' => 'control-label']) !!}
		            <select name="contest_category" class ="form-control">
        @foreach($category as $cat)
		
        <option value="{{$cat->id}}" @if(Input::old('contest_category') == $cat->id) selected @else @endif>{{ $cat->contest_category }}</option>
	
      

        @endforeach
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('contest_category'))
                        <p class="help-block">
                            {{ $errors->first('contest_category') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			       
				     <input type="hidden" name="unique_id" value="{{$unique_id}}"> 
				     <input type="hidden" name="date" value="{{$date}}"> 
				     <input type="hidden" name="team_1" value="{{$team_1}}"> 
		             <input type="hidden" name="team_2" value="{{$team_2}}"> 
		             <input type="hidden" name="match_type" value="{{$type}}"> 

		
           
           
		
		</div>
    </div>																									

	<div id="submit">
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
  	</div>
  {!! Form::close() !!}
  
  
  
   
	
	
	
	<!-- contest-create -->
	<div id="create-contest" class="hidden">
	
	
	<div class="panel panel-default">
        <div class="panel-heading">
           Create Contest
        </div>
	
		 <form method="post" action="{{URL::to('admin/insert-customize-contest_new')}}" class="submit" id="cust">
								 <input type="hidden" name="_token" value="{{csrf_token()}}">
		                             <meta name="csrf-token" content="{{ csrf_token() }}" />						 
								 <input type="hidden" name="unique_id" value="{{$unique_id}}"> 
				     <input type="hidden" name="date" value="{{$date}}"> 
				       <input type="hidden" name="team_1" value="{{$team_1}}"> 
		  <input type="hidden" name="team_2" value="{{$team_2}}"> 
		  <input type="hidden" name="match_type" value="{{$type}}"> 
	   <div class="panel-body">
            
			<div class="row">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Series*', ['class' => 'control-label']) !!}
		            <select name="series" class ="form-control">
        @foreach($series as $cat)
		
        <option value="{{$cat->id}}" @if(Input::old('series') == $cat->id) selected @else @endif>{{ $cat->name }}</option>
	
      

        @endforeach
      </select>
                    <p class="help-block"></p>
                    @if($errors->has('series'))
                        <p class="help-block">
                            {{ $errors->first('series') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Contest Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('contest_name', old('contest_name'),  ['class' => 'form-control ', 'placeholder' => 'Enter Contest Name','required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div> 
			
			 <label> Practise Contest: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_practise_contest"  id="pratise_yes" class="flat-red" value="1" required >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_practise_contest" id="pratise_no" class="flat-red" value="0" required>
                </label>
              </div>
              </div> 
			<div id="pay">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('winning_prize', 'Winning Prize*', ['class' => 'control-label']) !!}
                    {!! Form::number('winning_pirze', old('winning_pirze'), ['class' => 'form-control ', 'placeholder' => 'Enter Winning Prize','required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('winning_prize'))
                        <p class="help-block">
                            {{ $errors->first('winning_prize') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enterence_amount', 'Enterence Credit*', ['class' => 'control-label']) !!}
                    {!! Form::number('enterence_amount', old('enterence_amount'), ['class' => 'form-control ', 'placeholder' => 'Enter Enterence Amount','required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enterence_amount'))
                        <p class="help-block">
                            {{ $errors->first('enterence_amount') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('no_winner', 'Number Of Winner*', ['class' => 'control-label']) !!}
                    {!! Form::number('no_winner', old('no_winner'), ['class' => 'form-control ', 'placeholder' => 'Enter Number Of Winner','required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('no_winner'))
                        <p class="help-block">
                            {{ $errors->first('no_winner') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('total_amt', 'Total Amount*', ['class' => 'control-label']) !!}
                    {!! Form::number('total_amt', old('total_amt'), ['class' => 'form-control ', 'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('total_amt'))
                        <p class="help-block">
                            {{ $errors->first('total_amt') }}
                        </p>
                    @endif
                </div>
            </div>
			</div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contest_team_length', 'Team Length*', ['class' => 'control-label']) !!}
                    {!! Form::number('contest_team_length', old('contest_team_length'), ['class' => 'form-control ','required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contest_team_length'))
                        <p class="help-block">
                            {{ $errors->first('contest_team_length') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			
           
		    <label>Recommended: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_recommended" class="flat-red" value="1" required >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_recommended" class="flat-red" value="0" required>
                </label>
              </div>
              </div>
			  
			   <label> Multi Entry: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_multi_entry" class="flat-red" value="1" required >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_multi_entry" class="flat-red" value="0" required>
                </label>
              </div>
              </div>
			  
			   <label> Confirm Contest: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_confirm_contest" class="flat-red" value="1" required >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_confirm_contest" class="flat-red" value="0" required>
                </label>
              </div>
              </div>
            
			<div id="group">
			<div class="row">
                <div class="col-xs-6 form-group">
                    <label for="subject_name" class="control-label">Rank</label>
			  <input class="form-control" placeholder="" name="rank[]" type="text">
			<p class="help-block"></p>
                                    </div>
				 <div class="col-xs-4 form-group">
                    <label for="amount" class="control-label">Prize Amount</label>
			  <input class="form-control" placeholder="" name="rank_amount[]" type="number">
			<p class="help-block"></p>
                                    </div>
				
            </div>
			</div>
			<div class="btn btn-info" id="add">Add</div>
            
			
        </div>
		</form>
        </div>
		<div class="btn btn-info" id="cut-submit">Add Contest</div>
        

	<!-- end -->
 
	</div>
	<br><br>
	<div id="content">
	
	</div>
	
	<div id='error'></div>
	<div id='success'></div>
	
	
	
	<div align="right" id="save-all" class="hidden">
	 <form method="post" action="{{URL::to('admin/save-customize-contest_new')}}" class="submit" id="cust">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="unique_id" value="{{$unique_id}}"> 
				     <input type="hidden" name="date" value="{{$date}}"> 
				       <input type="hidden" name="team_1" value="{{$team_1}}"> 
		  <input type="hidden" name="team_2" value="{{$team_2}}"> 
		  <input type="hidden" name="match_type" value="{{$type}}"> 
		
					 
				<button class="btn btn-info" >Save All Contest</button>	 
					 </form>
	</div>
@stop


 <style>
.error-msg{
   background-color: #FF0000;
}
</style> 
@section('javascript')
    @parent
	<!-- Auto calc for team length -->	
	<script>
	$(document).ready(function() {
		
    $('input[name=winning_pirze],input[name=enterence_amount]').change(function(e) {
		
		//Calculating Amount from credit point
		
        var credit = $('input[name=enterence_amount]').val();
		
		var amt = parseInt(credit/10);
		
		
		//Calculating Team Length
		
	     var win = $('input[name=winning_pirze]').val();
		
      var tl = parseInt((win/amt)+((win/amt)*0.2));
	  
	  //Calculating Total Amount
	  var totalamt = parseInt(amt*tl)
	  
	  
        //update the row total
       $('input[name=contest_team_length]').val(tl);
       $('input[name=total_amt]').val(totalamt);

        
       
    });
});


	</script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
		
    </script>
	
	<script type="text/javascript">
$("#cut-submit").click(function() {
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

var series= $("input[name='series']").val();
var contest_name= $("input[name='contest_name']").val();
var is_practise_contest= $("input[name='is_practise_contest']").val();
var contest_team_length= $("input[name='contest_team_length']").val();
var is_recommended= $("input[name='is_recommended']").val();
var is_multi_entry= $("input[name='is_multi_entry']").val();
var is_confirm_contest= $("input[name='is_confirm_contest']").val();

if (series == '' || contest_name == '' || is_practise_contest == '' || contest_team_length == '' || is_recommended == '' || is_confirm_contest == '') {
   var errName = $("#error"); //Element selector
   errName.html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Please Fill All Require Value </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
}
else {
	//alert("Mahi");
$.ajax({
      url: 'insert-customize-contest_new',
    type: 'POST',
   // data: {_token: CSRF_TOKEN},
   
	data:$('#cust').serialize(),
    dataType: 'html',
    success: function (content) {
		
			$('#content').html(content);
			$('#cust')[0].reset();
			
			  var successName = $("#success"); //Element selector
   successName.html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>Contest Added Successfully </div>').delay(10000).fadeOut(); // Put the message content inside div
   //errName.addClass('error-msg'); //add a class to the element
                  
    },
            error: function(xhr, status, text) {
                $("#content").text(text);
				
				
            }
});
}
});
</script>
	
	
	
	
	<script type="text/javascript">
   $(function() {
    $('#add-contest').hide(); 
    $('#contest_type').change(function(){
        if($('#contest_type').val() == 'regular') {
			 $("#create-contest").addClass("hidden");
            $('#submit').show();
            $('#set-category').show();
        } 
		else {
           // $('#create-contest').show(); 
		   $("#create-contest").removeClass("hidden");
            $('#submit').hide(); 
			 $('#set-category').hide();
			 $("#clickMe").removeClass("hidden");
                $("#add-form").removeClass("hidden");
                $("#save-all").removeClass("hidden");
        } 
    });
	
});
</script>

	<script type="text/javascript">
    $(function () {
        $("input[name='is_practise_contest']").click(function () {
            if ($("#pratise_no").is(":checked")) {
                $("#pay").show();
                $("#group").show();
                $("#add").show();
               
            } else {
                $("#pay").hide();
                $("#group").hide();
                $("#add").hide();
               
            }
        });
    });
</script>

<script>
$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $("#group"); //Fields wrapper
    var add_button      = $("#add"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			
            $(wrapper).append('<div><div class="row"><div class="col-xs-6 form-group"> <label for="subject_name" class="control-label">Rank</label><input class="form-control" placeholder="" name="rank[]" type="text"><p class="help-block"></p> </div> <div class="col-xs-4 form-group"><label for="amount" class="control-label">Prize Amount</label><input class="form-control" placeholder="" name="rank_amount[]" type="number"><p class="help-block"></p></div><div class="btn btn-primary remove_field">Remove</div></div></div>'); //add input box
       }
    });
  
 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
   
});

</script>

	
<script>
$(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $("#create-contest"); //Fields wrapper
    var add_button      = $("#add-form"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			
            $(wrapper).append('<div><div class="panel panel-default"><div class="panel-heading">Create Contest</div> <div class="panel-body"><div class="row"><div class="col-xs-12 form-group"> {!! Form::label('name', 'Contest Name*', ['class' => 'control-label']) !!}{!! Form::text('name[]', old('name'), ['class' => 'form-control ', 'placeholder' => 'Enter Contest Name']) !!} <p class="help-block"></p>@if($errors->has('name'))<p class="help-block">{{ $errors->first('name') }}</p>@endif</div> </div> <label> Practise Contest: </label><div class="row"><div class="col-xs-2 form-group"><label>Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="is_practise_contest[]"  id="pratise_yes" class="flat-red" value="1" required ></label></div><div class="col-xs-2 form-group"><label>No &nbsp;&nbsp;&nbsp;<input type="radio" name="is_practise_contest[]" id="pratise_no" class="flat-red" value="0" required> </label> </div></div><div id="pay"><div class="row"><div class="col-xs-12 form-group"> {!! Form::label('winning_prize', 'Winning Prize*', ['class' => 'control-label']) !!}{!! Form::number('winning_prize[]', old('winning_prize'), ['class' => 'form-control ', 'placeholder' => 'Enter Winning Prize']) !!} <p class="help-block"></p> @if($errors->has('winning_prize')) <p class="help-block">{{ $errors->first('winning_prize') }} </p>@endif</div></div><div class="row"><div class="col-xs-12 form-group">{!! Form::label('enterence_amount', 'Enterence Amount*', ['class' => 'control-label']) !!}{!! Form::number('enterence_amount[]', old('enterence_amount'), ['class' => 'form-control ', 'placeholder' => 'Enter Enterence Amount']) !!}<p class="help-block"></p>@if($errors->has('enterence_amount')) <p class="help-block">{{ $errors->first('enterence_amount') }} </p>@endif</div></div><div class="row"> <div class="col-xs-12 form-group"> {!! Form::label('no_winner', 'Number Of Winner*', ['class' => 'control-label']) !!} {!! Form::number('no_winner[]', old('no_winner'), ['class' => 'form-control ', 'placeholder' => 'Enter Number Of Winner']) !!}<p class="help-block"></p>@if($errors->has('no_winner'))<p class="help-block">{{ $errors->first('no_winner') }}</p>@endif </div></div></div><div class="row"><div class="col-xs-12 form-group">{!! Form::label('contest_team_length', 'Team Length*', ['class' => 'control-label']) !!}{!! Form::number('contest_team_length[]', old('contest_team_length'), ['class' => 'form-control ', 'placeholder' => 'Enter Team Length']) !!}<p class="help-block"></p> @if($errors->has('contest_team_length'))<p class="help-block">{{ $errors->first('contest_team_length') }}</p>@endif</div></div><label>Recommended: </label><div class="row"><div class="col-xs-2 form-group"><label>Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="is_recommended[]" class="flat-red" value="1" required ></label></div> <div class="col-xs-2 form-group"><label>No &nbsp;&nbsp;&nbsp;<input type="radio" name="is_recommended[]" class="flat-red" value="0" required></label></div></div><label> Multi Entry: </label><div class="row"> <div class="col-xs-2 form-group"> <label>Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="is_multi_entry[]" class="flat-red" value="1" required ></label></div><div class="col-xs-2 form-group"><label>No &nbsp;&nbsp;&nbsp;<input type="radio" name="is_multi_entry[]" class="flat-red" value="0" required></label></div></div><label> Confirm Contest: </label><div class="row"><div class="col-xs-2 form-group"><label>Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="is_confirm_contest[]" class="flat-red" value="1" required ></label></div><div class="col-xs-2 form-group"><label>No &nbsp;&nbsp;&nbsp;<input type="radio" name="is_confirm_contest[]" class="flat-red" value="0" required</label></div></div><div id="group"><div class="row"><div class="col-xs-6 form-group"> <label for="subject_name" class="control-label">Rank</label><input class="form-control" placeholder="" name="rank[][]" type="text"><p class="help-block"></p></div><div class="col-xs-4 form-group"><label for="amount" class="control-label">Prize Amount</label><input class="form-control" placeholder="" name="rank_amount[][]" type="number"><p class="help-block"></p></div> </div></div><div class="btn btn-info" id="add">Add</div></div></div></div>'); //add input box
       }
    });
  
 $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
   
});

</script>	
	
	
	<script>
	$("#clickMe").click(function () {
    $(".submit").trigger('submit'); // should show 3 alerts (one for each form submission)
});
</script>
	   
@stop