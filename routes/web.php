<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
});

// Route Category
Route::controller(CategoryController::class)->prefix('category')->group(function (){
    Route::get('/index', 'index');
    Route::post('/store', 'store');
});

// Route Wallet
Route::controller(WalletController::class)->prefix('wallet')->group(function (){
    Route::get('/index', 'index');
    Route::post('/store', 'store');
});

//Route Transaction
Route::controller(TransactionController::class)->prefix('transaction')->group(function (){
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});

// Route::get('/transaction/index', function () {
//     return view('transaction.index');
// });
// Route::get('/transaction/create', function () {
//     return view('transaction.create');
// });

