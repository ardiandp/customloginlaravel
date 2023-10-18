<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\PegawaiController;
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

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(PegawaiController::class)->group(function() {
    Route::get('/pegawai/register', 'register')->name('pegawai/register');
    Route::post('/pegawai/store', 'store')->name('pegawai/store');
    Route::get('/pegawai/login', 'login')->name('pegawai/login');
    Route::post('/pegawai/authenticate', 'authenticate')->name('pegawai/authenticate');
    Route::get('/pegawai/dashboard', 'dashboard')->name('pegawai/dashboard');
    Route::post('/pegawai/logout', 'logout')->name('pegawai/logout');
});

