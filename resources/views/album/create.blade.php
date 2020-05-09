@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::model($user, ['action' => ['AlbumController@store', $user->id], 'method' => 'post', 'id'=>'create-form']) !!}
        @include('album.form')
        {!! Form::close() !!}
    </div>
@endsection
