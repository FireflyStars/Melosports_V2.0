<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SmsSetting extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "sms_settings"; 
	  
    protected $fillable = [
        'ninems_status','setting_status','ninems_credentials','twilio_status','twilio_credentials','shakthi_status','shakthi_credential'
    ];
protected $casts = [
        'ninems_credentials' => 'array',
        'twilio_credentials' => 'array'
        
        
    ];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
