<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OzonController;
use App\Http\Controllers\YandexController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/yandex', [YandexController::class, 'index']);
    Route::get('/ozon', [OzonController::class, 'index']);
});

Route::get('/', [HomeController::class, 'index']);


Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/get-yandex-data', [ApiController::class, 'getYandex'])->name('yandex.data');
    Route::get('/get-ozon-data', [ApiController::class, 'getOzon'])->name('ozon.data');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
