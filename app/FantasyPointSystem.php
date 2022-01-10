<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FantasyPointSystem extends Model
{
     protected $fillable = ['id','each_run','each_four','each_six','century','half_century','per_wicket','caught_bowled','dismissal_for_duck','maiden_over','4_wickets','5_wickets','stumping','run_out','economy_rate_below_4', 'economy_rate_4_5','economy_rate_5_6','economy_rate_6_7','economy_rate_7_9', 'economy_rate_above_9', 'strike_rate_60_70', 'strike_rate_50_60', 'strike_rate_below_50', 'match_type', 'created_by', 'updated_by', 'created_at'];
	protected $table = 'fantasy_pointsystem';
}
