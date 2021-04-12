<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'M&A Mapinduzi') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon/img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">

    {{-- Scripts --}}
    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>
    <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true">
    </script>
    <script src="{{ asset('js/app.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true" data-turbolinks-eval="true"></script>

    <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true">
    </script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>
    <script src="{{ asset('assets/vendor/jquery-mask/jquery.mask.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"> </script>

    <script src="{{ asset('assets/js/main.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>
    <script src="{{ asset('js/custom.js') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>
    <script src="{{ asset('argon/js/argon.js?v=1.0.0') }}" data-turbolinks-eval="true" data-turbolinks-track="true"></script>

    @stack('js')
    <!-- Icons -->
    <link href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">
    <link href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">

    <link type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">
    <link type="text/css" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" data-turbolinks-eval="true" data-turbolinks-track="true">

    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">
    <link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">
    <link type="text/css" href="{{ asset('argon/css/argon.css?v=1.0.0') }}" rel="stylesheet" data-turbolinks-eval="true" data-turbolinks-track="true">

</head>

<body class="{{ $class ?? '' }}">
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('layouts.navbars.sidebar')
    @endauth

    <div class="main-content">
        @include('layouts.navbars.navbar')
        @yield('content')
    </div>

    @guest()
        @include('layouts.footers.guest')
    @endguest


</body>

</html>
