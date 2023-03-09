<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\estoqueController;
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
Route::get('/register', [userController::class, 'showregister'])->name('register');
Route::get('/estoque', [estoqueController::class, 'showestoque'])->name('estoque')->middleware(Authenticate::class);

Route::post('/login', [userController::class, 'login'])->name('login.submit');
Route::post('/registro', [userController::class, 'register'])->name('login.register');

Route::get('/dashboard', [userController::class, 'showdashboard'])->name('home');
Route::get('/logout', [userController::class, 'logout'])->name('logout');
