 <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

 
        
<div class="panel-body table-responsive">
            <table class="table table-bordered table-striped datatable">
                <thead>
                    <tr>
                       

                        <th>Date</th>
                       
                        <th>Teams</th>
                        <th>Incoming Amount</th>
                        <th>Winning Amount</th>
                        <th>Profit</th>
                       
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


$query=DB::table('matches')
				->select('matches.*','fantasy_contests.*', DB::raw('sum(fantasy_contests.enterence_amount) as income_amt'))
				->rightjoin('fantasy_user_join_contest','matches.unique_id','=','fantasy_user_join_contest.match_id')
				->rightjoin('fantasy_contests','fantasy_user_join_contest.contest_id','=','fantasy_contests.id')
				->where('matches.date','like',$yms[$ym].'%')
				->groupBy('matches.unique_id')
				->get();
				
				
				if($query)
{
				foreach($query as $match_result)
				
				{
				

				$win_amt=DB::table('matches')->where('unique_id',$match_result->unique_id)->first();
				if($win_amt->contest_type=='regular')
				{
					$query_win=DB::table('fantasy_contests')->where('category_id',$win_amt->category_id)->sum('winning_pirze');

				} else{
				
				
				$query_win=DB::table('fantasy_contests')->where('match_id',$win_amt->unique_id)->sum('winning_pirze');
				
				}




?>
				
				 <tr>
                                <td>{{ $yms[$ym]}} </td>
                              
                                
                                <td>{{ $match_result->team_1 }} VS {{$match_result->team_2 }} </td>
								 <td>{{ $match_result->income_amt/10}} </td>
								
								 
								 <td>{{ $query_win}} </td>
								 
								  <?php  $profit_val=($match_result->income_amt/10)-$query_win ;
								  if( $profit_val<0){
									  
								  ?>
								 <td style="color:red">{{ $profit_val}} </td>
								  <?php } else { ?>
								
								 <td style="color:green">{{ $profit_val}} </td>
								  <?php } ?>
								</tr>
<?php }} else { ?>			
						 <td>{{ $yms[$ym]}} </td>
						<td> No records found </td>
								</tr>
<?php }} ?>						
								 </tbody>
            </table>
        </div>
    </div>
  