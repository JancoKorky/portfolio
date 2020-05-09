@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / '.$title)

@section('content')

    <div class="container jumbotron">
        <h1>{{$title}}</h1>
        {!! Form::model($category, ['action' => ['CategoryController@destroy', $user->id, $category->id], 'method' => 'delete', 'id'=>'delete-form', 'onsubmit' => "return confirm('Naozaj chceš zmazať kategóriu')"]) !!}

{{--        <span>Používateľa: <span class="font-weight-bold">{{ucfirst($user->name)}}</span></span>--}}

        <blockquote class="form-group mt-3">
            <p class="display-4">&ldquo;{{$category->category_name}}&ldquo;</p>
            <p class="teaser">{{$category->description}}</p>
        </blockquote>

        <div class="form-group">
            <a class="btn btn-link" href="{{route('user.album.index',$user->id)}}">
                Vrátit sa späť
            </a>

            {!! Form::button($title,['type'=>'submit',
            'class' => 'btn btn-outline-primary deleteBtn',
        ]) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
