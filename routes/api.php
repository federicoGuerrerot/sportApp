<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('users', UserController::class);

Route::post('login', [UserController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('logout', [UserController::class, 'logout']);
    Route::apiResource('places', PlaceController::class);
    Route::get('users/{user_id}/favorites', [FavoriteController::class, 'index']);
    Route::post('users/{user_id}/favorites/{place_id}', [FavoriteController::class, 'store']);
    Route::delete('users/{user_id}/favorites/{place_id}', [FavoriteController::class, 'destroy']);
 });