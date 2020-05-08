@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Portfólio')

@section('content')

    <div class="container jumbotron">
        {!! Form::model($user, ['action' => ['UserController@update', $user->id], 'method' => 'put', 'id'=>'edit-form']) !!}
        @include('user.form')
        {!! Form::close() !!}
    </div>


@endsection
