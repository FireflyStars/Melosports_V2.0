<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FaqQuestion
 *
 * @package App
 * @property string $category
 * @property text $question_text
 * @property text $answer_text
*/
class Testmonials extends Model
{
    protected $fillable = ['name', 'description', 'is_status'];
     protected $table ='testimonials';

    /**
     * Set to null if empty
     * @param $input
     */
    
    
}
