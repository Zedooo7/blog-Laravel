<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

//CRUD
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


//admin login
Route::get('admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

//AdminMiddleware Pages
Route::middleware(['auth',AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
        Route::post('/posts/{id}/approve', [AdminController::class, 'approvePost'])->name('posts.approve');
        Route::post('/posts/{id}/reject', [AdminController::class, 'rejectPost'])->name('posts.reject');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');

        // logout
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
