<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerInvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
Route::middleware('auth')->group(function () {
   Route::prefix('admin')->middleware('auth')->group(function () {
    // Customer and Invoice Routes with Dynamic {type}
    Route::get('/{type}/index', [CustomerInvoiceController::class, 'index'])
    ->name('index');
    Route::get('/{type}/create', [CustomerInvoiceController::class, 'create'])
    ->name('create');
    Route::post('/{type}/store', [CustomerInvoiceController::class, 'store'])
    ->name('store');
    // Edit Routes for Customer 
    Route::get('/customer/{id}/edit', [CustomerInvoiceController::class, 'editCustomer'])
    ->name('customer.edit');
    Route::put('/customer/{id}/update', [CustomerInvoiceController::class, 'updateCustomer'])
    ->name('update');
    // Edit Routes for Invoice
    Route::get('/invoice/{id}/edit', [CustomerInvoiceController::class, 'editInvoice'])
    ->name('invoice.edit');
    Route::put('/invoice/{id}/update', [CustomerInvoiceController::class, 'updateInvoice'])
    ->name('invoice.update');
    });

});
