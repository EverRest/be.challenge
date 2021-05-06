<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('challenge_id');
            $table->foreign('challenge_id')->references('id')->on('challenges');
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
        Schema::table('challenges_sessions', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['session_id']);
            $table->dropForeign(['challenge_id']);
            $table->dropColumn(['challenge_id','session_id']);
        });
        Schema::dropIfExists('challenges_sessions');
    }
}
