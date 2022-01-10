<?php 

$site=App\SiteSetting::findorfail(1);


$fetch = DB::table('matches')

					                ->where('unique_id', '=', $unique_id)

									->first();



					        $subd=substr("$fetch->date",0,10);

					        $subt=substr("$fetch->date",-13,-5);

							//$tim=strtotime("+330 minutes", strtotime($subt));

										//	$tim=date('h:i:s',strtotime("+330 minutes",$subt));

										

										

										$time = strtotime($subt);

										$time_sar = strtotime($subd.$subt);

										$tim_sar = date("Y-m-dH:i:s", strtotime('+300 minutes', $time_sar));

                               $tim = date("H:i:s", strtotime('+300 minutes', $time));

							            // $con=$subd.$tim;

										

										

										

										

							             $con=$tim_sar;



									?>





	





  
  

  @if (date('Y-m-dH:i:s') < $con) 








<form  class="well form-horizontal" id="my_cform" action="{{url('frnd_contest')}}" method ="post" style="margin-top:2px;">
					{{ csrf_field() }}				
					
					<div id="credit_error" style="display:none">
					<p style="color:red">Enterance credit cannot be 0.Please change your no of team or winning amount.</p>
					
					</div>
					
					
					
					
					<div class="form-group">	
					<label class="col-md-3 control-label">Winning Prize</label>  
					<div class="col-md-9 inputGroupContainer">				
					<div class="input-group">				
					<input type="text" class="content" value="" name="w_prize" id="w_prize"  required>	
					</div>				
					</div>				
					</div>				
					<div class="form-group">	
					<label class="col-md-3 control-label">No.of Teams</label>  
					<div class="col-md-9 inputGroupContainer">					
					<div class="input-group">					
					<input type="text" class="content" value="" name="t_length"  id="t_length" required>	
					</div>							
					</div>					
					</div>				
					<div class="form-group">
					<label class="col-md-3 control-label">Number of Winner</label>  
					<div class="col-md-4 inputGroupContainer">				
					<div class="input-group">							
					<select name="n_winner" id="winner" class ="form-control" required >   
					<option value="">Select Winner </option>
					@php($winner=App\WinnerLength::wherestatus(0)->orderby('team_length','asc')->get())	
					@foreach($winner as $win)     
					<option value="{{$win->id}}">{{ $win->team_length }}</option>
					@endforeach      
					</select>				
					</div>				
					</div>				
					</div>	
						<div id="s_error">
						
						
						
						</div>





					
					<div class="form-group">	
					<label class="col-md-3 control-label">Entrance Credit</label> 
					<div class="col-md-9 inputGroupContainer">					
					<div class="input-group">			
					<input type="text" class="content" readonly value="" name="e_credit" id="e_credit">	
					</div>					
					</div>					
					</div>					
					<input type="hidden"  value="{{Auth::user()->id}}">	
					@php($pt=App\SiteSetting::findorfail(1))			
					
					<input type="hidden" name="user_id"  value="{{Auth::user()->id}}">	
					<input type="hidden"  name="match_id" value="{{$unique_id}}">		
					<input type="hidden" name="pt" id="point"  value="{{$pt->user_pts}}">
					<div class="form-group">					
					<label class="col-md-3 control-label">Friends Email</label>  		
					<div class="col-md-9 inputGroupContainer">				
					<div class="input-group">					
					<textarea class="content" id="f_mai" name="f_email" required="required"></textarea>	
					</div>						
					</div>						
					</div>						
					<p style="color:green">Mail id should be seperated with comma(,)</p>	
					<div id="rank">						
					</div>  <br><br>
					<div class="form-group">		
					<button type="submit" id="c_sub" class="popup_btn" >Challenge Friend</button>		
					</div>							
					</form>	
					
					@else
						
					
					<p style="color:red">You cant Create challenge as match is closed </p>
					
					
					
					@endif
					
					
				<script>	
				
				$('#credit_error').hide();
				
						$('#w_prize,#t_length').keyup(function(){
							//alert('hi');
					
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
						
						
						$("#winner").change(function(){
							var s_value=$(this).val();	
							var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');			
							$.ajax({              
							url:"{{url('ajax_rank')}}",        
							type: 'POST',                  
							data: {			
							rank_id: s_value,	
							_token:CSRF_TOKEN,	
							},                 
							success: function (content) {	
							$('#rank').html(content);       
							}								
							});						
							});		

							/* $('#c_sub').click(function(){
								
								if($('#e_credit').val()==0)
								{
								
								$('#credit_error').show();
								
								
								} else{
			
								
								
								
								
								$('#credit_error').hide();
								
								$('#my_cform').submit();
								
								}
								
								
								
								
								
								
								
							}); */

							

							
							</script>		
					