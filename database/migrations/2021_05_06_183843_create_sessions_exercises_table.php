<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions_exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('exercise_id');
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->foreign('session_id')->references('id')->on('sessions');
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
        Schema::table('sessions_exercises', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['session_id']);
            $table->dropForeign(['exercise_id']);
            $table->dropColumn(['exercise_id','session_id']);
        });
        Schema::dropIfExists('sessions_exercises');
    }
}
