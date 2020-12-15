<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\VendasEfetuadasController;

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
    return view('layout.app');
});

//produtos

Route::get('/produtos', [ProductController::class, 'index'])->name('produto.exibir');
Route::get('/produtos/criar', [ProductController::class, 'create'])->name('produto.criar');
Route::post('/produtos/criar', [ProductController::class, 'store'])->name('produto.enviar');
Route::get('/produtos/editar/{id}', [ProductController::class, 'show'])->name('produto.editar');
Route::put('/produtos/edit/{id}', [ProductController::class, 'update'])->name('produto.edit');
Route::delete('/produtos/destroy/{id}', [ProductController::class, 'destroy'])->name('produto.excluir');

Route::get('/produtos/pesquisa/ajax/{id}', [ProductController::class, 'findProduct'])->name('produto.findProduct');


// grupos

Route::get('/grupos', [GroupController::class, 'index'])->name('grupo.exibir');
Route::get('/grupos/criar', [GroupController::class, 'create'])->name('grupo.criar');
Route::post('/grupos/criar', [GroupController::class, 'store'])->name('grupo.enviar');
Route::delete('/grupos/deletar/{id}', [GroupController::class, 'destroy'])->name('grupo.excluir');


//clientes

Route::get('/clientes', [ClientController::class, 'index'])->name('cliente.exibir');
Route::get('/clientes/criar', [ClientController::class, 'create'])->name('cliente.criar');
Route::get('/clientes/editar/{id}', [ClientController::class, 'edit'])->name('cliente.editar');
Route::post('/clientes/create', [ClientController::class, 'store'])->name('cliente.enviar');
Route::put('/clientes/edit/{id}', [ClientController::class, 'update'])->name('cliente.atualizar');
Route::delete('/clientes/destroy/{id}', [ClientController::class, 'destroy'])->name('cliente.destroy');

//endereços

//vendas

Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.exibir');
Route::get('/vendas/criar', [VendasController::class, 'create'])->name('vendas.criar');
Route::post('/vendas/criar', [VendasController::class, 'store'])->name('vendas.criar.venda');


// vendas efetuadas
Route::post('/vendas/produtos/criar/', [VendasEfetuadasController::class, 'store'])
->name('vendas.produtos.criar');
Route::get('/vendas/produtos/buscar/{id}', [VendasEfetuadasController::class, 'show'])
->name('vendas.produtos.buscar');
Route::delete('/vendas/produtos/deletar/{id}', [VendasEfetuadasController::class, 'destroy'])
->name('vendas.produtos.deletar');
Route::put('/vendas/produtos/editar/{id}', [VendasEfetuadasController::class, 'update'])
->name('vendas.produtos.atualizar');





