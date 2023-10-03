<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(8);
        $estantes = Produto::paginate(8);
        return view('site.home.index', compact('produtos', 'estantes'));
    }

}
