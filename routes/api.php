<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApodController;
use App\Http\Controllers\Api\RoverController;
use App\Http\Controllers\Api\UsersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApodController::class)->group(function() {
    Route::get('/apod/{date}', 'show');
});

Route::controller(RoverController::class)->group(function () {
    Route::get('/rover/{date}', 'show');
});

Route::controller(UsersController::class)->group(function () {
    Route::post('/users/import', 'import');
});
