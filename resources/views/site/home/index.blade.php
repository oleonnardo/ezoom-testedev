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
    <section id="highlights">
        <div class="posts-featured overlay-card-hover">
            @foreach($highlights as $item)
                <div class="post-featured-item"
                     data-border-color="{{ $item->category->color }}"
                     data-border-position="top"
                     data-background="{{ $item->image }}">
                    <div class="content">
                        <div class="title"><a href="#">{{ $item->title }}</a></div>
                        <div class="foot">
                            <div class="date">{{ $item->created_at->translatedFormat('j \d\e F Y') }}</div>
                            <a href="#" class="action"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="posts">
        <div class="container">
            <div class="categories-with-posts">
                each('site.home._category_with_posts', $postsByCategory, 'category')
            </div>
        </div>
    </section>
@stop
