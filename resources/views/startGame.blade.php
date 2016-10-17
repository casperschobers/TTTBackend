@extends('master')
@section('title', 'Start Game')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <div class="col-md-6">
    <form method="POST" action="{{action('GameController@postStart')}}">
        {!! Form::token() !!}
        <input type="text" name="min"/> min
        <br>
        <br>
        <input type="text" name="sec"/> sec
        <br>
        <br>
        <button class="btn btn-success">Start The Game</button>
    </form>
    </div>
    <div class="col-md-6">
        <h2>Eindstand</h2>
        <ul>
            <li>Naam - Score</li>
            @foreach($players as $player)
                <li>{{$player->name}} - {{$player->score}}</li>
            @endforeach
        </ul>
    </div>
@endsection