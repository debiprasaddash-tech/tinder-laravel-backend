<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RecommendationController;

Route::get('/people', [PersonController::class, 'index']);

Route::get('/recommendations', [UserController::class, 'recommendations']);
Route::get('/liked', [LikeController::class, 'likedList']);
Route::post('/like', [LikeController::class, 'like']);
Route::post('/dislike', [LikeController::class, 'dislike']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/recommendations', [RecommendationController::class, 'index']);