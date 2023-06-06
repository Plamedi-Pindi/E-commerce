<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\User;
use Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  METODO INDEX
    public function index()
    {
        $produtos = Produto::paginate(8);

        return view('home', ['produtos' => $produtos]);
    }
// METODO CATEGORIA
    public function categoria($id){
        $categoriaProdutos = Produto::where('id_categoria', $id)->get();
        $categoria = Categoria::find($id);
        return view('site.produtos.categoria',
         [ 'categoriaProdutos' => $categoriaProdutos,
            'categoria' => $categoria
        ]);
    }

// METODO PARA COMPRAS
    public function shop(){
        return view('site.shop.shop-grid');
    }

    public function shopDetail($id){
        $produto = Produto::findOrFail($id);
        return view('site.shop.shop-details', ['produto' => $produto]);
    }

    public function shoppingCart(){
        return view('site.shop.shoping-cart');
    }

   
    // METODO PARA O LOGOUT
    public function logout(){
        Auth::logout();
        return redirect('/')->with('sucesso', 'Sessão terminada!');
    }

    // METODO PARA BUSACAS
    public function pesquisarProduto(){

        return view('site.produtos.Busca')->with('alerta', 'Nenhum item emcontrado, digite o nome do produto na barra de pesquisa!');
    }

    public function adicionarCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'quantity' => abs($request->qtd),
            'attributes' => array(
                'image' => $request->imagem
            )
            ]);

        return redirect()->route('Produto.categorias', $request->id)->with('sucesso', 'Produto adicionado ao carrinho!');
    }

 }
