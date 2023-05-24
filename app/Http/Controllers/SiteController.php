<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\User;

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
        return view('site.produtos.categoria',
         [ 'categoriaProdutos' => $categoriaProdutos,
            'categoria' => $categoria
        ]);
    }


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
        return view('site.cart.checkout');
    }


 }
