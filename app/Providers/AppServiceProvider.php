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

        


    }
}
