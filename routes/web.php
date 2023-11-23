<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
Route::get('/forecasting', function () {
    return view('owner.forecasting');
});
Route::get('/rekap-data', function () {
    return view('owner.rekap-data');
});
Route::get('/panen', function () {
    return view('owner.panen');
});
Route::get('/pekerja', function () {
    return view('owner.pekerja');
});
Route::get('/kandang', function () {
    return view('owner.kandang');
});
Route::get('/kandang/tambah-kandang', function () {
    return view('owner.input-kandang');
});
Route::get('/kandang/edit-kandang', function () {
    return view('owner.edit-kandang');
});

