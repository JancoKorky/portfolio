@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::model($album, ['action' => ['AlbumController@update', $user->id, $album->id], 'method' => 'put', 'id'=>'create-form']) !!}
        @include('album.form')
        {!! Form::close() !!}
    </div>
@endsection
