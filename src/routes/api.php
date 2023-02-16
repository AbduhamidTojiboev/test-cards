<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileCardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('api')->prefix('/v1')->group(function () {
    //Auth
    Route::controller(AuthController::class)->prefix('/auth')->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
        Route::post('/refresh', 'refresh')->name('refresh');
        Route::get('/me', 'me')->name('me');
    });

    Route::middleware('jwt.auth')->group(function () {
        Route::controller(FileCardController::class)->prefix('/file-card')->group(function () {
            Route::post('/upload', 'upload')->name('fileCard.upload');
            Route::post('/import', 'import')->name('fileCard.import');
        });
    });

    Route::controller(FileCardController::class)->prefix('/file-card')->group(function () {
        Route::post('/import', 'import')->name('fileCard.import');
    });


});
