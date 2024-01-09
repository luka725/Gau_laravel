<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\CreateRecipeRequest;
use App\Classes\Product;
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

Route::get("/user-update", function(UserUpdateRequest $request){
    return [
        "array" => $request->validated()
    ];
});
Route::get("/ingredients", function(CreateRecipeRequest $request){
    return [
        "array" => $request->validated()
    ];
});
Route::get("/product", function(){
        $product = new Product();
});