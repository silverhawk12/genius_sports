@extends('layouts.tournaments')
@if(! empty($tournament))
@push('additional_headers')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('jquery_brackets')
<link href="{{ asset('css/jquery.bracket.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.bracket.min.js') }}"></script>

<script>
var config = {
    ajaxGet: "{{ route('ajax.get', $tournament) }}"
};
</script>
<script src="{{ asset('js/render.js') }}"></script>
@endpush
@section('title', 'Tournament')
@section('tournament_content')

<div class="col-lg-12">
    <h1>{{$tournament->name}}</h1>
    <div class="container">
            <div class="row">
                <div class="tournament"></div>
           </div>
    </div>
</div>
@endsection
@endif



