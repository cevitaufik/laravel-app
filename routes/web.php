<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/categories', [CategoryController::class, 'index']);
Route::get('/posts/{posts:slug}', [PostsController::class, 'show']);
Route::get('/posts/categories/{category:slug}', [CategoryController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user:username}/posts', [UserController::class, 'show']);
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
Route::get('/dashboard/posts/create', [DashboardPostController::class, 'createForm'])->middleware('auth');
Route::post('/dashboard/posts/create', [DashboardPostController::class, 'create'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/posts/{posts:slug}', [DashboardPostController::class, 'show'])->middleware('auth');
Route::delete('/dashboard/posts/{posts:slug}', [DashboardPostController::class, 'destroy'])->middleware('auth');
Route::get('/dashboard/posts/{posts:slug}/edit', [DashboardPostController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/posts/{posts:slug}/edit', [DashboardPostController::class, 'update'])->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('IsAdmin');
