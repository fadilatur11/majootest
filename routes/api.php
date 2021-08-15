<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

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

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
    });

    Route::prefix('store')->group(function () {
        Route::get('/', [StoreController::class, 'index']);
        Route::post('create', [StoreController::class, 'create']);
        Route::put('update', [StoreController::class, 'update']);
        Route::delete('delete/{id}', [StoreController::class, 'delete']);
    });

    Route::prefix('{toko}/product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::post('create', [ProductController::class, 'create']);
        Route::put('update', [ProductController::class, 'update']);
        Route::delete('delete/{id}', [ProductController::class, 'delete']);
    });
});
