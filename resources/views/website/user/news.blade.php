@include('website.user.header')



@include('website.user.menu1')

<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--//page_container-->
	
	<div class="page_container">

	<div class="container" style="padding-top:10px">
	
		<div class="row wall_dd1">
		
			<div class="show_contest">
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show Contest</a>
			</div>
		
		</div>
		
		<div class="row">
			
			<div class="support_banner">
			
			</div>
		
		
		</div>
		
		<div class="row">
			
			<div class="support_head">
			
				<div class="support_intro">
					News
				</div>
				
				<div class="help_link">
				<!--	Need Help?<a href="{{URL::to('contact')}}"> Contact Us</a>  -->
				</div>
			
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
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
				  <h3>{{$users->title}}</h3>
				  <p>{{$users->description}}</p>
				</div>
				@endforeach
				<?php } else { ?>
				

				
				  <p>There is no news to show.</p> 
				
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
    <!--//page_container-->
	
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	
	
	
	
	
	
	
@include('website.user.footer')

