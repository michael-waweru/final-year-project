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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ajax routes
Route::get('properties', [\App\Http\Controllers\Api\ApiController::class,'properties']);
Route::get('allocation-info', [\App\Http\Controllers\Api\ApiController::class,'allocationInfo']);
Route::get('payment-status', [\App\Http\Controllers\Api\ApiController::class,'paymentMonthStatus']);
Route::get('payment-info', [\App\Http\Controllers\Api\ApiController::class,'paymentInfo']);
