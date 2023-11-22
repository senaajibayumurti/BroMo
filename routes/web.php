<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

