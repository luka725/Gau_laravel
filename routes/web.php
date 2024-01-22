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
Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/products/add-to-cart/{product}', [ProductController::class, 'addToCart'])->name('products.addToCart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCartItem'])->name('cart.updateCartItem');
Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/user/orders', [OrderController::class, 'userOrders'])->name('user.orders');