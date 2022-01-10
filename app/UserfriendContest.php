<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserfriendContest extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "user_frnd_contests"; 
	  
    protected $fillable = [
        'user_id','frnd_email','entrance_credit','winner_length_id','match_id','winner_prize_amt','t_length'
    ];

	
    public function winner_length()
	{
	
	 return $this->belongsTo('App\WinnerLength','winner_length_id');
	
	}
   
}
