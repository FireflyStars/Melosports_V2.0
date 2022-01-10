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
class FaqQuestion extends Model
{
    protected $fillable = ['questions', 'answer', 'is_status'];
     protected $table ='faq';

    /**
     * Set to null if empty
     * @param $input
     */
    
    
}
