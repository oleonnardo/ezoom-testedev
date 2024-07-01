@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar categoria') }}</div>

                    <div class="card-body">
                        {{ html()
                            ->modelForm($category)
                            ->route('adm.categories.update', $category->id)
                            ->autocomplete('off')
                            ->acceptsFiles()
                            ->open() }}
                            @method('PATCH')
                            @include('admin.categories._form')
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
