<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class WithdrawPts extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "withdraw_playpt"; 
	  
    protected $fillable = [
        'user_id','play_pt','amount','status'
    ];

	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
