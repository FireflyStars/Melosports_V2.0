


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
							
							