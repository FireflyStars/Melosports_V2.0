@include('website.user.header')
@include('website.user.menu1')
 


<div class="section-pad wid-bg">

@if( Session::has( 'success' ))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>success!</strong> {{ Session::get( 'success' ) }}.
</div>
@endif

	<div class="container" style="padding-top:10px">
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-head text-center">Edit Challenge Contest</h1>
			</div>
		</div>
	
		<div class="row">
		
			
				
				 <div class="col-md-6 col-md-offset-3 col-sm-12">
				 <div class="white-box">
				 
				<form  action="{{ URL('edit_challenge_post') }}" method="post"  id="contact_form" autocomplete="off">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					 <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					 <input type="hidden" name="match_id" value="{{$my_contest->match_id}}">
					 <input type="hidden" name="contest_id" value="{{$my_contest->id}}">
					

					<div id="credit_error" style="display:none">
					<p style="color:red">Enterance credit cannot be 0.Please change your no of team or winning amount.</p>
					
					</div>
		

					<div class="form-group">
					<label>Winner Prize Amount</label>
					   
					  
					  <input  name="w_prize" id="w_prize" required value="{{$my_contest->winner_prize_amt}}" class="form-control"  type="number"  placeholder="Winning Prize">
						 
					</div>

					<!-- Text input-->
	
					<!-- Text input-->
						   <div class="form-group">
						   <label>No Of Teams</label>
						 
					  <input name="t_length"  id="t_length" type="number" required placeholder="No of teams" class="form-control"  value="{{$my_contest->user_length}}">
					 
					</div>


					<!-- Text input-->
						   
					<div class="form-group">
					<label>Number of Winner</label>
					<select name="n_winner" id="winner123" class ="form-control" required>   
					<option value="">Select Winner </option>
					
					@foreach($winner as $win)     
					<option value="{{$win->id}}"  @if($my_contest->winner_length_id==$win->id) selected @endif >{{ $win->team_length }}</option>
					@endforeach      
					</select>		
							
					
					 
					</div>
					
					@php($pt=App\SiteSetting::findorfail(1))			
					
				
					<input type="hidden" name="pt" id="point"  value="{{$pt->user_pts}}">
					
					<div class="form-group">
						 <label>Entrance Credit</label>
					  <input name="e_credit" readonly  type="number" required  class="form-control"   id="e_credit" value="{{$my_contest->entrance_credit}}">
					 
					</div>
					
					
					
					
					
					
					
					<div class="form-group">
					
					 <label>Friend Email</label>
					   
							<textarea class="form-control" required name="f_email" placeholder="Message">{{$my_contest->frnd_email }}</textarea>
					 
					</div>
					
					<p style="color:green">Mail id should be seperated with comma(,)</p>	
					<div id="rank">						
					<?php  
					
					$win=App\WinnerLength::findorfail($my_contest->winner_length_id);


$rank=json_decode($win->position);
$amount=json_decode($win->rank_amount);
					
					
					?>
					<table>						
								<tr>									
									<th>
										Rank 
									</th>										
									<th>
										Position
									</th>
									
									</tr>
								
							
									@for($i=0;$i<count($rank);$i++)
								<tr>	
							
							<td>
										{{$rank[$i]}}
									</td>										
									<td>
										{{$amount[$i]}}  %
									</td>	
								
									
									</tr>	
								@endfor
							
							
							
							</table>
					
					
					
					
					
					
					</div>  <br><br>
					 


					<!-- Select Basic -->

					<!-- Success message -->
					<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

					<!-- Button -->

					<div class="form-group">

					 

					 <button type="submit" id="c_sub" class="btn btn-primary" >  Submit </button>

					  
					</div>

					
					</form>
					
				</div>
				</div>
		
			
			
			<div class="col-md-6">
		
			
		
		
			</div>	
		
		
		</div>		
		
		
	</div>
     
</div>
    <!--//page_container-->
	
	<script>	
						$('#w_prize,#t_length').keyup(function(){
					
						var price=$('#w_prize').val();					
						var length=$('#t_length').val();				
						var pt_price=$('#point').val();					
						amt=parseInt(price)*20/100;						
						c_amt=parseInt(price)+parseInt(amt);			
						credit=parseInt(c_amt)/parseInt(length);		
						e_credit=parseInt(credit)*parseInt(pt_price);	
						if(isNaN(e_credit))				
							{							
						$('#e_credit').val(0);			
						}
						else	
							{	
						$('#e_credit').val(e_credit);	
						}	

					if($('#e_credit').val()>0)
							{
							
							$('#credit_error').hide();
							$("#c_sub").attr("disabled", false);
							
							} else{
							
							
							$('#credit_error').show();
							$("#c_sub").attr("disabled", true);
							
							}




						
						});								
						
						
						$("#winner123").change(function(){
							
							
							var s_value=$(this).val();	
							//alert(s_value);
							
							//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');			
						 
						 $.ajax({              
							url:"{{url('ajax_rank')}}",        
							type: 'POST',                  
							data: {			
							rank_id: s_value,	
							 "_token": $('#token').val(),	
							},                 
							success: function (content) {	
							//alert(content);
							$('#rank').html(content);       
							}				
							});						
							});					
							</script>	


	
@include('website.user.footer') 
