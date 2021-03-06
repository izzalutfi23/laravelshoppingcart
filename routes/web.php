<?php

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

Route::get('/', 'Home@index');
Route::get('/keranjang', 'Home@keranjang');
Route::get('/pembelian', 'Home@pembelian');

// Add to Cart
Route::get('/addcart/{produk}', 'Home@addcart');
// Delete Cart
Route::get('/delcart/{cart}', 'Home@delcart');
// Checkout
Route::get('/checkout', 'Home@checkout');