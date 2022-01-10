<div class="col-crteam">
				
						<div class="create_team">
							
							<div class="team_top">
								<p>	Create Team </p>
							</div>
						
							<div class="team_bottom">
							
								<!--<div class="create" style="background:none;color:#fff;"><form action="{{url('create-team')}}" method="post"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="match_id" value="{{ Session::get('unique_id') }}"><button style="background-color: #a20505;">Create Your Team</button></form></div>-->
								
								<div class="create"><a href="{{url('create-team',Session::get('unique_id'))}}">Create Your Team</a></div>
							
								
							
								<div class="captain">
									 <h5>Captain </h5>
									<center>
									<div class="palyer_icon" style="width:40%;margin-left:30%;">
										<div class="palyer_img">
											<img src="">
										</div>
									</div>
									</center>						
								</div>
								
								<div class="vc_captain">
								<h5>Vice Captain </h5>
									<center>
									<div class="palyer_icon" style="width:40%;margin-left:30%;">
										<div class="palyer_img">
											<img src="">
										</div>
									</div>
									</center>							
								</div>
								
								<div class="batsman">
								
									
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
								
								</div>
								
								<div class="bowler">
								
									
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
								
								</div>
								
								<div class="allrounder">
								
									
									<div class="palyer_icon" style="width:30%;">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
									<div class="palyer_icon" style="width:30%;">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
									<div class="palyer_icon" style="width:30%;">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
																
								</div>
								
								<div class="wicketkeeper">
								
									
									<div class="palyer_icon" style="width:54%;margin-left:20%;">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/wk.png') }}">
										</div>
									
									</div>
																	
								</div>
							
							</div>
						
						</div>
						
				
				</div>