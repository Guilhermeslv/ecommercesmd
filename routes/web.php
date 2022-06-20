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

Route::get('/', function () {
    return view('index', ['produtos' => \App\Models\Produto::all()]);
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login.view')->middleware('guest');

Route::get('/register', function () {
    return view('novoCliente');
})->name('register.view')->middleware('guest');

Route::get('/admin', function () {
    return view('adminPages.index');
})->name('adminPages.index');

Route::resource('/produto', \App\Http\Controllers\ProdutoController::class);

Route::resource('/categoria', \App\Http\Controllers\CategoriaController::class);
