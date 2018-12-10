<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tournament_round_id');
            $table->foreign('tournament_round_id')->references('id')->on('tournament_round')->onDelete('cascade');
            $table->unsignedInteger('team1_id');
            $table->unsignedInteger('team2_id');
            $table->unsignedInteger('team1_result')->nullable();
            $table->unsignedInteger('team2_result')->nullable();
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict');
        });
        
        DB::query("ALTER TABLE `matches` ADD UNIQUE `unique_tournament_round_id_team1_id_team2_id_index`(`tournament_round_id`, `team1_id`, `team2_id`);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournament_round', function(Blueprint $table) {
                    $table->dropForeign(['tournament_round_id']);
                });
                
        Schema::table('statuses', function(Blueprint $table) {
                    $table->dropForeign(['status_id']);
                });
                
        Schema::dropIfExists('matches');
    }
}
