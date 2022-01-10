<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
     protected $fillable = ['name','match_id','winning_pirze','enterence_amount','contest_team_length','prize_list','no_winner','total_amt','is_recommended','is_multi_entry','is_confirm_contest','is_practise_contest','created_by', 'updated_by', 'deleted_by', 'is_active', 'is_delete'];
	 
	 protected $table ='fantasy_contests';
}
