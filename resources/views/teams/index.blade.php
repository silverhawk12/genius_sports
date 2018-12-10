@extends('layouts.team')
@section('title', 'Teams View')
@section('team_content')
<div class="col-xs-10">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Team Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
        <tr>
            <td>{{$team->name}}</td>
            <td>
                <div class="row">
                    <div class="col-xs-2">
                        <a href="{{ route('teams.edit',$team->id)}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    </div>
                    <div class="col-xs-2">
                        <form action="{{ route('teams.destroy', $team->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this Team?')"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        </form>
                    </div>

                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $teams->links() }}
</div>
@endsection

