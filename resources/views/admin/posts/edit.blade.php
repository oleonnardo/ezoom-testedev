@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar post') }}</div>

                    <div class="card-body">
                        {{ html()
                            ->modelForm($post)
                            ->route('adm.posts.update', $post->id)
                            ->autocomplete('off')
                            ->acceptsFiles()
                            ->open() }}
                            @method('PATCH')
                            @include('admin.posts._form')
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
