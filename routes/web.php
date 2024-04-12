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
    Route::get('/show/{category}', 'show');
    Route::post('/update/{category}', 'update');
    Route::get('/destroy/{category}', 'destroy');
});

// Route Wallet
Route::controller(WalletController::class)->prefix('wallet')->group(function (){
    Route::get('/index', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{wallet}', 'show');
    Route::post('/update/{wallet}', 'update');
    Route::get('/destroy/{wallet}', 'destroy');
});

//Route Transaction
Route::controller(TransactionController::class)->prefix('transaction')->group(function (){
    Route::get('/index', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/show/{transaction}', 'show');
    Route::post('/update/{transaction}', 'update');
    Route::get('/destroy/{transaction}','destroy');
});
