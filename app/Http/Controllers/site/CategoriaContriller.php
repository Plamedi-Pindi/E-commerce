<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaContriller extends Controller
{
    public function index(){

    }


    public function show($id){
        $categotia = Categoria::findOrFail($id)->get();
        return view('site.categorias.categoria', compact('categoria'));
    }
}
