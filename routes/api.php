<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
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

Route::get('products', [ProductController::class, 'list']);
Route::get('products/{id}', [ProductController::class, 'show'])->name('show');
Route::post('products', [ProductController::class, 'create']);
Route::put('products/{id}', [ProductController::class, 'update']);

Route::get('cart', [CartController::class, 'list']);
Route::post('cart/{id}', [CartController::class, 'add']);

