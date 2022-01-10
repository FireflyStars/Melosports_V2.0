@include('website.login.header')
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
			 
			 $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/cricketScore/?apikey='.$key.'&&unique_id='.$s->unique_id);
			$score_card=json_decode($cricketMatchesTxt);
			//print_r($score_card);
			if (is_object($score_card)) {
        $data1 = get_object_vars($score_card);
		//print_r($data1);
		if(array_key_exists('score',$data1)){
		//echo $data1["score"];
    
		
			?>
					
						<td> {{$data1["team-1"]}} VS {{$data1["team-2"]}}</td>
						<th>{{$data1["score"]}}   </th>
					</tr>
					<?php
					
			 }
			 }
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
 
    <!--//page_container-->
	
		@include('website.login.footer');

