@extends('layouts.marge.admin')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="{{ route('admin.categorias.create') }}"
                                    class="btn btn-primary mb-3 mb-lg-0 new-product-btn"><i
                                        class='bx bxs-plus-square'></i>Nova Categoria</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Lista de Categorias</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome </th>

                                <th>Acções</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nome }}</td>

                                    <td>   <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <a href='{{ route('admin.categorias.show', $item->id) }}'
                                                class="dropdown-item">Detalhes</a>



                                            <a href='{{ route('admin.categorias.edit', $item->id) }}'
                                                class="dropdown-item">Editar</a>
                                        </div>
                                    </div></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
