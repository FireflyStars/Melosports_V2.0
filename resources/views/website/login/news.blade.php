@include('website.login.header')


<meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--//page_container-->
	
	<div class="section-pad wid-bg">

	<div class="container" >
				
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">News</h1>
			</div>
		</div>	
		 
		
		<div class="row" >
		
			<div class="col-sm-12">
			<div class="about-box-content">
				
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


			</div>
			</div>
		
		</div>		
		
		
	</div>
     
</div>

	
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
	
	
	
	
	
	
	
	@include('website.login.footer');

