<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\WorkControler;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::post('/user/register', [AuthController::class, 'register']);
        Route::post('/user/login', [AuthController::class, 'login']);
        Route::post('/user/logout', [AuthController::class, 'logout']);
    });

    // works

    Route::prefix('works')->middleware('auth:api')->group(function () {
        Route::get('/list', [WorkControler::class, 'getList']);
        Route::post('/create', [WorkControler::class, 'create']);
    });
});
