<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/strankaProdukty', function () {
    return view('strankaProdukty');
})->name('strankaProdukty');
