@extends('layouts.marge.admin')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{ route('admin.produtos.create') }}"
                                    class="btn btn-primary mb-3 mb-lg-0 new-product-btn"><i
                                        class='bx bxs-plus-square'></i>Novo Produto</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-2 row-cols-xl-auto g-2">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" class="form-control ps-5" placeholder="Buscar Produto...">
                                                <span class="position-absolute top-50 product-show translate-middle-y"><i
                                                        class="bx bx-search"></i></span>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            @foreach ($produtos as $item)
                <div class="col">
                    <a href="{{ route('admin.produtos.show', $item->id) }}">
                        <div class="card">

                            <img src="/storage/{{ $item->imagem }}" class="card-img-top" alt="...">
                            @if (1 == 0)
                                <div class="">
                                    <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                            class="">-10%</span>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">{{ $item->nome }}</h6>
                                <div class="clearfix">
                                    <p class="mb-0 float-start"><strong>134</strong> vendidos</p>
                                    <p class="mb-0 float-end fw-bold">
                                        @if (1 == 0)
                                            <span class="me-2 text-decoration-line-through text-secondary">3500kz</span>
                                        @endif
                                        <span> {{ number_format($item->preco, 2, ',', '.') }}
                                            Kz</span>

                                    </p>
                                </div>
                                @if(1==0)


                                <div class="d-flex align-items-center mt-3 fs-6">
                                    <div class="cursor-pointer">
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-warning'></i>
                                        <i class='bx bxs-star text-secondary'></i>
                                    </div>
                                    <p class="mb-0 ms-auto">4.2(182)</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div><!--end row-->
    </div>
@endsection
