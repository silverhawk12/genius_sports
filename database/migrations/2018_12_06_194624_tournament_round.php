<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TournamentRound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tournament_round', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->tinyInteger('round_number');
            
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournaments', function(Blueprint $table) {
                    $table->dropForeign(['tournament_id']);
                });
        Schema::dropIfExists('tournament_round');
    }
}
