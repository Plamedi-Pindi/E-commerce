<?php

namespace App\Providers;

use App\Http\Controllers\CarrinhoController;
use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        // MÉTODO GLOBAL PARA AS CATEGORIAS DOS PRODUTOS
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);

        

    }
}
