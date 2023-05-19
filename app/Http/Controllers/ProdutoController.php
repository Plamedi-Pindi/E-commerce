<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    public function index(){
        $produtos = Produto::all();

        return view('produtos.cadastrarProduto', ['produtos' => $produtos]);
    }

    // Cadastrar Categoria
    public function cadastrarCategoria(){
        return view('produtos.cadastrarCategoria');
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
        return redirect('Admindashboard/cadastrarproduto');
    }


}
