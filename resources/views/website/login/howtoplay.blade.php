@include('website.login.header')

{{-- @include('website.login.menu1')  --}}





<!-- <style>

table{

	margin-bottom:20px;

}

tr{

	

}

td,th{

	border:1px solid #8e8c8c;

	padding: 5px;

}



</style> -->



    <div class="bg-2">

        <div class="section-pad mt-80">

            <div class="container">

                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-sm-12">

                        <div class=" text-center"> <img src="{{url('public/site/image/video-icon.png')}}" alt="">

                           <?php $site=App\SiteSetting::findorfail(1) ?>

						   <h1 class="mb-3">How to play {{$site->site_name}}</h1>

                            <p>Follow below steps</p>

                            

                        </div>

                    </div>

                    <div class="col-lg-1 col-sm-12"></div>

                    <div class="col-lg-5 col-sm-12">

					<?php $site=App\SiteSetting::findorfail(1);

		$support=App\Support::findorfail(2);

$link=$support->how_play_link;



 ?>

                        <div class="about-popup max-width">

                            <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$link}}"> <img src="{{url('public/site/image/video-intro.jpg')}}" alt="" class="img-responsive"> <img src="{{url('public/site/image/play-btn.png')}}" alt="" class="play-btn"> </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



	

	{{-- <div class="section-pad">



	<div class="container">

		<div class="row">

		<div class="col-sm-12">



			<h4>1.SELECT TEAM</h4>

			<ol>

				<li>A team has to be selected from 100 credit points available. Each player will have different credits</li>

				<li>Select your team with the below number of players</li>

				<li>Wicket Keeper, 3 to 5 Batsmen, 1 to 3 All Rounder and 3 to 5 Bowler with a total of 11 players. Various possible combinations are as follows.</li>

			</ol>

			<div class="table-responsive my-2 hp-table">

				<table class="table table-striped">

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

			<h4>2.SELECTION OF SUBSTITUTE</h4>

			<ol>

				<li>A Substitute can be selected for a player with same points. Suppose a selected player has 8 credit points and a substitute is selected, the substitute should also be of 8 points.</li>

				<li>The substitute can be from any other type too. For instance, a Bowler can be taken as a substitute for Batsmen.</li>

				<li>A substitute is  only optional and hence comes with a cost of 10 credit points (if played in cash leagues)</li>

			</ol>

			<h4>3.EDITING TEAM</h4>

			<ol>

				<li>The selected team can be edited till the cut-off time to start the league. The cut-off time has been set for 30 minutes before the play starts.</li>

				<li>The teams can be edited any number of times before the cut-off time.</li>

			</ol>

		

			<h4>4.JOINING A FREE LEAGUE</h4>

			<ol>

				<li>After the teams are selected, a free league can be joined from the available leagues.</li>

				<li>If any league is full, then a different league can be joined.</li>

				<li>If all the leagues are full, try for a different match.</li>

			</ol>

			<h4>5.JOINING A CASH LEAGUE</h4>

			<ol>

				<li>Convert the cash available into your wallet into play points. In order to join any cash league, play points has to be purchased. For every rupee, 10 play points could be purchased.</li>

				<li>Join any available league with the play points. If there play points are not sufficient, convert the wallet balance as play points.</li>

				<li>There are various leagues with different play points, league size and winning amount. Depending on the availability and interest, the player can join any league listed for a match.</li>

				<li>Each person can join with six different teams in a single league if the league allows multiple entries.</li>

			</ol>

			<h4>6.RANKING AND WINNING</h4>

			<ol>

				<li>Based on the team selected and actual player performance, the points will be calculated (as shown in Points System section)</li>

				<li>The more the points, the top in the rank card and vice versa.</li>

				<li>After the end of the match, the person with the wining ranks will get the winning amount. The winning amount is specified in every league.</li>

				<li>In case of people in same rank, the ranking system will be followed and the amount will be shared by the number of people in the same rank.</li>

				<li>In case any match is abandoned before fully completing, all the leagues will be cancelled for that match and the play points will be added back.</li>

			</ol>

			<h4>7.LEAGUE TYPES</h4>

			<ol>

				<li>M – Multiple entries allowed for single registered person; C – Confirmed League – League will be enforced even if it is not 100% filled.</li>

			</ol>



		

	</div>

	</div>

</div>

     

</div> --}}
<div class="container">
<div class="row"><div class="col-lg-12">
<?php $support=App\Support::findorfail(2) ?>



{!! $support->how_play !!}

    <!--//page_container-->
</div></div></div>
	

		@include('website.login.footer');



