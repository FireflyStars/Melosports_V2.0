@include('website.user.header')
@include('website.user.menu1')
<meta name="csrf-token" content="{{ csrf_token() }}" />    <!--//page_container-->		


<div class="page_container">

	<div class="container" style="padding-top:10px">
	
		<div class="row wall_dd1">
		
			<div class="show_contest">
				<a href="{{URL::to('main')}}"><img src="{{url('public/site/image/show_contest.png')}}">&nbsp;Show me contest</a>
			</div>
		
		</div>
		
		<div class="row">
			
			<div class="support_banner">
				<img src="{{url('public/site/image/banner.jpg')}}">
			</div>
		
		
		</div>
		
		<div class="row">
			
			<div class="support_head">
			
				<div class="support_intro">
					Introduction
				</div>
				
				<div class="help_link">
					Need Help? <a href="contact.php"> Contact Us</a>
				</div>
			
			</div>
		
		
		</div>
		
		<div class="row" style="margin-top: 20px;">
		
			<div class="tab">
				  <button class="tablinks" onclick="openCity(event, 'intro')" id="defaultOpen">Introduction</button>
				  <button class="tablinks" onclick="openCity(event, 'create')">Creating Your Team</button>
				  <button class="tablinks" onclick="openCity(event, 'manage')">Managing Your Team</button>
				  <button class="tablinks" onclick="openCity(event, 'fps')">Fantasy Points System</button>
				  <button class="tablinks" onclick="openCity(event, 'acc')">Account Balance</button>
				  <button class="tablinks" onclick="openCity(event, 'faq')">FAQs</button>
				</div>

				<div id="intro" class="tabcontent">			 
				 
				  <p>Fantasy Cricket on Dream11 is all about using your cricket knowledge and skill to create your team within a budget of 100 credits. 
				  Your team earns points based on how your chosen players perform in real-life matches. 
				  Remember, these players have to be chosen before a real-life match begins. So, brush up on your skill & kick start your journey on Dream11..</p>
				  <h4>Follow these 4 easy steps to get you started:</h4>
				  
				  
				</div>

				<div id="create" class="tabcontent">
				  <h3>Paris</h3>
				  <p>Paris is the capital of France.</p> 
				</div>

				<div id="manage" class="tabcontent">
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
				</div>
			
		
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



@include('website.user.footer');