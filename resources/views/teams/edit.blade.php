@extends('layouts.team')
@section('title', 'Teams Edit')
@section('team_content')
<form method="post" action="{{ route('teams.update', $team->id) }}">
        @method('PATCH')
        @csrf
        <div class="row form-element">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="name">Team Name</label>
                    <input type="input" class="form-control" id="name" name="name"  value="{{ $team->name }}">
                </div>

            </div>
        </div>  
        <div class="row form-element">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
</form>
@endsection

