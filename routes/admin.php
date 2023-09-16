<?php

use Illuminate\Support\Facades\Route;



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

    /* course */
    Route::get('/admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);



    /* produtos */
    Route::get('admin/produtos/index', ['as' => 'admin.produtos.index', 'uses' => 'Admin\ProdutosController@index']);
    Route::get('admin/produtos/show/{id}', ['as' => 'admin.produtos.show', 'uses' => 'Admin\ProdutosController@show']);
    Route::get('admin/produtos/create', ['as' => 'admin.produtos.create', 'uses' => 'Admin\ProdutosController@create']);
    Route::get('admin/produtos/edit/{id}', ['as' => 'admin.produtos.edit', 'uses' => 'Admin\ProdutosController@edit']);;
    Route::post('admin/produtos/store', ['as' => 'admin.produtos.store', 'uses' => 'Admin\ProdutosController@store']);;
    Route::put('admin/produtos/update/{id}', ['as' => 'admin.produtos.update', 'uses' => 'Admin\ProdutosController@update']);
    Route::get('admin/produtos/delete/{id}', ['as' => 'admin.produtos.delete', 'uses' => 'Admin\ProdutosController@destroy']);
    /* end produtos */

    /* pedidos */
    Route::get('admin/pedidos/index', ['as' => 'admin.pedidos.index', 'uses' => 'Admin\PedidoController@index']);
    Route::get('admin/pedidos/show/{id}', ['as' => 'admin.pedidos.show', 'uses' => 'Admin\PedidoController@show']);
    Route::get('admin/pedidos/create', ['as' => 'admin.pedidos.create', 'uses' => 'Admin\PedidoController@create']);
    Route::get('admin/pedidos/edit/{id}', ['as' => 'admin.pedidos.edit', 'uses' => 'Admin\PedidoController@edit']);;
    Route::post('admin/pedidos/store', ['as' => 'admin.pedidos.store', 'uses' => 'Admin\PedidoController@store']);;
    Route::put('admin/pedidos/update/{id}', ['as' => 'admin.pedidos.update', 'uses' => 'Admin\PedidoController@update']);
    Route::get('admin/pedidos/delete/{id}', ['as' => 'admin.pedidos.delete', 'uses' => 'Admin\PedidoController@destroy']);
    /* end pedidos */

       /* categoria */
       Route::get('admin/categorias/index', ['as' => 'admin.categorias.index', 'uses' => 'Admin\CategoriaController@index']);
       Route::get('admin/categorias/show/{id}', ['as' => 'admin.categorias.show', 'uses' => 'Admin\CategoriaController@show']);
       Route::get('admin/categorias/create', ['as' => 'admin.categorias.create', 'uses' => 'Admin\CategoriaController@create']);
       Route::get('admin/categorias/edit/{id}', ['as' => 'admin.categorias.edit', 'uses' => 'Admin\CategoriaController@edit']);;
       Route::post('admin/categorias/store', ['as' => 'admin.categorias.store', 'uses' => 'Admin\CategoriaController@store']);;
       Route::put('admin/categorias/update/{id}', ['as' => 'admin.categorias.update', 'uses' => 'Admin\CategoriaController@update']);
       Route::get('admin/categorias/delete/{id}', ['as' => 'admin.categorias.delete', 'uses' => 'Admin\CategoriaController@destroy']);
       /* end categoria */


    /* User */
    Route::get('admin/utilizadores/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
    Route::get('admin/utilizadores/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware('administrador');
    Route::get('admin/utilizadores/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware('administrador');
    Route::put('admin/utilizadores/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware('administrador');
    Route::get('admin/utilizadores/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
    /* end user */
});
