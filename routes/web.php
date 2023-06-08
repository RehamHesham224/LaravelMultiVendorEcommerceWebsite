<?php
//declare(strict_types=1);
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Route::redirect('/', 'home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


require_once base_path('/routes/cart.php');

Route::get('/products/search',[ProductController::class,'search'])->name('products.search');
Route::resource('products',ProductController::class);


Route::resource('orders',OrderController::class)->middleware('auth');

Route::resource('shops',ShopController::class)->middleware('auth');

Route::get('paypal/checkout/{order}',[PayPalController::class,'getExpressCheckout'])->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}',[PayPalController::class,'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('paypal/checkout-cancel',[PayPalController::class,'cancel'])->name('paypal.cancel');


Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.'], function () {

    Route::redirect('/','seller/orders');

    Route::resource('/orders',  \App\Http\Controllers\Seller\OrderController::class);

    Route::get('/orders/delivered/{suborder}',  [\App\Http\Controllers\Seller\OrderController::class, 'markAsDelivered'])->name('order.delivered');
});
