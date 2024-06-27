<div class="post-featured-item"
     data-border-color="{{ $post->category->color }}"
     data-border-position="bottom"
     data-background="{{ $item->image }}">
    <div class="content">
        <div class="title"><a href="#">{{ $item->title }}</a></div>
        <div class="foot">
            <div class="date">{{ $item->created_at->translatedFormat('j \d\e F Y') }}</div>
            <a href="#" class="action"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>
