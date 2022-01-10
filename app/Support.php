<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
   protected $fillable = ['page_info', 'meta_title', 'meta_keywords','how_play_link','meta_discription','how_play' ];
}
