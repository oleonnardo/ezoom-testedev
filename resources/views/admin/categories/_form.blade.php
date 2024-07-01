<div class="form-group">
    {{ html()->label(__('Nome'), 'name') }}
    {{ html()
        ->text('name')
        ->class('form-control')
        ->maxlength(100)
        ->required() }}
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Breve descrição'), 'short_description') }}
    {{ html()
        ->text('short_description')
        ->class('form-control')
        ->maxlength(250)
        ->required() }}
    @error('short_description')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Cor da categoria'), 'color') }}
    {{ html()
        ->text('color')
        ->class('form-control color-input')
        ->attributes([
            'data-jscolor' => json_encode([

            ])
        ])
        ->maxlength(250)
        ->required() }}
    @error('short_description')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Destacar categoria na página inicial?'), 'highlight') }}
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
    {{ html()->label(__('Aplicar contraste no texto?'), 'contrast') }}
    {{ html()
        ->select('contrast', ['Não', 'Sim'])
        ->class('form-control')
        ->placeholder(__('Selecione uma opção'))
        ->required() }}
    <span class="text-muted block">
        {{ __('Quando ativado, a cor do texto do elemento ficará em um tom mais escuro, em contraste com a cor escolhida.') }}
    </span>
    @error('contrast')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {{ html()->label(__('Categoria visível?'), 'active') }}
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
    <a href="{{ route('adm.categories.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i>
        {{ __('Voltar') }}
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-check"></i> {{ __('Salvar') }}
    </button>
</div>

@push('js')
    <script src="{{ asset('assets/plugins/colorpicker/jscolor.min.js') }}"></script>
@endpush
