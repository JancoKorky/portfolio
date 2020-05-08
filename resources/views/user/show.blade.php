@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Portfólio')

@section('content')

    <div class="container jumbotron">
        @can('edit-portfolio', $user)
            <div class="float-right">
                <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-block btn-primary">EDITOVAT TEXTY</a>
            </div>
        @endcan
        <h4 class="text-muted">{{$user->name}}</h4>
        <h1 class="display-3">{{$user->title}}</h1>
        <div class="myContainer">
            {!! $user->rich_text!!}
        </div>

        <hr/>
    </div>

    <hr/>



    {{-- IMG modal --}}
    <div class="container mt-4">
        <div class="mt-4 mb-3 row">
            <div class="col-md-4">
                <a href="#" data-target="#modalIMG" data-toggle="modal"
                   class="">
                    <div class="">
                        <img alt="Card image cap" class="card-img-top"
                             src="{{asset('img/img_01.jpg')}}"/>
                    </div>
                </a>
            </div>

            <div class="card-body col-md-8">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Live the moment. Capture the moment. Share
                    the moment. HERO6 is here, and the moment is now. #GoPro #GoProHERO6</p>
            </div>
        </div>
        <hr/>
        <a href="#" class="text-decoration-none text-dark" data-target="#modalIMG" data-toggle="modal">
            <div class="mt-4 mb-3 row">

                <div class="col-md-4">
                    <div class="">
                        <div class="">
                            <img alt="Card image cap" class="card-img-top"
                                 src="{{asset('img/img_01.jpg')}}"/>
                        </div>
                    </div>
                </div>

                <div class="card-body col-md-8">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Live the moment. Capture the moment. Share
                        the moment. HERO6 is here, and the moment is now. #GoPro #GoProHERO6</p>
                </div>
            </div>
        </a>
    </div>
    {{-- end IMG modal --}}
    {{-- modal --}}
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog"
         tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body mb-0 p-0">
                    <img
                        src="{{asset('img/img_01.jpg')}}"
                        alt="" style="width:100%">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-link" href="{{asset('img/img_01.jpg')}}"
                       target="_blank">Plná veľkosť</a>
                    <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center"
                            data-dismiss="modal" type="button">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

@endsection
