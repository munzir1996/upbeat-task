<?php

use App\Http\Controllers\API\Auth\UserAuthController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\OrderController;
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


Route::prefix('/user')->group(function () {
    Route::post('register', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('login', [UserAuthController::class, 'login'])->name('user.login');

});

//phone
Route::prefix('/user')->middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [UserAuthController::class, 'logout'])->name('user.logout');
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('/checkouts', CheckoutController::class);

});
