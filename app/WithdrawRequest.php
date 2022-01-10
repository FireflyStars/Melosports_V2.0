<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
//	use Notifiable;
     protected $fillable = ['user_id', 'withdraw_amount', 'withdraw_request_at', 'deposite_status','user_verification_status','deposited_on'];
	  protected $table =  'fantasy_user_withdraw';
}
