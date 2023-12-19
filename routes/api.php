<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::apiResource('invoices', InvoiceController::class);
    // Route::get('/invoices', [InvoiceController::class, 'index']);
    // Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
    // Route::post('/invoices', [InvoiceController::class, 'store']);
    // Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
    // Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/test', [TestController::class, 'index']);
        Route::get('/users/{user}', [UserController::class, 'show']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    Route::post('/login', [AuthController::class, 'login']);
});
