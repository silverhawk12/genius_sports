<?php
use App\Team;
$teams = Team::all('id','name');
?>
@extends('layouts.tournaments')
@section('title', 'Tournament | Add Teams')
@section('tournament_content')

@if(! empty($tournament))
   <div class="container">
     <div class="row">
         <h1>{{ $tournament->name }} - {{ $tournament->number_of_teams }} teams</h1>
     </div>
     <div class="row">
        <a href="{{ route('tournaments.add_random_teams', $tournament->id) }}" class="btn btn-default" role="button" aria-pressed="true"><i class="glyphicon glyphicon-random"></i> Generate Random</a>
        <form id="addTeams" method="POST" action="{{ route('tournaments.save_first_round_teams', $tournament) }}" >
            {{ csrf_field() }}
             <?php 
            $matchRows = ($tournament->number_of_teams)/2;
            for ($i = 1; $i <= $matchRows; $i++) {?>
                <div class="row form-element">
                <div class="form-group">
                    <div class="col-md-3">
                        <select class="form-control team-select" name="matches[{{$i}}][]" id="{{$i}}-team_a" required>
                            @if($i == 1)
                                <option value="">--chose-team--</option>
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-2 vs-class"><p> VS. </p></div>
                    <div class="col-md-3">
                        <select class="form-control team-select" name="matches[{{$i}}][]" id="{{$i}}-team_b" required>
                        </select>
                    </div>
                </div>
             </div> 
            <?php } ?>
            
                <div class="row form-element">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
             </div>
        </form>
        
     </div>
 
 </div>
@endif
@endsection

