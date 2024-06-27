@extends('site.layout.app')

@section('sliders')
    <section id="slider" class="slider-element min-vh-100 include-header">
        <div class="slider-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-12">
                        <div class="slider-caption">
                            <div>Novas</div>
                            <div><span>modalidades</span></div>
                            <div>e ampliação</div>
                            <div>de <span>horários</span></div>
                        </div>

                        <div class="slider-subtitle">
                            Aulas de 45 minutos e período de teste gratuito.
                        </div>

                        <div class="slider-button">
                            <a href="#" class="btn btn-rounded btn-outline-white text-uppercase">
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

@section('content-body')
    {{--
    <section id="highlights">
        <div class="posts-featured">
            @foreach($highlights as $item)
                <div class="post-featured-item"
                     data-border-color="{{ $item->category->color }}"
                     data-border-position="top"
                     data-background="{{ $item->image }}">
                    <div class="content">
                        <div class="title"><a href="#">{{ $item->title }}</a></div>
                        <div class="foot">
                            <div class="date">{{ $item->created_at->translatedFormat('j \d\e F Y') }}</div>
                            <div class="action">
                                <a href="#">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>--}}

    <section id="posts">
        <div class="container">
            <div class="categories-posts">

                <div class="category-item category-item-odd"
                     data-border-color="red"
                     data-border-position="left">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-12">
                            <h4 class="text-uppercase ft-thin">Esportes</h4>
                            <div class="subtitle">
                                Lorem Ipsum dolor Sit Amet Lorem.
                            </div>
                            <div class="see-more">
                                <a href="#" class="btn btn-outline-black btn-rounded text-uppercase">
                                    Ver todos
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
