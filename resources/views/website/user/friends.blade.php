<div class="row">
			
				<div class="col-md-4">
				
						<div class="div11">
						
							<div class="mega_top">
								<p>Mega Contest &nbsp;&nbsp;<img class="img-right" src="{{url('public/site/image/mega_contest.png')}}"></p>
							</div>
							
							<div class="mega_bottom">
								<!--<p>No mega Contest at the moment</p>-->
								<p style="color:#FF0000";>Coming soon...</p>
								
							</div>
							
						
						</div>
				 
				</div>
				 
				<div class="col-md-4">
				<center>
					<div class="div11">
					
							<div class="invite_top">
								<p>Invite Friends&nbsp;&nbsp; <img class="img-right" src="{{url('public/site/image/invite_frnds.png')}}"></p>
							</div>
							
							<div class="invite_bottom">
							<p>	Gift Credit.100 , Get Credit.100 ! <a href="" data-toggle="modal" data-target="#invite_friend" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i>
 Invite Friends</a> </p>  
							
							</div>
												
					</div>
				  </center>
				</div>
				  
				<div class="col-md-4">
				
					<div class="div11" >
					
						<div class="challenge_top">
								<p>Challenge Friends &nbsp;&nbsp;<img class="img-right" src="{{url('public/site/image/challenge.png')}}"><span class="badge badge-light" id="c_count"> </span></p>
							</div>
							
							
							{{--	<p style="color:green"> My Challenges  </p>--}}
							
							<div class="challenge_bottom">
							
							
							
							
									<p>Challenge Your Friend...<a href="" data-toggle="modal" data-target="#challenge_friend" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i>Challenge Friend</a>
									</p>
							</div>
						
					</div>
				   
				</div>		
			
			
			</div>
			<!-- Modal -->
				   <div id="invite_friend" class="modal fade" role="dialog" style="top:0%;">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Invite Friends</h4>
							  </div>
							  
							  <div class="modal-body" style="padding:0pc 5px;">
								
							
							  <form  class="well form-horizontal" action="{{URL::to('invite-friend')}}" method ="post" style="margin-top:2px;">
							    {{ csrf_field() }}
							 
							  <div class="form-group">
					  <label class="col-md-3 control-label">Enter Email</label>  
					  <div class="col-md-9 inputGroupContainer">
					  <div class="input-group">
					<input type="text" class="content" value="" name="friend_mail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
						</div>
					  </div>
					</div>
							  
							 
							  </div>
							  <div class="modal-footer">
							<!--	<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>-->
								<button type="submit" class="popup_btn" >Send Invite</button>
							  </div>
							
							</form>
  </div>
						  </div>
						</div>
						
						
						
						
						
						<!--Challenge Friend Modal -->
						
						
						 <div id="challenge_friend" class="modal fade" role="dialog" style="top:0%;">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Challenge Friends</h4>
							  </div>
							  
							  <div class="modal-body" style="padding:0pc 5px;">
								
							
							
											
					<div class="wall_tab">	
					
					<div class="tabbable" style="margin-bottom: 9px;">						
					<ul class="nav nav-tabs">											
					<li class="active"><a href="#111a" data-toggle="tab">My Contest</a></li>	
					<li><a href="#222a" data-toggle="tab">Create Contest</a></li>	
<?php $match_id=Session::get('unique_id');

		//echo $match_id;

 ?>
					
				@php($my_contest=App\UserfriendContest::whereuser_id(Auth::user()->id)->wherematch_id($match_id)->get())
				@if(count($my_contest)!=0)
					<li><a href="#333a" data-toggle="tab">Edit Contest</a></li>	
				@endif				
					
					</ul>
					<!-- Start of first tab -->               			 
					<div class="tab-content clearfix">                   
					<div class="tab-pane active" id="111a">		
					<div class="wall_tableft">				
					
					
					<div id="c_frnd">
					</div> 
					
					
					
					
					</div>					
					</div>				
					<!-- end of first tab --> 
					<div class="tab-pane" id="222a">	
					<div class="wall_tableft">		
					
				


<div id="c_form">					
</div>					
					
					
					
					</div>							
					 	
					</div>	
					<!-- end of second tab --> 
					
					
						
					<div class="tab-pane" id="333a">		
					<div class="wall_tableft">				
					
					
					<div id="e_contest">
					</div> 
					
					
					
					
					</div>					
					</div>	
				


					
					<!-- end of  tab Content -->	
					</div>							
					</div>
					
					
							  
							  
							  
							 
							  </div>
							  <div class="modal-footer">
							<!--	<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>-->
								
							  </div>
							
							
  </div>
						  </div>
						</div>						
						</div>					
					
							
							
							
							
						