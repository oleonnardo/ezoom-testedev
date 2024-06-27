@extends('site.layout.app')

@section('slider')
    <section id="slider" class="slider-element min-vh-100 include-header">
        <div class="slider-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-12">
                        <div class="slider-caption">
                            <div>Novas</div>
                            <div><span>Modalidades</span></div>
                            <div>e ampliação</div>
                            <div>de <span>horários</span></div>
                        </div>

                        <h6>
                            Aulas de 45 minutos e período de teste gratuito.
                        </h6>

                        <div class="slider-button">
                            <a href="#" class="btn btn-outline-white">
                                Saiba mais
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap" style="z-index: 1;">
                <video preload="auto" loop autoplay muted>
                    <source src="{{ asset('assets/videos/home.mp4') }}" type="video/mp4"/>
                    <source src="{{ asset('assets/videos/home_webm.webm') }}" type="video/webm"/>
                </video>
                <div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div>
            </div>
        </div>
    </section>
@stop

@section('content-wrapper')
    <section id="categories">
        @foreach($categories as $item)

        @endforeach
    </section>
@stop
