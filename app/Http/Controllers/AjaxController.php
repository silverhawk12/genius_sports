<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Match;
use App\Team;
use App\Tournament;
use App\Status;

class AjaxController extends Controller
{
    public function getAllTeams(Request $request)
    {
        if($request->ajax()){
            
            $validator = Validator::make($request->all(), [
                'excluded.*' => 'exists:teams,id', // check each item in the array
                'excluded.*' => 'distinct'
            ]);
            
            if ($validator->fails())
            {
               return response()->json(['msg' => 'Validation failed!'], 400);
            }
            
            $teams = DB::table('teams')
                    ->whereNotIn('id', $request->excluded)
                    ->get();
            
            return response()->json($teams, 200);
        }
        
    	
    }
    
    public function getMatches(Request $request,$tournament_id){
        
        if($request->ajax()){
            $tournament = Tournament::find($tournament_id);
            if ($tournament) {
                $response = array();
                $tournament_rounds = $tournament->tournament_rounds()->get();
                foreach($tournament_rounds as $tournament_round){
                      $current_round_matches = $tournament_round->round_matches()->get();
                      $current_round_results = [];
                      foreach($current_round_matches as $match){
                          if($tournament_round->round_number == 1){
                                $team1 = Team::find($match->team1_id)->name;
                                $team2 = Team::find($match->team2_id)->name;
                                $response['teams'][] = [$team1,$team2];
                          }
                          $current_round_results[] = [$match->team1_result,$match->team2_result];
                      }
                      $response['results'][] = $current_round_results;
                }
                return response()->json($response, 200);
            }
        }
    }
    
}
