@extends('layouts.merge.dashboard')
@section('titulo', 'Utilizadores | Detalhes')
@section('content')

    <div class="section-body" id="page_top">
        <div class="container-fluid">
            <div class="page-header">
                <div class="left">
                    <h1 class="page-title">Detalhes do Utilizador {{ $user->name }}</h1>
                </div>
                <div class="right">
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a href="{{ route('admin.user.index') }}">Listar
                                Utilizadores</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

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
    <div class="section-body mt-4">
        <div class="container-fluid">
            <img src="/storage/{{ $user->photo }}"class="rounded-circle" alt=""  width="210">
            <h6>Nome Completo: {{ $user->name }}</h6>
            <h6> Nível: {{ $user->level }}</h6>
            <h6> Email: {{ $user->email }}</h6>


        </div>
        <div class="card shadow mb-4">
            <div class="card-body">

                <h5 class="my-3 text-left"><b> Registo de Actividade</b></h5>
                <div class="table-responsive">


                    <table id="dataTable-1" class="table  table-striped mb-3">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>CAMINHO</th>
                                <th>ENDEREÇO IP</th>
                                <th>MENSAGEM</th>
                                <th>DATA</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">

                            @foreach ($logs as $item)
                                <tr class="text-center text-dark">
                                    <td>{{ $item->id }}</td>
                                    <td class="text-left">{{ $item->PATH_INFO }} </td>
                                    <td>{{ $item->REMOTE_ADDR }} </td>
                                    <td class="text-left">{{ $item->message }} </td>
                                    <td class="text-left">{{ $item->created_at }} </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
