<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->group(function () {
    Route::get('blog/index', [BlogController::class, "index"]);
    Route::get('blog/store', [BlogController::class, "store"]);
    Route::get('blog/edit', [BlogController::class, "edit"]);
    Route::get('blog/update', [BlogController::class, "update"]);
    Route::get('blog/delete', [BlogController::class, "delete"]);
});