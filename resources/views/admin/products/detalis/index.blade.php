@extends('layouts.marge.admin')

@section('content')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Produtos</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.produtos.index') }}"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ route('admin.produtos.index') }}">Listar Produtos</a></li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 border-end">
                    <img src="/storage/{{ $product->imagem }}" class="img-fluid detail-img" alt="Imagem do produto">
                    <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                        <div class="col"><img src="/storage/{{ $product->imagem }}{{ $product->imagem }}" width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src="/storage/{{ $product->imagem }}{{ $product->imagem }}" width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src="/storage/{{ $product->imagem }}{{ $product->imagem }}" width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                        <div class="col"><img src="/storage/{{ $product->imagem }}{{ $product->imagem }}" width="70"
                                class="border rounded cursor-pointer" alt=""></div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->nome }}</h4>
                        <div class="d-flex gap-3 py-3">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>

                            <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> {{ $pedidos }}
                                pedidos</div>
                        </div>
                        <div class="mb-3">
                            <span class="price h4">{{ number_format($product->preco, 2, ',', '.') }} kz</span>
                            <span class="text-muted">/por kg</span>
                        </div>
                        <p class="card-text fs-6">{{ $product->descricao }}</p>
                        <dl class="row">
                            <dt class="col-sm-3">Categoria</dt>
                            <dd class="col-sm-9">{{ $product->categoria->nome }}</dd>

                            <dt class="col-sm-3">Validade</dt>
                            <dd class="col-sm-9">{{ $product->validade }}</dd>
                            <dt class="col-sm-3">Data de Cadastro</dt>
                            <dd class="col-sm-9">{{ $product->created_at }}</dd>
                            <dt class="col-sm-3">Última Atualização</dt>
                            <dd class="col-sm-9">{{ $product->updated_at }}</dd>
                            <dt class="col-sm-3">Peso</dt>
                            <dd class="col-sm-9">{{ $product->peso }} kg</dd>

                            <dt class="col-sm-3">Estoque</dt>
                            <dd class="col-sm-9">
                                @foreach ($product->estoque as $item)
                                    {{ $item->quantidade }}
                                @endforeach qtd
                            </dd>

                        </dl>
                        <hr>


                        {{-- <div class="col">
                            <label class="form-label">Select size</label>
                            <div class="">
                                <label class="form-check form-check-inline">
                                <input type="radio"class="form-check-input"  name="select_size" checked="" class="custom-control-input">
                                <div class="form-check-label">Small</div>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input type="radio"class="form-check-input"  name="select_size" checked="" class="custom-control-input">
                                    <div class="form-check-label">Medium</div>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input type="radio"class="form-check-input"  name="select_size" checked="" class="custom-control-input">
                                    <div class="form-check-label">Large</div>
                                </label>
                            </div>
                    </div> --}}

                        {{-- <div class="col">
                    <label class="form-label">Select Color</label>
                    <div class="color-indigators d-flex align-items-center gap-2">
                         <div class="color-indigator-item bg-primary"></div>
                         <div class="color-indigator-item bg-danger"></div>
                         <div class="color-indigator-item bg-success"></div>
                         <div class="color-indigator-item bg-warning"></div>
                    </div>
                </div> --}}
                    </div>

                </div>
            </div>
        </div>
        <hr />


    </div>



    </div>
@endsection
