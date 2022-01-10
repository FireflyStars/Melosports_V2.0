<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentUser extends Model
{
    protected $table = 'fantasy_user_payment';

    protected $fillable = ['user_id','payment_amount','payment_method','bank_name','address','mobile_no','address','payment_status','card_number','order_id','transaction_id'];

    /* 
		status : 0 => progress, 1 => Fail, 2 => Successful
    */
}