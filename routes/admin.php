<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Editor;
use App\Http\Middleware\Administrador;


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

/* Grupo de Rotas Autenticadas */

Route::middleware(['auth'])->group(function () {
  /* Manager Dashboard  */
  Route::get('/admindashboard', ['as' => 'Admindashboard', 'uses' => 'Admin\DashboardController@index']);



  /** pedidos*/

  /**end pedidos */
  Route::get('/pedidos', [SiteController::class, 'adminPedido'])->name('admin.pedidos');
  Route::get('/vendas', [SiteController::class, 'vendas'])->name('admin.vendas');
  Route::get('/funcionario', [AdminController::class, 'funcionario'])->name('admin.funcionario');
  Route::get('/cliente', [AdminController::class, 'cliente'])->name('admin.cliente');




// ROTA PARA A VIEW PRODURO
Route::get('Admindashboard/produtos', [ProdutoController::class, 'index'])->name('adminProduto');

// ROTA PARA A VIEW CATEGORIA
Route::get('Admindashboard/categorias', [CategoriaController::class, 'index'])->name('adminCategoria');
// ROTA PARA DELEITAR UM PRODUTO
Route::delete('deletarproduto/{id}', [ProdutoController::class, 'destroy']);
// ROTA PARA  ACESSAR A VIEW DE EDITAR PRODUTO
Route::get('editarproduto/{id}', [ProdutoController::class, 'edit']);
// ROTA PARA ATUALIZAR PRODUTO
// Route::put('atualizar/{id}', [ProdutoController::class, 'atualizar']);
Route::put('/atualizar/{id}', [ProdutoController::class, 'atualizar']);

// ROTA PARA ACESSAR A VIEW DE REGISTRAR PRODUTOS
Route::get('/novoproduto', [ProdutoController::class, 'novoProduto'])->name('site.produtos.novoProduto');
});
