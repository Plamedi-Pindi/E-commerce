<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Gallery;
use App\Models\Log;
use App\Models\Produto;
use App\Models\Signup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home.index');
    }


    public function products(){
        $produtos = Produto::all();
        return view('admin.products.products', compact('produtos'));
    }

    public function newProduct(){
        return view("admin.products.newProduct");
    }

    public function productDetails($id){
        $produtos = Produto::findOrFail($id);
        return view("admin.products.productDetails", compact('produtos'));
    }


}
