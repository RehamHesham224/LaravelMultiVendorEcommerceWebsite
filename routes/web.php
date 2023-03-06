<?php
//declare(strict_types=1);
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
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

Route::resource('orders',OrderController::class)->middleware('auth');


Route::get('paypal/checkout',[PayPalController::class,'getExpressCheckout'])->name('paypal.checkout');
Route::get('paypal/checkout-success',[PayPalController::class,'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('paypal/checkout-cancel',[PayPalController::class,'cancel'])->name('paypal.cancel');
