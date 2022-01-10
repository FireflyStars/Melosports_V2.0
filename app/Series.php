<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
//	use Notifiable;
     protected $fillable = ['name', 'created_by', 'updated_by', 'deleted_by', 'is_active', 'is_delete'];
}
