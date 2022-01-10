<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestCategory extends Model
{
//	use Notifiable;
     protected $fillable = ['contest_category', 'created_by', 'updated_by', 'deleted_by', 'is_active', 'is_delete'];
	 protected $table = 'fantasy_contest_category';
}
