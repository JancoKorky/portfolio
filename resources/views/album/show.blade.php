@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Galéria')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
                <div
                    class="align-items-center pt-3 pb-2 mb-3">
                    <p class="text-muted">
                        <a href="{{url()->previous()}}">Naspäť na predošlú stránku</a>
                    </p>
                    <div class="row mt-2">
                        @can('edit-portfolio', $user)
                            @can('edit-album', $this_album)
                                <div class="col-12 col-xl-2 col-lg-3 col-md-3 col-sm-12">
                                    {{--link alebo div--}}
                                    <a href="{{route('user.album.image.create', [$user->id, $this_album->id])}}"
                                       class="card mb-4 text-decoration-none card-shadow">
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
                        @endcan
                        @foreach($images as $index => $image)
                            <div class="col-12 col-xl-2 col-lg-3 col-md-3 col-sm-12">
                                <div class="card mb-4 shadow-sm text-decoration-none card-shadow">
                                    <a
                                        href="#" data-target="#modalIMG" data-toggle="modal"
                                        onclick="currentSlide({{$index+1}})">
                                        <img src="{{asset('img/albums/'.$this_album->id.'/'.$image->filename)}}"
                                             alt="{{$image->name}}"
                                             class="showimage bd-placeholder-img card-img-top fit-image">
                                    </a>
                                    @can('edit-portfolio', $user)
                                        @can('edit-album', $this_album)
                                            <div class="card-body">
                                                {!! Form::model($image, ['action' => ['ImageController@destroy', $user->id, $this_album->id, $image->id], 'method' => 'delete', 'id'=>'delete-form', 'onsubmit' => "return confirm('Naozaj chceš zmazať obrázok')"]) !!}
                                                {!! Form::button('<i class="fas fa-times text-danger mt-2"></i> Zmazať',['type'=>'submit',
                                                            'class' => 'btn btn-link deleteBtnAlbum',
                                                        ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        @endcan
                                    @endcan
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>

    </div>

    {{-- modal --}}
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG"
         role="dialog"
         tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body mb-0 p-0">
                    @foreach($images as $index => $image)
                        <div class="mySlides">
                            <img
                                src="{{asset('img/albums/'.$this_album->id.'/'.$image->filename)}}"
                                alt="{{$image->name}}" style="width:100%">
                        </div>
                @endforeach

                <!-- Next/previous controls -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center"
                            data-dismiss="modal" type="button">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}

    <script>
        var slideIndex = 1;
        // showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = $(".mySlides");
            // var dots = document.getElementsByClassName("demo");
            // var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            // for (i = 0; i < dots.length; i++) {
            //     dots[i].className = dots[i].className.replace(" active", "");
            // }
            slides[slideIndex - 1].style.display = "block";
            // dots[slideIndex-1].className += " active";
            // captionText.innerHTML = dots[slideIndex-1].alt;
        }
        $('html').keydown(function (e) {

            if ($('#modalIMG').hasClass('show')){
                // Left
                if (e.keyCode === 37) {
                    plusSlides(-1)
                }
                // Right
                else if(e.keyCode === 39) {
                    plusSlides(1)
                }
            }
        });

    </script>
@endsection
