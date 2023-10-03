<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\site\CartController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\site\ShopController;
use App\Models\Produto;
use Illuminate\Support\Facades\Http;

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


/****************  HOME ROUTE  ********************/
Route::get('/', [HomeController::class, 'index'])->name('site.home');


/****************  SHOP GROUP  ********************/
Route::group(['prefix' => 'compras', 'as' => 'shop.'], function () {

    /** GRID **/
    Route::get('/', [ShopController::class, 'index'])->name('grid');

    /** DATAILS **/
    Route::get('/detalhes/{id}', [ShopController::class, 'show'])->name('details');

    /** Cart **/
    Route::get('/Carrinho', [ShopController::class, 'cart'])->name('cart');

});

/****************  FINALIZAR COMPRA ********************/
Route::get('/formularioDeCompra', [CartController::class, 'index'])->name('site.checkout');

/****************  CONTACTS  ********************/
Route::get('/contatos', [ContactController::class, 'index'])->name('site.contacts');


/****************  CATEGORIAS ********************/
Route::get('/contatos', [CategoriaController::class, 'show'])->name('site.contacts');








// CHECKOUT
// Route::get('/finalizarcompra', [SiteController::class, 'checkout'])->name('site.carrinho.finalizarcompra')->middleware('auth');

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


Route::get('/estoque', function () {
    return view('estoque');
});




// ################## PAGAMENTO #########################


Route::get('/pagamento', [ApiController::class, 'pagamento'])->name('api.pagamento');

Route::get('payment-cancel', [ApiController::class, 'cancel'])->name('payment.cancel');

Route::get('payment-success', [ApiController::class, 'success'])->name('payment.success');

Route::put('/pedidos/{id}', [apiController::class, 'pagamento']);

Route::put('/entrega/{id}', [AdminController::class, 'entrega'])->name('admin.entrega');

Route::put('/promocao/{id}', [AdminController::class, 'promocao'])->name('admin.promocao');

// ################ GOOGLE ###################

Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('google.login');
Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');

/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
