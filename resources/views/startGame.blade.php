@extends('master')
@section('title', 'Start Game')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <div class="col-md-6">
    <form method="POST" action="{{action('GameController@postStart')}}">
        {!! Form::token() !!}
        <button class="btn btn-success">Start The Game</button>
    </form>
    </div>
    <div class="col-md-6">
        <ul>
            <li>Naam - Score</li>
            @foreach($players as $player)
                <li>{{$player->name}} - {{$player->score}}</li>
            @endforeach
        </ul>
    </div>
@endsection