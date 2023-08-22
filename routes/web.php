<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChooseusController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
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
    return view('login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('slider')->name('slider')
    ->controller(SliderController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::get('/edit/{id}', 'edit');
        Route::post('/_store', 'store');
        Route::post('/_update', 'update');
        Route::post('/_delete', 'delete');
    });

    Route::prefix('chooseus')->name('chooseus')
    ->controller(ChooseusController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::get('/edit/{id}', 'edit');
        Route::post('/_store', 'store');
        Route::post('/_update', 'update');
        Route::post('/_delete', 'delete');
    });

    Route::prefix('configuration')->name('configuration')
    ->controller(ConfigurationController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/_update', 'update');
    });
});