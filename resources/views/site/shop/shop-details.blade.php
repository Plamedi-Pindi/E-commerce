@extends('layouts.marge.site')

@section('title', 'SUMBA | Detalhes')

@section('content')

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            {{-- Menssagem de sucesso --}}
            @if ($mensagem = Session::get('sucesso'))
            <div class="alert alert-success" role="alert" style=" margin-top:-50px; text-align:center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </svg>
                {{ $mensagem }}
              </div>
            @endif
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="/site/img/produtos/{{ $produto->imagem }}"
                                alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="/site/img/product/details/product-details-2.jpg"
                                src="/site/img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="/site/img/product/details/product-details-3.jpg"
                                src="/site/img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="/site/img/product/details/product-details-5.jpg"
                                src="/site/img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="/site/img/product/details/product-details-4.jpg"
                                src="/site/img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $produto->nome }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 avaliações)</span>
                        </div>
                        <div class="product__details__price">{{ number_format($produto->preco, 2, ',', '.') }} Kz</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>

                        <form action="{{ route('shop.addcarrinho') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $produto->id }}">
                            <input type="hidden" name="nome" value="{{ $produto->nome }}">
                            <input type="hidden" name="preco" value="{{ $produto->preco }}">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" min="1" name="qtd" value="1">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="imagem" value="{{ $produto->imagem }}">
                            <button class="primary-btn" style="border:none;">ADD AO CARRINHO</button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                        <ul>
                            <li><b>Disponibilidade</b> <span>Em estoque</span></li>
                            <li><b>Peso</b> <span>{{ $produto->peso }} kg</span></li>
                            <li><b>Categoria</b> <span>{{ $produto->categoria->nome }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Descrição</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    {{ $produto->descricao }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

@endsection

