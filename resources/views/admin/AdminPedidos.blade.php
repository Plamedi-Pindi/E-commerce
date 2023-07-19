@extends('layouts.marge.dashMarge')

@section('title', 'Sumba | Pedidos')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Pedidos</h5>
                </li>
            </ol>

        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1">

                                <div class="tbl-caption">
                                    {{-- Botoes para novos produtos e categorias --}}
                                    <div>
                                        <a href="{{ route('admin.pedidos') }}" type="button" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px">
                                            <?xml version="1.0" encoding="utf-8"?>
                                            <svg width="30px" height="18px" viewBox="0 0 24 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 12C2 6.48 6.44 2 12 2C18.67 2 22 7.56 22 7.56M22 7.56V2.56M22 7.56H17.56"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path opacity="0.4"
                                                    d="M21.89 12C21.89 17.52 17.41 22 11.89 22C6.37 22 3 16.44 3 16.44M3 16.44H7.52M3 16.44V21.44"
                                                    stroke="#eee" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Atualizar
                                        </a>

                                    </div>
                                </div>
                                <div style="margin-left: 15px; ">

                                    {{-- Mensagens --}}
                                    @if ($busca)
                                        <h3 style="color:var(--primary)">Resultado da busca:</h3>
                                    @endif
                                    @if ($mensagem = Session::get('sucesso'))
                                        <div class="alert alert-success" role="alert"
                                            style=" font-size:17px; text-align:center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            {{ $mensagem }}
                                        </div>
                                    @endif

                                    @if ($mensagem = Session::get('alert'))
                                        <div class="alert alert-danger" role="alert"
                                            style=" font-size:17px; text-align:center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                                <path
                                                    d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                                <path
                                                    d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                            </svg>
                                            {{ $mensagem }}
                                    @endif

                                </div>
                                <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Usuário</th>
                                            <th>Total</th>
                                            <th>Data</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pedidos as $pedido)

                                            @if (auth()->user()->id == $pedido->user->id && auth()->user()->tipoUsuario->id == 1)
                                                <tr>
                                                    <td>
                                                        <span class="list-text ">{{ $pedido->id }}</span>
                                                    </td>
                                                    <td><span class="text-primary">{{ $pedido->user->firstName }}
                                                            {{ $pedido->user->lastName }}</span></td>
                                                    <td>
                                                        <span
                                                            class="list-text">{{ number_format($pedido->total, 2, ',', '.') }}
                                                            Kz</span>
                                                    </td>
                                                    <td>
                                                        <span class="list-text">{{ $pedido->created_at }}</span>
                                                    </td>

                                                    <td>
                                                        @if ($pedido->id_estado == 1)
                                                            <span class="badge badge-primary light border-0">Pendente</span>
                                                        @else
                                                            @if (auth()->user()->id_tipo <= 2)
                                                                <form action="/entrega/{{ $pedido->id_pagamento }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="total"
                                                                        value="{{ $pedido->total }}">
                                                                    <input type="hidden" name="pagamento"
                                                                        value="{{ $pedido->id_pagamento }}">
                                                                    <input type="hidden" name="user"
                                                                        value="{{ $pedido->id_user }}">

                                                                    <button
                                                                        class="badge badge-success light border-0">Pago</button>
                                                                </form>
                                                            @else
                                                            <button
                                                            class="badge badge-success light border-0">Pago</button>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="badge badge-primary light border-0">Detalhes</button>
                                                        @if (auth()->user()->id == $pedido->user->id)
                                                            <a href="#"
                                                                class="badge badge-danger light border-0">Cancelar</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
