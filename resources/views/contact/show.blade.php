@extends('layouts/app')

@section('content')
    <div class="container jumbotron">
        <p class="display-4">
            Môžete ma kontaktovať na e-mail
        </p>
        <p class="h4">
            <span class="text-muted">{{$user->email}}</span>
        </p>
    </div>
@endsection
