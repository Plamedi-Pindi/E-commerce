@extends('layouts.marge.site2')

@section('title', 'Fazer Compras')

@section('content')
    <section class="product spad" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="section-title product__discount__title" style=" margin-top:-4rem; margin-bottom:2rem;">
                        <h2>Categoria:</h2>
                    </div>

                    <div class="row">
                        @foreach ($categoriaProdutos as $produto)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="/site/img/produtos/{{ $produto->imagem }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $produto->nome }}</a></h6>
                                        <h5>{{ $produto->preco }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
