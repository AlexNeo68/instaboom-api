<?php

\Illuminate\Support\Facades\Route::middleware('auth:sanctum')->group(function(){
    \Illuminate\Support\Facades\Route::apiResource('posts', \App\Http\Controllers\Api\Post\PostController::class);
});

