@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Galéria')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
                <div
                    class="align-items-center pt-3 pb-2 mb-3">

                    <div class="row mt-2">
                        @can('edit-portfolio', $user)
                            <div class="col-12 col-xl-2 col-lg-3 col-md-3 col-sm-12">
                                {{--link alebo div--}}
                                <a href="{{route('user.album.create', $user->id)}}"
                                   class="card mb-4 text-decoration-none">
                                    <div
                                        class="d-none d-xs-none d-sm-none d-md-flex bd-placeholder-img card-img-top d-flex justify-content-center align-items-center fit-image">
                                        <i class="fas fa-plus display-1"></i>
                                    </div>

                                    <div class="d-block d-sm-block d-md-none card-body add-album">
                                        <h6 class="card-text">Pridať obrázok</h6>
                                    </div>
                                </a>
                            </div>
                        @endcan
                        @foreach($albums as $album)
                            <div class="col-12 col-xl-2 col-lg-3 col-md-3 col-sm-12">
                                <a class="card mb-4 shadow-sm text-decoration-none"
                                   href="{{route('user.album.show', [$user->id, $album->id])}}">
                                    <img src="{{asset('img/img_02.jpg')}}" alt="{{$album->album_name}}"
                                         class="bd-placeholder-img card-img-top fit-image">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>

    </div>


@endsection
