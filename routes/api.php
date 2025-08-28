<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\VendorController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::get('/vendors/{id}/summary', [VendorController::class, 'getSummary']);
    Route::get('/invoices', [InvoiceController::class, 'getInvoices
    ']);
});
