
   @php($pay_apikey=App\SocialSetting::findorfail(1))
   @php($SiteSetting_admin=App\SiteSetting::findorfail(1))
   
   @php($currency_set=App\CurrencySetting::findorfail(1))	
				
@php($currency=App\Currency::whereid($currency_set->currency_id)->first())
  
@php($apikey=$pay_apikey->cric_api_key)

<style>
    .half {
        float: left;
        width: 100%;
        padding: 0 1em;
    }
    /* Acordeon styles */
    
    .tab1 {
        position: relative;
        margin-bottom: 1px;
        width: 100%;
        color: #fff;
        overflow: hidden;
    }
    
    .half input {
        position: absolute;
        opacity: 0;
        z-index: -1;
    }
    
    .half label {
        position: relative;
        display: block;
        color: #484646;
        margin-bottom: 0px;
        padding: 5px 0px;
        background: #16a085;
        font-weight: normal;
        line-height: 2;
        cursor: pointer;
    }
    
    .blue label {
        background: #386090;
    }
    
    .tab-content1 {
        max-height: 0;
        overflow: hidden;
        border: 1px solid #ccc;
        color: #000;
        border:1px solid #154177;
 -webkit-transition: max-height .35s;
        transition: max-height .35s;
    }
    
    .blue .tab-content1 {
        background: #fff;
		
    }
    
    .tab-content1 p {
        margin: 1em;
    }
    /* :checked */
    
    .half input:checked ~ .tab-content1 {
        max-height: 20em;
		overflow-y:scroll;
    }
    /* Icon */
    
    .half label::after {
        position: absolute;
		color:#fff;
        right: 0;
        top: 0;
        display: block;
        width: 3em;
        height: 3em;
        line-height: 3;
        text-align: center;
        -webkit-transition: all .35s;
        transition: all .35s;
    }
    
    .half input[type=radio] + label::after {
        content: "+";
    }
    
    .half input[type=radio]:checked + label::after {
        content: "-";
    }
    
    .acc1 {
        width: 30%;
        padding: 0px 5px;
        border-right: 1px solid #fff;
        float: left;
		color:#fff;
    }
    
    .acc2 {
        width: 30%;
        padding: 0px 5px;
        border-right: 1px solid #fff;
        float: left;
		color:#fff;
    }
    
    .acc3 {}
    
    .tab-content1 table {
        width: 97%;       
    }
	.tab-content1 table, th, td
	{
		border: 1px solid #908f8f;
		border-collapse: collapse;
		padding: 3px 0px 3px 5px;
		margin: 10px;
	}
	.tab-content1 th
	{
		background: #c0ddff;
	}
</style>
<style>
#loadingmessage{
 position:fixed;
  top:0px;
  right:0px;
  width:100%;
  height:100%;
  background-color:#666;
  background-image:url('{{ URL::to("public/site/image/loadimage.gif") }}');
  background-repeat:no-repeat;
  background-position:center;
  z-index:10000000;
  opacity: 0.4;
  filter: alpha(opacity=80); /* For IE8 and earlier */
}
</style>
<div id="contest-ajax">

<div id='loadingmessage' style='display:none'>
 <h6>Please wait...</h6>
 <!-- <img src="{{ URL::to('public/site/image/lg.comet-spinner.gif') }}"/>-->
</div>

    <div id="myModalsuccess">

    </div>
	 <?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr("$fetch->date",0,10);
					        $subt=substr("$fetch->date",-13,-5);
							//$tim=strtotime("+330 minutes", strtotime($subt));
										//	$tim=date('h:i:s',strtotime("+330 minutes",$subt));
										
										
										$time = strtotime($subt);
										$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;

									?>
									 <style>
				 .saravana-css{
				 border: 2px solid rgb(233,171,88);
  border-radius: 5px;
  background-color: rgba(233,171,88,.5);
  padding: 1em;
  color: #d9480f;
				 }
  </style>
									
									 @if (date('Y-m-dH:i:s')
                        > $con)
					<?php 
					
					
					//$cricketMatchesTxt=file_get_contents('http://cricapi.com/api/fantasySummary/?apikey='.$apikey.'&&unique_id='.$unique_id);
					$cricketMatchesTxt=file_get_contents('http://apizipper.com/api/fantasy_summary/?apikey='.$apikey.'&&unique_id='.$unique_id);
		
		 $cricketMatches = json_decode($cricketMatchesTxt);
		// foreach($cricketMatches->data as $item) {
			 $manofthematch=$cricketMatches->data->man_of_the_match;
			 if (array_key_exists("winner_team",$cricketMatches->data) || (!empty($manofthematch)))
			 {
				 ?>
				
				 <div class="saravana-css" style="margin-left: -176px;float: right; margin-top: -16px;">Match Status: closed </div>
				<br><br> <?php
			 }else
				 {
					 ?>
					 <div  class="saravana-css" style="margin-left: -176px;float: right; margin-top: -16px;">Match Status: Progress </div>
			<br><br><?php	 }
		 ///}
				 ?>
					@endif


<!--Anand Changes-->
    <div class="col-lg-6">

    <div class="white-box p-0">
        @if($contest_first_team)
			<div id="other-team">
        
            @php($team_players=DB::table('fantasy_user_create_team')->whereid($contest_first_team->id)->first())
            <div class="create_team"  >
            <div class="gray-bg clearfix" >

                <div class="btn-group" style="  margin-top: 4px; margin-left: 9px; ">

                    <button class="btn dropdown-toggle" id="button_team_select" data-toggle="dropdown" href="#" >Team 1 <span class="caret"></span></button>
					
                    <ul class="dropdown-menu" id="select_team1" style="min-width: 100%;border-radius:0px;padding: 0px 0;margin: 0px 0 0;">

                        <!-- batting-->
                        @php($j=1) @foreach($view_teams as $viewteams)
                        <li style="line-height: 32px;font-size: 15px;" id="player_batting_c1">&nbsp;&nbsp;&nbsp;
                            <input type="hidden" id="view_change_team" value="{{$viewteams->id}}">
                            <input type="hidden" id="team" value="{{$viewteams->team_no}}">
                            <span id="view_player_name_batting_c1">Team {{$viewteams->team_no}}</span>
                        </li>
                        @php($j++) @endforeach
                    </ul>
                </div>
				 
                @if($team_count
                <6) <?php Session::put( 'unique_id',$unique_id); ?>
                   
                        @if (date('Y-m-dH:i:s')
                        < $con) <div class="btn-group" style="width: 62%; margin-top: 4px; margin-left: 9px; ">
                            <a  href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode($j))}}" class="btn dropdown-toggle btn-select btn-secondary" style=" float: right;width: 44%;">Add Team {{$j++}}</a>
            </div>
            @endif @endif
            <script>
                $("#select_team1 li").click(function() {
                    var selteamid = $(this).find('#view_change_team').val();
                    var selteam = $(this).find('#team').val();
                    $('#button_team_select').text('Team ' + selteam);

                    /*  var matchid=$("#match_id").val();			
                     var contestid=$("#contest_id").val();			
                     var teamid=$("#select_team_id").val();			
                     var playersjson=$('input[name="playersid[]"]').map(function(){return $(this).val();}).get();						
                     var playersid=JSON.parse(playersjson);		
                     console.log(playersid);							
                     var captainid=$("#captain_id").val();				
                     var vicecaptainid=$("#vicecaptain_id").val();														
                     console.log(unique);	 */
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{url('select-view-team')}}",
                        type: 'POST',
                        //dataType: 'JSON',								
                        data: {
                            selteamid: selteamid,
                            selteam: selteam,
                            _token: CSRF_TOKEN
                        }, //get model dan ukuran	
beforeSend: function() {
              $("#loadingmessage").show();
           },						
                        success: function(content) {
                            /* console.log(content);											
                            $('#change-filter').html(content)								
                            window.location.href="http://omsakthisivamhumanhairs.com/fantasy/main"; */
                            $('#select_view_team').html(content);
							$("#loadingmessage").hide();
                            //location.reload();	
                        }
                    });
                });
            </script>
        </div>
         
        <div id="select_view_team">
            <div class="team_bottom">

                <?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr($fetch->date,0,10);
					        $subt=substr($fetch->date,-13,-5);
					       //echo $subtminus=strtotime('-30 minutes', $subt);
$time = strtotime($subt);
$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;
							

									?>
                    @if (date('Y-m-dH:i:s')
                    < $con) <div class="create">
                        <a class="btn btn-primary btn-sm" href="{{url('edit-team/'.base64_encode($team_players->id).'/'.base64_encode($team_players->match_id).'/'.base64_encode($team_players->team_no))}}">Edit Team 1</a>
            </div>

            @endif {{--
            <div class="create" style="margin-left:0px;background:none;width:100%;"><a href="{{url('edit-team/'.$team_players->id.'/'.$team_players->match_id')}}" style="background-color: #a20505;color: white;border: none;width: 33%;height: 33px;">Edit Team 1</a></div>--}}
				
					@if (date('Y-m-dH:i:s') > $con) 
						<a href="{{url('play-pts',$unique_id)}}" class="btn btn-large btn-info" >Individual Player Points</a>
				@endif
				
				
				<div class="cs-pitch">
        		<div class="cs-pitch-content">
				
				
				<div class="cs-pitch-row-title">Wicketkeeper</div>
				@php($json_play=json_decode($team_players->team_players))
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Wicketkeeper batsman')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
				
				
				
				
						<div class="cs-pitch-row-title">Bats Man</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Opening batsman' || $all->player_role=='Batsman' || $all->player_role=='Top-order batsman' || $all->player_role=='Middle-order batsman' || $all->player_role=='No')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
							@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40" >
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
								
								@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
								
								
        						
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						<div class="cs-pitch-row-title">All Rounder</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowling allrounder' || $all->player_role=='Allrounder')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						<div class="cs-pitch-row-title">Bowler</div>
				
						<div class="cs-pitch-row" >
						 @foreach ($json_play as $j) @foreach($all_players as $all) @if($all->player_id ==$j) @if($all->player_role=='Bowler')	
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					@if($team_players->captain==$all->player_id)
        						<div class="cs-pitch-cap c">C</div>  
							@elseif($team_players->vice_captain==$all->player_id)
							<div class="cs-pitch-cap vc">VC</div> 
						@endif
							<a href="#" class="hover_test" id="<?php echo $all->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$all->player_name}}</div>
        						@if (date('Y-m-dH:i:s') > $con)                     
					 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($all->player_id)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt=0;
					}
					else{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bat_pt=2*$batting_json_replace->total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bat_pt=1.5*$batting_json_replace->total[0];
						}
						else{
							
							$bat_pt=$batting_json_replace->total[0];
						}
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$bowl_pt=2*$bowling_json_replace->bowl_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$bowl_pt=1.5*$bowling_json_replace->bowl_total[0];
						}
						else{
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						}
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						if($team_players->captain==$ps_replace->player_id)
						{
							$field_pt=2*$fielding_json_replace->field_total[0];
						}
						elseif($team_players->vice_captain==$ps_replace->player_id)
						{
							$field_pt=1.5*$fielding_json_replace->field_total[0];
						}
						else{
							
							$field_pt=$fielding_json_replace->field_total[0];
						}
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
							  
@endif	
        					</div>
        				 	<!-- Player End  -->
        				</div>
						@endif
						@endif
						@endforeach
						@endforeach
        				</div>
						
						
						
						
						
					<?php $c_name_list= DB::table('fantasy_team_players')->wherematch_id(Session::get('unique_id'))->whereplayer_id($team_players->substitute)->first();
 ?>
                    @if($c_name_list)
					<div class="cs-pitch-row-title">Substitute</div>
					<div class="cs-pitch-row" >
						 
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					<!--	<div class="cs-pitch-cap vc"></div>  -->
							<a href="#" class="hover_test" id="<?php echo $c_name_list->player_id .'-'. $team_players->id; ?>">
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								</a>
        						<div class="cs-pitch-payer-name" style="background: #ff5722">{{$c_name_list->player_name}}</div>
								@if (date('Y-m-dH:i:s') > $con)
 @php($point_sum_test=DB::table('fantasy_pointupdate_test')->whereplayer_id($team_players->substitute)->wherematch_id($unique_id)->get())
					  <?php 
					  $indiual_player_sum=0;
					  foreach($point_sum_test as $ps_replace)
				
					
					
				{
					
				$batting_json_replace=json_decode($ps_replace->batting);
				//print_r($batting_json);
				//exit;
				$bowling_json_replace=json_decode($ps_replace->bowling);
				$fielding_json_replace=json_decode($ps_replace->fielding);
					//echo $ps->match_id; echo '<br>';
				//$json_replace=$ut->replace_player;
					
					if($batting_json_replace==NULL)
					{
						$bat_pt=0;
					}
					else{
						
							
							$bat_pt=$batting_json_replace->total[0];
						
					}
					if($bowling_json_replace==NULL)
					{
							$bowl_pt=0;
					}
					else
					{
						
						
							
							$bowl_pt=$bowling_json_replace->bowl_total[0];
						
						
					}
					if($fielding_json_replace==NULL)
					{
							$field_pt=0;
					}
					else
					{
						
							$field_pt=$fielding_json_replace->field_total[0];
						
						
						
					}
					
						
					//total calculation player	
					
			
				$indiual_player_sum+=$bat_pt+$bowl_pt+$field_pt;
				
	}
					
					?>
					<div class="cs-pitch-payer-points">{{$indiual_player_sum}}</div>
					
					@endif
								</div>
        				 	<!-- Player End  -->
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
				
@else
<div class="create_team">
   
   <div class="team_top">
	
       <!-- <img src="{{ url('public/site/image/createteam.gif') }}"> -->
    </div>
	
    <div class="team_bottom">
        <div class="create">
            <?php Session::put('unique_id',$unique_id); ?>
                <?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr("$fetch->date",0,10);
					        $subt=substr("$fetch->date",-13,-5);
							$time = strtotime($subt);
							$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;

									?>
                    @if (date('Y-m-dH:i:s')
                    < $con) <a class="btn btn-primary" href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode('1'))}}"><img src="{{url('public/site/image/create_team.png')}}">&nbsp;&nbsp;Create Your Team</a>
                        @else
                        <a href="#">Match Closed</a>
					
					
					@endif
				

        </div>
		
       
	   
	   
	   
	   <div class="cs-pitch">
        		<div class="cs-pitch-content">
				
				
				<div class="cs-pitch-row-title">Wicketkeeper</div>
				
						<div class="cs-pitch-row" >
					
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
        				 	<!-- Player End  -->
        				</div>
						
        				</div>
						
					<div class="cs-pitch-row-title">Batsman</div>
				
						<div class="cs-pitch-row" >
					
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
        				 	<!-- Player End  -->
        				</div>
						
        				</div>
						
						<div class="cs-pitch-row-title">All Rounder</div>
				
						<div class="cs-pitch-row" >
					
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							
							
							
							
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
        				 	<!-- Player End  -->
        				</div>
						
        				</div>
						
						<div class="cs-pitch-row-title">Bowlers</div>
				
						<div class="cs-pitch-row" >
					
        				<div class="cs-pitch-col" >
        					<!-- Player  -->
        					<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
							
							
							
							
							<div class="cs-pitch-payer" >
        					
        						
						
							<!--<div class="cs-pitch-cap vc">VC</div>--> 
						
							
        						<img src="{{url('public/site/image/default-player.png')}}" width="40">
								
        						<div class="cs-pitch-payer-name" style="background: #ff5722"></div>
        						
					<div class="cs-pitch-payer-points"></div>
							  

        					</div>
        				 	<!-- Player End  -->
        				</div>
						
        				</div>
						
						
						
						</div>
						
        				</div>
				
	   
	   
	   
        
    </div>
</div>
@endif
</div>
</div>
<!-- <div class="col_tab" style="float: left;"> -->
{{--<div @if(count($contest)<6) class="col-lg-6" @else class="col-lg-12" @endif>--}}
<div  class="col-lg-6">
    <div class="tabbable" style="width:100%"> 
        <ul class="nav nav-tabs">

            <?php Session::put('unique_id',$unique_id); ?>
                <?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr("$fetch->date",0,10);
					        $subt=substr("$fetch->date",-13,-5);
						$time = strtotime($subt);
						$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;

									?>

                    @if (date('Y-m-dH:i:s')
                    < $con) <li class="active"><a href="#1a" data-toggle="tab">Active Contests </a></li>
                        <li><a href="#2a" data-toggle="tab">My Contests({{$contest_count}})</a></li>
                        @else
                        <li class="active"><a href="#2a" data-toggle="tab">My Contests ({{$contest_count}})</a></li>
                        @endif
 
        </ul>
		

        <div class="tab-content mb-80" >
            @if (date('Y-m-dH:i:s')
            < $con) <div class="tab-pane active " id="1a">

                <div class="contest_filter">

                    <div class="filter">
                        <label>Win(Rs.)</label>
                        <select class="win" id="win">
                            <option value="all">All</option>
                            <option value="0">Practice</option>
                            <option value="1-500">1-500</option>
                            <option value="501-1000">501-1,000</option>
                            <option value="1001-5000">1,001- 5,000</option>
                            <option value="5001-10000">5,001-10,000</option>
                            <option value="10000-x">More than 10,000</option>

                        </select>
                    </div>
                    <input type="hidden" name='unique' value="{{$unique_id}}">
                    <div class="filter">
                        <label>Pay Credit Point</label>
                        <select class="win" id="pay">
                            <option value="all">All</option>
                            <option value="0">0</option>
                            <option value="1-100">1-100</option>
                            <option value="101-1000">101-1,000</option>
                            <option value="1001-10000">1,001-10,000</option>

                        </select>
                    </div>

                    <div class="filter">
                        <label>Size(Teams)</label>
                        <select class="win" id="size">
                            <option value="all">All</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="10-x">Above 10</option>

                        </select>
                    </div>

                    <div class="filter" data-X10="{{Session::get('unique_id')}}">
                        <input type="button" value="Reset" onclick="displaymessage()">
                    </div>

                </div>
                <!-- Script for Reset button -->
                <script>
                    function displaymessage() {
                        $("select").each(function() {
                            this.selectedIndex = 0
                        });
                        $('.contest_filter button').removeClass('active');
                    }
                </script>
                <script>
                    $('.filter').click(function(e) {

                        var contest1 = $(this).attr("data-X10")
                        console.log(contest1);

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: 'contest-post',
                            type: 'POST',
                            // dataType: 'JSON',
                            data: {
                                input_field: contest1,
                                _token: CSRF_TOKEN
                            }, //get model dan ukuran
							
                            success: function(content) {
                                // console.log(content);
                                $('#contest-ajax1').html(content);
								//$("#loadingmessage").hide();

                            },
                            error: function(e) {
                                //called when there is an error
                                console.log(e.message);
                            }
                        });
                    });
                </script>

                <div id="change-filter">
                    @foreach($contest as $s)
                    <div class="contest_list">
                    <!--     <div class="box"></div> <div class="box11"></div> -->

                        <div class="box">

                            <div class="box11">
                                <div class="row">
                                    <div class="win">
                                        <p> @if($s->winning_pirze) {{$currency->symbol}} {{$s->winning_pirze}} {{$currency->code}} @else Practice Contest @endif</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pay">
                                        <p>@if($s->enterence_amount)Pay Credit {{$s->enterence_amount}}@else Pay Credit 0 @endif </p>
                                    </div>
                                    <div class="tol_tip">
                                        @if($s->is_confirm_contest==1)
                                        <a href="#" bubbletooltip="Confirm Contest This contest wont cancel">C</a> @endif @if($s->is_multi_entry==1)
                                        <a href="#" bubbletooltip="Multiple contest You Can Join Multiple Time">M</a> @endif
														 @if($s->cd_status==1)
										 <a href="#" bubbletooltip="Multiple contest You Can Join Multiple Time">WD</a> 					 
														 @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <?php $user_join_length=DB::table('fantasy_user_join_contest')->wherecontest_id($s->id)->wherematch_id(Session::get('unique_id'))->count(); ?>
                                        <?php $xxxxxxx=DB::table('fantasy_user_create_team')->wherematch_id(Session::get('unique_id'))->whereuser_id(Auth::user()->id)->get();
					?>
                                   <?php $particular_unique_contest=DB::table('fantasy_user_join_contest')->wherecontest_id($s->id)->whereuser_id(Auth::user()->id)->wherematch_id(Session::get('unique_id'))->count(); ?>         <div class="select_team">
                                                <p>{{$user_join_length}}/{{$s->contest_team_length}} teams </p>
                                                <div class="team_bar">
                                                    <span style="width:{{$user_join_length/$s->contest_team_length *100}}%"></span>
                                                </div>

                                            </div>
                                </div>
                                <div class="row">
                                    @if($s->is_practise_contest==0)
                                    <div class="win_list" id="winner{{$s->id}}">

                                        <p><img src="{{url('public/site/image/winner.png')}}">{{$s->no_winner}} Winners</p>

                                    </div>
                                    @endif 
									@if($s->is_multi_entry ==0 && $particular_unique_contest >= 1)
                                    <div class="box_jion">
                                        <a href="#">Joined</a>
                                    </div>
									 @elseif(count($xxxxxxx) ==0)
                                        <div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModal_zero{{$s->id}}">Join</a>
                                        </div>
                                    @elseif($user_join_length >= $s->contest_team_length)
                                    <div class="box_jion">
                                        <a href="" data-toggle="modal" data-target="#myModaljoinfull">Join</a>
                                    </div>
                                    @elseif(Auth::user()->credit_point < $s->enterence_amount)
									@if( (Auth::user()->user_wallet_current_amount*$SiteSetting_admin->user_pts) < $s->enterence_amount)
										<div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModalwallet">Join</a>
                                        </div>
										@else
                                        <div class="box_jion">
                                            <a href="" data-toggle="modal" data-target="#myModalcr_pt">Join</a>
                                        </div>
										@endif
										
                                       

                                        @else
                                        <div class="box_jion">

                                            <a href="" data-toggle="modal" data-target="#myModalaccess{{$s->id}}">Join</a>

                                        </div>
                                        @endif

                                        <div class="win_tab" id="win_tab{{$s->id}}" style="display:none;">

                                            <table>
                                                <tr>
                                                    <td>Rank</td>
                                                    <td>Price</td>
                                                </tr>
                                               

													@if($s->cd_status==1)
													<?php
    		$win=App\WinnerLength::findorfail($s->winner_length_id);	
			$rank=json_decode($win->position);	
			$amount=json_decode($win->rank_amount);	
			?>	
													@for($i=0;$i<count($rank);$i++)	
														<tr>					
														<td>						
													{{$rank[$i]}}				
														</td>					
														<td>					
													{{$amount[$i]}}  %		
															</td>				
															</tr>				
															@endfor		
													
													
													
													
													
													
													@else

											   <?php $prize_list = json_decode($s->prize_list, true); ?>
                                                    <?php $rank = json_decode($s->rank_list, true); ?>
                                                        @for($i=0; $i<count($rank); $i++) <tr>
                                                            <td>Rank {{ $rank[$i] }}</td>
                                                            <td>{{$currency->code}}.{{ $prize_list[$i] }}  {{$currency->symbol}}</td>
                                                            </tr>
                                                            @endfor
															
															@endif

                                            </table>

                                        </div>

                                </div>
								
								
								

                                <!-- Modal -->
                                <div id="myModal_zero{{$s->id}}" class="modal fade" role="dialog" style="overflow-y: hidden;">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header"  >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">@if($s->is_practise_contest==0) {{$currency->symbol}} {{$s->winning_pirze}} {{$currency->code}} Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>

                                            </div>
                                            <div class="modal-body">
                                                <h4>Please create your team for this match and join contest.</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="create" style="margin-left: 29%; width: 39%;">
                                                    <a class="btn btn-primary" href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode('1'))}}" style="text-decoration:none;">Create Your Team</a></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="myModalaccess{{$s->id}}" class="modal fade" role="dialog" style="overflow-y: hidden;">
                                    <div class="modal-dialog">
                                        <input type="hidden" class="match_id" id="match_id{{$s->id}}" value="{{$unique_id}}">
                                        <input type="hidden" class="contest_id" id="contest_id{{$s->id}}" value="{{$s->id}}">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" >
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">@if($s->is_practise_contest==0) {{$currency->symbol}}  {{$s->winning_pirze}} {{$currency->code}} Contest <h3>  Pay Credit {{$s->enterence_amount}}</h3>@else <h3>  Practise Contest</h3> Pay Rs 0 @endif</h4>
                                            </div>
                                            <div class="modal-body" >

                                                <div class="dropdown">
                                                    <h4>Join Contest with</h4>
                                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Team 
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu " id="select_team">
                                                    
                                                   <!-- batting-->
                                                    @php($i=1) @foreach($view_team as $data)
                                                    <li style="line-height: 41px;" id="player_batting_c1">&nbsp;&nbsp;
                                                        <input type="hidden" class="team_id" value="{{$data->id}}">
                                                        <input type="hidden" class="teamname" value="Team{{$i}}">
                                                        <span id="view_player_name_batting_c1">Team {{$i}}</span>
                                                    </li>
                                                    @php($i++) @endforeach

                                                </ul>
                                                </div>

<!-- 
                                                Join Contest with
                                                <button class="btn dropdown-toggle btn-select" id="captain" data-toggle="dropdown" href="#" style="border: 3px solid #b3b3b2;border-radius:0px;">Select Team <span class="caret"></span></button> <br><br>
                                                
												<ul class="dropdown-menu " id="select_team">
													
												 
                                                    @php($i=1) @foreach($view_team as $data)
                                                    <li style="line-height: 41px;" id="player_batting_c1">&nbsp;&nbsp;
                                                        <input type="hidden" class="team_id" value="{{$data->id}}">
                                                        <input type="hidden" class="teamname" value="Team{{$i}}">
                                                        <span id="view_player_name_batting_c1">Team {{$i}}</span>
                                                    </li>
                                                    @php($i++) @endforeach
 -->
                                                </ul>
                                            </div>
											 <div class="already_join_team_mutiple_contest{{$s->id}}">

    </div>
                                            <div class="modal-footer">
                                                <?php 
                                                //$add_team=DB::table('fantasy_user_create_team')->
                                                    $j=$team_count+1;
                                                    if($team_count<6)
                                                        {
                                                            ?>
                                                    <a href="{{url('create-team/'.base64_encode(Session::get('unique_id')).'/'.base64_encode($j))}}" class="btn btn-secondary pull-left btn-sm" >Add Team {{$j++}} </a>
                                                   <?php
                                                        }?>

                                                <button type="button" class="popup_btn join_contest_submit{{$s->id}}" id="join_contest_submit" >Join</button>
                                            </div>
                                        </div>
                                       
                                        <script>
                                            $("#select_team li").click(function() {
                                                var selid = $(this).find('.team_id').val();
                                                var selname = $(this).find('.teamname').val();

                                                $(this).parents('.modal-body').find('.dropdown-toggle').html('<input type="hidden" name="select_team_id" id="select_team_id" value="' + selid + '">' + selname + ' <span class="caret"></span>');

                                            })
                                        </script>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="myModaljoin12" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                Pay Credit:1000
                                <div class="modal-body">
                                    <p>
                                        <div> Current Wallet Amount :{{Auth::user()->user_wallet_current_amount}}</div></p>
                                </div>
                                <form action="{{URL::to('payment-view')}}" method="post">
                                    {{ csrf_field() }}
                                    <div style="text-align:center">
                                        <?php $input= Auth::user()->credit_point - $s->enterence_amount; ?>
                                            {{$currency->code}}.
                                            <input type="text" class="content" value="{{$input}}" name="cash">
                                    </div>

                                    <div class="modal-body">ADD MORE CASH</div>

                                    <ul class="amtOptions">

                                        <a class="button" data-saravana="115">{{$currency->code}}.115</a>
                                        <a class="button" data-saravana="250">{{$currency->code}}.250</a>
                                        <a class="button" data-saravana="600">{{$currency->code}}.600</a>

                                    </ul>
                                    <div class="modal-footer">
                                        <button type="submit" class="popup_btn">Ok</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <!-- contest list full error -->
                    <div id="myModaljoinfull" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Contest Full </h4>
                                </div>
                                <div class="modal-body">
                                    <p>The contest is already full! Join another contest</p>
                                </div>

                            </div>
                        </div>
                    </div>
					<!--Prasad -->
					<div id="myModalwallet" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Low Wallet Amount </h4>
                                </div>
                                <div class="modal-body">
                                    <p>Your play point and wallet amount is low.Please add amount in wallet and purchase play points</p>
                                </div>

                            </div>
                        </div>
                    </div>
					<div id="myModalcr_pt" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Low Play Points </h4>
                                </div>
                                <div class="modal-body">
                                    <p>Your play point is low.Please purchase the play points</p>
                                </div>

                            </div>
                        </div>
                    </div>
					
					<!--  Play Point Modal Content  -->
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					

                    <script>
                        $('.join_contest_submit<?php echo $s->id; ?>').click(function() {
                            //alert('hai');
                            var matchid = $("#match_id<?php echo $s->id; ?>").val();
                            var contestid = $("#contest_id<?php echo $s->id; ?>").val();
                            var teamid = $("#select_team_id").val();
                            //var playersjson=$('input[name="playersid[]"]').map(function(){return $(this).val();}).get();
                            //var playersid=JSON.parse(playersjson);
                            //console.log(playersid);
                            //var captainid=$("#captain_id").val();
                            //var vicecaptainid=$("#vicecaptain_id").val();

                            console.log(contestid);
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $.ajax({
                                url: "{{url('user-join-contest')}}",
                                type: 'POST',
                                // dataType: 'JSON',
                                data: {
                                    matchid: matchid,
                                    contestid: contestid,
                                    teamid: teamid,
                                    _token: CSRF_TOKEN
                                }, //get model dan ukuran
                                success: function(content) {
                                    //console.log(content);
                                    //$('#change-filter').html(content)

                                    //window.location.href="http://localhost/dinesh/fantasy_cricket/main";
                                    if (content.message == "success") {
                                        $('#myModalsuccess').html('<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Successfully joined contest.</div>');
                                        location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        });
                                    } 
									else if (content.message == "failure") {
                                        $('#myModalsuccess').html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Low credit points.</div>');
                                        location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        });
                                    }
									else if (content.message == "already_exist") {
                                        $('.already_join_team_mutiple_contest'+contestid).html('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Team Already Exist In Contest.</div>');
										
										$('#already_join_team_mutiple_contest').fadeIn(800, function() {
                                            $('#already_join_team_mutiple_contest').fadeOut().delay(3000);

                                        });
                                        /* location.reload();

                                        $('#contest-ajax').fadeOut(800, function() {
                                            $('#contest-ajax').fadeIn().delay(3000);

                                        }); */
                                    }

                                }
                            });
                        });
                    </script>

                    <script>
                        $(document).ready(function() {
                            $("#winner<?php echo $s->id; ?>").click(function() {
                                $("#win_tab<?php echo $s->id; ?>").toggle();
                            });
                        });
                    </script>

                    @endforeach

                </div>
        </div>
        @endif 
		@if (date('Y-m-dH:i:s') < $con) 
			<div class="tab-pane" id="2a">
            @else
            <div class="tab-pane active" id="2a">
                @endif
                <div class="row">

                  
                    <div class="half">

                        @if($user_team_total) @foreach($user_team_total as $dd)

                        <?php		
					$user_team_list=DB::table('fantasy_user_join_contest')
			->select('fantasy_user_create_team.team_no','fantasy_user_join_contest.contest_id','fantasy_user_join_contest.rank','fantasy_user_join_contest.points','fantasy_contests.*','users.name as user_name','users.id as us_id','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','fantasy_user_join_contest.contest_id')
			->leftjoin('users','users.id','fantasy_user_join_contest.user_id')
			->where('fantasy_user_create_team.match_id',$dd->match_id)
			->where('fantasy_user_join_contest.contest_id',$dd->contest_id)
			->where('fantasy_user_join_contest.non_confirm_contest',0)
			->orderby('fantasy_user_join_contest.rank','ASC')
			->get(); 
			
			?>
                            <div class="tab1 blue">
                                <input id="tab-five{{$dd->contest_id}}" type="radio" name="tabs2">
                                <label for="tab-five{{$dd->contest_id}}">
                                    <div class="acc1">@if($dd->winning_pirze){{$dd->winning_pirze}} @else Practice Contest @endif</div>
                                    <div class="acc2">{{count($user_team_list)}}/{{$dd->contest_team_length}}</div>
                                    <div class="acc3">&nbsp;&nbsp;</div>
                                </label>
								

                                <div class="tab-content1">

                                    <table>
										@if (date('Y-m-dH:i:s') > $con)
										<tr>
											<th>POSITION</th>
											<th>TEAM NAME</th>
											<th>USER </th>
											<th>POINTS</th>									
										</tr>
                                        @foreach($user_team_list as $ssss )
										<a href="#">
                                        <tr class="other_team" onclick="changeteam(<?php echo $ssss->id ?>)">
                                            <td>{{$ssss->rank}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>Team {{$ssss->team_no}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>{{$ssss->user_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>{{$ssss->points}}</td>
                                        </tr>
										</a>
                                        @endforeach
                                    @else
										<tr>
											<th>Name</th> 
											<th>Team</th> 
											</tr>
											@foreach($user_team_list as $ssss )
										<a href="#">
                                        <tr class="other_team" >
                                            
                                            <td>{{$ssss->user_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
											 @if(Auth::user()->id==$ssss->us_id)
											 <td>Team {{$ssss->team_no}} </td>@else
												 <td> </td>@endif
                                          
                                        </tr>
										</a>
										 @endforeach
										 @endif
									</table>

                                </div>

                                
                            </div>
                 @endforeach
					@endif

                    

                
<!-- frnd contest result -->
                        @if($frnd_team_total) @foreach($frnd_team_total as $dd)

                        <?php		
					$user_team_list=DB::table('frnd_user_join_contest')
			->select('fantasy_user_create_team.team_no','frnd_user_join_contest.frnd_contest_id','frnd_user_join_contest.rank','frnd_user_join_contest.points','fantasy_contests.*','users.name as user_name','users.id as us_id','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','frnd_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','frnd_user_join_contest.frnd_contest_id')
			->leftjoin('users','users.id','frnd_user_join_contest.user_id')
			->where('fantasy_user_create_team.match_id',$dd->match_id)
			->where('frnd_user_join_contest.frnd_contest_id',$dd->frnd_contest_id)
			->orderby('frnd_user_join_contest.rank','ASC')
			->get(); 
			
			?>
                            <div class="tab1 blue">
                                <input id="tab-five{{$dd->frnd_contest_id}}" type="radio" name="tabs2">
                                <label for="tab-five{{$dd->frnd_contest_id}}">
                                    <div class="acc1">@if($dd->winner_prize_amt){{$dd->winner_prize_amt}} @else Practice Contest @endif</div>
                                    <div class="acc2">{{count($user_team_list)}}/{{$dd->user_length}}</div>
                                    <div class="acc3">&nbsp;&nbsp;</div>
                                </label>
								

                                <div class="tab-content1">

                                    <table>
										@if (date('Y-m-dH:i:s') > $con)
										<tr>
											<th>POSITION</th>
											<th>TEAM NAME</th>
											<th>USER </th>
											<th>POINTS</th>									
										</tr>
                                        @foreach($user_team_list as $ssss )
										<a href="#">
                                        <tr class="other_team" onclick="changeteam(<?php echo $ssss->id ?>)">
                                            <td>{{$ssss->rank}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>Team {{$ssss->team_no}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>{{$ssss->user_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>{{$ssss->points}}</td>
                                        </tr>
										</a>
                                        @endforeach
                                    @else
										<tr>
											<th>Name</th> 
											<th>Team</th> 
											</tr>
											@foreach($user_team_list as $ssss )
										<a href="#">
                                        <tr class="other_team" >
                                            
                                            <td>{{$ssss->user_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
											 @if(Auth::user()->id==$ssss->us_id)
											 <td>Team {{$ssss->team_no}} </td>@else
												 <td> </td>@endif
                                          
                                        </tr>
										</a>
										 @endforeach
										 @endif
									</table>

                                </div>

                               
                            </div>
                     @endforeach
					@endif
					</div>
@if($contest_count==0)
                     There Is No Contest You Join!!!!!!!! 
				 @endif

                </div>
				<?php $fetch = DB::table('matches')
					                ->where('unique_id', '=', $unique_id)
									->first();

					        $subd=substr("$fetch->date",0,10);
					        $subt=substr("$fetch->date",-13,-5);
							$time = strtotime($subt);
							$time_sar = strtotime($subd.$subt);
										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));
                               $tim = date("H:i:s", strtotime('+300 minutes', $time));
							            // $con=$subd.$tim;
										
										
										
										
							             $con=$tim_sar;
										 if (date('Y-m-dH:i:s') > $con)
										 {
											 
												$data_user_team_total=DB::table('fantasy_user_join_contest')
			->select('fantasy_user_join_contest.contest_id','fantasy_user_join_contest.team_id as con_team_no','fantasy_contests.*','fantasy_contests.id as contest_id','users.*','fantasy_user_join_contest.user_id as user_id','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','fantasy_user_join_contest.contest_id')
			->leftjoin('users','users.id','fantasy_user_join_contest.user_id')
			->where('fantasy_user_create_team.match_id',$unique_id)
			->where('fantasy_contests.is_confirm_contest',0)
			->where('fantasy_user_join_contest.non_confirm_contest',0)
		//	->where('fantasy_user_create_team.user_id',Auth::user()->id)
			// ->groupBy('fantasy_user_join_contest.contest_id')
			->get();
			//print_r($data_user_team_total);
			//$data_user_team_total=DB::table('fantasy_user_join_contest')
			
	//	echo	count($data_user_team_total);
			foreach($data_user_team_total as $cc)
			
			{
				//echo $cc->contest_id;
				//echo $cc->match_id;
				//print_r($cc->match_id);
					
					$data_user_team_list=DB::table('fantasy_user_join_contest')
			->select('fantasy_user_create_team.team_no','fantasy_user_join_contest.contest_id','fantasy_user_join_contest.rank','fantasy_user_join_contest.points','fantasy_contests.*','users.name as user_name','fantasy_user_create_team.*')
			->leftjoin('fantasy_user_create_team','fantasy_user_join_contest.team_id','fantasy_user_create_team.id')
			->rightjoin('fantasy_contests','fantasy_contests.id','fantasy_user_join_contest.contest_id')
			->leftjoin('users','users.id','fantasy_user_join_contest.user_id')
			->where('fantasy_user_create_team.match_id',$cc->match_id)
			//->where('fantasy_user_create_team.id',$cc->match_id)
			->where('fantasy_user_join_contest.contest_id',$cc->contest_id)
			
			->where('fantasy_user_join_contest.non_confirm_contest',0)
			->where('fantasy_contests.is_confirm_contest',0)
			->orderby('fantasy_user_join_contest.rank','ASC')
			->get();
//print_r($data_user_team_list->team_no);		

//echo count($data_user_team_list);
	//exit;
	//echo $cc->user_id; echo '<br>';
	//echo $cc->enterence_amount; echo '<br>';
			
			if(count($data_user_team_list)!=0 && count($data_user_team_list) < $cc->contest_team_length )
			{
				
					$con_sub=DB::table('fantasy_user_create_team')->wherematch_id($cc->match_id)->whereuser_id($cc->user_id)->whereid($cc->con_team_no)->first();
				
					if(!empty($con_sub->substitute) && $cc->is_practise_contest==0)
					{
					$user= App\User::findorfail($cc->user_id);
	$creditpt=$user->credit_point;
	
	
	$user->credit_point=$creditpt+$cc->enterence_amount+10;
	$user->save();
					
	if($user)
	{
	
DB::table('fantasy_user_join_contest')->whereteam_id($cc->con_team_no)->wherecontest_id($cc->contest_id)->update(['non_confirm_contest'=>1]);		
	}		
					}
						else if($cc->is_practise_contest==0)
	{
	$user=App\User::findorfail($cc->user_id);
	$creditpt=$user->credit_point;
	
	//echo $cc->user_id;
	$user->credit_point=$creditpt+$cc->enterence_amount;
	$user->save();
	if($user)
	{
DB::table('fantasy_user_join_contest')->whereteam_id($cc->con_team_no)->wherecontest_id($cc->contest_id)->update(['non_confirm_contest'=>1]);
	}
	}
	
			
		
			
			}
		

			
			
			}
						 
										 }
										 


									?>
                    
            </div>

    </div>

</div>

</div>
</div>


</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<!-- Modal -->

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script>
    $('.win').change(function(e) {

        var win = $('#win').val();
        var pay = $('#pay').val();
        var size = $('#size').val();
        var unique = $("input[name='unique']").val();
//alert(pay);
        console.log(unique);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'ajax-filter',
            type: 'POST',
            // dataType: 'JSON',
            data: {
                win: win,
                pay: pay,
                size: size,
                unique: unique,
                _token: CSRF_TOKEN
            }, //get model dan ukuran
			 beforeSend: function() {
              $("#loadingmessage").show();
           },
            success: function(content) {
                console.log(content);
                $('#change-filter').html(content);
				$("#loadingmessage").hide();

            },
            error: function(e) {
                //called when there is an error
                console.log(e.message);
            }
        });
    });
</script>

<script>

	function changeteam(id){
    var team_id = id;
	var match_id=<?php echo Session::get('unique_id'); ?>;
	
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: 'post',
        url: 'see-other-team',
        data: {team_id: team_id,match_id:match_id, _token: CSRF_TOKEN},
		 beforeSend: function() {
              $("#loadingmessage").show();
           },
        success: function(msg) {
            $('#other-team').html(msg);
			$("#loadingmessage").hide();
			//LoadFinance();
        }
    });
}





</script> 




<script>
// jQuery( document ).ready(function( $ ) {

 $('.hover_test').tooltip({
   title: fetchData,
   html: true,
   placement: 'right'
  });

  function fetchData()
  {
   var fetch_data = '';
   var element = $(this);
   var id = element.attr("id");
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
    url:"tooltip-ply-pt",
    method:"POST",
    async: false,
    data:{id:id, _token: CSRF_TOKEN},
    success:function(data)
    {
     fetch_data = data;
    }
   });   
   return fetch_data;
  }
// });
</script>