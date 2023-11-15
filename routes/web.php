<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\InferensiController;

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

Auth::routes();


Route::middleware('auth')->group( function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('user')->controller(UserController::class)->group(function () {
       Route::get('/', 'index');
       Route::get('/data', 'data');
       Route::post('/', 'store');
       Route::get('/{user}', 'edit');
       Route::post('update/{user}', 'update');
       Route::delete('/{user}', 'destroy');
    });

    Route::prefix('variable')->controller(VariableController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/data', 'data');
        Route::post('/', 'store');
        Route::get('/{variable}', 'edit');
        Route::post('update/{variable}', 'update');
        Route::delete('/{variable}', 'destroy');
    });


    Route::prefix('dataset')->controller(DatasetController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/data', 'data');
        Route::get('/user-data', 'userData');
        Route::post('/', 'store');
        Route::get('/{dataset}', 'edit');
        Route::post('update/{dataset}', 'update');
        Route::delete('/{dataset}', 'destroy');
    });

    Route::prefix('inferensi')->controller(InferensiController::class)->group(function () {
       Route::post('/{dataset}', 'calcInferensi');
    });
});
