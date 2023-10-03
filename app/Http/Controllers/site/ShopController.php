<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('site.shop.shop-grid');
    }

    public function show($id){
        $produto = Produto::findOrFail($id)->get();

        return view('site.shop.shop-details', compact('produto'));
    }

    public function cart(){
        return view('site.shop.shoping-cart');
    }



}
