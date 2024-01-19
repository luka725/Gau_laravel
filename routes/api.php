<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/products'], function () {
    Route::get('/{categoryId}', [ProductController::class, 'getByCategory']);
    Route::get('/', [ProductController::class, 'getAllProduct']);
});
//Route::get('product/images/{productId}', [ProductController::class, 'getImagesById']);

Route::group(['prefix' => '/add'], function(){
    Route::post('/product', [ProductController::class, 'store']);
    Route::post('/category', [CategoryController::class, 'store']);
});