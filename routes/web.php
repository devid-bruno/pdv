<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\produtoController;
use App\Http\Controllers\vendasController;
use App\Http\Middleware\Authenticate;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [userController::class, 'showlogin'])->name('login');
Route::post('/login', [userController::class, 'login'])->name('login.submit');

Route::get('/dashboard', [userController::class, 'showdashboard'])->name('home');
Route::get('/users', [userController::class, 'showusers'])->name('users');

Route::post('/registro', [userController::class, 'register'])->name('users.register');

Route::get('/logout', [userController::class, 'logout'])->name('logout');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [userController::class, 'destroy'])->name('users.destroy')->middleware('auth');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('showcategoria')->middleware('auth');
Route::get('/adicionarcategoria', [CategoriaController::class, 'create'])->name('categoria.adicionar')->middleware('auth');
Route::post('savecategoria', [CategoriaController::class, 'store'])->name('categoria.criar')->middleware('auth');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');


Route::get('/adicionarfornecdedor', [fornecedorController::class, 'create'])->name('produto.fornecedor')->middleware('auth');
Route::post('/fornecedoradicionar', [fornecedorController::class, 'store'])->name('create.fornecedor')->middleware('auth');


Route::get('/produtos', [produtoController::class, 'index'])->name('index.produto')->middleware('auth');
Route::get('/addprodutos', [produtoController::class, 'create'])->name('create.produto')->middleware('auth');
Route::post('/addprodutos', [produtoController::class, 'store'])->name('store.produto')->middleware('auth');


Route::get('/vendas', [vendasController::class, 'create'])->name('index.vendas')->middleware('auth');
Route::post('/vender', [vendasController::class, 'store'])->name('index.vender')->middleware('auth');



Route::get('/cliente', [ClienteController::class, 'create'])->name('index.cliente')->middleware('auth');
Route::post('/cadastrocliente', [ClienteController::class, 'store'])->name('index.cadastrado')->middleware('auth');
