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
        @include('layouts.partials.header')

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

    @include('layouts.partials.js')
</body>
</html>
