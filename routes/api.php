<?php

use App\Http\Controllers\ApiAddressController;
use App\Http\Controllers\ApiCustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customer', [ApiCustomerController::class, 'index']);
Route::get('customer/{id}', [ApiCustomerController::class, 'show']);
Route::post('customer', [ApiCustomerController::class, 'store']);
Route::patch('customer/{id}', [ApiCustomerController::class, 'update']);
Route::delete('customer/{id}', [ApiCustomerController::class, 'destroy']);


Route::post('address', [ApiAddressController::class, 'store']);
Route::patch('address/{id}', [ApiAddressController::class, 'update']);
Route::delete('address/{id}', [ApiAddressController::class, 'destroy']);