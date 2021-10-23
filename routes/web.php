<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/categories', [CategoryController::class, 'index']);
Route::get('/posts/{posts:id}', [PostsController::class, 'show']);
Route::get('/posts/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/posts/{user:id}', [UserController::class, 'show']);
Route::get('/users/posts', function() {return redirect('/users');});

