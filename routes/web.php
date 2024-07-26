<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilesController;



Auth::routes();

Route::post('/follow/{user}', [FollowController::class, 'store']);

Route::get('/', [PostsController::class, 'index']);
Route::post('/p/', [PostsController::class, 'store']);
Route::get('/p/create/', [PostsController::class, 'create']);
Route::get('/p/{post}', [PostsController::class, 'show']);


Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');