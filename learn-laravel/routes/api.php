<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
Route::post('/post/like', [PostController::class, 'like']);