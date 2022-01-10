<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ChallengeFrnd extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "challenge_frnd"; 
	  
    protected $fillable = [
        'user_id','refer_email','match_id','contest_id'
    ];

	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
