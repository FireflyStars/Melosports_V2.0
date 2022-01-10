<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
     protected $fillable = ['name','email','mobile','message'];
	protected $table = 'fantasy_enquiry';
}
