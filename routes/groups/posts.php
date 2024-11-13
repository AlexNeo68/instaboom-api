<?php

use App\Http\Controllers\Api\Post\PostController;

\Illuminate\Support\Facades\Route::middleware('auth:sanctum')->group(function(){
    \Illuminate\Support\Facades\Route::apiResource('posts', PostController::class);
});

\Illuminate\Support\Facades\Route::controller(PostController::class)
    ->prefix('posts')
    ->middleware('auth:sanctum')
    ->as('posts.')
    ->group(function(){
        Route::post('{post}/like', 'like')->name('like');
    });
