<?php

use Illuminate\Support\Facades\Route;

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
