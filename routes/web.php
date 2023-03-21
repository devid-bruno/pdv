<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FornecedoresController;
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

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.lista')->middleware('auth');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.adicionar')->middleware('auth');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.lista')->middleware('auth');
Route::get('/categorias', [CategoriaController::class, 'create'])->name('categoria.adicionar')->middleware('auth');
Route::post('/criar', [CategoriaController::class, 'store'])->name('criar.categoria')->middleware('auth');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy')->middleware('auth');

Route::get('/fornecedor', [FornecedoresController::class, 'index'])->name('fornecedores.lista')->middleware('auth');
Route::get('/fornecedores', [FornecedoresController::class, 'create'])->name('fornecedores.adicionar')->middleware('auth');
Route::post('/add', [FornecedoresController::class, 'store'])->name('fornecedor.criar')->middleware('auth');
