@extends('layouts.team')
@section('title', 'Teams Add')
@section('team_content')
<form method="post" action="{{ route('teams.store') }}">
    {{ csrf_field() }}
        <div class="row form-element">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="name">Team Name</label>
                    <input type="input" class="form-control" id="name" name="name"  placeholder="Enter Team name">
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

