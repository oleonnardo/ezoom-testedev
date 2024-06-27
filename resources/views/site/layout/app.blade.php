
<!DOCTYPE html>
<html dir="ltr" lang="{{ App::getLocale() }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title'){{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css" />
    @stack('css')
</head>
<body>
    <div id="wrapper" class="clearfix">
        include('site.layout.partials.header')

       {{-- <section id="slider" class="slider-element min-vh-100 include-header">
            <div class="slider-inner">
                <div class="container">
                    <div class="slider-caption slider-caption-center">
                        <h2 data-animate="fadeInUp">Welcome to Canvas</h2>
                    </div>
                </div>

                <div class="video-wrap" style="z-index: 1;">
                    <video preload="auto" loop autoplay muted>
                        <source src="{{ asset('assets/videos/home.mp4') }}" type="video/mp4" />
                        <source src="{{ asset('assets/videos/home_webm.webm') }}" type="video/webm" />
                    </video>
                    <div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div>
                </div>

            </div>
        </section>--}}

        @yield('content-wrapper')
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scrips.js') }}"></script>
    @stack('js')
</body>
</html>
