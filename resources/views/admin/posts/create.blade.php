@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Gerenciar posts') }}</div>

                    <div class="card-body">
                        <form method="POST"
                              autocomplete="off"
                              action="{{ route('adm.posts.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            @include('admin.posts._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
