<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/orders', [OrderController::class, 'index'])->name('orders'); //orders.index
Route::post('/orders/store', [OrderController::class, 'store'])->name('orderStore'); //orders.index

Route::resource('/suppliers', 'SupplierController'); //suppliers.index


//จัดการสมาชิก crud
Route::get('/users', [UserController::class, 'index'])->name('users'); //users.index
Route::post('/users/store', [UserController::class, 'store'])->name('store'); //users.index
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('update');
Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

//จัดการสินค้า crud
Route::get('/products', [ProductController::class, 'index'])->name('products'); //products.index
Route::post('/products/store', [ProductController::class, 'store'])->name('productAdd');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('ProductUpdate');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('ProductDestroy');



Route::resource('/companies', 'CompanyController'); //companies.index
Route::resource('/transactions', 'TransactionController');//transactions.index
