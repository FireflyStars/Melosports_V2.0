<div style="margin-top: 30px;margin-bottom: 80px">
	<div class="container">
		<div class="row">
			<div class="col-lg-6"> </div>
			<div class="col-lg-6">
				<div class="card clearfix">
					<div class="card-header">Create Team</div>
				<div class="card-body" id="other-team">
							<div class="team_bottom">
							
								<!--<div class="create" style="background:none;color:#fff;"><form action="{{url('create-team')}}" method="post"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="match_id" value="{{ Session::get('unique_id') }}"><button style="background-color: #a20505;">Create Your Team</button></form></div>-->
								
								<div class="create" >
									<a href="#" class="btn btn-primary ">
										<img id="create_img" src="{{url('public/site/image/create_team.png')}}">&nbsp;Create Your Team
									</a>
								</div>
							
							
								<div class="row text-center">
									<div class="col-lg-6">
										<div class="player-group">
											<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
											<h4>Captain</h4>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="player-group">
											<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
											<h4>Vice Captain</h4>
										</div>
									</div>
								</div>

						 
								
								<div class="batsman">
								
									
									<div class="palyer_icon" title="Batsman">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon" title="Batsman">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon" title="Batsman">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon" title="Batsman">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
									<div class="palyer_icon" title="Batsman">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/batsman.png') }}">
										</div>
									</div>
								
								</div>
								
								<div class="bowler">
								
									
									<div class="palyer_icon" class="Bowler">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon" class="Bowler">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon" class="Bowler">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon" class="Bowler">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
									<div class="palyer_icon" class="Bowler">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/bowler.png') }}">
										</div>
									</div>
								
								</div>
								
								<div class="allrounder">
								
									
									<div class="palyer_icon" style="width:30%;" class="Allrounder">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
									<div class="palyer_icon" style="width:30%;" class="Allrounder">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
									<div class="palyer_icon" style="width:30%;" class="Allrounder">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/all_rounder.png') }}">
										</div>
									</div>
																
							
								
									
									<div class="palyer_icon" style="width:54%;margin-left:20%;" title="Wicketkeeper">
										<div class="palyer_img">
											<img src="{{ url('public/site/image/wk.png') }}">
										</div>
									
									</div>
																	
								</div>
							
							</div>
						
						</div>
					</div>

			</div>
		</div>	
	</div>
</div>


{{--<div id="contest-ajax">
<div class="col-crteam">
				
						<div class="create_team">
							
							<div class="team_top">
								<p>	Create Team </p>
							</div>
							 
						
						</div>
						
				</div>
				</div>}--}
	{{--
<div class="col_tab">
				
				
				
					<div class="tabbable" style="width:98%">
					<ul class="nav nav-tabs">
					
                          <li class="active"><a href="#1a" data-toggle="tab">Public</a></li>
							<li><a href="#2a" data-toggle="tab">My Contests</a></li>                         
					   
                        </ul>				
					
					
					
					 <div class="tab-content">
					<div class="tab-pane active" id="1a">
					
					<div class="contest_filter">
					
						<div class="filter">
							<label>Win(Rs.)</label>
							<select>
								  <option value="volvo">All Series</option>
								  <option value="saab">Saab</option>
								  <option value="opel">Opel</option>
								  <option value="audi">Audi</option>
							</select>
						</div>
						
						<div class="filter">
						<label>Pay(Rs.)</label>
							<select>
								  <option value="volvo">All Series</option>
								  <option value="saab">Saab</option>
								  <option value="opel">Opel</option>
								  <option value="audi">Audi</option>
								</select>
						</div>
						
						<div class="filter">
							<label>Size(Teams)</label>
							<select>
								  <option value="volvo">All Series</option>
								  <option value="saab">Saab</option>
								  <option value="opel">Opel</option>
								  <option value="audi">Audi</option>
								</select>
						</div>
						
						<div class="filter">
							<input type="button" value="Reset">
						</div>
					
					</div>				
					
					<div class="contest_list">
					
						<div class="box">
									
										<div class="box11">
											<div class="win">
													<p> Win Rs.1,000 </p>
											</div>
											<div class="pay">
													<p>Pay Rs.115 </p>
											</div>
											<div class="tol_tip">
											
												 <a href="#" bubbletooltip=" Hi I am a bubble tooltip">C</a>
												 <a href="#" bubbletooltip=" Hi I am a bubble tooltip">M</a>
												
												
											</div>
											<div class="select_team">
													<p>0/1 teams </p>
													<div class="team_bar">
														<span style="width:10%"></span>
													</div>
									
											</div>
											<div class="win_list" id="winner">
												<p>2 winners</p>
											</div>
											<div class="box_jion">
												<a href="" data-toggle="modal" data-target="#myModal">Join</a>
											</div>
											
											<div class="win_tab" id="win_tab" style="display:none">
											
												<table>
													<tr>
														<td>Rank</td>
														<td>Price</td>
													</tr>
													<tr>
														<td>Rank1</td>
														<td>Rs. 1000</td>
													</tr>
													<tr>
													<td>Rank2</td>
														<td>Rs. 1000</td>
													</tr>
												</table>
											
											</div>
											
											
											<!-- Modal -->
											<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Modal Header</h4>
												  </div>
												  <div class="modal-body">
													<p>Some text in the modal.</p>
												  </div>
												  <div class="modal-footer">
													<a type="button" class="popup_btn" data-dismiss="modal">Ok</a>
												  </div>
												</div>

											  </div>
											</div>
											
											
										</div>
									</div>

									
									
					</div>	

				</div>
				
				<div class="tab-pane" id="2a">
						  
						  <div class="row">
						  
								<div class="accordion">
								
									
									<div class="acc_div1">hkljk</div>
									<div class="acc_div2">hkljk</div>
									<div class="acc_div3">hkljk</div>
								</div>
								<div class="panel">
								 
									<div class="acc_panel">
									
										<div class="acc_panel1">									
											
											<div class="rank_panel">
												
											</div>
											<div class="team_panel">
												fdjmfhkmgh
											</div>
											<div class="editteam_panel">
												<a href="#" id="select_team">team1</a>
											</div>
											
											<div class="team_drapdown" id="team_drapdown" style="display:none">
											
												<select>
												  <option value="volvo">Team 1</option>
												  <option value="saab">Team 2</option>
												  <option value="opel">Team 3</option>
												  <option value="audi">Team 4</option>
												</select>

												<a href="">Save</a>
													
											</div>
											
									
										</div>	
										<div class="acc_panel1">									
											
											
											<div class="rank_panel">
												
											</div>
											<div class="team_panel">
												fdjmfhkmgh
											</div>
											<div class="editteam_panel">
												
											</div>
									
										</div>
										<div class="acc_panel1">									
										
											
											<div class="rank_panel">
												
											</div>
											<div class="team_panel">
												fdjmfhkmgh
											</div>
											<div class="editteam_panel">
												
											</div>
									
										</div>
									
									</div>								 
								 
								</div>

								
								
							</div>
                  </div>
					
					</div>
					
					
				</div>
				 
				
				
			
				</div> --}}
				
				</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

	<script>
$(document).ready(function(){
//alert("1");	
				$('#create_img').click(function (e) {
			
			alert("Please select the match");
});
 });
</script>

