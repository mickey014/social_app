<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/p/', [PostsController::class, 'store']);

Route::get('/p/create/', [PostsController::class, 'create']);
Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('home');