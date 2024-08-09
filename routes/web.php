<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';

// 
// routes/web.php
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru-dashboard', function () {
        return view('guru.dashboard');
    });
});

Route::middleware(['auth', 'role:murid'])->group(function () {
    Route::get('/murid-dashboard', function () {
        return view('murid.dashboard');
    });
});