@php
use App\Team;
@endphp
@extends('layouts.tournaments')
@section('title', 'Tournament')
@if(! empty($tournament) && ! empty($round_number))
    @section('tournament_content')

<div class="col-lg-12">
    <h1>{{$tournament->name}} - ROUND {{$round_number}}</h1>
    <div class="container">
            <div class="row">
                 <form id="roundResults" method="POST" action="{{ route('tournaments.save_round',['tournament' => $tournament,'round_number' => $round_number]) }}" >
                    {{ csrf_field() }}
                     @if(! empty($round_matches))
                         @foreach($round_matches as $round_match)
                         <div class="row form-group">
                             <input type="hidden" name="round_results[{{$round_match->id}}]" value="" required>
                             <div class="col-md-4">
                                  <div class="col-md-3  col-md-offset-6">
                                        <p>{{Team::find($round_match->team1_id)->name}}</p>
                                    </div>
                                   <div class="col-md-3">
                                        <input class="form-control score_input" name="round_results[{{$round_match->id}}][{{$round_match->team1_id}}]" type="input" class="form-control" value="{{ $round_match->team1_result }}" required>
                                   </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="col-md-3">
                                        <input class="form-control score_input" name="round_results[{{$round_match->id}}][{{$round_match->team2_id}}]" type="input" class="form-control" value="{{ $round_match->team2_result }}" required>
                                  </div>
                                  <div class="col-md-3">
                                         <p>{{Team::find($round_match->team2_id)->name}}</p>
                                  </div>
                             </div>
                         </div> 
                         @endforeach
                     @endif
                        <div class="row form-element">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit Results</button>
                        </div>
                     </div>
                </form>   
                
           </div>
    </div>
</div>
    @endsection
@endif
