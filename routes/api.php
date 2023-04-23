<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\OrganizationController;


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/user', function () {
        return request()->user();
    })->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('school')->group(function () {
        Route::get('/', [SchoolController::class, 'index']);
        Route::get('/{school}', [SchoolController::class, 'show']);
        Route::put('/{school}', [SchoolController::class, 'update']);
        Route::post('/', [SchoolController::class, 'store'])->middleware('admin');
        Route::delete('/{school}', [SchoolController::class, 'destroy'])->middleware('admin');
    });

    Route::prefix('organization')->group(function () {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{organization}', [OrganizationController::class, 'show']);
        Route::put('/{organization}', [OrganizationController::class, 'update']);
        Route::post('/', [OrganizationController::class, 'store'])->middleware('admin');
        Route::delete('/{organization}', [OrganizationController::class, 'destroy'])->middleware('admin');
    });
});
