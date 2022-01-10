@include('website.user.header')@include('website.user.menu1')<meta name="csrf-token" content="{{ csrf_token() }}" />
	
<div class="page_container">

	<div class="container" style="padding-top:10px">
		<div class="row wall_dd1">
		
			<div class="show_contest">
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>
		
		</div>				
		<div class="row">
			
			<div class="support_head">
			
				<div class="about_page">
					Result
				</div>
				
				
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="about_con">
			<table>
			<table>
			<tr>
			<?php
			foreach($matches as $s)
			{
				
				
				 $cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey=jTO0ZZJ3YCcnpChYOVVZj9ij3tr1&&unique_id='.$s->unique_id);
			
			$cricketMatches = json_decode($cricketMatchesTxt);
		 foreach($cricketMatches->data as $item) {
			 
			 
				 
			
			
			?>
			
			@php($mat=DB::table('matches')->whereunique_id($s->unique_id)->first())
			<td>{{$mat->team_1}} Vs {{$mat->team_2}}</td>
			<?php
			if (array_key_exists("winner_team",$cricketMatches->data))
			 {
				 ?>
			<td>{{ $item->winner_team[0] }}</td>
			
			<?php
			
			 } else {
				 ?>
				 <td>Draw</td>
				 <?php
			 }
			 }
			 }
			
			?>
			
			
			</tr>
			
			
			</div>
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

