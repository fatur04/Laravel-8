<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;




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


Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('/log', [AbsenController::class, 'log']);
Route::get('/absenmasuk', [AbsenController::class, 'index'])->name('masuk');
Route::post('/absenmasuk/simpan/', [AbsenController::class, 'insert']);

Route::get('/absenkeluar', [AbsenController::class, 'keluar']);
Route::get('/absenkeluar/search', [AbsenController::class, 'search']);
Route::get('/absenkeluar/simpan/{id}', [AbsenController::class, 'update']);
Route::get('/absenkeluar/detail/{id}', [AbsenController::class, 'lihat']);



Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
