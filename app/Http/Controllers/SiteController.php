<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

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

    public function categoria($id=null){
        $categoriaProdutos = Produto::where('id_categoria', $id)->get();

        return view('produtos.categoria',
         [ 'categoriaProdutos' => $categoriaProdutos]);
    }


    public function shop(){
        return view('shop.shop-grid');
    }

    public function shopDetail(){
        return view('shop.shop-details');
    }

    public function shoppingCart(){
        return view('shop.shoping-cart');
    }
    public function checkout(){
        return view('cart.checkout');
    }


 }
