@include('website.user.header')


<style>
table{
	
}
tr{
	
}
td,th{
	border:1px solid #8e8c8c;
	padding: 5px;
}

</style>



<meta name="csrf-token" content="{{ csrf_token() }}" />
	
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
<?php $site=App\SiteSetting::findorfail(1);
		$support=App\Support::findorfail(2);
$link=$support->how_play_link;

 ?>
						   <h1 class="mb-3">How to play {{$site->site_name}}</h1>
				</div>
				
				
			</div>
		<div>
				<iframe src="{{$link}}" width="700" height="400" frameborder="0" allowfullscreen></iframe>
				</div>
		
		</div>
		
		{{--	<div class="row" style="margin-top: 20px;">
		
			<div class="about_con">
				<ul>
					<li>
						<div class="row">
							<div class="term_no">1.</div>
							<div class="term_con"><u>SELECT TEAM</u><br>
								<p>1.1	A team has to be selected from 100 credit points available. Each player will have different credits</p>
								<p>1.2	Select your team with the below number of players</p>
								<p>1 Wicket Keeper, 3 to 5 Batsmen, 1 to 3 All Rounder and 3 to 5 Bowler with a total of 11 players. Various possible combinations are as follows.</p>
							
								<table>
									<tr>
										<th>Type</th>
										<th>Variation 1</th>
										<th>Variation 2</th>
										<th>Variation 3</th>
										<th>Variation 4</th>
										<th>Variation 5</th>
										<th>Variation 6</th>
										<th>Variation 7</th>
									</tr>
									<tr>
										<td>Bowlers</td>
										<td>4</td>
										<td>4</td>
										<td>5</td>
										<td>5</td>
										<td>4</td>
										<td>3</td>
										<td>3</td>
									</tr>
									<tr>
										<td>All-Rounder</td>
										<td>1</td>
										<td>2</td>
										<td>1</td>
										<td>2</td>
										<td>3</td>
										<td>2</td>
										<td>3</td>
									</tr>
									<tr>
										<td>Batsmen</td>
										<td>5</td>
										<td>4</td>
										<td>4</td>
										<td>3</td>
										<td>3</td>
										<td>5</td>
										<td>4</td>
									</tr>
									<tr>
										<td>Wicket-Keeper </td>
										<td>1</td>
										<td>1</td>
										<td>1</td>
										<td>1</td>
										<td>1</td>
										<td>1</td>
										<td>1</td>
									</tr>
									<tr>
										<td>Total</td>
										<td>11</td>
										<td>11</td>
										<td>11</td>
										<td>11</td>
										<td>11</td>
										<td>11</td>
										<td>11</td>
									</tr>
								</table>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">2.</div>
							<div class="term_con"><u>SELECTION OF SUBSTITUTE</u><br>
							<p>2.1	A Substitute can be selected for a player with same points. Suppose a selected player has 8 credit points and a substitute is selected, the substitute should also be of 8 points.</p>
							<p>2.2	 The substitute can be from any other type too. For instance, a Bowler can be taken as a substitute for Batsmen.</p>
							<p>2.3 A substitute is  only optional and hence comes with a cost of 10 credit points (if played in cash leagues)</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">3.</div>
							<div class="term_con"><u>EDITING TEAM</u><br>
							<p>3.1	The selected team can be edited till the cut-off time to start the league. The cut-off time has been set for 30 minutes before the play starts.</p>
							<p>3.2	The teams can be edited any number of times before the cut-off time.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">4.</div>
							<div class="term_con"><u>JOINING A FREE LEAGUE</u><br>
							<p>4.1	After the teams are selected, a free league can be joined from the available leagues.</p>
							<p>4.2	If any league is full, then a different league can be joined.</p>
							<p>4.3	If all the leagues are full, try for a different match.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">5.</div>
							<div class="term_con"><u>JOINING A CASH LEAGUE</u><br>
							<p>5.1	Convert the cash available into your wallet into play points. In order to join any cash league, play points has to be purchased. For every rupee, 10 play points could be purchased.</p>
							<p>5.2	Join any available league with the play points. If there play points are not sufficient, convert the wallet balance as play points.</p>
							<p>5.3	There are various leagues with different play points, league size and winning amount. Depending on the availability and interest, the player can join any league listed for a match.</p>
							<p>5.4	Each person can join with six different teams in a single league if the league allows multiple entries.</p>
							
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">6.</div>
							<div class="term_con"><u>RANKING AND WINNING</u><br>
							<p>6.1	Based on the team selected and actual player performance, the points will be calculated (as shown in Points System section)</p>
							<p>6.2	The more the points, the top in the rank card and vice versa. </p>
							<p>6.3	After the end of the match, the person with the wining ranks will get the winning amount. The winning amount is specified in every league.</p>
							<p>6.4	In case of people in same rank, the ranking system will be followed and the amount will be shared by the number of people in the same rank.</p>
							<p>6.5	In case any match is abandoned before fully completing, all the leagues will be cancelled for that match and the play points will be added back.</p>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="term_no">7.</div>
							<div class="term_con"><u>LEAGUE TYPES</u><br>
							<p>7.1	M – Multiple entries allowed for single registered person; C – Confirmed League – League will be enforced even if it is not 100% filled.</p>
							</div>
						</div>
					</li>
					
					
					
				</ul>
			
			</div>
		
		</div>		 --}}
		<?php $support=App\Support::findorfail(2) ?>

{!! $support->how_play !!}
		
	</div>
     
</div>
    <!--//page_container-->
	
		@include('website.user.footer');

