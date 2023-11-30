<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sign-in', function () {
    return view('auth.signin');
});
Route::get('/log-in', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

Route::get('/notifikasi', function () {
    return view('layouts.notifikasi');
});
Route::get('/notifikasi/detail', function () {
    return view('layouts.notifikasidetail');
});
Route::get('/profile', function () {
    return view('auth.profile');
});

Route::get('/input-data', function () {
    return view('farmer.inputdata');
});
Route::get('/input-panen', function () {
    return view('farmer.inputpanen');
});

Route::get('/forecasting', function () {
    return view('owner.forecasting');
});
Route::get('/forecasting/klasifikasi', function () {
    return view('owner.klasifikasi');
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
Route::get('/pekerja/edit-pekerja', function () {
    return view('owner.edit-pekerja');
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

