@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Gerenciar posts') }}
                    </div>

                    <div class="card-body">
                        <div class="card--actions">
                            <div class="card-actions--left">
                                <button type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#posts-collapse"
                                        class="btn btn-secondary">
                                    <i class="fa-solid fa-filter"></i>
                                    {{ __('Filtrar') }}
                                </button>
                            </div>

                            <div class="card-actions--right">
                                <a href="{{ route('adm.categories.index') }}" class="btn btn-warning">
                                    <i class="fa-solid fa-list"></i>
                                    {{ __('Categorias') }}
                                </a>

                                <a href="{{ route('adm.posts.create') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    {{ __('Novo') }}
                                </a>
                            </div>
                        </div>

                        <div class="{{ count(Request::all()) ? 'collapsed show' : 'collapse' }} py-3"
                             id="posts-collapse">
                            @include('admin.posts._filters')
                        </div>

                        <div class="table-responsive">
                            <table class="table table-middle table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center" width="5%">ID</th>
                                    <th width="10%">{{ __('Imagem') }}</th>
                                    <th width="25%" class="sm:min-w-0 min-w-200px">{{ __('Título') }}</th>
                                    <th class="text-center">{{ __('Categoria') }}</th>
                                    <th class="text-center" width="5%">{{ __('Destaque') }}</th>
                                    <th class="text-center" width="5%">{{ __('Ativo') }}</th>
                                    <th class="text-center">{{ __('Criado em') }}</th>
                                    <th class="text-center" width="12%">{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->id }}</td>
                                        <td><img src="{{ $item->image }}"/></td>
                                        @if($item->category->active)
                                            <td>{{ $item->title }}</td>
                                            <td class="text-center">{{ $item->category->name }}</td>
                                        @else
                                            <td><span class="text-muted">{{ $item->title }}</span></td>
                                            <td>
                                                <span class="text-muted"
                                                      data-bs-toggle="tooltip"
                                                      data-bs-title="{{ __('Categoria desabilitada') }}">
                                                    {{ $item->category->name }}
                                                </span>
                                            </td>
                                        @endif
                                        <td class="text-center">{!! __badge($item->highlight) !!}</td>
                                        <td class="text-center">{!! __badge($item->active) !!}</td>
                                        <td class="text-center">
                                            @if($item->category->active)
                                                {{ $item->created_at->format('d/m/Y H:i') }}
                                            @else
                                                <span class="text-muted">
                                                    {{ $item->created_at->format('d/m/Y H:i') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="flex flex-nowrap justify-content-center align-items-center">
                                                {{ html()
                                                    ->form()
                                                    ->method('post')
                                                    ->route('adm.posts.highlightToggle', $item->id)
                                                    ->open() }}
                                                <button type="submit"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __($item->highlight ? 'Remover destaque da post' : 'Destacar post')  }}"
                                                        class="text-black-50 mr-3">
                                                    <i class="{{ $item->highlight ? 'fa-solid fa-star' : 'fa-regular fa-star' }}"></i>
                                                </button>
                                                {{ html()->form()->close() }}

                                                {{ html()
                                                    ->form()
                                                    ->method('post')
                                                    ->route('adm.posts.activeToggle', $item->id)
                                                    ->open() }}
                                                <button type="submit"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __($item->active ? 'Desativar post' : 'Ativar post')  }}"
                                                        class="text-black-50 mr-3">
                                                    <i class="fa-solid {{ $item->active ? 'fa-lock' : 'fa-lock-open' }}"></i>
                                                </button>
                                                {{ html()->form()->close() }}

                                                <a href="{{ route('adm.posts.edit', $item->id) }}"
                                                   data-bs-toggle="tooltip"
                                                   title="{{ __('Editar')  }}"
                                                   class="text-black-50 mr-3">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>

                                                {{ html()
                                                    ->form()
                                                    ->route('adm.posts.destroy', $item->id)
                                                    ->open() }}
                                                @method('DELETE')
                                                <button type="submit"
                                                        data-bs-toggle="tooltip"
                                                        title="{{ __('Remover')  }}"
                                                        class="text-black-50"
                                                        onclick="return confirm('{{ __('Tem certeza?') }}') ">
                                                    <i class="fa-solid fa-trash-alt"></i>
                                                </button>
                                                {{ html()->form()->close() }}
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
                            {{ $posts->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
