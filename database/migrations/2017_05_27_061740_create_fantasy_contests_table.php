<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasyContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(! Schema::hasTable('fantasy_contests')) {
            Schema::create('fantasy_contests', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('match_id')->unsigned()->nullable();
                $table->decimal('winning_pirze', 5, 2);
                $table->decimal('enterence_amount', 5, 2);
                $table->integer('contest_team_length');
                $table->string('prize_list');
                $table->integer('no_winner');
                $table->integer('is_recommended');
                $table->integer('is_multi_entry');
                $table->integer('is_confirm_contest');
                $table->integer('is_practise_contest');
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->integer('deleted_by')->nullable();
                $table->integer('is_active')->nullable();
                $table->integer('is_delete')->nullable();
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
         Schema::dropIfExists('fantasy_contests');
    }
}
