<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\SellProductController;
use App\Http\Controllers\TransactionsController;

// Defining Essential Routes
Route::get('/', [DashboardController::class, 'index'])->name('admin');
Route::get('/add', [AddProductController::class, 'createPage'])->name('add-products');
Route::get('/update', [UpdateProductController::class, 'updatePage'])->name('update-products');
Route::get('/delete', [DeleteProductController::class, 'deletePage'])->name('delete-products');
Route::get('/sell', [SellProductController::class, 'sellPage'])->name('product-sell');
Route::get('/transactions', [TransactionsController::class, 'transactionPage'])->name('transactions');


// Handling POST Requests
Route::post('/add', [AddProductController::class, 'addProducts']);
Route::post('/update', [UpdateProductController::class, 'updateProduct']);
Route::post('/delete', [DeleteProductController::class, 'deleteProduct']);
Route::post('/sell', [SellProductController::class, 'sellProduct']);
Route::post('', [TransactionsController::class, 'transactionsHistory']);