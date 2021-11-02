<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', \App\Http\Controllers\UserController::class);
Route::apiResource('addresses', \App\Http\Controllers\AddressController::class);
Route::apiResource('orders', \App\Http\Controllers\OrderController::class);
Route::apiResource('payments', \App\Http\Controllers\PaymentController::class);
Route::apiResource('shipments', \App\Http\Controllers\ShipmentController::class);
Route::apiResource('promotions', \App\Http\Controllers\PromotionController::class);
Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::post('upload-image', [\App\Http\Controllers\ImageController::class, 'store']);
Route::post('cal-overall', [\App\Http\Controllers\OrderController::class, 'calOverall']);