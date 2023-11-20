<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserPost;

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login',[UserPost::class,'index'])->name('login');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::get('/logout',[LogoutController::class,'store'])->name('logout');
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::post('/posts',[PostController::class,'store'])->name('posts');
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');




require __DIR__.'/auth.php';
