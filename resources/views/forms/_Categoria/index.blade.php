@csrf
<div class="row my-4">
    <div class="col-lg-12">
        <div class="border border-3 p-4 rounded">
            <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Nome da Categoria</label>
                <input value="{{ isset($categoria->nome) ? $categoria->nome : old('nome') }}" name="nome" type="text" class="form-control" id="inputProductTitle"
                    placeholder="Enter product title">
            </div>

            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" id="inputProductDescription" rows="3">{{ isset($categoria->descricao) ? $categoria->descricao : old('descricao') }}</textarea>
            </div>

        </div>
    </div>

</div><!--end row-->
<br>

