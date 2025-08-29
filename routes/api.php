<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('admin/blogs', [BlogController::class, "all"]);
    Route::post('admin/blog/publish/{id}', [BlogController::class, "publish"]);
    Route::get('admin/blog/edit/{id}', [BlogController::class, "edit"]);
    Route::patch('admin/blog/update/{id}', [BlogController::class, "update"]);
    Route::delete('admin/blog/delete/{id}', [BlogController::class, "delete"]);
    
    Route::get('blogs', [BlogController::class, "index"]);
    Route::get('blog/{id}', [BlogController::class, "readBlog"]);
    Route::post('blog/store', [BlogController::class, "store"]);
});