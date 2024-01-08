<?php

use App\Http\Controllers\MathController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::group(['prefix' => '/math'], function (){
    Route::get("/is-prime", [MathController::class, 'is_prime']);
    Route::get("/is-palindrome", [MathController::class, "is_palindrome"]);
});