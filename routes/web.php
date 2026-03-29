<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\LogMiddleware;
use Illuminate\Support\Facades\Route;

require __DIR__.'/user.php';
require __DIR__.'/admin.php';

Route::middleware('guest')->group(function (){
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [RegisterController::class, 'store'])->name('login.store')->middleware('guest');
});

//
//Route::get('blog', [BlogController::class, 'index'])->name('blog');
//Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
//Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class)->only([
    'index', 'show'
]);


Route::view('/', 'welcome')->name('home');

Route::get('/test', TestController::class)->name('test')->middleware('token:secret');

Route::redirect('/home', '/')->name('home.redirect');;

Route::fallback(function () {
    return 'Нет страницы';
});
