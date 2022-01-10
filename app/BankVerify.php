<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankVerify extends Model
{
     protected $fillable = ['user_id','mobile_no','otp','otp_verification_status','pan_full_name','pan_card_no','date_of_birth','state','pan_card_image','pancard_verify_status','bank_acc_no','bank_name','branch_name','bank_holder_name','ifsc_code','bank_verify_status'];
	protected $table = 'fantasy_user_bankdetails';
}
