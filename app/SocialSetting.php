<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SocialSetting extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "social_settings"; 
	  
    protected $fillable = [
        'fb_status','fb_credential', 'gmap_status', 'gmap_credential','cric_api_key' ,'glogin_status','glogin_credential','recapcha_status','recapcha_credential'
    ];

	protected $casts = [
        'fb_credential' => 'array',
        'gmap_credential' => 'array',
        'glogin_credential' => 'array',
        'recapcha_credential' => 'array'
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
