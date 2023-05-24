<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    public function index(){
        $produtos = Produto::all();

        return view('site.produtos.cadastrarProduto', ['produtos' => $produtos]);
    }



    public function store(Request $request){
        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->id_categoria = $request->categoria;

        $user = auth()->user();
        $produto->id_user = $user->id;

        // Imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $imagem = $request->imagem;
            $extensaoImagem = $imagem->extension();

            $nomeImagem = md5($imagem->getClientOriginalName().strtotime('now').".".$extensaoImagem);

            $imagem->move(public_path('/site/img/produtos'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }

        $produto->save();
        return redirect('Admindashboard/produtos');
    }

    public function destroy($id){
        Produto::findOrFail($id)->delete();
        return redirect('Admindashboard/produtos');
    }

    public function edit($id){
        $produto = Produto::findOrFail($id);

        return view('site.produtos.editarproduto', ['produto' => $produto]);
    }

    public function update(Request $request){
        Produto::findOrFail($request->id)->update($request->all());

        return redirect('Admindashboard/produtos');
    }

}
