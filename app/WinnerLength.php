<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class WinnerLength extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 //protected $table = "user_frnd_contests"; 
	  
    protected $fillable = [
        'team_length','position','rank_amount'
    ];

	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
