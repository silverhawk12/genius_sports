<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {

    private static $number_of_teams = array(
        'TOURNAMENT_8_TEAMS' => 8,
        'TOURNAMENT_16_TEAMS' => 16,
        'TOURNAMENT_32_TEAMS' => 32,
        'TOURNAMENT_64_TEAMS' => 64
    );
    protected $fillable = [
        'name',
        'number_of_teams'
    ];

    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament_rounds() {
        return $this->hasMany('App\TournamentRound');
    }
    
    
    public function getRound($round_number){
         return $this->tournament_rounds()->where('round_number', $round_number)->get()->first();
    }
    
    public static function getAllowedTeamNumbers() {
        return self::$number_of_teams;
    }
    
    public function getCurrentRound(){
        foreach ($this->tournament_rounds()->get() as $round) {
            if($round->isCompleted()){
                continue;
            } else {
                return $round->round_number;
            }            
        }
        return false;
    }

}
