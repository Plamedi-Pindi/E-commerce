@extends('layouts.marge.dashMarge')

@section('title', 'Editar Produto')

@section('content')

    <div class="content-body">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Categoria</h5>
                </li>
            </ol>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1">
                                <div class="tbl-caption">
                                    <div class="categ-form-header col-md-12">
                                        <h4 class="modal-title" id="#gridSystemModal">Categoria a ser editada:
                                            {{ $categoria->nome }}</h4>
                                    </div>

                                    <div class="categ-form-body col-md-10">
                                        <div class="container-fluid">
                                            <form action="/update/{{ $categoria->id }}" method="POST" enctype="multipart/form-data" class="col-xl-12">
                                                @csrf
                                                @method('PUT')
                                                <label class="form-label">Nome da categoria<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="nome" class="form-control"
                                                    value="{{ $categoria->nome }}">

                                                <div class="mt-3 invite">
                                                    <label class="form-label">Descrição da categoria<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="descricao" id="" class="form-control summernote">{{ $categoria->descricao }}</textarea>
                                                </div>
                                                <div class="categ-form-edit-btn">
                                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                                    <a href="{{ route('adminCategoria') }}" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@push('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: 'Descrição do produto...',
            tabsize: 2,
            height: 150
        });
    </script>
@endpush
