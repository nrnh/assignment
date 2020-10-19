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
    return view('welcome');
});

Auth::routes();

Route::get('/cart', function() {
    return view('cart');
});

Route::get('/history', function() {
    return view('history');
});

Route::resource('cart', App\Http\Controllers\CartController::class);

Route::resource('history', App\Http\Controllers\HistoryController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/countCart', [App\Http\Controllers\CartController::class, 'countCart']);

Route::post('/storeCart', [App\Http\Controllers\CartController::class, 'storeCart']);

