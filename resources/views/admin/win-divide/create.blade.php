@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Winner Divide Contest</a></li>
       <li class="active">Add</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.contest.title')</h3>
    </div> 
   
   </div>
  
    {!! Form::open(['method' => 'POST', 'route' => ['admin.winner_divide.store']]) !!}

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
		
		
		<div id="credit_error" style="display:none">
					<p style="color:red">Enterance credit cannot be 0.Please change your no of team or winning amount.</p>
					
					</div>
		
		<div class="row">
		
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="col-xs-12 form-group">
				{!! Form::label('name', 'Contest Category*', ['class' => 'control-label']) !!}
		            <select name="category_id" class ="form-control">
        @foreach($category as $cat)
        <option value="{{$cat->id}}">{{ $cat->contest_category }}</option>
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
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Contest Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => 'Enter Contest Name','Pattern'=>'[a-zA-Z0-9]+']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div> 
			
			
			<div id="pay">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('winning_prize', 'Winning Prize*', ['class' => 'control-label']) !!}
                    {!! Form::number('winning_pirze', old('winning_pirze'), ['class' => 'form-control ','required'=>'required','id'=>'w_prize','placeholder' => 'Enter Winning Prize']) !!}
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
                    {!! Form::label('contest_team_length', 'No of Teams *', ['class' => 'control-label']) !!}
                    {!! Form::number('contest_team_length', old('contest_team_length'), ['class' => 'form-control ', 'id'=>'t_length','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contest_team_length'))
                        <p class="help-block">
                            {{ $errors->first('contest_team_length') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
			<div class="row">
                <div class="col-xs-12 form-group">
                   
				   <label>Select Winner Length</label>
				   <select name="winner_length" class="form-control" id="winner" required>
					
					<option value="">Select Winner Length </option>
					@foreach($winner as $win)
					<option value="{{$win->id}}">{{$win->team_length}} </option>@endforeach
					
					</select>
					
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enterence_amount', 'Enterance Credit*', ['class' => 'control-label']) !!}
                    {!! Form::number('enterence_amount', old('enterence_amount'), ['class' => 'form-control ','id'=>'e_credit','readonly'=>'readonly','placeholder' => 'Enter Enterence Credit']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('enterence_amount'))
                        <p class="help-block">
                            {{ $errors->first('enterence_amount') }}
                        </p>
                    @endif
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
			  
			
			  <label> Mega Contest: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="mega_contest" class="flat-red" value="1" required >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="mega_contest" class="flat-red" value="0" required>
                </label>
              </div>
              </div>
			  
			  
			  @php($pt=App\SiteSetting::findorfail(1))			
					
				
					<input type="hidden" name="pt" id="point"  value="{{$pt->user_pts}}">
            
			<div id="group">
			
			{{-- <div class="row">
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
				
            </div>  --}}
			
			
			
			
			
			
			
			
			
			</div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6"> 
              
               
<button type="submit" id="c_sub" class="btn btn-danger" >Save</button>	

			   {!! Form::close() !!}
              </div>

			  {{--  <div class="col-md-6 col-sm-6 col-xs-6"> 
                 <div class="btn btn-info pull-right" id="add">Add</div>
              </div>   --}} 
            </div>

        </div>
    </div>
	 @php($SiteSetting_admin=App\SiteSetting::findorfail(1))
@stop

@section('javascript')
    @parent

<!-- Auto calc for team length -->	 
	<script>
/* 	$(document).ready(function() {
		
    $('input[name=winning_pirze],input[name=enterence_amount]').change(function(e) {
		
		//Calculating Amount from credit point
		
        var credit = $('input[name=enterence_amount]').val();
		
		var amt = parseInt(credit/<?php echo $SiteSetting_admin->user_pts; ?>);
		
		
		//Calculating Team Length
		
	     var win = $('input[name=winning_pirze]').val();
		
      var tl = parseInt((win/amt)+((win/amt)*0.2));
	  
	  //Calculating Total Amount
	  var totalamt = parseInt(amt*tl)
	  
	  
        //update the row total
       $('input[name=contest_team_length]').val(tl);
       $('input[name=total_amt]').val(totalamt);

        
       
    });
}); */


	</script>
	
	
	
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>
	<script type="text/javascript">
    $(function () {
        $("input[name='is_practise_contest']").click(function () {
            if ($("#pratise_no").is(":checked")) {
                $("#pay").show();
                $("#group").show();
                $("#add").show();				 $('input[name=total_amt]').val(0);
            } else {
                $("#pay").hide();
                $("#group").hide();
                $("#add").hide();				 $('input[name=total_amt]').val(0);
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
  $(function () {
    //Initialize Select2 Elements
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<script>	
						$('#w_prize,#t_length').keyup(function(){
					
						var price=$('#w_prize').val();					
						var length=$('#t_length').val();				
						var pt_price=$('#point').val();					
						amt=parseInt(price)*20/100;						
						c_amt=parseInt(price)+parseInt(amt);			
						credit=parseInt(c_amt)/parseInt(length);		
						e_credit=parseInt(credit)*parseInt(pt_price);	
						if(isNaN(e_credit))				
							{							
						$('#e_credit').val(0);			
						}
						else	
							{	
						$('#e_credit').val(e_credit);	
						}
							if($('#e_credit').val()>0)
							{
							
							$('#credit_error').hide();
							$("#c_sub").attr("disabled", false);
							
							} else{
							
							
							$('#credit_error').show();
							$("#c_sub").attr("disabled", true);
							
							}




						
						});								
						
						
						$("#winner").change(function(){
							var s_value=$(this).val();	
							//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');			
							$.ajax({              
							url:"{{url('admin/ajax_rank')}}",        
							type: 'POST',                  
							data: {			
							rank_id: s_value,	
							"_token": $('#token').val(),	
							},                 
							success: function (content) {	
							$('#group').html(content);       
							}								
							});						
							});					
							</script>		
					


@stop