<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChooseUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UsersController;

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

Route::post('login', [AuthController::class, 'run']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index']);
        Route::get('/add', [UsersController::class, 'add']);
        Route::get('/edit/{id}', [UsersController::class, 'edit']);

        Route::post('/store', [UsersController::class, 'store']);
        Route::post('/delete', [UsersController::class, 'delete']);
        Route::post('/update', [UsersController::class, 'update']);
    });
    
    Route::prefix('sliders')->group(function () {
        Route::get('/', [SliderController::class, 'index']);
        Route::get('/add', [SliderController::class, 'add']);
        Route::get('/edit/{id}', [SliderController::class, 'edit']);

        Route::post('/store', [SliderController::class, 'store']);
        Route::post('/delete', [SliderController::class, 'delete']);
        Route::post('/update', [SliderController::class, 'update']);
    });

    Route::prefix('choose-us')->group(function () {
        Route::get('/', [ChooseUsController::class, 'index']);
        Route::get('/add', [ChooseUsController::class, 'add']);
        Route::get('/edit/{id}', [ChooseUsController::class, 'edit']);

        Route::post('/store', [ChooseUsController::class, 'store']);
        Route::post('/delete', [ChooseUsController::class, 'delete']);
        Route::post('/update', [ChooseUsController::class, 'update']);
    });
});

