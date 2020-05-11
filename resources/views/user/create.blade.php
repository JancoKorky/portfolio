@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::open(['action' => ['PortfolioImageController@store', $user->id], 'method' => 'post', 'files' => true, 'id'=>'create-form']) !!}
        <div class="form-group">
            <div>
            {!! Form::text('name_by_user', null, [
                'class' => 'form-control my-1',
                'placeholder'=> 'Názov tohto obrázku',
                'autofocus'
            ] ) !!}
            @error('name_by_user')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            {!! Form::textarea('description', null, [
                'class' => 'form-control my-1',
                'placeholder'=> 'Text k obrázku',
                'rows'=> 15
            ]) !!}
            @error('description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>

            <span class="text-muted">
                <strong>Maximálna veľkosť jedného obrázku je 5MB</strong>
            </span>
            {!! Form::file('image', ['class'=>'form-control', 'required']) !!}
            @error('image')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>


        <div class="form-group">
            <a class="btn btn-link" href="{{route('user.show',$user->id)}}">
                Vrátit sa späť
            </a>

            {!! Form::button($title,['type'=>'submit',
            'class' => 'btn btn-outline-primary'
        ]) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
