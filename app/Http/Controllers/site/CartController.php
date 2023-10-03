<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Estoque;

class CartController extends Controller
{
    public function index(){

        $authUser = auth()->user();
        $cartAnalise = \Cart::getContent();

        /** Não autoriza finalizar a compra de uma quantidade de produto
         *  maior que a quantidade restante no estoque  **/
        foreach($cartAnalise as $item){

            /** Seleciona o id de cada produto no carrinho**/
            $productAnalise = Produto::where('id', $item)->get();


            foreach ($productAnalise as $produto) {
                /** Acessa o estoque de cada produto **/
                $estoques = Estoque::where('id', $produto->id)->get();

                foreach ($estoques as $estoque) {

                    /** Compara a quantidade do produto no estoque com a quantidade selecionada no carrinho**/
                    if($estoque->quantidade > $item->quantity){
                        return view('site.cart.checkout', compact('authUser'));
                    }else{
                       return redirect()->route('site.checkout')->with('alert', 'A quantidade de '. $produto->nome.' selecionado é maior doque a quantidade disponível no estoque! Estoque: '. $estoque->quantidade. ' Qtd');

                    }
                }
            }
        }
    }




    public function carrinhoLista(){
        $items = \Cart::getContent();
        // dd($items);
        return view('site.shop.shoping-cart', compact('items'));
    }



    // Add produto ao carrinho
    public function adicionarCarrinho(Request $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->add([
            'id' => $request->id,
            'name' => $request->nome,
            'price' => $request->preco,
            'quantity' => abs($request->qtd),
            'attributes' => array(
                'image' => $request->imagem
            )
            ]);

        return redirect()->route('shop.shopDetails', $request->id)->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    // Remover produto do carrinho
    public function removeCarrinho(Request $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->remove($request->id);

        return redirect()->route('shop.shoppingCart')->with('sucesso', 'Produto eliminado do carrinho!');
    }

    // Atualizar a quantidade de um produto no carrinho
    public function atualizarCarrinho(Request $request){
        $userId = auth()->user()->id;
        \Cart::session($userId)->update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->qtd),
            ]
        ]);
        return redirect()->route('shop.shoppingCart')->with('sucesso', 'O carrinho foi atualizado!');
    }


    // Metodo para Limpar o carrinho
    public function limparCarrinho(){
        \Cart::clear();

        return redirect()->route('shop.shoppingCart')->with('alerta', 'O seu carrinho esta vazio!');
    }
}
