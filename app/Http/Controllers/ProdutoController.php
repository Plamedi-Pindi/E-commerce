<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Estoque;
use App\Models\TipoUsuario;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\File;


use function PHPUnit\Framework\isEmpty;

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

       

        return view('site.produtos.adminProduto', ['produtos' => $produtos, 'busca' => $busca])->with('alerta');
    }

        // ############### Metodo para registrar produtos ##################
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
            $extensaoImagem = $imagem->getClientOriginalExtension();

            $nomeImagem = md5($imagem->getClientOriginalName().strtotime('now').'.'.$extensaoImagem);

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


    // ############### Metodo para retornar a pagina de cadastro do produtos ##################
    public function novoproduto(){
        $categotia = Categoria::all();
        if($categotia->count() == 0){
            return redirect('Admindashboard/produtos')->with('alert', 'Não é possível registar produtos a menos que tenha no mínimo uma categoria registada!');
        }else{
            return view('site.produtos.novoProduto')->with('alert', 'Produto registado com sucesso!');
        }
    }

    // ############### METODO PARA ELIMINAR UM PRODUTO ##################
    public function destroy($id){
        $produto = Produto::findOrFail($id);


        $veliaImagem = public_path('/site/img/produtos', $produto->imagem);

            if(File::exists($veliaImagem)){
                File::delete($veliaImagem);
            }

            $produto->delete();

        return redirect('Admindashboard/produtos')->with('sucesso', 'Produto deleitado com sucesso!');
    }

    // ############### METODO PARA RETUORNAR A PAGINA DE EDITAR UM PRODUTO ##################
    public function edit($id){
        $produto = Produto::findOrFail($id);

        return view('site.produtos.editarproduto', ['produto' => $produto]);
    }

       // ############### METODO PARA EDITAR UM PRODUTO ##################
    public function atualizar(Request $req){
        $produto = Produto::findOrFail($req->id);
        // $estoque = Estoque::findOrFail('produto_id','like', $produto->id);

        $produto->nome = $req->nome;
        $produto->preco = $req->preco;
        $produto->id_categoria = $req->categoria;
        $produto->peso= $req->peso;
        $produto->validade= $req->validade;
        $produto->descricao= $req->descricao;

         // Imagem
        if($req->hasFile('imagem') && $req->file('imagem')->isValid()){

            $veliaImagem = public_path('/site/img/produtos', $produto->imagem);

            if(File::exists($veliaImagem)){
                File::delete($veliaImagem);
            }

            $imagem = $req->imagem;
            $extensaoImagem = $imagem->extension();

            $nomeImagem = md5($imagem->getClientOriginalName().strtotime('now').".".$extensaoImagem);

            $imagem->move(public_path('/site/img/produtos'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }
        $produto->update($req->all());

        $produto->estoque->quantidade = $req->quantidade;
        $produto->estoque->limite_min = $req->limite_min;
        $produto->estoque->update($req->all());

        // $estoque->update($req->all());

        return redirect('Admindashboard/produtos')->with('sucesso', 'O produto foi atualizado com sucesso!');
    }




}
