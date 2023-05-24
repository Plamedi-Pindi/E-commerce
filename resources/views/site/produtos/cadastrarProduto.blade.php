@extends('layouts.marge.dashMarge')

@section('title', 'Cadastrar Produto')

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
                                    <h4 class="heading mb-0">Produtos</h4>
                                    <div>
                                        <a class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                                            href="#offcanvasExample" role="button" aria-controls="offcanvasExample">+ Novo
                                            Produto</a>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1">
                                            + Nova Categoria
                                        </button>
                                    </div>
                                </div>
                                <table id="empoloyees-tblwrapper" class="table">
                                    <thead>
                                        <tr>

                                            <th>Imagem</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
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
                                                            class="avatar avatar-md" alt="" style="width:80px; height:80px">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6>{{ $produto->nome }}</h6>
                                                    <span>{{ $produto->updated_at }}</span>
                                                </td>
                                                <td><span class="text-primary">{{ $produto->preco }} Kz</span></td>
                                                <td>
                                                    <span>91</span>
                                                </td>
                                                <td>
                                                    <span>{{ $produto->categoria->nome }}</span>
                                                </td>

                                                <td>
                                                    <ul class="prod-crud-update">
                                                        {{-- <li>
                                                            <span class="badge badge-success light border-0">Active</span>
                                                        </li> --}}
                                                        <li>
                                                            <form action="/delelatarproduto/{{ $produto->id }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="   icon-box icon-box-md bg-danger-light me-1"
                                                                    style="border:none; display:inline-block">
                                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12.8833 6.31213C12.8833 6.31213 12.5213 10.8021 12.3113 12.6935C12.2113 13.5968 11.6533 14.1261 10.7393 14.1428C8.99994 14.1741 7.25861 14.1761 5.51994 14.1395C4.64061 14.1215 4.09194 13.5855 3.99394 12.6981C3.78261 10.7901 3.42261 6.31213 3.42261 6.31213"
                                                                            stroke="#FF5E5E" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path d="M13.8055 4.1598H2.50012" stroke="#FF5E5E"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                        <path
                                                                            d="M11.6271 4.1598C11.1037 4.1598 10.6531 3.7898 10.5504 3.27713L10.3884 2.46647C10.2884 2.09247 9.94974 1.8338 9.56374 1.8338H6.74174C6.35574 1.8338 6.01707 2.09247 5.91707 2.46647L5.75507 3.27713C5.65241 3.7898 5.20174 4.1598 4.67841 4.1598"
                                                                            stroke="#FF5E5E" stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <a class="icon-box icon-box-md bg-primary-light"
                                                                href="/editarproduto/{{ $produto->id }}" role="button"
                                                                aria-controls="offcanvasExample">
                                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M9.16492 13.6286H14" stroke="#0D99FF"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M8.52001 2.52986C9.0371 1.91186 9.96666 1.82124 10.5975 2.32782C10.6324 2.35531 11.753 3.22586 11.753 3.22586C12.446 3.64479 12.6613 4.5354 12.2329 5.21506C12.2102 5.25146 5.87463 13.1763 5.87463 13.1763C5.66385 13.4393 5.34389 13.5945 5.00194 13.5982L2.57569 13.6287L2.02902 11.3149C1.95244 10.9895 2.02902 10.6478 2.2398 10.3849L8.52001 2.52986Z"
                                                                        stroke="#0D99FF" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path d="M7.34723 4.00059L10.9821 6.79201"
                                                                        stroke="#0D99FF" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
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


    {{-- CADASTRAR PRODUTO --}}
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
                            <textarea name="descricao" class="form-control summernote" id=""></textarea>
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
    </div>

    {{-- EDITAR PRODUTO --}}
    {{-- @include('site.produtos.editarproduto') --}}


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
