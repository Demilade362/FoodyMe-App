<?php

use App\Http\Controllers\admin\{
    CustomerController,
    OrderController,
    ProductController
};
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get("/home", function () {
        $customers = User::where('role', null)->limit(4)->get();
        return view("admin.index", compact('customers'));
    })->name('dashboard');

    Route::get('suspended', [CustomerController::class, 'trashed'])->name('customers.suspend');
    Route::post('suspended/{id}', [CustomerController::class, 'restore'])->name('customers.restore')->withTrashed();
    Route::resource('customers', CustomerController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);
});
