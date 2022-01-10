@include('website.login.header')



<meta name="csrf-token" content="{{ csrf_token() }}" />

	

<div class="section-pad wid-bg">



	<div class="container" >

	 		

		<div class="row">

			<div class="col-lg-12">

				<h1 class="page-head text-center">FAQs</h1>

			</div>

		</div>

		

		<div class="row">

		<div class="col-lg-12 ">

		<div class=" faq-content about-box-content">

		

		<!--	<div class="tab">

				  <button class="tablinks" onclick="openCity(event, 'intro')" id="defaultOpen">Registration</button>

				  <button class="tablinks" onclick="openCity(event, 'create')">Playing the Game</button>

				  <button class="tablinks" onclick="openCity(event, 'manage')">Scores & Points</button>

				  <button class="tablinks" onclick="openCity(event, 'fps')">Contests</button>

				  <button class="tablinks" onclick="openCity(event, 'acc')">Cash Prizes</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">Account Balance</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">Verification</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">Withdrawals</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">Legality</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">FairPlay Violation</button>

				  <button class="tablinks" onclick="openCity(event, 'faq')">Payments</button>

				</div> -->



				<?php if(!count($god)==0){

					?>

				@foreach($god as $users)

				<div id="intro" >

				  <h3>{{$users->questions}}</h3>

				  <p>{{$users->answer}}</p>

				</div>

				@endforeach

				<?php } else { ?>

				



				

				  <p>There is no Faq to show.</p> 

				

				<?php } ?>

			<!--	<div id="manage" class="tabcontent">

				  <h3>Tokyo</h3>

				  <p>Tokyo is the capital of Japan.</p>

				</div>

				

				<div id="fps" class="tabcontent">

				  <h3>Tokyo</h3>

				  <p>Tokyo is the capital of Japan.</p>

				</div>

				

				<div id="acc" class="tabcontent">

				  <h3>Tokyo</h3>

				  <p>Tokyo is the capital of Japan.</p>

				</div>

				

				<div id="faq" class="tabcontent">

				  <h3>Tokyo</h3>

				  <p>Tokyo is the capital of Japan.</p>

				</div>-->

			

		

		</div>	

		</div>	

		</div>	

		

		

	</div>

     

</div>

    <!--//page_container-->

	

		@include('website.login.footer');



