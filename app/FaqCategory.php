<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FaqCategory
 *
 * @package App
 * @property string $title
*/
class FaqCategory extends Model
{
    protected $fillable = ['title'];
    
    
}
