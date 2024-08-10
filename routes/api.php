<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);

    // Profile
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::get('profile-posts', [ProfileController::class, 'posts']);

    // Category
    Route::get('categories', [CategoryController::class, 'index']);

    // Post
    Route::get('post', [PostController::class, 'index']);
    Route::post('post', [PostController::class, 'create']);
    Route::get('post/{id}', [PostController::class, 'show']);

});
