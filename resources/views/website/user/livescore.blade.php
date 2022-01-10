@include('website.user.header')
@include('website.user.menu1')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	 @php($api=App\SocialSetting::findorfail(1))<?php $key=$api->cric_api_key;	 ?>
<meta name="csrf-token" content="{{ csrf_token() }}" />
	
		<div class="section-pad wid-bg">

	<div class="container" >
				
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">Live Score</h1>
			</div>
		</div>	
		 
		
		<div class="row" >
		
			<div class="col-sm-12">
			<div class="about-box-content">
				
					 <div class="table-responsive">
					 	<table class="table table-striped">
					<tr>
					<?php
			 
			 if(!count($matches)==0)
			 {
			 foreach($matches as $s)
			 {
			 
			 //$cricketMatchesTxt=file_get_contents('http://cricapi.com/api/cricketScore/?apikey='.$key.'&&unique_id='.$s->unique_id);
			 $cricketMatchesTxt=file_get_contents('http://apizipper.com/api/cricket_score/?apikey='.$key.'&&unique_id='.$s->unique_id);
			$score_card=json_decode($cricketMatchesTxt);
			$data=$score_card->data;
			//dd($data);
			
    
		
			?>
					
						<td> {{$data->team_1}} VS {{$data->team_2}}</td>
						<th>{{$data->score}}   </th>
					</tr>
					<?php
					
			
			 }
			 }
			 else
			 {
				 
					?>
					
					
					<p>Currently there is no match to show score  </p>
			 <?php } ?>
				</table>
					 </div>
			</div>
			</div>
		
		</div>		
		
		
	</div>
     
</div>
	
		@include('website.user.footer');
