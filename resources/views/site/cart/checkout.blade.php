@extends('layouts.marge.site')

@section('title', 'SUMBA | Formulário de compra')

{{-- @section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/site/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Fechar Conta</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your
                        code
                    </h6>
                </div>
            </div> --}}
            <div class="checkout__form">
                <h4>Detalhes de cobrança</h4>
                {{-- Formulario start --}}
                <form action="/pedidos/{{ $authUser->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Primeiro Nome<span>*</span></p>
                                        <input type="text" name="firstName" value="{{ $authUser->firstName }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Último Nome<span>*</span></p>
                                        <input type="text" name="lastName" value="{{ $authUser->lastName }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefone<span>*</span></p>
                                        <input type="text" name="telefone" value="{{ $authUser->telefone }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{ $authUser->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Morada<span>*</span></p>
                                <input type="text" name="morada" value="">
                            </div>
                            <div class="checkout__input">
                                <p>Descrição do endereco<span>*</span></p>
                                <textarea name="descricao" id="descricao" placeholder="Bairro ou Renferência ... (opcional)"></textarea>
                            </div>


                        </div>
                        <!-- ******* Exibir dados do Pedido ******** -->
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Seu Pedido</h4>
                                <div class="checkout__order__products">Produtos <span>Total</span></div>
                                <ul>
                                    @if ($items = \Cart::getContent() )
                                        @foreach ($items as $item)
                                        <li>{{ $item->name }}<span>{{ number_format($item->price, 2, ',', '.') }} kz (X{{ $item->quantity }})</span> </li>

                                        @endforeach
                                        @endif
                                        <input type="hidden" name="estado" value="pendente">

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>{{ number_format(\Cart::getTotal(), 2, ',', '.') }} kz</span></div>
                                <div class="checkout__order__total">Total <span>{{ number_format(\Cart::getTotal(), 2, ',', '.') }}kz</span></div>

                                <!-- ******* Envia dados para tabela  ItemPedido ******** -->


                                <button type="submit" class="site-btn">COMPRAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection --}}
