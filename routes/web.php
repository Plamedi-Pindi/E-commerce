<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// HOME ROUTE
Route::get('/',[SiteController::class, 'index'])->name('home');

// CHECKOUT
Route::get('fecharaconta', [SiteController::class, 'checkout'])->name('cart.checkout');

// DASHBORAD
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('Admindashboard', function(){
    return view('dashboard');
})->name('Admindashboard');
});


// ROTA PARA A VIEW PRODURO
Route::get('Admindashboard/produtos', [ProdutoController::class, 'index'])->name('cadastrarProduto')->middleware('auth');

// ROTA PARA A VIEW CATEGORIA
Route::get('Admindashboard/categorias', [CategoriaController::class, 'index'])->name('cadastrarCategoria')->middleware('auth');

// ROTA PARA DELEITAR UM PRODUTO
Route::delete('delelatarproduto/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');

// ROTA PARA EDITAR PRODUTO
Route::get('editarproduto/{id}', [ProdutoController::class, 'edit'])->middleware('auth');

// ROTA PARA ATUALIZAR PRODUTO
Route::post('update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

// ROTA PARA REGISTRAR PRODUTOS
Route::post('/produtos', [ProdutoController::class, 'store']);

// ROTA PARA CADASTRAR CATEGORIAS
Route::post('/categorias', [CategoriaController::class, 'store']);





// ROTA PARA ACESSAR A VIEW CATEGORIA
Route::get('produto/categorias/{id}', [SiteController::class, 'categoria'])->name('Produto.categorias');




// SHOP GROUP
Route::group(['prefix' => 'compras', 'as' => 'shop.'], function(){

    // SHOP ROUTE
    Route::get('/fazercompras', [SiteController::class, 'shop'])->name('shop-grid');

    // SHOPPPING CART ROUTE
    // Route::get('/carrinhodecompras', [SiteController::class, 'shoppingCart'])->name('shoppingCart');

    // SHOP DETAILS ROUTE
    Route::get('/detalhesdacompra/{id}', [SiteController::class, 'shopDetail'])->name('shopDetails');

});



// CART ROUTES

// Carrinho views
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('shop.shoppingCart');

// Carrinho Add
Route::post('/carrinho', [CarrinhoController::class, 'adicionarCarrinho'])->name('shop.addcarrinho');

// Carrinho remove
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('shop.removecarrinho');



// Atualizar Carrinho
Route::post('/atualizar', [CarrinhoController::class, 'atualizarCarrinho'])->name('shop.atualizarcarrinho');

Route::get('/limapar', [CarrinhoController::class, 'limparCarrinho'])->name('shop.limparcarrinho');
