@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Gerenciar categorias') }}
                    </div>

                    <div class="card-body">
                        <div class="card--actions">
                            <div class="card-actions--left">
                                <button type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#filter-collapse"
                                        class="btn btn-secondary">
                                    <i class="fa-solid fa-filter"></i>
                                    {{ __('Filtrar') }}
                                </button>
                            </div>

                            <div class="card-actions--right">
                                <a href="{{ route('adm.posts.index') }}" class="btn btn-warning">
                                    <i class="fa-solid fa-list"></i>
                                    {{ __('Posts') }}
                                </a>

                                <a href="{{ route('adm.categories.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    {{ __('Novo') }}
                                </a>
                            </div>
                        </div>

                        <div class="{{ count(Request::all()) ? 'collapsed show' : 'collapse' }} py-3"
                             id="filter-collapse">
                            @include('admin.categories._filters')
                        </div>

                        <div class="table-responsive">
                            <table class="table table-middle table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="5%" class="text-center">{{ __('Cor') }}</th>
                                    <th width="25%" class="sm:min-w-0 min-w-200px">{{ __('Título') }}</th>
                                    <th width="15%" class="text-center">{{ __('Qtde de posts') }}</th>
                                    <th width="5%" class="text-center">{{ __('Destaque') }}</th>
                                    <th width="5%" class="text-center">{{ __('Ativo') }}</th>
                                    <th width="12%" class="text-center">{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td class="text-center">
                                            <div class="badge mb-0 px-3 btn-round"
                                                 style="background-color: {{ $item->color }}">&nbsp;</div>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->posts_count }}</td>
                                        <td class="text-center">{!! __badge($item->highlight) !!}</td>
                                        <td class="text-center">{!! __badge($item->active) !!}</td>
                                        <td class="text-center">
                                            <div class="flex flex-nowrap justify-content-center align-items-center">
                                                {{ html()
                                                    ->form()
                                                    ->method('post')
                                                    ->route('adm.category.highlightToggle', $item->id)
                                                    ->open() }}
                                                <button type="submit"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __($item->highlight ? 'Remover destaque da categoria' : 'Destacar categoria')  }}"
                                                        class="text-black-50 mr-3">
                                                    <i class="{{ $item->highlight ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                                </button>
                                                {{ html()->form()->close() }}

                                                {{ html()
                                                    ->form()
                                                    ->method('post')
                                                    ->route('adm.category.activeToggle', $item->id)
                                                    ->open() }}
                                                <button type="submit"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __($item->active ? 'Desativar categoria' : 'Ativar categoria')  }}"
                                                        class="text-black-50 mr-3">
                                                    <i class="fa-solid {{ $item->active ? 'fa-lock' : 'fa-lock-open' }}"></i>
                                                </button>
                                                {{ html()->form()->close() }}

                                                <a href="{{ route('adm.categories.edit', $item->id) }}"
                                                   data-bs-toggle="tooltip"
                                                   title="{{ __('Editar')  }}"
                                                   class="text-black-50 mr-3">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h6 class="text-center text-muted">
                                        {{ __('Nenhum registro encontrado.') }}
                                    </h6>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="flex py-3 justify-content-center">
                            {{ $categories->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
