<?php
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/destroy/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    //Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
