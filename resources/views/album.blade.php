@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Galéria')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column categories">

                        @can('edit-portfolio', $user)
                            <li id="add-category"
                                class="sidebar-heading justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <a class="nav-link d-flex align-items-center text-success text-decoration-none"
                                   href="{{url('user/'.$user->id.'/category/create')}}">
                                    <span class="mr-2">Pridať kategóriu</span>
                                    <i class="fas fa-plus"></i>
                                </a>
                            </li>
                        @endcan

                        <li class="nav-item">
                            <a class="nav-link border-bottom" href="#">
                                Nezaradené
                            </a>
                        </li>

                        @foreach($categories as $category)
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

            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="align-items-center pt-3 pb-2 mb-3">

                    <div class="row mt-2">
                        @can('edit-portfolio', $user)
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                                {{--link alebo div--}}
                                <a href="{{route('user.album.create', $user->id)}}"
                                   class="card mb-4  text-decoration-none">
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
                            <div class="col-12 col-lg-3 col-md-6 col-sm-12">

                                <a class="card mb-4 shadow-sm text-decoration-none"
                                   href="{{route('user.album.show', [$user->id, $album->id])}}">
                                    <img src="{{asset('img/img_02.jpg')}}"
                                         class="bd-placeholder-img card-img-top fit-image">

                                    <div class="card-body">
                                        <h6 class="card-text">{{$album->album_name}}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </main>
        </div>

    </div>


@endsection
