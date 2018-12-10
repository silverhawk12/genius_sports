<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Match;
use App\Tournament;
use App\Status;
use App\Team;

class MatchController extends Controller {

    public function saveFirstRoundTeams(MatchRequest $request, $tournament_id) {
         /*
         * REQUEST IS VALIDATED in MatchRequest
         */
        $tournament = Tournament::find($tournament_id);
        if ($tournament) {
            $validated = $request->validated();
            $matches = $validated['matches'];

            $tournament_round = $tournament->getRound(1);
            $tournament_round_id = $tournament_round->id;

            if ($tournament_round_id) {
                foreach ($matches as $teams_pair) {
                    $match = new Match();
                    $match['tournament_round_id'] = $tournament_round_id;
                    $match['team1_id'] = $teams_pair[0];
                    $match['team2_id'] = $teams_pair[1];
                    $match['status_id'] = Status::FUTURE;
                    $match->save();
                }
            }
           
            return redirect()->route('tournaments.round',['tournament' => $tournament->id,'round' => 1]);
        }
    }


    public function getMatchesPerRound($tournament_id,$round_number){
        $tournament = Tournament::find($tournament_id);
        if ($tournament) {
            $tournament_round = $tournament->getRound($round_number);
            $round_matches = $tournament_round->round_matches()->get();
            return view('tournaments.round')->with(['tournament'=>$tournament,'round_matches'=>$round_matches,'round_number' => $round_number]);
        }
    }
    
    public function saveMatches(MatchRequest $request,$tournament_id,$round_number){
        
        /*
         * REQUEST IS VALIDATED in MatchRequest
         */
         $tournament = Tournament::find($tournament_id);
         $results = $request->validated();
        if ($tournament && !empty($results)) {
            $tournament_round = $tournament->getRound($round_number);
            $round_matches_ids = $tournament_round->round_matches()->where('status_id', '=', Status::FUTURE)->pluck('id')->toArray();
            
            $diffMatchIds = array_diff(array_keys($request->get('round_results')),$round_matches_ids);
            if(empty($diffMatchIds)){
               $nextRoundTeams = [];
               foreach($request->get('round_results') as $match_id => $match_results){
                    $match = Match::find($match_id);
                    if($match){
                        if(!empty($match->team1_result) && !empty($match->team2_result) ){
                            continue;
                        }
                        if(!isset($match_results[$match->team1_id]) || !isset($match_results[$match->team2_id])){
                            continue;
                        }
                        $match->team1_result = $match_results[$match->team1_id];
                        $match->team2_result = $match_results[$match->team2_id];
                        $match->status_id = Status::PAST;
                        $match->save();
                        $nextRoundTeams[] = ($match->team1_result > $match->team2_result ) ? $match->team1_id : $match->team2_id;
                        }
               }
            }else{
                return redirect('/tournaments')->withErrors('Tournament round matches data is already stored!');
            }
            
            $next_round = $this->getNextRound($tournament,$round_number);
            if($next_round){
                $this->generateNextRoundMatches($tournament,$next_round,$nextRoundTeams);
                return redirect()->route('tournaments.round',['tournament' => $tournament->id,'round' => $next_round]);
            }
            return redirect()->route('tournaments.show',['tournament' => $tournament->id]);
        }
        return redirect('/tournaments')->withErrors('Invalid Request');
    }
    
    
    private function generateNextRoundMatches($tournament,$next_round,$teams = array(),$shuffle = false){
            $tournament_round = $tournament->getRound($next_round);
            $tournament_round_id = $tournament_round->id;
            if ($tournament_round_id) {
                    if($shuffle){
                        $pairs = $this->shuffleTeams($teams);
                    }else{
                        $pairs = array_chunk($teams, 2);
                    }
                  
                    foreach($pairs as $team){
                        $match = new Match();
                        $match['tournament_round_id'] = $tournament_round_id;
                        $match['team1_id'] = $team[0];
                        $match['team2_id'] = $team[1];
                        $match['status_id'] = Status::FUTURE;
                        $match->save();
                    }
            }
    }
    
    private function tournamentRoundCount($tournament){
        return count($tournament->tournament_rounds()->get());
    }
    
    private function getNextRound($tournament,$round_number){
        $next_round = ($round_number+1);
        if($this->tournamentRoundCount($tournament) >= $next_round){
            return $next_round;
        }
        return false;
    }
    
    private function shuffleTeams($teams) {
        shuffle($teams);
        $result = array_chunk($teams, 2);
        return $result;
    }
    
    public function randomlyCreateFirstRoundMatches($tournament_id){
        $tournament = Tournament::find($tournament_id);
        $hasFirstRoundMatches = $tournament->getRound(1)->round_matches()->get()->count();
        if(!$hasFirstRoundMatches){
            $randomTeams = Team::all()->random($tournament->number_of_teams)->pluck('id')->toArray();
            $this->generateNextRoundMatches($tournament,1,$randomTeams,true);
            return redirect()->route('tournaments.round',['tournament' => $tournament->id,'round' => 1]);
        }
        return redirect('/tournaments')->withErrors('Tournament already has teams asigned!');
       
    }
    
   

}
