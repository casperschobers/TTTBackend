@extends('master')
@section('title', 'New Target')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <h1>Touch The Tree</h1>
    <div class="col-md-6">
        <form method="POST" action="{{action('TargetController@postCreate')}}" enctype="multipart/form-data">
            {!! Form::token() !!}
            <input name="name" type="text" placeholder="name">
            <input name="qrId" type="text" placeholder="qrId">
            <input name="image" type="file" placeholder="image">
            <button class="btn btn-success">Add Target</button>
        </form>
    </div>
    <div class="col-md-6">
        <ul>
        @foreach($targets as $target)
            <li>{{$target->name}} = {{$target->qrId}}</li>
        @endforeach
        </ul>
    </div>
@endsection