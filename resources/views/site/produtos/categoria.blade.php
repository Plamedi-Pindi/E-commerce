@extends('layouts.marge.site2')

@section('title', 'Categoria')

@section('content')
    <section class="product spad" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="section-title product__discount__title" style=" margin-top:-4rem; margin-bottom:2rem;">
                        <h2>Categoria: {{ $categoria->nome }}</h2>
                    </div>

                    <div class="row">
                        @foreach ($categoriaProdutos as $produto)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="/site/img/produtos/{{ $produto->imagem }}">

                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ route('shop.shopDetails', $produto->id) }}"><i
                                                        class="fa fa-eye"></i></a></li>

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
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $produto->nome }}</a></h6>
                                        <h5>{{ number_format($produto->preco, 2, ',', '.') }} Kz</h5>
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
