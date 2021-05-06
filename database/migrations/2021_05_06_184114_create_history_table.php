<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exercise_id');
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->integer('score');
            $table->integer('accuracy');
            $table->integer('avg_reaction_time');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['user_id']);
            $table->dropForeign(['exercise_id']);
            $table->dropForeign(['session_id']);
            $table->dropColumn(['user_id','exercise_id','session_id']);
        });
        Schema::dropIfExists('history');
    }
}
