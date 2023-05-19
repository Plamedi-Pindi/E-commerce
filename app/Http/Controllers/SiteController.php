<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(8);

        return view('home', ['produtos' => $produtos]);
    }

    public function categoria($id){
        $categoriaProdutos = Produto::where('id_categoria', $id)->get();
        $categoria = Categoria::find($id);
        return view('produtos.categoria',
         [ 'categoriaProdutos' => $categoriaProdutos,
            'categoria' => $categoria
        ]);
    }


    public function shop(){
        return view('shop.shop-grid');
    }

    public function shopDetail($id){
        $produto = Produto::where('id', $id);
        return view('shop.shop-details', compact('produto'));
    }

    public function shoppingCart(){
        return view('shop.shoping-cart');
    }
    public function checkout(){
        return view('cart.checkout');
    }


 }
