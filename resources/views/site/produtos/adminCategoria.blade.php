@extends('layouts.marge.dashMarge')

@section('title', 'Categorias')

@section('content')
    <!--**********************************
                                                    Content body start
                    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Categoria</h5>
                </li>
            </ol>
            <a class="text-primary fs-13" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button"
                aria-controls="offcanvasExample1">+ Add Task</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive active-projects style-1">
                                <div class="tbl-caption">
                                    {{-- Barra de pesquisa --}}
                                    <form action="{{ route('adminCategoria') }}" method="GET"
                                        enctype="multipart/form-data" style="margin-top:20px;">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="busca" class="form-control"
                                                placeholder="Pesquisar Categoria" aria-label="Recipient's username"
                                                aria-describedby="button-addon2" style="height:32px;">
                                            <button class="btn btn-outline-primary" type="submit" id="button-addon2"
                                                style=" border:1px solid; padding:0 10px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    {{-- Botoes para novos produtos e categorias --}}
                                    <div>
                                        <a href="{{ route('adminCategoria') }}" type="button"
                                            class="btn btn-primary btn-sm" style="margin-right: 5px">
                                            <?xml version="1.0" encoding="utf-8"?>
                                            <svg width="30px" height="18px" viewBox="0 0 24 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 12C2 6.48 6.44 2 12 2C18.67 2 22 7.56 22 7.56M22 7.56V2.56M22 7.56H17.56"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path opacity="0.4"
                                                    d="M21.89 12C21.89 17.52 17.41 22 11.89 22C6.37 22 3 16.44 3 16.44M3 16.44H7.52M3 16.44V21.44"
                                                    stroke="#eee" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Atualizar
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('site.produtos.novoProduto') }}" >+ Novo Produto</a>
                                        <a href="{{ route("site.produtos.novaCategoria") }}" class="btn btn-secondary btn-sm" > + Nova Categoria </a>
                                    </div>
                                </div>
                                <div style="margin-left: 15px; ">
                                    @if ($busca)
                                        <h3 style="color:var(--primary)">Resultado da busca:</h3>
                                    @endif
                                    @if ($mensagem = Session::get('sucesso'))
                                        <div class="alert alert-success" role="alert"
                                            style=" font-size:17px; text-align:center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            {{ $mensagem }}
                                        </div>
                                    @endif
                                </div>
                                <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>

                                            <th>ID da categoria</th>
                                            <th>Nome</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoriasMenu as $categoria)
                                            <tr>
                                                <td>
                                                    <span>{{ $categoria->id }}</span>
                                                </td>
                                                <td>
                                                    <h6>{{ $categoria->nome }}</h6>
                                                    <span>{{ $categoria->updated_at }}</span>
                                                </td>
                                                <td>
                                                    <ul class="prod-crud-update">

                                                        <li>
                                                            <form action="/deletarcategoria/{{ $categoria->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="   icon-box icon-box-md bg-danger-light me-1"
                                                                    style="border:none; display:inline-block; border-radius: 100%; background-color:rgb(255, 10, 10); width:40px; height:40px">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                        height="35" fill="white" class="bi bi-trash3"
                                                                        viewBox="0 -6 16 28">
                                                                        <path
                                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="icon-box icon-box-md bg-primary-light"
                                                                href="/editarcategoria/{{ $categoria->id }}" role="button"
                                                                aria-controls="offcanvasExample"
                                                                style="width:40px; height:40px; border-radius:100%; background-color:var(--primary);">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                                    height="30" fill="white"
                                                                    class="bi bi-pencil-square" viewBox="0 -8 16 23">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal">Novo Produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body">
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
                                    <input name="imagem" id="imagem" type="file" multiple>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label for="nome" class="form-label">Nome do Produtod <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="nome"
                                placeholder="">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="preco" class="form-label">Preço<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="exampleFormControlInput2" name="preco"
                                placeholder="">
                        </div>
                        {{-- <div class="col-xl-6 mb-3">
                            <label for="estoque" class="form-label">Estoque<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="estoque" id="exampleFormControlInput3" placeholder="">
                        </div> --}}

                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Categoria<span class="text-danger">*</span></label>
                            <select class=" form-control" name="categoria">
                                <option data-display="Select">Seleciona uma categoria</option>
                                @foreach ($categoriasMenu as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-xl-12 mb-6">
                            <label class="form-label" for="descricao">Descrição do produto<span
                                    class="text-danger">*</span></label>
                            <textarea name="descricao" class="form-control " id="summernote"></textarea>
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary me-1" type="submit">Cadastrar</button>
                        <button class="btn btn-danger light ms-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end customeoff" tabindex="-1" id="offcanvasExample1">
        <div class="offcanvas-header">
            <h5 class="modal-title" id="#gridSystemModal1">Add New Task</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="container-fluid">
                <form>
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputfirst" class="form-label">Title<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleFormControlInputfirst"
                                placeholder="Title">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Project<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Project</option>
                                <option value="html">Salesmate</option>
                                <option value="css">ActiveCampaign</option>
                                <option value="javascript">Insightly</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputthree" class="form-label">Start Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInputthree">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="exampleFormControlInputfour" class="form-label">End Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="exampleFormControlInputfour">
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Estimated Hour<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="09:30"><span
                                    class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Status<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Status</option>
                                <option value="html">In Progess</option>
                                <option value="css">Pending</option>
                                <option value="javascript">Completed</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">priority<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">priority</option>
                                <option value="html">Hight</option>
                                <option value="css">Medium</option>
                                <option value="javascript">Low</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Category<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Category</option>
                                <option value="html">Designing</option>
                                <option value="css">Development</option>
                                <option value="javascript">react developer</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Permission<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Permission</option>
                                <option value="html">Public</option>
                                <option value="css">Private</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Deadline add<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Deadline</option>
                                <option value="html">Yes</option>
                                <option value="css">No</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Assigned to<span class="text-danger">*</span></label>
                            <select class="default-select form-control">
                                <option data-display="Select">Assigned</option>
                                <option value="html">Bernard</option>
                                <option value="css">Sergey Brin</option>
                                <option value="javascript"> Larry Ellison</option>
                            </select>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Responsible Person<span class="text-danger">*</span></label>
                            <input name="tagify" class="form-control py-0 ps-0" value='James, Harry'>

                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">Description<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label class="form-label">Summary<span class="text-danger">*</span></label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary me-1">Help Desk</button>
                        <button class="btn btn-danger light ms-1">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel1">Nova Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="/categorias" method="POST" class="col-xl-12">
                            @csrf
                            <label class="form-label">Nome da categoria<span class="text-danger">*</span></label>
                            <input type="text" name="nome" class="form-control" placeholder="categoria">

                            <div class="mt-3 invite">
                                <label class="form-label">Descrição da categoria<span class="text-danger">*</span></label>
                                <textarea name="descricao" id="" class="form-control "></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>

                    </form>
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
        $('#summernote').summernote({
            placeholder: 'Descrição do produto...',
            tabsize: 2,
            height: 150
        });
    </script>
@endpush
