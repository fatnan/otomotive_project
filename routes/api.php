<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::group([
    // 'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::middleware(['auth.api'])->group(function () {
    // Vehicle Routes
    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::put('/vehicles/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy']);

    // Motorcycle Routes
    Route::get('/motorcycles', [MotorcycleController::class, 'index']);
    Route::get('/motorcycles/{id}', [MotorcycleController::class, 'show']);
    Route::post('/motorcycles', [MotorcycleController::class, 'store']);
    Route::put('/motorcycles/{id}', [MotorcycleController::class, 'update']);
    Route::delete('/motorcycles/{id}', [MotorcycleController::class, 'destroy']);

    // Car Routes
    Route::get('/cars', [CarController::class, 'index']);
    Route::get('/cars/{id}', [CarController::class, 'show']);
    Route::post('/cars', [CarController::class, 'store']);
    Route::put('/cars/{id}', [CarController::class, 'update']);
    Route::delete('/cars/{id}', [CarController::class, 'destroy']);
});
