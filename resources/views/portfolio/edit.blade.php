@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::model($portfolioImage, ['action' => ['PortfolioImageController@update', $user->id, $portfolioImage->id], 'method' => 'put', 'id'=>'edit-form']) !!}
        @include('portfolio.form')
        {!! Form::close() !!}
    </div>
@endsection
