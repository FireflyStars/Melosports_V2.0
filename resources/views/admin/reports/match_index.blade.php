@extends('layouts.app')

@section('content')

<!-- breadcrumb section -->

   <div class="row">
     <ul class="breadcrumb">
       <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
       <li class="active">Matchwise Winnning Report</li>
     </ul>
   </div> 

   <!-- breadcrumb section -->

   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 lr-title-user">
      <h3 class="page-title">Matchwise Winnning Report</h3>
    </div> 
   
   </div>

<!--	  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
	
    <div class="panel panel-default">
        <div class="panel-heading">
          List
        </div>
		
      
        <div class="panel-body">
            
            <div class="row">
                <div class="col-xs-6 form-group">
                    {!! Form::label('from', 'From*', ['class' => 'control-label']) !!}
                    {!! Form::date('from_date', old('from_date'), ['class' => 'form-control ', 'placeholder' => '','id'=>'from_date','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('from_date'))
                        <p class="help-block">
                            {{ $errors->first('from_date') }}
                        </p>
                    @endif
                </div>
				
				
				<div class="col-xs-6 form-group">
                    {!! Form::label('to', 'To*', ['class' => 'control-label']) !!}
                    {!! Form::date('to_date', old('to_date'), ['class' => 'form-control ', 'placeholder' => '','id'=>'to_date','required'=>'required']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('to_date'))
                        <p class="help-block">
                            {{ $errors->first('to_date') }}
                        </p>
                    @endif
                </div>
            </div>
			<a href="#" class="btn btn-danger" id="search">Search </a>   
        </div>
    </div>
	<div id="income_report"></div>
   
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
$('#search').click(function(){
	//alert('hi');
	
	var start=$('#from_date').val();
	var to=$('#to_date').val();
	
	token = $('[name="_token"]').val();
	$.ajax({
		
url: '{{ url('admin/match_income') }}',
 type: 'post',
 data: {
							start_date :start,
							to_date:to,
						  
                            _token: token,
						},
						 success: function (data) {
						
						$('#income_report').html(data);
						// $('#total_price').val(data);
						 }
	

	
	
	});
	});








</script>

	
	
	
	
	
	
	@stop