<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
Auth::routes();


Route::get('/', [AllUserController::class, 'index']);
Route::get('/Login', [AllUserController::class, 'login']);
Route::get('/SignUp', [AllUserController::class, 'signup']);
Route::get('/products', [AllUserController::class, 'products']);
Route::get('/product-details/{id}', [AllUserController::class, 'product_details']);
Route::get('/about', [AllUserController::class, 'aboutUS']);
Route::get('/contact', [AllUserController::class, 'contactUS']);

Route::group(['middleware' => 'guest'], function() {
    // Route::get('/', [AllUserController::class, 'contactUS']);
});

Route::group(['middleware' => 'user'], function() {
    Route::get('/addToCart/{data}', [UserController::class, 'addToCart']);
    Route::get('/carts', [UserController::class, 'carts']);
    Route::post('/carts', [UserController::class, 'carts']);
    Route::get('/order', [UserController::class, 'order']);
    Route::delete('/keranjang/{data}', [UserController::class, 'deleteItem']);
    Route::get('/keranjangOrder/{data}', [UserController::class, 'keranjangOrder']);
    Route::post('/order/{data}', [UserController::class, 'updateStatus']);
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/adminProducts', [AdminController::class, 'products']);
    Route::delete('/adminProduct/{data}', [AdminController::class, 'destroy']);
    Route::patch('/editProduct/{data}', [AdminController::class, 'editProduct']);
    Route::get('/adminAddProduct', [AdminController::class, 'addProduct']);
    Route::patch('/addProduct', [AdminController::class, 'doAddProduct']);
    Route::get('/adminOrders', [AdminController::class, 'orders']);
    Route::get('/adminListUser', [AdminController::class, 'listUser']);
    Route::get('/adminCarts', [AdminController::class, 'carts']);
    Route::post('/adminOrder/{data}', [AdminController::class, 'updateStatus']);
    // Route::get('/admin', [AdminController::class, 'index']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Hak Akses
// Route::group(['middleware' => 'admin'], function() {
//     Route::get('/admin', [AdminController::class, 'index']);
//     Route::get('/tambahGambar', [AdminController::class, 'tambahGambar']);
//     Route::post('/tambahGambar', [AdminController::class, 'dotambahGambar']);
//     Route::get('/adminPromo', [AdminController::class, 'promo']);
//     Route::delete('/adminPromo/{data}', [AdminController::class, 'deletepromo']);
//     Route::patch('/adminPromo/edit/{data}', [AdminController::class, 'editpromo']);
//     Route::get('/adminRekomendasi', [AdminController::class, 'rekomendasi']);
//     Route::delete('/adminRekomendasi/{data}', [AdminController::class, 'deleterekomendasi']);
//     Route::patch('/adminRekomendasi/edit/{data}', [AdminController::class, 'editrekomendasi']);
//     Route::get('/adminDiskon', [AdminController::class, 'diskon']);
//     Route::delete('/adminDiskon/{data}', [AdminController::class, 'deletediskon']);
//     Route::patch('/adminDiskon/edit/{data}', [AdminController::class, 'editdiskon']);
//     Route::get('/adminMenu', [AdminController::class, 'menu']);
//     Route::delete('/adminMenu/{data}', [AdminController::class, 'destroy']);
//     Route::patch('/adminMenu/edit/{data}', [AdminController::class, 'menuEdit']);
//     Route::get('/tambahData', [AdminController::class, 'tambahdata']);
//     Route::post('/tambahData', [AdminController::class, 'dotambah']);
// });

// Route::group(['middleware' => 'user'], function() {
//     Route::get('/keranjang', [CartsController::class, 'index']);
//     Route::post('/keranjang/checkout', [CartsController::class, 'checkout']);
//     Route::get('/keranjang/{data}', [CartsController::class, 'store']);
//     Route::delete('/keranjang/{data}', [CartsController::class, 'destroy']);
//     Route::get('/menu/{data}', [CartsController::class, 'pesanMenu']);
// });
