<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'index'])->name('post');
Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('post/{post}/like', [PostController::class, 'like'])->name('post.like');
