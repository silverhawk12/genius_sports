<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\TournamentRound;
use App\Http\Requests\TournamentRequest;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::paginate(20);
        return view('tournaments.index', compact('tournaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tournaments.create')->with('number_of_teams', Tournament::getAllowedTeamNumbers());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentRequest $request)
    {
        //the request comes validated through the TournamentRequest
        $validated = $request->validated();
        $tournament = Tournament::create($validated);
        
        //generate each tournament round. possible to add round name etc.
        $numberOfRounds = $this->getRoundsCount($tournament->number_of_teams);
        for ($i = 1; $i <= $numberOfRounds; $i++) {
            $tournamentRound = new TournamentRound();
            $tournamentRound->round_number = $i;
            $tournament->tournament_rounds()->save($tournamentRound);
        } 
        return view('tournaments.teams', compact('tournament'));
    }
    
    public function addTeams($id){
        $tournament = Tournament::find($id);
        return view('tournaments.teams', compact('tournament'));
    }
    
    private function getRoundsCount($number_of_teams){
        return floor(log($number_of_teams,2));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);
        if(!empty($tournament)){
            return view('tournaments.show', compact('tournament'));
        }
        return redirect('/tournaments')->withErrors('Tournament does not exist!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tournament = Tournament::find($id);
        $tournament->delete();

        return redirect('/tournaments')->with('success', 'Tournament '.$tournament->name.' has been DELETED Successfully');
    }
}
