<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ClientController;

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


// grupos

Route::get('/grupos', [GroupController::class, 'index'])->name('grupo.exibir');
Route::get('/grupos/criar', [GroupController::class, 'create'])->name('grupo.criar');
Route::post('/grupos/criar', [GroupController::class, 'store'])->name('grupo.enviar');
Route::delete('/grupos/destroy/{id}', [GroupController::class, 'destroy'])->name('grupo.excluir');


//clientes

Route::get('/clientes', [ClientController::class, 'index'])->name('cliente.exibir');
