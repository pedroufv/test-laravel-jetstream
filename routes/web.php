<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/products', function () {

    return view('products.index');

})->name('products.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/products/{product}', function () {

    return view('products.index');

})->name('products.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/products/{product}/edit', function () {

    return view('products.index');

})->name('products.edit');

Route::middleware(['auth:sanctum', 'verified'])->get('/products/{product}/delete', function () {

    return view('products.index');

})->name('products.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/categories', function () {

    return view('categories.index');

})->name('categories.index');
