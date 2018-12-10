@extends('layouts.tournaments')
@section('title', 'Tournaments | Add')
@section('tournament_content')

<form method="post" action="{{ route('tournaments.store') }}">
    {{ csrf_field() }}
    <div class="row form-element">
        <div class="form-group">
            <div class="col-md-6">
                <label for="name">Tournament Name</label>
                <input type="input" class="form-control" id="name" name="name"  placeholder="Enter Team name">
            </div>
            <div class="col-md-2">
                <label for="number_of_teams">Number of teams:</label>
                <select class="form-control" id="number_of_teams" name="number_of_teams">
                    @if( ! empty($number_of_teams))
                    @foreach($number_of_teams as $option)
                    <option>{{$option}}</option>
                    @endforeach
                    @endif

                </select>
            </div>
        </div>
    </div>  
   
        <div class="row form-element">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
     </div>
</form>
@endsection

