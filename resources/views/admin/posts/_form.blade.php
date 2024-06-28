<div class="form-group">
    {{ html()->label(__('Categoria'), 'category_id') }}
    {{ html()
        ->select('category_id', $categories)
        ->class('form-control')
        ->placeholder(__('Selecione uma opção'))
        ->required() }}
    @error('title')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Titulo'), 'title') }}
    {{ html()
        ->text('title')
        ->class('form-control')
        ->maxlength(250)
        ->required() }}
    @error('title')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Imagem'), 'image') }}
    {{ html()
        ->file('image')
        ->class('form-control')
        ->accept('images/*') }}
    @error('image')
    <span class="text-danger">{{ $message }}</span>
    @enderror

    @isset($post)
        <div class="py-2">
            <img src="{{ $post->image }}" width="100">
        </div>
    @endisset
</div>

<div class="form-group">
    {{ html()->label(__('Conteúdo'), 'content') }}
    {{ html()
        ->textarea('content')
        ->class('form-control')
        ->rows(6)
        ->required() }}
    @error('content')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Destacar publicação?'), 'highlight') }}
    {{ html()
        ->select('highlight', ['Não', 'Sim'])
        ->class('form-control')
        ->placeholder(__('Selecione uma opção'))
        ->required() }}
    @error('highlight')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Publicação visível?'), 'active') }}
    {{ html()
        ->select('active', ['Não', 'Sim'])
        ->class('form-control')
        ->placeholder(__('Selecione uma opção'))
        ->required() }}
    @error('active')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>



<div class="form-group text-right">
    <a href="{{ route('adm.posts.index') }}" class="btn btn-secondary">{{ __('Voltar') }}</a>
    <button type="submit" class="btn btn-primary">{{ __('Salvar') }}</button>
</div>
