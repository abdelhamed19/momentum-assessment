<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Blog\BlogController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
});

// Blog routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('posts', [BlogController::class, 'index']);
    Route::get('posts/{postId}', [BlogController::class, 'show']);
    Route::post('posts', [BlogController::class, 'store']);
    Route::put('posts/{postId}', [BlogController::class, 'update']);
    Route::delete('posts/{postId}', [BlogController::class, 'destroy']);
});
