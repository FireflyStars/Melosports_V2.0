<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use Notifiable;
	 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	  
	 protected $table = "payment_settings"; 
	  
    protected $fillable = [
        'pay_pal_status','pay_pal_credential','payu_test','test_instamojo','payu_status','gateway_status','payu_credential', 'instamojo_status','instamojo_credential','cric_api_key'
    ];

	protected $casts = [
        'pay_pal_credential' => 'array',
        'payu_credential' => 'array',
        'instamojo_credential' => 'array'
        
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
