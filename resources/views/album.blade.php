@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Galéria')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-3 col-xl-2 d-none d-md-block bg-light sidebar viewport-height">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column categories">
                        <h5 class="nav-item border-bottom nav-link font-weight-bold">
                            Kategórie
                        </h5>
                        @can('edit-portfolio', $user)
                            <li id="add-category"
                                class="sidebar-heading justify-content-between align-items-center px-3 mb-1 text-muted text-uppercase">
                                <a class="nav-link d-flex align-items-center text-success text-decoration-none"
                                   href="{{url('user/'.$user->id.'/category/create')}}">
                                    <span class="mr-2">Pridať kategóriu</span>
                                    <i class="fas fa-plus"></i>
                                </a>
                            </li>
                        @endcan

                        @foreach($categories as $category)
                            @if($category->albums()->count() === 0 && Auth::id() != $user->id)
                                @continue
                            @endif
                            <li class="nav-item d-flex justify-content-between border-bottom">
                                <a class="nav-link" href="{{url('user/'.$user->id.'/category/'.$category->id)}}">
                                    {{$category->category_name}}
                                </a>
                                @can('edit-portfolio', $user)
                                    <div class="float-right d-flex justify-content-between">
                                        <a class="text-decoration-none"
                                           href="{{route('user.category.edit', [$user->id, $category->id])}}">
                                            <i class="fas fa-edit mt-2"></i>
                                        </a>
                                        <a class="text-decoration-none ml-2"
                                           href="{{route('user.category.delete', [$user->id, $category->id])}}">
                                            <i class="fas fa-times text-danger mt-2"></i>
                                        </a>
                                    </div>
                                @endcan
                            </li>
                        @endforeach

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-9 col-xl-10 px-4">
                <div
                    class="align-items-center pt-3 pb-2 mb-3">
                    @isset($spec_category)
                        <div class="d-flex justify-content-start">
                            <p class="text-muted">
                                Kategória: {{$spec_category->category_name}}
                            </p>
                            <a class="text-decoration-none ml-1"
                               href="{{route('user.album.index', $user->id)}}">
                                <i class="fas fa-times text-danger mt-1"></i>
                            </a>
                        </div>
                    @endisset
                    <div class="row mt-2">

                        @can('edit-portfolio', $user)
                            <div class="col-12 col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                {{--link alebo div--}}
                                <a href="{{route('user.album.create', $user->id)}}"
                                   class="card mb-4  text-decoration-none card-shadow">
                                    <div
                                        class="d-xs-none bd-placeholder-img card-img-top d-flex justify-content-center align-items-center fit-image">
                                        <i class="fas fa-plus display-1"></i>
                                    </div>

                                    <div class="card-body add-album">
                                        <h6 class="card-text">Pridať album</h6>
                                    </div>
                                </a>
                            </div>
                        @endcan
                        @foreach($albums as $album)
                            @if($album->image()->count() === 0 && (Auth::guest() || Auth::id() != $user->id))
                                @continue
                            @endif
                            <div class="col-12 col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <div class="card mb-4 shadow-sm card-shadow">
                                    <a class=" text-decoration-none"
                                       href="{{route('user.album.show', [$user->id, $album->id])}}">
                                        @if($album->image()->first())
                                            <img
                                                src="{{asset('img/albums/'.$album->id.'/'.$album->image()->first()->filename)}}"
                                                class="bd-placeholder-img card-img-top fit-image">
                                        @else
                                            {{--<img src="{{asset('img/notfound.jpg')}}"
                                                 class="bd-placeholder-img card-img-top fit-image">--}}
                                            <div
                                                class="bd-placeholder-img card-img-top d-flex justify-content-center align-items-center fit-image">
                                                Album bez obrázkov
                                            </div>
                                        @endif
                                    </a>
                                    <div class="card-body d-flex justify-content-between">
                                        <h6 class="card-text">{{$album->album_name}}</h6>
                                        @can('edit-portfolio', $user)
                                            @can('edit-album', $album)
                                                <div class="float-right">
                                                    <a class="text-decoration-none mr-2"
                                                       href="{{route('user.album.edit', [$user->id, $album->id])}}">
                                                        <i class="fas fa-edit mt-1"></i>
                                                    </a>

                                                    {!! Form::model($album, ['action' => ['AlbumController@destroy', $user->id, $album->id], 'method' => 'delete', 'id'=>'delete-form', 'onsubmit' => "return confirm('Naozaj chceš zmazať album')", 'class' => "float-right delete-position" ]) !!}
                                                    {!! Form::button('<i class="fas fa-times text-danger float-right icon-large"></i>',['type'=>'submit',
                                                                'class' => 'btn btn-link deleteBtnAlbum',
                                                            ]) !!}
                                                    {!! Form::close() !!}
                                                </div>
                                            @endcan
                                        @endcan
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </main>
        </div>

    </div>


@endsection
