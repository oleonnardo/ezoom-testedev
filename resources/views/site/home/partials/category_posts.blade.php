<div class="category-item {{ $key%2 === 0 ? 'category-item-odd' : '' }}"
     data-border-color="{{ $category->color }}"
     data-border-position="left">
    <div class="row align-items-center">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="px-0 px-sm-2 px-md-3">
                <h1 class="text-uppercase ft-thin">
                    {{ $category->name }}
                </h1>
                <div class="subtitle py-3">
                    {{ $category->short_description }}
                </div>
                <div class="see-more">
                    <a href="javascript:void(0)" class="btn btn-outline-black btn-rounded text-uppercase">
                        {{ __('Ver todos') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-12">
            <div class="row category-posts {{ $category->contrast ? 'category-posts-contrast' : '' }}">
                @foreach($category->posts as $post)
                    @include('site.home.partials.post-item', [
                        'border_position' => 'bottom'
                    ])
                @endforeach
            </div>
        </div>
    </div>
</div>
