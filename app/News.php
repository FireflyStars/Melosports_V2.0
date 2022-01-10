<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable = ['title','description','created_by', 'updated_by', 'deleted_by', 'is_active', 'is_delete'];
	 
	 protected $table ='fantasy_news';
}
