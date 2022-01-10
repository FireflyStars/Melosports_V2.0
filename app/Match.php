<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['name', 'series_id','unique_id', 'country', 'date', 'time', 'created_by', 'updated_by', 'deleted_by', 'is_active','abandon','match_type','is_delete'];
	protected $table = 'matches';
}
