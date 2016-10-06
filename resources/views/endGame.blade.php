@extends('master')
@section('title', 'End Game')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <form method="POST" action="{{action('GameController@postEnd')}}">
        {!! Form::token() !!}
        <button class="btn btn-danger">End The Game</button>
    </form>
@endsection