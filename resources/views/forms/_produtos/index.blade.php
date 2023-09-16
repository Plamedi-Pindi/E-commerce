@csrf
<div class="row">
    <div class="col-lg-8">
        <div class="border border-3 p-4 rounded">
            <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Nome do Produto</label>
                <input value="{{ isset($product->nome) ? $product->nome : old('nome') }}" name="nome" type="text"
                    class="form-control" id="inputProductTitle" placeholder="">
            </div>
            <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Peso</label>
                <input value="{{ isset($product->peso) ? $product->peso : old('peso') }}" name="peso" type="text"
                    class="form-control" id="inputProductTitle" placeholder="">
            </div>
            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" id="inputProductDescription" rows="3">{{ isset($product->descricao) ? $product->descricao : old('descricao') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="inputProductDescription" class="form-label">Imagem do Produto</label>
                <input value="{{ isset($product->imagem) ? $product->imagem : old('imagem') }}" name="imagem"
                    type="file" class="form-control border-secondary">

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="border border-3 p-4 rounded">
            <div class="row g-3">
                <div class="col-md-12">
                    <label for="inputPrice" class="form-label">Preço</label>
                    <input value="{{ isset($product->peso) ? $product->peso : old('peso') }}" name="preco"
                        type="text" class="form-control" id="inputPrice" placeholder="00.00">
                </div>
                <div class="col-md-12">
                    <label for="inputStarPoints" class="form-label">Data de Validade</label>
                    <input value="{{ isset($product->validade) ? $product->validade : old('validade') }}"
                        name="validade" type="date" class="form-control" id="inputStarPoints" placeholder="00.00">
                </div>
                <div class="col-12">
                    <label for="inputCollection" class="form-label">Categoria</label>
                    <select name="id_categoria" class="form-select" id="inputCollection">
                        <option>Escolha uma categoria</option>
                        @if (isset($product->id_categoria))
                            <option selected value="{{ $product->categoria->id }}"> {{ $product->categoria->nome }}
                            </option>
                        @endif
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
<br>
