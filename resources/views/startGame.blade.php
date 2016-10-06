@extends('master')
@section('title', 'Start Game')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <form method="POST" action="{{action('GameController@postStart')}}">
        {!! Form::token() !!}
        <button class="btn btn-success">Start The Game</button>
    </form>
@endsection