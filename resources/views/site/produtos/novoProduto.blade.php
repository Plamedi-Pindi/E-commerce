@extends('layouts.marge.dashMarge')

@section('title', 'Novo Produto')

@section('content')

    <div class="content-body">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Produtos</h5>
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
                                    <div class="prod-form-header col-md-12">
                                        <h4 class="modal-title" id="#gridSystemModal">Produto</h4>
                                    </div>

                                    <div class="prod-form-body col-md-10">
                                        <div class="container-fluid">
                                            <form action="/produtos" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label>Imagem do Produto</label>
                                                    <div class="dz-default dlab-message upload-img mb-3">
                                                        <div class="dropzone">
                                                            <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                                                    stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                            <div class="fallback">
                                                                <input name="imagem" id="imagem" type="file" multiple  class="form-control" style="display: inline;" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="nome" class="form-label">Nome do Produto <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" required>
                                                    </div>
                                                    <div class="col-xl-6 mb-3">
                                                        <label for="preco" class="form-label">Preço<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" id="exampleFormControlInput2" name="preco" required>
                                                    </div>
                                                    <div class="col-xl-3 mb-3">
                                                        <label for="estoque" class="form-label">Estoque<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="quantidade" id="exampleFormControlInput3" placeholder="" required>
                                                    </div>
                                                    <div class="col-xl-3 mb-3">
                                                        <label for="estoque" class="form-label">Limite Mínimo<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="limite_min" id="exampleFormControlInput3" placeholder="" required>
                                                    </div>

                                                    <div class="col-xl-6 mb-3">
                                                        <label class="form-label">Categoria<span class="text-danger">*</span></label>
                                                        <select class=" form-control" name="categoria" required>
                                                            <option data-display="Select">Seleciona uma categoria</option>
                                                            @foreach ($categoriasMenu as $categoria)
                                                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-xl-6 mb-3">
                                                        <label for="estoque" class="form-label">Peso<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="peso" id="exampleFormControlInput3" placeholder="">
                                                    </div>

                                                    <div class="col-xl-6 mb-3">
                                                        <label for="estoque" class="form-label">Data de Validade<span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="validade" id="exampleFormControlInput3" placeholder="" required>
                                                    </div>

                                                    <div class="col-xl-12 mb-6">
                                                        <label class="form-label" for="descricao">Descrição do produto<span
                                                                class="text-danger">*</span></label>
                                                        <textarea name="descricao" class="form-control summernote" id="" required></textarea>
                                                    </div>

                                                </div>
                                                <div class="prod-form-edit">
                                                    <button class="btn btn-primary me-1" type="submit">Cadastrar</button>
                                                    <a href="{{ route('adminProduto') }}" class="btn btn-danger light ms-1">Cancel</a>
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

