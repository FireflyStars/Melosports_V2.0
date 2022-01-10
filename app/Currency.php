<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	// protected $table = "sms_settings"; 
	  
    protected $fillable = [
        'name','code','symbol','symbol_format','active'
    ];
/* protected $casts = [
        'ninems_credentials' => 'array',
        'twilio_credentials' => 'array'
        
        
    ];
	 */
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	 
	 public function currency()
	{
	
	  return $this->hasOne('App\CurrencySetting','foreign_key');
	
	}
   
}
