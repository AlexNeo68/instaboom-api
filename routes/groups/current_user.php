<?php

use App\Http\Controllers\Api\User\CurrentController;

Route::group(['prefix' => 'user', 'as'=>'user.'], function () {
    Route::post('/register', \App\Http\Controllers\Api\User\RegisterController::class)
        ->name('register');

    Route::post('/login', \App\Http\Controllers\Api\User\LoginController::class)
        ->name('login');


    Route::controller(CurrentController::class)
        ->middleware('auth:sanctum')
        ->group(function(){
        Route::get('/', 'me')->name('me');
        Route::post('avatar', 'avatar')->name('avatar');
    });
});
