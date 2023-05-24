<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $items = \Cart::getContent();
        // dd($items);
        return view('site.shop.shoping-cart', compact('items'));
    }

    // Add produto ao carrinho
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

        return redirect()->route('shop.shopDetails', $request->id)->with('sucesso', 'Produto adicionado ao carrinho!');
    }

    // Remover produto do carrinho
    public function removeCarrinho(Request $request){
        \Cart::remove($request->id);

        return redirect()->route('shop.shoppingCart')->with('sucesso', 'Produto eliminado do carrinho!');
    }

    // Atualizar a quantidade de um produto no carrinho
    public function atualizarCarrinho(Request $request){
        \Cart::update($request->id, [
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
