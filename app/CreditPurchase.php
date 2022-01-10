<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditPurchase extends Model
{
//	use Notifiable;
     protected $fillable = ['user_id', 'credit_point', 'purchase_amount'];
	  protected $table =  'fantasy_user_creditpurchase';
}
