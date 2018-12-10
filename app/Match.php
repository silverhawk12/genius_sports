<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
   public $timestamps = false;

   
   public function tournament_rounds() {
        return $this->hasMany('App\TournamentRound');
    }
}
