@extends('layouts.marge.dashMarge')

@section('title', 'Produtos')

@section('content')
    <!--**********************************
                                            Content body start
                                ***********************************-->
    <div class="content-body">
        <!-- row -->
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
                                    {{-- Barra de pesquisa --}}
                                    <form action="{{ route('adminProduto') }}" method="GET"
                                        enctype="multipart/form-data" style="margin-top:20px;">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" name="busca" class="form-control"
                                                placeholder="Pesquisar produto" aria-label="Recipient's username"
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
                                        <a href="{{ route('adminProduto') }}" type="button" class="btn btn-primary btn-sm" style="margin-right: 5px">
                                            <?xml version="1.0" encoding="utf-8"?>
                                            <svg width="30px" height="18px" viewBox="0 0 24 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" >
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
                                        <a href="{{ route('site.produtos.novaCategoria') }}" class="btn btn-secondary btn-sm" > + Nova Categoria </a>
                                    </div>
                                </div>
                                <div style="margin-left: 15px; ">

                                     {{-- Mensagens --}}
                                    @if ($busca)
                                        <h3 style="color:var(--primary)">Resultado da busca:</h3>
                                    @endif
                                    @if ($mensagem = Session::get('sucesso'))
                                    <div class="alert alert-success" role="alert" style=" font-size:17px; text-align:center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                          </svg>
                                        {{ $mensagem }}
                                      </div>
                                    @endif

                                    @if ($mensagem = Session::get('alert'))
                                    <div class="alert alert-danger" role="alert" style=" font-size:17px; text-align:center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                            <path
                                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                            <path
                                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                        </svg>
                                      {{ $mensagem }}
                                    @endif

                                </div>
                                <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>

                                            <th>Imagem</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Peso</th>
                                            <th>Estoque</th>
                                            <th>Categoria</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produtos as $produto)
                                            <tr>
                                                <td>
                                                    <div class="products">
                                                        <img src="/site/img/produtos/{{ $produto->imagem }}"
                                                            class="avatar avatar-md" alt=""
                                                            style="width:80px; height:80px">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5>{{ $produto->nome }}</h5>
                                                    <span>{{ $produto->validade }}</span>
                                                </td>
                                                <td><span
                                                        class="text-primary">{{ number_format($produto->preco, 2, ',', '.') }}
                                                        Kz</span></td>
                                                <td>
                                                    <span class="list-text ">{{ $produto->peso }} Kg </span>
                                                </td>
                                                <td>
                                                    <span class="list-text">{{ $produto->estoque->quantidade }} qtd </span>
                                                </td>
                                                <td>
                                                    <span class="list-text">{{ $produto->categoria->nome }}</span>
                                                </td>

                                                <td>
                                                    <ul class="prod-crud-update">
                                                        {{-- <li>
                                                            <span class="badge badge-success light border-0">Active</span>
                                                        </li> --}}
                                                        <li>
                                                            <form action="/deletarproduto/{{ $produto->id }}"
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
                                                                href="/editarproduto/{{ $produto->id }}" role="button"
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

    {{-- CADASTRAR CATEGORIA --}}
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
        $('.summernote').summernote({
            placeholder: 'Descrição do produto...',
            tabsize: 2,
            height: 150
        });
    </script>
@endpush
