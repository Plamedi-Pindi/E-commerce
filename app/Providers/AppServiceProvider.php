<?php

namespace App\Providers;

use App\Http\Controllers\CarrinhoController;
use App\Models\Categoria;
use App\Models\Estoque;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(100);

        // MÉTODO GLOBAL PARA AS CATEGORIAS DOS PRODUTOS

        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);

        // METODO PARA BUSCAS
        $busca = request('busca');
        $buscarProdutos = Produto::where([
            ['nome', 'like', '%'.$busca.'%']
        ])->get();
        view()->share(['buscarProdutos' => $buscarProdutos, 'busca'=> $busca]);


        // METODO PARA O CARRINHO
        $items = \Cart::getContent();
        view()->share('items', $items);


        $estoque = Estoque::all();
        view()->share('estoque', $estoque);

      
    }
}
