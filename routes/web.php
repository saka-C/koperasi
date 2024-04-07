<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/category/index', function () {
    return view('category.index');
});
Route::get('/wallet/index', function () {
    return view('wallet.index');
});
Route::get('/transaction/index', function () {
    return view('transaction.index');
});
Route::get('/transaction/create', function () {
    return view('transaction.create');
});

