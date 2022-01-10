<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fantasyinvite extends Model
{
//	use Notifiable;
     protected $fillable = ['user_id', 'friend_mail','status'];
	  protected $table =  'fantasy_invite_friend';
	 
}
