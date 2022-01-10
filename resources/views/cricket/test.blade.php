<div class="wrap">
        	
        		<div class="row">
        			
						<!--slider-->
						<div id="main_slider">
							<div class="banner">
								
								<div class="connect">
									
										<div class="conn_head">Connect With</div>
										<div class="conn_login">
										 <a class="fb" href="">Facebook</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <a class="google" href="">Google+</a>
									</div>
									<p class="ddd"><span class="sign"> Sign Up </span></p>
				@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
									<form class="form-horizontal" action="{{ URL('insert') }}" method="post"  id="contact_form1">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<!-- Text input-->
										<div class="form-group">	
									  <label class="col-md-12 control-label">E-Mail</label>  
										<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
										
									  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
										</div>
									  </div>
									</div>
									
									<!-- Text input-->

									<div class="form-group">
									  <label class="col-md-12 control-label" >Password</label> 
										<div class="col-md-12 inputGroupContainer">
										<div class="input-group">
									  <input name="password" placeholder="Password" class="form-control"  type="password">
										</div>
									  </div>
									</div>

								

									  <div class="form-group"> 
									  <label class="col-md-12 control-label">Date Of Birth</label>
										<div class="col-md-4 selectContainer">
										<div class="input-group">
										<select name="date" class="form-control selectpicker">
										  <option value="">Date</option>
										  <option>01</option>
										  <option>02</option>
										  <option >03</option>
										  <option >04</option>
										  <option >05</option>
										  <option >06</option>
										  <option >07</option>
										  <option >08</option>
										  <option >09</option>
										  <option >10</option>
										  <option >11</option>
										  <option >12</option>
										  <option >13</option>
										  <option >14</option>
										  <option >15</option>
										  <option >16</option>
										  <option >17</option>
										  <option >18</option>
										  <option >19</option>
										  <option >20</option>
										  <option >21</option>
										  <option >22</option>
										  <option >23</option>
										  <option >24</option>
										  <option >25</option>
										  <option >26</option>
										  <option >27</option>
										  <option >28</option>
										  <option >29</option>
										  <option >30</option>
										  <option >31</option>
										 
										</select>
									  </div>
									</div>
									
									<div class="col-md-4 selectContainer">
										<div class="input-group">
										<select name="month" class="form-control selectpicker">
										  <option value="">Month</option>
										  <option>Jan</option>
										  <option>Feb</option>
										  <option >March</option>
										  <option >April</option>
										  <option >May</option>
										  <option >June</option>
										  <option >July</option>
										  <option >Aug</option>
										  <option >Sep</option>
										  <option >Act</option>
										  <option >Nov</option>
										  <option >Dec</option>
																				 
										</select>
										
									  </div>
									</div>
									
									<div class="col-md-4 selectContainer">
										<div class="input-group">
										
										  <?php
  $currently_selected = date('Y'); 
  $earliest_year = 1950; 
  $latest_year = date('Y'); 

  print '<select name="year" class="form-control selectpicker">';
  // Loops over each int[year] from current year, back to the $earliest_year [1950]
  foreach ( range( $latest_year, $earliest_year ) as $i ) {
    // Prints the option with the next year in range.
    print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  }
  print '</select>';
  ?>
									  </div>
									</div>
									
									
									</div>
									  
									<div class="form-group">
									
									  <div class="col-md-12">
										<input type="checkbox" required>&nbsp;&nbsp; I Agree T&C</button>
									  </div>
									</div>

									<!-- Select Basic -->

									<!-- Success message -->
									<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

									<!-- Button -->
									<div class="form-group">
									
									  <div class="col-md-12">
										<button type="submit" class="btn btn-danger" >Start Playing</button>
									  </div>
									</div>
									
									<div class="form-group">
									
									  <div class="col-md-12">
										<div class="invite_form"><p>Invite by a friend?<a>Click here</a></p></div>
									  </div>
									</div>
									

									</form>


								</div>								
								
							</div>
							
						</div>        
						<!--//slider-->
                    
					   
				</div>
					   
			
		</div>