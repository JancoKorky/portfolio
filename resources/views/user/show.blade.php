@extends('layouts/app')

@section('title', ucfirst($user->name) . ' / Portfólio')

@section('content')

    @can('edit-portfolio', $user)
        <div class="container mt-2">
            <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-block btn-primary">Upraviť úvodný text</a>
        </div>
    @endcan
    <div class="container jumbotron mb-0 pt-4">
        <h1 class="display-4 text-muted">{{$user->title}}</h1>
        <div class="myContainer">
            {!! $user->rich_text!!}
        </div>
        <hr/>
    </div>

    @can('edit-portfolio', $user)
        <div class="container">
            <a href="{{route('user.portfolio.create', $user->id)}}" class="btn btn-block btn-primary">Pridať
                obrázok</a>
        </div>
    @endcan
    <div class="container mt-4">

        @foreach($images as $index => $image)
            @can('edit-portfolio', $user)
                <div class="d-flex justify-content-start">
                    {!! Form::model($image, ['action' => ['PortfolioImageController@destroy', $user->id, $image->id], 'method' => 'delete', 'id'=>'delete-form', 'onsubmit' => "return confirm('Naozaj chceš zmazať obrázok aj s popisom?')"]) !!}
                    {!! Form::button('<i class="fas fa-times text-danger mt-2 remove-font-size"></i> Zmazať',['type'=>'submit',
                                'class' => 'btn btn-link deleteBtnAlbum remove-font-size text-decoration-none',
                            ]) !!}
                    {!! Form::close() !!}
                    <a class="text-decoration-none ml-5 remove-font-size"
                       href="{{route('user.portfolio.edit', [$user->id, $image->id])}}">
                        <i class="fas fa-edit mt-2 remove-font-size"></i> Upraviť
                    </a>
                </div>
            @endcan
            <div class="mt-1 mb-5 row">

                <div class="col-md-4">
                    <a
                        href="#" data-target="#modalIMG" data-toggle="modal"
                        onclick="currentSlide({{$index+1}})">
                        <img src="{{asset('img/portfolio/'.$user->id.'/'.$image->filename)}}"
                             alt="{{$image->name}}"
                             class="showimage card-img-top">
                    </a>
                </div>

                <div class="card-body col-md-8">

                    <h4 class="card-title">{{$image->name_by_user}}</h4>

                    <p class="card-text">{!! add_paragraphs(filter_url(e($image->description)))!!}</p>

                </div>
            </div>
        @endforeach
    </div>
    {{-- end IMG modal --}}
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
                                src="{{asset('img/portfolio/'.$user->id.'/'.$image->filename)}}"
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

            if ($('#modalIMG').hasClass('show')) {
                // Left
                if (e.keyCode === 37) {
                    plusSlides(-1)
                }
                // Right
                else if (e.keyCode === 39) {
                    plusSlides(1)
                }
            }
        });

    </script>
@endsection
