<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\fornecedorController;
use App\Http\Controllers\produtoController;
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

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [userController::class, 'destroy'])->name('users.destroy');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('showcategoria');
Route::get('/adicionarcategoria', [CategoriaController::class, 'create'])->name('categoria.adicionar');
Route::post('savecategoria', [CategoriaController::class, 'store'])->name('categoria.criar');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');


Route::get('/adicionarfornecdedor', [fornecedorController::class, 'create'])->name('produto.fornecedor');
Route::post('/fornecedoradicionar', [fornecedorController::class, 'store'])->name('create.fornecedor');


Route::get('/produtos', [produtoController::class, 'index'])->name('index.produto');
