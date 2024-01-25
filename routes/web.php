<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/user/orders', [OrderController::class, 'userOrders'])->name('user.orders');

Route::group(['prefix' => '/register'], function () {
    Route::get('/', [RegistrationController::class, 'showRegistrationForm'])->name('register');
    Route::post('/', [RegistrationController::class, 'register']);
});

Route::group(['prefix' => '/login'], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::group(['prefix' => '/products'], function () {
    Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/add-to-cart/{product}', [ProductController::class, 'addToCart'])->name('products.addToCart');
});

Route::group(['prefix' => '/cart'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/update', [CartController::class, 'updateCartItem'])->name('cart.updateCartItem');
    Route::delete('/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
});

Route::group(['prefix' => '/checkout'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');
});