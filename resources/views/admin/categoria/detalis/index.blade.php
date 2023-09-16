@extends('layouts.marge.admin')

@section('content')

<div class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('Admindashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detalhes do Produto</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->

     <div class="card">
        <div class="row g-0">
          <div class="col-md-4 border-end">
            <img src="/site/img/product/{{ $product->imagem }}" class="img-fluid detail-img" alt="Imagem do produto">
            <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                <div class="col"><img src="/site/img/product/{{ $product->imagem }}" width="70" class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="/site/img/product/{{ $product->imagem }}" width="70" class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="/site/img/product/{{ $product->imagem }}" width="70" class="border rounded cursor-pointer" alt=""></div>
                <div class="col"><img src="/site/img/product/{{ $product->imagem }}" width="70" class="border rounded cursor-pointer" alt=""></div>
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
                  <div>142 avaliações</div>
                  <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 pedidos</div>
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

                <dt class="col-sm-3">Peso</dt>
                <dd class="col-sm-9">{{$peso }} kg</dd>

                <dt class="col-sm-3">Estoque</dt>
                <dd class="col-sm-9">{{ $product->estoque->quantidade}} qtd</dd>

              </dl>
              <hr>
              <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                <div class="col">
                    <label class="form-label">Quantidade</label>
                    <div class="input-group input-spinner">
                        <button class="btn btn-white" type="button" id="button-plus"> + </button>
                         <input type="text" class="form-control" value="1">
                        <button class="btn btn-white" type="button" id="button-minus"> − </button>
                    </div>
                </div>

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
        <hr/>


      </div>


        <h6 class="text-uppercase mb-0">Related Product</h6>
        <hr/>
         <div class="row row-cols-1 row-cols-lg-3">
               <div class="col">
                <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/images/products/16.png" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h6 class="card-title">Light Grey Headphone</h6>
                          <div class="cursor-pointer my-2">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                          </div>
                          <div class="clearfix">
                            <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$240</span><span>$199</span></p>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col">
                <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/images/products/17.png" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h6 class="card-title">Black Cover iPhone 8</h6>
                          <div class="cursor-pointer my-2">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                          </div>
                          <div class="clearfix">
                            <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$179</span><span>$110</span></p>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col">
                <div class="card">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/images/products/19.png" class="img-fluid" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h6 class="card-title">Men Hand Watch</h6>
                          <div class="cursor-pointer my-2">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                            <i class="bx bxs-star text-secondary"></i>
                          </div>
                          <div class="clearfix">
                            <p class="mb-0 float-start fw-bold"><span class="me-2 text-decoration-line-through text-secondary">$150</span><span>$120</span></p>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
           </div>


</div>

@endsection
