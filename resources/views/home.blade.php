@extends('layouts.app')

@section('content')

<style>

#chartdiv {
  width: 1000px;
  height: 300px;
}	
.amcharts-scrollbar-vertical
{
display:none !important;
}	
.chartpage
{
	width:100%;
	overflow-x:scroll;
}	
</style>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                   
					<div class="row">
                     
						<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-success"><i class="fa fa-money"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 				<?php $today=date('y-m-d');
									$today_payment=DB::table('fantasy_user_payment')->where('payment_status','Credit')->where('created_at','like','%'.$today.'%')->sum('payment_method');?>

				 				<h4 class="card-title">{{$today_payment}}</h4>
								<a href="#">Today Payments</a>
				 			</div>
				 		</div>
				 	</div>

				 	<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-info"><i class="fa fa-credit-card"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 				  <?php 
									$today_withdraw=DB::table('fantasy_user_withdraw')->where('deposite_status',1)->where('created_at','like','%'.$today.'%')->sum('withdraw_amount');?>

				 				<h4 class="card-title">{{$today_withdraw}}</h4>
								<a href="#">Today Widthdraw</a>
				 			</div>
				 		</div>
				 	</div>


				 	<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-pink"><i class="fa fa-user-plus"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 				 	<?php 
									$today_user=DB::table('users')->where('role_id',2)->where('created_at','like','%'.$today.'%')->count('id');?>	

				 				<h4 class="card-title">{{$today_user}}</h4>
								<a href="#">Today Registration</a>
				 			</div>
				 		</div>
				 	</div>


				 	<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-purple"><i class="fa fa-print"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 				<?php 
									$today_match=DB::table('matches')->where('created_at','like','%'.$today.'%')->count('id');?>

				 				<h4 class="card-title">{{$today_match}}</h4>
								<a href="#">Match Publish</a>
				 			</div>
				 		</div>
				 	</div>

				 <div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-pink"><i class="fa fa-user-times"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 			<?php 
									$non_join=DB::table('users')->where('role_id',2)->count('id'); 
									$non_user=DB::table('fantasy_user_join_contest')->distinct('user_id')->count('user_id'); 
									
									$total_count1=$non_join-$non_user;
									?>

				 				<h4 class="card-title">{{$total_count1}}</h4>
								<a href="#">Non Joined User</a>
				 			</div>
				 		</div>
				 	</div>

				 		<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-blue"><i class="fa fa-users"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 			<h4 class="card-title">{{$non_join}}</h4>
								<a href="#">Total User</a>
				 			</div>
				 		</div>
				 	</div>

				 		<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-success"><i class="fa fa-money"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 			<?php 
									$today_win_mt=DB::table('fantasy_user_winning_details')->where('created_at','like','%'.$today.'%')->sum('amount');?>

				 				<h4 class="card-title">{{$today_win_mt}}</h4>
								<a href="#">Today Winning Amount</a>
				 			</div>
				 		</div>
				 	</div>

				 	<div class="col-md-3 col-sm-6">
				 		<div class="media state-media box-ws">
				 			<div class="media-left">
				 				<a href="#"><div class="state-icn bg-icon-info"><i class="fa fa-print"></i></div></a>
				 			</div>
				 			<div class="media-body">

				 				<?php 
									$today_match=DB::table('matches')->where('created_at','like','%'.$today.'%')->count('id');?>

				 				<h4 class="card-title">{{$today_match}}</h4>
								<a href="#">NAN</a>
				 			</div>
				 		</div>
				 	</div>

					
						
					
					
					</div>
					<br><br>
					<div class="row">
					<div class="col-md-9">	
					<div class="card1">
						<div class="row">
							<div class="col-md-1">
							</div>
							 {!! Form::open(['method' => 'POST', 'url' => ['admin/date_value']]) !!}
							<div class="col-md-3">
								<label>From Date</label><br>
								<input type="date" name="start_date" required >
							</div>
							<div class="col-md-4">
								<label>To Date</label><br>
								<input type="date" name="to_date" required >
							</div>
							<div class="col-md-4">
							<br>
								{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
							</div>	
					
						</div>
					
					@if(isset($fdate))
					
							
							<h4>Users Joined Report From:{{$fdate}} To:{{$tdate}} </h4>
						
							<script src="{{ url('public/adminlte/js/chartsjs1.js') }}"></script>
							<script src="{{ url('public/adminlte/js/chartsjs2.js') }}"></script>
							<script src="{{ url('public/adminlte/js/chartsjs4.js') }}"></script>
							<div class="chartpage">
							<div id="chartdiv">
							
							</div>
							</div>
						@endif
							
						</div>
					
						
						</div>
						
						
					</div>
					
                </div>
            </div>
        </div>
    </div>
	
	<script>

var chart = AmCharts.makeChart("chartdiv", {
	"type": "serial",
     "theme": "light",
	"categoryField": "year",
	"rotate": false,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "user:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "user",
			"type": "column",
			"valueField": "income"
		},
		{
			"balloonText": "Expenses:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "Expenses",
			"type": "column",
			"valueField": "expenses"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "bottom",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": [
		<?php 
		
		if(isset($fdate)){
		$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime1->diff($datetime2);
$days = $interval->format('%a'); 
$yms=array();
$now = date($fdate);   
for($i=0;$i<=$days;$i++)
{
  $ym = date('Y-m-d', strtotime($now . " $i day"));
   $yms[$ym] = $ym;

$user_join=DB::table('fantasy_user_join_contest')->where('created_at','like','%'.$yms[$ym].'%')->count('user_id');



   ?>
		
		{
			"year":" <?php  echo date('d-m',strtotime($yms[$ym])); ?>",
			"income": <?php echo $user_join;  ?>,
			//"expenses": 18.1
		},
		
		
		<?php  }} ?>
		
		
	
	],
    "export": {
    	"enabled": true
     }

});


</script>
	
@endsection
