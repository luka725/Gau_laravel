<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Controllers\ProfilePictureController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/registration', [UserRegistrationController::class, 'register']);

Route::get('/contact', [ContactFormController::class, 'contact']);

Route::get('/review', [ProductReviewController::class, 'review']);

Route::get('/event-registration', [EventRegistrationController::class, 'register']);

Route::post('/picture-upload' , [ProfilePictureController::class, 'add_picture'])->name('file.upload');
