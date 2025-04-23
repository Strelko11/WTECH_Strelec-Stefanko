<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/strankaProdukty', function () {
    return view('strankaProdukty');
})->name('strankaProdukty');
Route::get('/produktView', function () {
    return view('produktView');
})->name('produktView');
Route::get('/loginForm', function () {
    return view('loginForm');
})->name('loginForm');
Route::get('/registerForm', function () {
    return view('registerForm');
})->name('registerForm');
Route::get('/kosikView', function () {
    return view('kosikView');
})->name('kosikView');
Route::get('/adminObrazovka', function () {
    return view('adminObrazovka');
})->name('adminObrazovka');
Route::get('/pridajProdukt', function () {
    return view('pridajProdukt');
})->name('pridajProdukt');
Route::get('/upravProdukt', function () {
    return view('upravProdukt');
})->name('upravProdukt');
Route::get('/dorucenie&platba', function () {
    return view('dorucenie&platba');
})->name('dorucenie&platba');

use App\Http\Controllers\ProductController;
Route::get('/produkty/{category}', [ProductController::class, 'showByCategory'])->name('zKategorie');
Route::get('/produktView', [ProductController::class, 'showProduct'])->name('produktView');
Route::get('/vyhladavanie', [ProductController::class, 'search'])->name('vyhladavanie');

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])->name('adminObrazovka');



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/kosik', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/clear-cart', function () {
    session()->forget('cart');
    return 'Cart cleared!';
});
