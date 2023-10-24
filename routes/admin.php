<?php

use App\Http\Controllers\admin\CustomerController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;




// Route::view('/home', 'admin.index')->name('dashboard');
Route::resource('customers', CustomerController::class);
Route::view('/products', 'admin.Products.index')->name('products');
Route::view('/orders', 'admin.Orders.index')->name('orders');

Route::get("/home", function () {
    Gate::authorize('is-admin');
    return view("admin.index");
})->name('dashboard');
