<div class="dd31">
					
	<div class="credit">
		<span id="left_credit_point"> </span><br>
			Credits Left.
	</div>
							
	<div class="player">
							
	</div>
							
	<div class="select_player">
							
		<div class="tabbable" style="margin-bottom: 9px;">
            <ul class="nav nav-tabs">
                <li><a href="#1a" data-toggle="tab">WK<span id="wicketkeeper_total"></span></a></li>
				<li><a href="#2a" data-toggle="tab">Batsman<span id="batsman_count_total"></span></a></li>
                <li ><a href="#3a" data-toggle="tab">All-Roundrs<span id="allrounder_total"></span></a></li>
				<li><a href="#4a" data-toggle="tab">Bowlers<span id="bowler_count"></span></a></li>
				<li class="active"><a href="#5a" data-toggle="tab">All(<span id="allplayer_count_total"></span>/11)</a></li>
					   
            </ul>
			
            <div class="tab-content">                          
						  
				<div class="tab-pane" id="1a">  
						  		 
					@include('website.user.edit_wk')  															
							
                </div>
				<div class="tab-pane" id="2a">				  

					@include('website.user.edit_batsman')
							 			
                </div>
				<div class="tab-pane" id="3a">

					@include('website.user.edit_all_rounder')
							
                </div>
				<div class="tab-pane" id="4a">

					@include('website.user.edit_bowler')
							
                </div>
				<div class="tab-pane active" id="5a">

					@include('website.user.edit_all_palyer')
							
                </div>
						
            </div>
        </div> <!-- /tabbable -->
							
							
	</div>
							
					
</div>