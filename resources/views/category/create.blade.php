@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Vytvor kategóriu')

@section('content')

    <div class="container jumbotron">
        <h1>Vytvorenie kategórie</h1>
        {!! Form::model($user, ['action' => ['CategoryController@store', $user->id], 'method' => 'post', 'id'=>'create-form']) !!}
        @include('category.form')
        {!! Form::close() !!}
    </div>
@endsection
