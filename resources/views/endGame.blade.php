@extends('master')
@section('title', 'End Game')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <div class="col-md-6">
    <form method="POST" action="{{action('GameController@postEnd')}}">
        {!! Form::token() !!}
        <button class="btn btn-danger">End The Game</button>
    </form>
    </div>
    <div class="col-md-6">
        <h2>Tussenstand</h2>
        <ul>
            <li>Naam - Score</li>
           @foreach($players as $player)
            <li>{{$player->name}} - {{$player->score}}</li>
            @endforeach
        </ul>
    </div>
@endsection