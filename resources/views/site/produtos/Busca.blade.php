@extends('layouts.marge.site2')

@section('title', 'Pesquisar Produto')

@section('content')
    <section class="product spad" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="section-title product__discount__title" style=" margin-top:-4rem; margin-bottom:2rem;">
                        <h2>Resultado da busca:</h2>
                    </div>

                    <div class="row">

                            @foreach ($buscarProdutos as $produto)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="/site/img/produtos/{{ $produto->imagem }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{ route('shop.shopDetails', $produto->id) }}"><i class="fa fa-eye"></i></a></li>
                                                    <li><a href="{{ route('shop.shoppingCart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $produto->nome }}</a></h6>
                                            <h5>{{ number_format($produto->preco, 2, ',', '.') }} Kz</h5>
                                        </div>
                                    </div>
                                </div>

                                @if ($mensagem = Session::get('alerta'))
                                <div class="alert alert-success" role="alert" style=" margin-top:-50px; text-align:center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                      </svg>
                                    {{ $mensagem }}
                                  </div>
                                @endif
                            @endforeach




                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
