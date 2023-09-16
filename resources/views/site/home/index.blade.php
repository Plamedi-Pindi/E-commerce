
@extends('layouts.marge.site')
@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Todas categorias</span>
                    </div>
                    <ul>

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        {{-- FORMULARIO PARA AS BUSCAS --}}
                        <form action="{{ route('pesquisarProduto') }}" method="GET" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="busca" placeholder="Deseja buscar um produto?">
                            <button type="submit" class="site-btn">BUSCAR</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+244 926477947</h5>
                            <span>Nosso WhatsApp</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="site/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUTA FRESCA</span>
                        <h2>Vegetal <br />100% Orgânico</h2>
                        <p>Aqui você encontra os melhores produtos</p>
                        <a href="{{ route('shop.shop-grid') }}" class="primary-btn">FAÇA COMPRAS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($estante as $estante)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="site/img/produtos/{{ $estante->imagem }}">
                        <h5><a href="#">{{ $estante->nome }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Produto em destaque</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Todos</li>
                        <li data-filter=".Frutas">Frutas</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($produtos as $produto)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $produto->categoria->nome }} fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/site/img/produtos/{{ $produto->imagem }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ route('shop.shopDetails', $produto->id) }}"><i class="fa fa-eye"></i></a></li>
                                <li>
                                <form action="{{ route('shop.addcarrinho') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="imagem" value="{{ $produto->imagem }}">
                                    <input type="hidden" name="id" value="{{ $produto->id }}">
                                    <input type="hidden" name="nome" value="{{ $produto->nome }}">
                                    <input type="hidden" name="preco" value="{{ $produto->preco }}">
                                    <input type="hidden" min="1" name="qtd" value="1">
                                    <button type="submit"><i class="fa fa-shopping-cart"></i></button>
                                </form>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{ $produto->nome }}</a></h6>
                            <h5>{{ number_format($produto->preco, 2, ',', '.' )}} kz</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
{{-- <div class="Intervalo">

    </div>
</div> --}}
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Produtos Mais recentes</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            {{-- @foreach ($va as $va) --}}
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    {{-- <img src="{{ $va->imagem }}" alt=""> --}}
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            {{-- @endforeach --}}
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="site/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

{{-- Cart Modal --}}
<div id="cartModal">
    <div id="cartModalContent">
        <section class="shoping-cart spad">
            <div class="container">
                {{-- Mensagem de Sucesso --}}

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="shoping__product"></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img src="/site/img/produtos/{{ $item->attributes->image }}"
                                                        alt="{{ $item->name }}" width="110px">
                                                </td>
                                                <td>
                                                    <h5>{{ $item->name }}</h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    {{ number_format($item->price, 2, ',', '.') }} Kz
                                                </td>

                                                {{-- Atualizar --}}
                                                <form action="{{ route('shop.atualizarcarrinho') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <td class="shoping__cart__quantity">
                                                        <div class="quantity">
                                                            <div class="pro-qty">

                                                                <input type="number" min="1" name="qtd"
                                                                    value="{{ $item->quantity }}">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="shoping__cart__item__close">
                                                        <button class="primary-btn cart-btn cart-btn-right cart-btn-fresh">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="white" class="bi bi-arrow-clockwise"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                                                                <path
                                                                    d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                                                            </svg>
                                                        </button>

                                                </form>

                                                {{-- Eliminar Produto no carrinho --}}
                                                <form action="{{ route('shop.removecarrinho') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="submit" class=" "
                                                        style="border:none; background-color:rgb(255, 10, 10); border-radius: 100%">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30"
                                                            fill="white" class="bi bi-trash3" viewBox="0 -6 16 28">
                                                            <path
                                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg>
                                                    </button>
                                                </form>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                {{-- Botao para continuar comprando --}}
                                <button class="primary-btn cart-btn cart-btn-comprar" style="border: none" id="cartModalBotaoContinuar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                      </svg>
                                      CONTIMUAR
                                </button>
                                {{-- Botao para esvaziar o carrinho --}}
                                <a href="{{ route('site.carrinho.finalizarcompra') }}"
                                    class="primary-btn cart-btn cart-btn-right cart-btn-esvaziar">

                                    Comprar
                                </a>
                            </div>
                        </div>

                    </div>

            </div>
        </section>
    </div>
</div>


@endsection
