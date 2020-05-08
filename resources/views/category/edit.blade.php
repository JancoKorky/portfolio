@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::model($category, ['action' => ['CategoryController@update', $user->id, $category->id], 'method' => 'put', 'id'=>'edit-form']) !!}
        @include('category.form')
        {!! Form::close() !!}
    </div>
@endsection
