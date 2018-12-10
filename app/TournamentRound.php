<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Status;

class TournamentRound extends Model
{
   protected $table = 'tournament_round';
   
   public $timestamps = false;
   
   public function round_matches() {
        return $this->hasMany('App\Match','tournament_round_id');
    }
    
    public function isCompleted(){
        return $this->round_matches()->count() > 0 && $this->round_matches()->where("status_id", "=", Status::PAST)->get()->count() == $this->round_matches()->get()->count() ;
    }

}
