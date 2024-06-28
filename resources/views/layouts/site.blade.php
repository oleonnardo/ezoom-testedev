<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title'){{ config('app.name') }}</title>
    @include('layouts.partials.css')
</head>
<body>
    <section id="wrapper" class="clearfix">
        @include('site.layout.partials.header')

        @yield('slider')

        <section class="content-body">
            @yield('content-body')
        </section>
    </section>

    <div id="whatsapp">
        <a href="javascript:void(0)">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scrips.js') }}"></script>
    @stack('js')
</body>
</html>
