@extends('master')

@section('title', 'Albumy portfolia')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">

                        <li class="sidebar-heading  justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <a class="d-flex align-items-center text-muted text-decoration-none" href="#">
                                <span class="mr-2">Pridať kategóriu</span>
                                <i class="fas fa-plus"></i>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">

                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <hr/>

                    <div class="row mt-2">
                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            {{--link alebo div--}}
                            <a href="#" class="card mb-4  text-decoration-none">
                                <rect class="d-xs-none bd-placeholder-img card-img-top d-flex justify-content-center align-items-center fit-image">
                                    <i class="fas fa-plus display-1"></i>
                                </rect>

                                <div class="card-body add-album">
                                    <h6 class="card-text">Pridať album</h6>
                                </div>
                            </a>
                        </div>

                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_02.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">

                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_02.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">

                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_01.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">
                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_01.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">
                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_02.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">
                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3 col-md-6 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{asset('img/img_01.jpg')}}"
                                     class="bd-placeholder-img card-img-top fit-image">
                                <div class="card-body">
                                    <h6 class="card-text">Toto je nadpis albumu</h6>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        </main>
    </div>
    </div>


@endsection
