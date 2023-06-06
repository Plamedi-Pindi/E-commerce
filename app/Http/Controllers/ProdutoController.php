<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Estoque;

class ProdutoController extends Controller
{

    public function index(){
        $busca = request('busca');
        if( $busca){
            $produtos = Produto::where([
                ['nome', 'like', '%'.$busca.'%']
            ])->get();
        }else{
            $produtos = Produto::all();
        }


        return view('site.produtos.adminProduto', ['produtos' => $produtos, 'busca' => $busca]);
    }

    // public function categoria($id){
    //     $categoriaProdutos = Produto::where('id_categoria', $id)->get();
    //     $categoria = Categoria::find($id);

    //     return view('site.produtos.adminProduto', );
    // }



    public function store(Request $request){
        $produto = new Produto;
        $estoque = new Estoque;

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->id_categoria = $request->categoria;
        $produto->peso= $request->peso;
        $produto->validade = $request->validade;

        // Imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $imagem = $request->imagem;
            $extensaoImagem = $imagem->extension();

            $nomeImagem = md5($imagem->getClientOriginalName().strtotime('now').".".$extensaoImagem);

            $imagem->move(public_path('/site/img/produtos'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }

        $produto->save();

        $estoque->quantidade = $request->quantidade;
        $estoque->limite_max = $request->limite_max;
        $estoque->limite_min = $request->limite_min;
        $estoque->produto_id = $produto->id;

        $user = auth()->user();
        $estoque->id_user = $user->id;

        $estoque->save();
        return redirect('Admindashboard/produtos');
    }

    public function novoproduto(){
        return view('site.produtos.novoProduto');
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
        $produto =Produto::findOrFail($request->id);
        // $estoque = Estoque::


        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->id_categoria = $request->categoria;
        $produto->peso= $request->peso;
        $produto->validade = $request->validade;

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

        $produto->update($request->all());

        return redirect('Admindashboard/produtos')->with('sucesso', 'O produto selecionado foi atualizado!');
    }


}
