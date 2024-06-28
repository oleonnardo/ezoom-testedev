<div class="py-3">
    {{ html()
        ->modelForm(Request::all(), 'get')
        ->autocomplete('off')
        ->class('row')
        ->open() }}

    <div class="col-md-3 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Título'), 'title')->class('label-sm') }}
        {{ html()
            ->text('title')
            ->class('form-control')
            ->placeholder(__('Título')) }}
    </div>

    <div class="col-md-3 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Categoria'), 'category_id')->class('label-sm') }}
        {{ html()
            ->select('category_id', $categories)
            ->class('form-control')
            ->placeholder(__('Selecione uma categoria')) }}
    </div>

    <div class="col-md-3 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Posts com destaque?'), 'highlight')->class('label-sm') }}
        {{ html()
            ->select('highlight', ['Não', 'Sim'])
            ->class('form-control')
            ->placeholder(__('Selecione uma opção')) }}
    </div>

    <div class="col-md-3 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Status do post'), 'title')->class('label-sm') }}
        {{ html()
            ->select('active', ['Desativados', 'Ativos'])
            ->class('form-control')
            ->placeholder(__('Selecione uma opção')) }}
    </div>

    <div class="col-12 mb-2 text-right">
        {{ html()
            ->button('<i class="fa-solid fa-search"></i> ' . __('Pesquisar'))
            ->type('submit')
            ->class('btn btn-outline-primary btn-sm') }}

        @if(count(Request::all()))
            <a href="{{ route('adm.posts.index') }}"
               class="btn btn-outline-danger btn-sm">
                <i class="fa-solid fa-close"></i>
                {{ __('Limpar') }}
            </a>
        @endif
    </div>
    {{ html()->closeModelForm() }}
</div>
