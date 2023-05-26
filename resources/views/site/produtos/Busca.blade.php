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
                        @if ($busca)
                            @foreach ($buscarProdutos as $produto)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="/site/img/produtos/{{ $produto->imagem }}">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="{{ route('shop.shopDetails', $produto->id) }}"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="{{ route('shop.shoppingCart') }}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $produto->nome }}</a></h6>
                                            <h5>{{ number_format($produto->preco, 2, ',', '.') }} Kz</h5>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            {{-- Mensagem de alerta --}}
                            @if ($mensagem = Session::get('alerta'))
                            <div class="alert alert-danger" role="alert" style="  text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path
                                        d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                    <path
                                        d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                                <p>{{ $mensagem }}</p>
                            </div>
                            @endif

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
