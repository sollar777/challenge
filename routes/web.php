<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagamentosController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\VendasEfetuadasController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('layouts.app');
});

//produtos

Route::prefix('produtos')->name('produto.')->namespace('produto')->group(function () {

    Route::get('/exibir', [ProductController::class, 'index'])->name('exibir');
    Route::get('/criar', [ProductController::class, 'create'])->name('criar');
    Route::get('/editar/{id}', [ProductController::class, 'show'])->name('editar');
    Route::get('/pesquisa/ajax/{id}', [ProductController::class, 'findProduct'])->name('findProduct');
    Route::post('/criar', [ProductController::class, 'store'])->name('produto.enviar');
    Route::put('/edit/{id}', [ProductController::class, 'update'])->name('edit');
    Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('excluir');
});




// grupos


Route::prefix('/')->name('grupo.')->namespace('grupos')->group(function () {

    Route::get('/grupos', [GroupController::class, 'index'])->name('exibir');
    Route::get('/grupos/criar', [GroupController::class, 'create'])->name('criar');
    Route::post('/grupos/criar', [GroupController::class, 'store'])->name('enviar');
    Route::delete('/grupos/deletar/{id}', [GroupController::class, 'destroy'])->name('excluir');
});

//clientes

Route::prefix('/')->name('clientes.')->namespace('clientes')->group(function () {

    Route::get('/clientes', [ClientController::class, 'index'])->name('exibir');
    Route::get('/clientes/criar', [ClientController::class, 'create'])->name('criar');
    Route::get('/clientes/editar/{id}', [ClientController::class, 'edit'])->name('editar');
    Route::post('/clientes/create', [ClientController::class, 'store'])->name('enviar');
    Route::put('/clientes/edit/{id}', [ClientController::class, 'update'])->name('atualizar');
    Route::delete('/clientes/destroy/{id}', [ClientController::class, 'destroy'])->name('destroy');
});




//vendas

Route::prefix('/')->name('vendas.')->namespace('vendas')->group(function () {

    Route::get('/vendas', [VendasController::class, 'index'])->name('exibir');
    Route::get('/vendas/criar', [VendasController::class, 'create'])->name('criar');
    Route::get('/vendas/buscar/{id}', [VendasController::class, 'show'])->name('buscar');
    Route::post('/vendas/criar', [VendasController::class, 'store'])->name('criar.venda');
});




// vendas efetuadas

Route::prefix('/vendas/produtos')->name('vendas.produtos.')->namespace('vendas/produtos')->group(function () {


    Route::post('/criar', [VendasEfetuadasController::class, 'store'])->name('criar');
    Route::get('/buscar/{id}', [VendasEfetuadasController::class, 'show'])->name('buscar');
    Route::get('/buscar/total/{id}', [VendasEfetuadasController::class, 'totalVendas'])->name('buscar.total');
    Route::delete('/deletar/{id}', [VendasEfetuadasController::class, 'destroy'])->name('deletar');
    Route::get('/editar/{id}', [VendasEfetuadasController::class, 'edit'])->name('editar');
    Route::put('/editar/{id}', [VendasEfetuadasController::class, 'update'])->name('atualizar');

});

Route::prefix('/pagamentos')->name('pagamentos.')->namespace('pagamentos')->group(function(){

    Route::get('/exibir', [PagamentosController::class, 'buscarPagamento'])->name('exibir');

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
