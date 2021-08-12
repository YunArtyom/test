<?php

use App\Http\Controllers\AdminPanel\Hashtags\HashtagController;
use App\Http\Controllers\AdminPanel\Blog\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'blog'], function (){
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'all']);
        Route::get('/and-hashtags', [PostController::class, 'allWithRelations']);
        Route::post('create', [PostController::class, 'create']);

        Route::group(['prefix' => 'use-filter'], function (){
            Route::get('/', [PostController::class, 'allWithFilters']);
        });
    });

    Route::group(['prefix' => 'hashtags'], function () {
        Route::get('/', [HashtagController::class, 'all']);
        Route::get('/and-posts', [HashtagController::class, 'allWithRelations']);
        Route::post('create', [HashtagController::class, 'create']);
    });
});
