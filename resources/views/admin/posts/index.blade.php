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
                            <a href="{{ route('adm.posts.create') }}" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                {{ __('Novo') }}
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-middle table-hover">
                                <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="10%">{{ __('Imagem') }}</th>
                                    <th>{{ __('Título') }}</th>
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
                                                <a href="{{ route('adm.posts.edit', $item->id) }}"
                                                   class="text-black-50 mr-3">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>

                                                {{ html()
                                                    ->form()
                                                    ->method('delete')
                                                    ->route('adm.posts.destroy', $item->id)
                                                    ->open() }}
                                                    @csrf
                                                    <button type="submit"
                                                            class="text-black-50"
                                                            onclick="confirm('{{ __('Tem certeza?') }}') ">
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
