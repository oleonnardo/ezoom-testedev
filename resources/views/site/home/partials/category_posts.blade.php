<div class="category-item {{ $key%2 === 0 ? 'category-item-odd' : '' }}"
     data-border-color="{{ $category->color }}"
     data-border-position="left">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-12">
            <h2 class="text-uppercase ft-thin">
                {{ $category->name }}
            </h2>
            <div class="subtitle py-3">
                {{ $category->short_description }}
            </div>
            <div class="see-more">
                <a href="#" class="btn btn-outline-black btn-rounded text-uppercase">
                    Ver todos
                </a>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 col-12">
            <div class="category-posts background--hover {{ $category->contrast ? 'category-posts-contrast' : '' }}">
                @foreach($category->posts as $item)

                @endforeach
            </div>
        </div>
    </div>
</div>
