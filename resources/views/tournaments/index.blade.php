@php
use App\Status;
use App\Team;
@endphp
@extends('layouts.tournaments')
@section('title', 'Tournaments View')
@section('tournament_content')
<div class="col-lg-12">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Tournament Name</th>
            <th scope="col">Number of Teams</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tournaments as $tournament)
        <?php 
        $isFinished = false;
        $tournament_rounds = $tournament->tournament_rounds()->get();
        $current_round = $tournament->getCurrentRound();
        $hasFirstRoundMatches = $tournament->getRound(1)->round_matches()->get()->count();

        if(!$current_round){
            $isFinished = true;
            $final_match = $tournament_rounds->last()->round_matches()->where('status_id', '=', Status::PAST)->get()->first();
        }
                   
        ?>
        <tr>
            <td>{{$tournament->name}}</td>
            <td>{{$tournament->number_of_teams}}</td>
            <td>
                @if($isFinished)
                  <p>Winner: {{ ($final_match->team1_result > $final_match->team2_result ) ? Team::find($final_match->team1_id)->name : Team::find($final_match->team2_id)->name }}<p>
                @else
                    <p>ROUND {{$current_round}}</p>
                @endif
            </td>
            <td>
                <div class="row">
                        
                        <div class="col-lg-3">
                            @if(!$isFinished && $current_round === 1 && !$hasFirstRoundMatches)
                                 <a href="{{ route('tournaments.add_teams',$tournament->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-cog"></i> Add Teams </a>
                            @endif
                            @if(!$isFinished && $current_round >= 1 && $hasFirstRoundMatches)
                                 <a href="{{ route('tournaments.round',[$tournament->id,$current_round])}}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Results </a>
                            @endif
                        </div>
                    <div class="col-lg-3">
                    @if($isFinished || ($current_round > 1 && $hasFirstRoundMatches))
                                <a href="{{ route('tournaments.show',$tournament->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Show</a>
                        
                    @endif
                    </div>
                    <div class="col-xs-2">
                        <form action="{{ route('tournaments.destroy', $tournament->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this Tournaments?')"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        </form>
                    </div>

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $tournaments->links() }}
</div>
@endsection

