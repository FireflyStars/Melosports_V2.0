<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FrnduserjoinContest extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "frnd_user_join_contest"; 
	  
    protected $fillable = [
        'user_id','match_id','frnd_email','team_id','frnd_contest_id','points','rank','joining_date','non_confirm_contest'
    ];

	
   public function user_name()
   {
   
   return $this->belongsTo('App\User','user_id');
   
   }
   
}
