<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Endereco;
use App\Models\Item_pedido;
use App\Models\Pedido;
use App\Models\Tipo_usuario;
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
        $items = \Cart::getContent();
        $produtos = Produto::paginate(8);
        $estante = Produto::paginate(12);


        return view('home', ['produtos' => $produtos, 'estante'=> $estante, 'items'=> $items]);
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

    public function checkout(){
        $authUser = auth()->user();

        return view('site.cart.checkout', compact('authUser'));
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


    public function adminPedido(){
        $pedidos = Pedido::all();

        return view('admin.AdminPedidos', compact('pedidos'));
    }
 }

