
<!DOCTYPE html>
<html dir="ltr" lang="{{ App::getLocale() }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title'){{ config('app.name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://ezoom.com.br/application/modules/comum/assets/img/icon/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://ezoom.com.br/application/modules/comum/assets/img/icon/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="https://ezoom.com.br/application/modules/comum/assets/img/icon/apple-touch-icon-57x57-precomposed.png">
    <link rel="shortcut icon" href="https://ezoom.com.br/application/modules/comum/assets/img/icon/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://ezoom.com.br/application/modules/comum/assets/img/icon/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" type="text/css" />
    @stack('css')
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
