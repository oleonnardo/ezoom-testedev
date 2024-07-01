<div class="py-3">
    {{ html()
        ->modelForm(Request::all(), 'get')
        ->autocomplete('off')
        ->class('row')
        ->open() }}

    <div class="col-md-4 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Título'), 'name')->class('label-sm') }}
        {{ html()
            ->text('name')
            ->class('form-control')
            ->placeholder(__('Título')) }}
    </div>

    <div class="col-md-4 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Categorias com destaque?'), 'highlight')->class('label-sm') }}
        {{ html()
            ->select('highlight', ['Não', 'Sim'])
            ->class('form-control')
            ->placeholder(__('Selecione uma opção')) }}
    </div>

    <div class="col-md-4 col-sm-6 col-12 mb-3">
        {{ html()->label(__('Status da categoria'), 'title')->class('label-sm') }}
        {{ html()
            ->select('active', ['Desativadas', 'Ativadas'])
            ->class('form-control')
            ->placeholder(__('Selecione uma opção')) }}
    </div>

    <div class="col-12 mb-2 text-right">
        {{ html()
            ->button('<i class="fa-solid fa-search"></i> ' . __('Pesquisar'))
            ->type('submit')
            ->class('btn btn-outline-primary btn-sm') }}

        @if(count(Request::all()))
            <a href="{{ route('adm.categories.index') }}"
               class="btn btn-outline-danger btn-sm">
                <i class="fa-solid fa-close"></i>
                {{ __('Limpar') }}
            </a>
        @endif
    </div>
    {{ html()->closeModelForm() }}
</div>
