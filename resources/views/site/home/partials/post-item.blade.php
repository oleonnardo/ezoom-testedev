<div class="col-md-4 col-12">
    <div class="category-posts-item position-relative"
         style="--item-color: {{ $category->color }};"
         data-border-color="{{ $category->color }}"
         data-border-parent=".post-featured-banner"
         data-border-position="bottom">

        <div class="post-featured-banner py-5"
             data-background="{{ $post->image }}"></div>

        <div class="content">
            <div class="title"><a href="javascript:void(0)">{{ $post->title }}</a></div>
            <div class="foot">
                <div class="date">
                    {{--
                    $post->created_at->translatedFormat('j \d\e F Y')
                    // nao retorna com a primeira letra do mês em maiúsculo, mas funcional
                    opção 2:
                    --}}
                    {{ $post->created_at->day . ' de ' }} <span class="text-capitalize">{{ $post->created_at->getTranslatedMonthName() }}</span> {{ $post->created_at->year }}
                </div>
                <a href="javascript:void(0)" class="action"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
