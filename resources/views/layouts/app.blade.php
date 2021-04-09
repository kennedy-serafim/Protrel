<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'M&A Mapinduzi') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('assets/img/icons/favicon.png') }}" rel="icon" type="image/jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">

    <!-- CSS -->

    <link type="text/css" href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/jquery-ui-1.12.1/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('argon/css/argon.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @livewireStyles


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

    {{-- -------------------------Javascript-------------------------------- --}}

    <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset('argon/js/argon.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/summernote-0.8.18/summernote-bs4.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/summernote-0.8.18/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-mask/jquery.mask.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

    @stack('scripts')

    @livewireScripts
    <script src="{{ asset('assets/vendor/sweetalert2/cdn.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
