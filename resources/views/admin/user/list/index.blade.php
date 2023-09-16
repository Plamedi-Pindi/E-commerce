@extends('layouts.marge.admin')
@section('titulo', 'Lista de utilizadores')
@section('content')


<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0 text-uppercase">Lista de Utilizadores</h4>
                </div>
            </div>
        </div>
    </div>

    <!--end breadcrumb-->

            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nome</th>

                                    <th>Nível</th>
                                    <th>ACÇÕES</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $item)
                                <tr>
                                    <td><span class="text-muted">{{ $item->id }}</span></td>
                                    <td class="w60">

                                        @if ($item->photo == null)
                                            <img class="avatar" src="/dashboard/images/user_no_photo_600x600.png"
                                                alt="">
                                        @else
                                            <img class="avatar" src="/storage/{{ $item->photo }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-15">{{ $item->name }}</div>
                                    </td>

                                    <td><span class="text-muted">{{ $item->level }}</span></td>

                                    <td>

                                        <a href='{{ url("admin/utilizadores/show/{$item->id}") }}'> <i
                                                class="fa fa-eye" data-toggle="tooltip" title="Detalhes"></i> </a>


                                        <a href='{{ url("admin/utilizadores/edit/{$item->id}") }}'> <i
                                                class="fa fa-edit" data-toggle="tooltip" title="Editar"></i> </a>



                                                <a href="#" class="id-modal-trigger" data-id="{{ $item->id }}"
                                                    title="Eliminar" data-toggle="modal" data-target="#myModal"><i
                                                        class="fa fa-trash-o text-danger" data-toggle="tooltip"
                                                        title="Eliminar"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
</div>


    @include('admin.extras.modal.delete.user.index')
@endsection
