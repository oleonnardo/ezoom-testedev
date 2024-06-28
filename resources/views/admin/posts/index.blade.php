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

                        <div class="py-3 text-right">
                            <button type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#posts-collapse"
                                    class="btn btn-secondary">
                                <i class="fa-solid fa-filter"></i>
                                {{ __('Filtrar') }}
                            </button>

                            <a href="{{ route('adm.posts.create') }}" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Novo') }}
                            </a>
                        </div>

                        <div class="{{ count(Request::all()) ? 'collapsed show' : 'collapse' }} py-3"
                             id="posts-collapse">
                            @include('admin.posts._filters')
                        </div>

                        <div class="table-responsive">
                            <table class="table table-middle table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">{{ __('Imagem') }}</th>
                                    <th width="25%" class="sm:min-w-0 min-w-200px">{{ __('Título') }}</th>
                                    <th>{{ __('Categoria') }}</th>
                                    <th width="5%">{{ __('Destaque') }}</th>
                                    <th width="5%">{{ __('Ativo') }}</th>
                                    <th>{{ __('Criado em') }}</th>
                                    <th width="12%">{{ __('Ações') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($posts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ $item->image }}"/></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td class="text-center">{!! __badge($item->highligh) !!}</td>
                                        <td class="text-center">{!! __badge($item->active) !!}</td>
                                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <div class="flex flex-nowrap justify-content-center align-items-center">
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
                                    <h6>{{ __('Nenhum registro encontrado.') }}</h6>
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
