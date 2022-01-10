<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "site_settings"; 
	  
    protected $fillable = [
        'site_name','site_logo', 'meta_keyword','privacy_policy','user_pts','meta_description', 'website','social_links','address','city','zip_code','country','email','support_email','phone','terms_condition','footer_text','minimum_wallet_amount','minimum_play_point'
    ];

	protected $casts = [
        'social_links' => 'array',
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
