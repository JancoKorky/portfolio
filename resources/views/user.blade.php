@extends('master')

@section('content')

        <div class="container jumbotron">
            <h1 class="display-3">Title</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores
                at culpa cumque,
                dignissimos dolor dolore doloribus eius est fugit illum minima minus necessitatibus nostrum, officia
                omnis
                provident repellat tempora veritatis.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <h3 class="text-muted">user {{$id ?? ''}}</h3>
        </div>

        <hr/>


        <div class="row">
            {{-- IMG modal --}}
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" data-target="#modalIMG" data-toggle="modal"
                           class="color-gray-darker c6 td-hover-none">
                            <div class="ba-0 ds-1">
                                <img alt="Card image cap" class="card-img-top"
                                     src="{{asset('img/img_01.jpg')}}"/>
                            </div>
                        </a>
                    </div>

                    <div class="card-body col-md-8">
                        <h4 class="card-title color-gray-darker">Title</h4>
                        <p class="card-text color-gray-darker">Live the moment. Capture the moment. Share
                            the moment. HERO6 is here, and the moment is now. #GoPro #GoProHERO6</p>
                    </div>

                </div>
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
                            <div>
                                <a href="{{asset('img/img_01.jpg')}}"
                                   target="_blank">Plná veľkosť</a>
                            </div>
                            <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center"
                                    data-dismiss="modal" type="button">Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
        </div>

@endsection
