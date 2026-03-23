<?php

use App\Http\Controllers\Posts\CommentController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/user.php';
require __DIR__.'/admin.php';


//Route::get('register', [RegisterController::class, 'index'])->name('register');
//Route::post('register', [RegisterController::class, 'store'])->name('register.store');
//
//Route::get('login', [LoginController::class, 'index'])->name('login');
//Route::post('login', [RegisterController::class, 'store'])->name('login.store');
//
//Route::get('blog', [BlogController::class, 'index'])->name('blog');
//Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');
//Route::post('blog/{post}/like', [BlogController::class, 'like'])->name('blog.like');

Route::resource('posts/{post}/comments', CommentController::class)->only([
    'index', 'show'
]);


Route::view('/', 'welcome')->name('home');

Route::get('/test', TestController::class)->name('test');

Route::redirect('/home', '/')->name('home.redirect');;

Route::fallback(function () {
    return 'Нет страницы';
});
