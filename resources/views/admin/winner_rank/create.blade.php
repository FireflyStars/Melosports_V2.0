@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Winner Rank </a></li>
       <li class="active">Add</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Winner Rank</h3>
    </div>     
   </div>
   
    {!! Form::open(['method' => 'POST','id'=>'my_form','route' => ['admin.winner_rank.store'],'autocomplete'=>'off']) !!}

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
                    {!! Form::label('no_winners', 'No of Winners*', ['class' => 'control-label']) !!}
                    {!! Form::number('team_length', old('team_length'), ['class' => 'form-control ','id'=>'n_winners','min'=>'0', 'placeholder' =>' ']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('n_winners'))
                        <p class="help-block">
                            {{ $errors->first('n_winners') }}
                        </p>
                    @endif
                </div>
            </div>									
			<div id="position">		
			</div>						
			<p style="color:green">Amount in Percentage </p>	
			
			{{-- {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger','id'=>'save']) !!}  --}}
			
			<a href="#" class="btn btn-danger"  id="save">Submit</a>
    {!! Form::close() !!}
            
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
    </script>				<script>		
	$(function(){     
	$("#n_winners").keyup(function(event) { 
	event.preventDefault();			         
	$.ajax({                
	url: "{{url('admin/ajax_clone_winner')}}",
	type: "POST",                      
	data:  {        "_token": "{{ csrf_token() }}", 
	"no_of_winner":$('#n_winners').val(),  
	},          
	success: function(response) {	
	$("#position").html(response);	
	}         
	});       
	}); 
	});	
	</script>		
	
	
	
	<script>
			$('#save').click(function(){
				//alert('hi');
				
				var total=0;
				var values = $("input[name='amount[]']")
              .map(function(){return $(this).val();}).get();
				for (var i = 0; i < values.length; i++) {
    total += parseInt(values[i]);
}

if(total>100)
{

alert('percentage doesnt match ');


}else
{
	//alert(total);

$('#my_form').submit();

}
				
				
				
				
				
			});
			
			
			</script>

	
@stop