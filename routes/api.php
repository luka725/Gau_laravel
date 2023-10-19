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

Route::get('/{a}', function (Request $req) {
    return $req->get('a');
});

Route::group(['prefix' => '/math'], function (){
    //Route::get('/is-prime/{number}', [MathController::class, 'isPrime']);
    Route::get('/isworking', function () {
        return "This Working";
    });
    Route::get('/is-working/{d}', function (int $d) {
        return ['d' => $d];
    });
});