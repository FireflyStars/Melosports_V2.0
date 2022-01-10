 <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

 
        
<div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                       

                        <th>Date</th>
                       
                        <th>Amount</th>
                       
                    </tr>
                </thead>
                
                <tbody>
				<?php  
$datetime1 = new DateTime($fdate);
$datetime2 = new DateTime($tdate);
$interval = $datetime1->diff($datetime2);
$days = $interval->format('%a'); 
$yms=array();
$now = date($fdate);
for($i=0;$i<=$days;$i++)
{
  $ym = date('Y-m-d', strtotime($now . " $i day"));
   $yms[$ym] = $ym;


$query=DB::table('fantasy_user_winning_details')->where('created_at','like',$yms[$ym].'%')->sum('amount');

if($query)
{




?>
				
				 <tr>
                                <td>{{ $yms[$ym]}} </td>
                                
                                <td>{{ $query }} </td>
                                
								
								
								</tr>
<?php } else { ?>			
						 <td>{{ $yms[$ym]}} </td>
						<td> No records found </td>
								</tr>
<?php }} ?>						
								 </tbody>
            </table>
        </div>
    </div>
  