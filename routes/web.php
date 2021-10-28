<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/categories', [CategoryController::class, 'index']);
Route::get('/posts/{posts:id}', [PostsController::class, 'show']);
Route::get('/posts/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/posts/{user:id}', [UserController::class, 'show']);
Route::get('/users/posts', function() {return redirect('/users');});

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
      'tittle' => 'Dashboard'
    ]);
})->middleware('auth');

Route::get('/dashboard/posts', [DashboardPostController::class, 'index'])->middleware('auth');
Route::get('/dashboard/posts/{posts:id}', [DashboardPostController::class, 'show'])->middleware('auth');

// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


