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
