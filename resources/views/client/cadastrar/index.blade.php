@extends('layouts.marge.site')
@section('conteudo')
    <form action="{{ route('cadadastrar.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">telefone</label>
            <input type="text" name="telefone" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Data de Nascimento</label>
            <input type="text" name="dataNascimento" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Morada</label>
            <input type="text" name="morada" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>
        <button type="submit" class="btn btn-primary">Cadastar</button>
    </form>
@endsection
