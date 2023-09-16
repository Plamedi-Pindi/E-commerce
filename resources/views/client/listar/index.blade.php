@extends('layouts.marge.site')
@section('conteudo')
    <h1 class="text-center">Lista de Clientes</h1>
    <a href="{{ route('cadastrar.Clientes') }}">Cadastrar Clientes</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">email</th>
                <th scope="col">telefone</th>
                <th scope="col">morada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listaClientes as $item )


            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->telefone }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection
