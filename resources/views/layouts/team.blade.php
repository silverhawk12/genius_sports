@extends('layouts.app')

@section('content')
<div class="row">
    <a href="/teams/create" class="btn btn-primary" role="button" aria-pressed="true"><i class="glyphicon glyphicon-plus"></i> Add</a>
    <a href="/teams" class="btn btn-primary" role="button" aria-pressed="true"><i class="glyphicon glyphicon-list"></i> View</a>
</div>
 @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
 @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
<div class="container main-content">
    @yield('team_content')
</div>

@endsection