@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i> Series</a></li>
       <li class="active">Edit</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Edit WinnerRank</h3>
    </div>    
   </div>
    
    {!! Form::model($data, ['method' => 'PUT','id'=>'my_form', 'route' => ['admin.winner_rank.update', $data->id]]) !!}

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
            @lang('quickadmin.qa_edit')
        </div>
        <div class="panel-body">
              <div class="row">                
			  <div class="col-xs-12 form-group">  
			  {!! Form::label('no_winners', 'No of Winners*', ['class' => 'control-label']) !!} 
			  {!! Form::text('n_winners', $data->team_length, ['class' => 'form-control ','readonly'=>'readonly','id'=>'n_winners', 'placeholder' =>' ']) !!}   
			  <p class="help-block"></p>     
			  @if($errors->has('n_winners'))  
				  <p class="help-block">        
			  {{ $errors->first('n_winners') }} 
			  </p>                 
			  @endif                
			  </div>         
			  </div>			
			  @php($position=json_decode($data->position))	
			  @php($amt=json_decode($data->rank_amount))	
			  @for($i=0;$i<count($position);$i++) 
				  <div class="row">           
			  <div class="col-xs-6 form-group">  
			  {!! Form::label('rank', 'Rank*', ['class' => 'control-label']) !!}  
			  <input type="text" readonly class="form-control" name="rank[]" value="{{$position[$i]}}"> 
			  <p class="help-block"></p>                  
			  @if($errors->has('rank'))                   
				  <p class="help-block">            
			  {{ $errors->first('rank') }}          
              </p>                  
			  @endif             
			  </div>   				
			  <div class="col-xs-6 form-group">    
			  {!! Form::label('amount', 'Amount percentage*', ['class' => 'control-label']) !!}   
              <input type="text" class="form-control" name="amount[]" value="{{$amt[$i]}}">     
			  <p class="help-block"></p>                 
			  @if($errors->has('amount'))               
				  <p class="help-block">                  
			  {{ $errors->first('amount') }}              
			  </p>                   
			  @endif            
			  </div>         
			  </div>		
			  @endfor		
			  
           
		   
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
    </script>
	
	<script>
			$('#save').click(function(){
				//alert('hi');
				
				var total=0;
				var values = $("input[name='amount[]']").map(function(){return $(this).val();}).get();
				//alert(values);
				for (var i = 0; i < values.length; i++) {
    total += parseInt(values[i]);
}
//alert(total);
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