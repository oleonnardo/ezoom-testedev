@extends('layouts.site')

@section('slider')
    <section id="slider" class="slider-element include-header">
        <div class="slider-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-12">
                        <div class="slider-caption">
                            <div>{{ __('Novas') }}</div>
                            <div><span>{{ __('modalidades') }}</span></div>
                            <div>{{ __('e ampliação') }}</div>
                            <div>{{ __('de') }} <span>{{ __('horários') }}</span></div>
                        </div>

                        <div class="slider-subtitle">
                            {{ __('Aulas de 45 minutos e período de teste gratuito.') }}
                        </div>

                        <div class="slider-button">
                            <a href="javascript:void(0)" class="btn btn-rounded btn-outline-white text-uppercase">
                                {{ __('Saiba mais') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <video preload="auto" loop autoplay muted>
                <source src="{{ asset('assets/videos/home.mp4') }}" type="video/mp4"/>
                <source src="{{ asset('assets/videos/home_webm.webm') }}" type="video/webm"/>
            </video>
            <div class="video-overlay" style="background-color: rgba(0,0,0,0.45);"></div>
        </div>
    </section>
@stop

@section('content-body')
    <section id="highlights">
        <div class="posts-featured overlay-card-hover"
             data-carousel="true">
            @foreach($highlights as $post)
                <div class="post-featured-item position-relative"
                     data-border-color="{{ $category->color ?? $post->category->color }}"
                     data-border-position="{{ $border_position ?? 'top' }}"
                     data-background="{{ $post->image }}">
                    <div class="content">
                        <div class="title"><a href="javascript:void(0)">{{ $post->title }}</a></div>
                        <div class="foot">
                            <div class="date">
                                {{--
                                $post->created_at->translatedFormat('j \d\e F Y')
                                // nao retorna com a primeira letra do mês em maiúsculo, mas funcional
                                opção 2:
                                --}}
                                {{ $post->created_at->day . __(' de ') }} <span
                                    class="text-capitalize">{{ $post->created_at->getTranslatedMonthName() }}</span> {{ $post->created_at->year }}
                            </div>
                            <a href="javascript:void(0)" class="action"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="posts">
        <div class="container">
            <div class="categories-with-posts">
                @each('site.home.partials.category_posts', $postsByCategory, 'category')
            </div>
        </div>
    </section>
@stop
