@extends('layouts.app')

@section('content')

    <!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Contest</a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">@lang('quickadmin.contest.title')</h3>
    </div> 
   
   </div>
   
    
    {!! Form::model($contest, ['method' => 'PUT', 'route' => ['admin.contest.update', $contest->id]]) !!}

	
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
					{!! Form::label('name', 'Contest Category*', ['class' => 'control-label']) !!}
					<select name="category_id" class ="form-control">
					@foreach($contest1 as $cat)
					{{--<option value="{{$cat->id}}">{{ $cat->contest_category }}</option>--}}
					<option value="{{$cat->id}}" @if($cat->id==$contest->category_id)selected @endif >{{ $cat->contest_category }}</option>
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
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => 'Enter Contest Name']) !!}
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
                <input type="radio" name="is_practise_contest"  id="pratise_yes" class="flat-red" value="1" required @if($contest->is_practise_contest ==1)checked @endif>
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_practise_contest" id="pratise_no" class="flat-red" value="0" required @if($contest->is_practise_contest ==0)checked @endif>
                </label>
              </div>
<!-- 
              <div class="col-md-3 col-sm-3 col-xs-4 form-group">
                <div class="radio">
                  <input id="radio-1" name="radio" type="radio" checked>
                  <label for="radio-1" class="radio-label">Yes</label>
                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-4 form-group">
               <div class="radio">
                <input id="radio-2" name="radio" type="radio">
                <label  for="radio-2" class="radio-label">Unchecked</label>
               </div>
              </div> -->
              
             </div>
			<div id="pay">
			<div class="row">
              <div class="col-xs-12 form-group">
                    {!! Form::label('winning_prize', 'Winning Prize*', ['class' => 'control-label']) !!}
                    {!! Form::number('winning_pirze', old('winning_pirze'), ['class' => 'form-control ', 'placeholder' => 'Enter Winning Prize']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('winning_pirze'))
                        <p class="help-block">
                            {{ $errors->first('winning_pirze') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('enterence_amount', 'Enterance Amount*', ['class' => 'control-label']) !!}
                    {!! Form::number('enterence_amount', old('enterence_amount'), ['class' => 'form-control ', 'placeholder' => 'Enter Enterence Amount']) !!}
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
                    {!! Form::number('no_winner', old('no_winner'), ['class' => 'form-control ', 'placeholder' => 'Enter Number Of Winner']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('no_winner'))
                        <p class="help-block">
                            {{ $errors->first('no_winner') }}
                        </p>
                    @endif
                </div>
            </div>
			</div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contest_team_length', 'Team Length*', ['class' => 'control-label']) !!}
                    {!! Form::number('contest_team_length', old('contest_team_length'), ['class' => 'form-control ', 'placeholder' => 'Enter Team Length']) !!}
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
                <input type="radio" name="is_recommended" class="flat-red" value="1" required @if($contest->is_recommended ==1)checked @endif >
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_recommended" class="flat-red" value="0" required @if($contest->is_recommended ==0)checked @endif>
                </label>
              </div>
              </div>
			  
			   <label> Multi Entry: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_multi_entry" class="flat-red" value="1" required @if($contest->is_multi_entry ==1)checked @endif>
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_multi_entry" class="flat-red" value="0" required @if($contest->is_multi_entry ==0)checked @endif>
                </label>
              </div>
              </div>
			  
			   <label> Confirm Contest: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="is_confirm_contest" class="flat-red" value="1" required @if($contest->is_confirm_contest ==1)checked @endif>
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="is_confirm_contest" class="flat-red" value="0" required @if($contest->is_confirm_contest ==0)checked @endif>
                </label>
              </div>
              </div> 
			  
			  <label> Mega Contest: </label>
			  <div class="row">
                <div class="col-xs-2 form-group">
                <label>
				Yes &nbsp;&nbsp;&nbsp;
                <input type="radio" name="mega_contest" class="flat-red" value="1" required @if($contest->mega_contest ==1)checked @endif>
                </label>
				</div>
				 <div class="col-xs-2 form-group">
                <label>
				No &nbsp;&nbsp;&nbsp;
                  <input type="radio" name="mega_contest" class="flat-red" value="0" required @if($contest->mega_contest ==0)checked @endif>
                </label>
              </div>
              </div>
            
			<div id="group">
		<?php
    $de=json_decode($contest->rank_list, JSON_FORCE_OBJECT);
    $pr=json_decode($contest->prize_list, JSON_FORCE_OBJECT);
		$count_de=count($de); ?>
		@for($i=0;$i<$count_de;$i++)
			<div class="row">
			
                <div class="col-xs-6 form-group">
                    <label for="subject_name" class="control-label">Rank</label>
			  <input class="form-control" placeholder="" name="rank[]" type="text" value="{{$de[$i]}}">
			<p class="help-block"></p>
                                    </div>
				 <div class="col-xs-4 form-group">
                    <label for="amount" class="control-label">Prize Amount</label>
			  <input class="form-control" placeholder="" name="rank_amount[]" type="number" value="{{$pr[$i]}}">
			<p class="help-block"></p>
                                    </div>
				
				</div>
				@endfor
			</div>

            <div class="row clerfix">
               <div class="col-md-6 col-sm-6 col-sx-6">
                 {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
               </div> 
               <div class="col-md-6 col-sm-6 col-sx-6">
                 <div class="btn btn-info pull-right" id="add">Add</div>
               </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
    @parent
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
@stop