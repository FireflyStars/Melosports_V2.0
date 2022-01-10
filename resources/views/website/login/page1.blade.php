

@include('cricket.header')




@include('cricket.menu1')





<div class="page_container">

	<div class="container" style="padding-top:10px">
	
				<?php

			include('match.php');

			?>

				
				<?php

			include('friends.php');

			?>

			<div class="row">
			
				<div class="col_contest">	
					<?php

					include('create_team.php');

					?>
					
					<?php

					include('contest.php');

					?>
					
				</div>
				
			</div>
		
		</div>
     
    </div>
    <!--//page_container-->
@include('cricket.footer')

