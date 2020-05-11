@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::open(['action' => ['ImageController@store', $user->id, $album->id], 'method' => 'post', 'files' => true, 'id'=>'create-form']) !!}
        @include('image.form')
        {!! Form::close() !!}
    </div>
@endsection
