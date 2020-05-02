<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<header class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container"><a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
</header>

<body class="">
@yield('content')
</body>

<!-- Footer -->
<footer class="mt-4 bg-dark text-light">
    <!-- Footer Links -->
    <div class="container text-center text-md-left pt-4">
        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">
                <!-- Content -->
                <h5 class="text-uppercase text-light">Footer Content</h5>
                <p>Here you can use rows and columns to organize your footer content.</p>
            </div>
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3 links-color float-right">
                <!-- Links -->
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a class="text-light" href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="{{ asset('js/jQuery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/myjs.js') }}"></script>
</html>
