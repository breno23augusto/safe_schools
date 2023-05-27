<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\OrganizationController;


Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/user', function () {
        return request()->user();
    })->middleware('auth:sanctum');

    Route::post('registration', [AuthController::class, 'create']);

    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('schools')->group(function () {
        Route::get('/', [SchoolController::class, 'index']);
        Route::get('/{school}', [SchoolController::class, 'show']);
        Route::put('/{school}', [SchoolController::class, 'update'])->middleware('admin');
        Route::post('/', [SchoolController::class, 'store'])->middleware('admin');
        Route::delete('/{school}', [SchoolController::class, 'destroy'])->middleware('admin');
    });

    Route::prefix('organizations')->group(function () {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{organization}', [OrganizationController::class, 'show']);
        Route::put('/{organization}', [OrganizationController::class, 'update'])->middleware('admin');
        Route::post('/', [OrganizationController::class, 'store'])->middleware('admin');
        Route::delete('/{organization}', [OrganizationController::class, 'destroy'])->middleware('admin');
    });

    Route::prefix('complaints')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->middleware('admin');
        Route::get('/{complaint}', [ComplaintController::class, 'show']);
        Route::put('/{complaint}', [ComplaintController::class, 'update'])->middleware('admin');
        Route::post('/', [ComplaintController::class, 'store']);
        Route::delete('/{complaint}', [ComplaintController::class, 'destroy'])->middleware('admin');
    });
});
