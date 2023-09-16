@extends('layouts.merge.dashboard')
@section('titulo', 'Utilizadores | Editar')
@section('content')
    <div class="section-body" id="page_top">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <h1 class="page-title">Editar conta de {{ $user->name }}</h1>
                </div>
                @if ('Administrador' == Auth::user()->level)
                    <div class="right">
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a href="{{ route('admin.user.index') }}">Listar Utilizadores</a>
                            </li>
                        </ul>

                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="section-body mt-4">
        <div class="container-fluid">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <h4>Erro ao cadastrar</h4>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="tab-pane" id="Staff-add">
                <form method="POST" action="{{ route('admin.user.update', $user->id) }}" enctype="multipart/form-data">
                    @method('PUT')

                    @include('forms._formUser.index')
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
