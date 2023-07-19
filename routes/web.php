<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Models\Produto;
use Illuminate\Support\Facades\Http ;

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
Route::get('/finalizarcompra', [SiteController::class, 'checkout'])->name('site.carrinho.finalizarcompra')->middleware('auth');


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

// ROTA PARA O LOGOUT
Route::get('/logout', [SiteController::class, 'logout'])->name('user.logout');


// ROTA PARA A VIEW PRODURO
Route::get('Admindashboard/produtos', [ProdutoController::class, 'index'])->name('adminProduto')->middleware('auth');

// ROTA PARA A VIEW CATEGORIA
Route::get('Admindashboard/categorias', [CategoriaController::class, 'index'])->name('adminCategoria')->middleware('auth');

// ROTA PARA DELEITAR UM PRODUTO
Route::delete('deletarproduto/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');

// ROTA PARA  ACESSAR A VIEW DE EDITAR PRODUTO
Route::get('editarproduto/{id}', [ProdutoController::class, 'edit'])->middleware('auth');

// ROTA PARA ATUALIZAR PRODUTO
// Route::put('atualizar/{id}', [ProdutoController::class, 'atualizar'])->middleware('auth');

Route::put('/atualizar/{id}', [ProdutoController::class, 'atualizar'])->middleware('auth');


// ROTA PARA ACESSAR A VIEW DE REGISTRAR PRODUTOS
Route::get('/novoproduto', [ProdutoController::class, 'novoProduto'])->name('site.produtos.novoProduto');

// ROTA PARA REGISTRAR PRODUTOS
Route::post('/produtos', [ProdutoController::class, 'store']);

// ROTA PARA VIEW DE PESQUISAR DE PRODUTO
Route::get('pesquisarProdutos', [SiteController::class, 'pesquisarProduto'])->name('pesquisarProduto');

// ROTAs PARA CADASTRAR CATEGORIAS
Route::get('/novacategoria', [CategoriaController::class, 'novacategoria'])->name('site.produtos.novaCategoria')->middleware('auth');

Route::post('/categorias', [CategoriaController::class, 'store'])->middleware('auth');

// ROTA PARA DELEITAR UMA CATEGORIA
Route::delete('deletarcategoria/{id}', [CategoriaController::class, 'destroy'])->middleware('auth');

// ROTA PARA ACESSAR A VIEW DE EDITAR UMA CATEGORIA
Route::get('editarcategoria/{id}', [CategoriaController::class, 'edit'])->name('editarcategoria')->middleware('auth');

// ROTA PARA EDITAR UMA CATEGORIA
Route::put('update/{id}', [CategoriaController::class, 'update'])->middleware('auth');


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


Route::get('/estoque', function(){
    return view('estoque');
});


// Admin control
Route::get('/pedidos', [SiteController::class, 'adminPedido'])->name('admin.pedidos');

Route::get('/vendas', [SiteController::class, 'vendas'])->name('admin.vendas');

Route::get('/funcionario', [AdminController::class, 'funcionario'])->name('admin.funcionario');

Route::get('/cliente', [AdminController::class, 'cliente'])->name('admin.cliente');



// ################## PAGAMENTO #########################


Route::get('/pagamento', [ApiController::class, 'pagamento'])->name('api.pagamento');

Route::get('payment-cancel', [ApiController::class, 'cancel'])->name('payment.cancel');

Route::get('payment-success', [ApiController::class, 'success'])->name('payment.success');

Route::pos('/entrega/{id}', [AdminController::class, 'entrega'])->name('admin.entrega');


