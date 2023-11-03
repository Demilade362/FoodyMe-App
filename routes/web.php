<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $products = Product::limit(6)->get();
    return view('welcome', compact('products'));
})->name('welcome');

Route::view('/payment', 'payment.index');

Route::middleware(['auth'])->group(function () {
    Route::middleware('password.confirm')->group(function () {
        Route::get("/profile", [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/{user}/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
        Route::put('/profile/{user}', [ProfileController::class, 'updatePass'])->name('profile.update.pass');
        Route::delete("/profile/{user}", [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::resource('products', ProductController::class)->names([
        'index' => 'home'
    ])->except(
        ['create', 'store', 'update', 'destroy', 'edit']
    );
    Route::resource('cart', CartController::class);
    Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
});


Auth::routes();
