<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495781064FaqQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('faq_questions')) {
            Schema::create('faq_questions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '40263_5927cec82bed2')->references('id')->on('faq_categories')->onDelete('cascade');
                $table->text('question_text');
                $table->text('answer_text');
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_questions');
    }
}
