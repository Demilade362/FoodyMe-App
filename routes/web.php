<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

// Welcome Page Routes

Route::get('/', function (Request $request) {
    $products = Product::limit(6)->get();
    return view('welcome', compact('products'));
})->name('welcome');

Route::view('contact', 'contact');
Route::view('about', 'about');

Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::middleware('password.confirm')->group(function () {
        Route::get("profile", [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile/{user}/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
        Route::put('profile/{user}', [ProfileController::class, 'updatePass'])->name('profile.update.pass');
        Route::delete("profile/{user}", [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // Products Route
    Route::resource('products', ProductController::class)->names([
        'index' => 'home'
    ])->except(
        ['create', 'store', 'update', 'destroy', 'edit']
    );

    // Notification Routes
    Route::get("/readNotifications", function (Request $request) {
        $request->user()->unreadNotifications->markAsRead();
        return Redirect::back();
    })->name('read-notify');

    // Cart Route     
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    // Payment System Route 
    Route::post('session', [StripeController::class, 'session'])->name('session');
    Route::post('cart-session', [StripeController::class, 'cartSession'])->name('cart-session');
    Route::get('success', [StripeController::class, 'success'])->name('success');
});


Auth::routes();
