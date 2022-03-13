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

Route::group(
    [
        'prefix' => 'products',
        'as' => 'products.'
    ],
    function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::get('{id}', [ProductController::class, 'show'])->name('show');
        Route::post('/', [ProductController::class, 'create'])->name('create');
        Route::put('{id}', [ProductController::class, 'update'])->name('update');
    }
);

Route::group(
    [
        'prefix' => 'cart',
        'as' => 'cart.'
    ],
    function () {
        Route::get('/', [CartController::class, 'list'])->name('list');
        Route::post('{id}', [CartController::class, 'add'])->name('add');
    }
);
