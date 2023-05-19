<?php

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
Route::get('Admindashboard', function(){
    return view('dashboard');
})->name('Admindashboard');


Route::get('Admindashboard/cadastrarproduto', [ProdutoController::class, 'index'])->name('cadastrarProduto')->middleware('auth');

Route::get('Admindashboard/cadastrarcategoria', [CategoriaController::class, 'index'])->name('cadastrarCategoria')->middleware('auth');

// REGISTRAR PRODUTOS
Route::post('produtos/', [ProdutoController::class, 'store']);

// SHOP GROUP
Route::group(['prefix' => 'compras', 'as' => 'shop.'], function(){

    // SHOP ROUTE
    Route::get('/fazercompras', [SiteController::class, 'shop'])->name('shop-grid');

    // SHOPPPING CART ROUTE
    Route::get('/carrinhodecompras', [SiteController::class, 'shoppingCart'])->name('shoppingCart');

    // SHOP DETAILS ROUTE
    Route::get('/detalhesdacompra/{id}', [SiteController::class, 'shopDetail'])->name('shopDetails');

});

// Categorias Route
Route::post('produtos/categoria', [CategoriaController::class, 'store']);

Route::get('produto/categorias/{id}', [SiteController::class, 'categoria'])->name('Produto.categorias');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
