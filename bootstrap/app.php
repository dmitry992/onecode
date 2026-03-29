<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // 1. Добавление в глобальный список (раньше $middleware)
        $middleware->append(\App\Http\Middleware\LogMiddleware::class);

        // 2. Настройка групп (web или api)
        $middleware->web(append: [
            \App\Http\Middleware\LogMiddleware::class,
        ]);

        // 3. Регистрация Алиасов (раньше $routeMiddleware)
        $middleware->alias([
            'log' => \App\Http\Middleware\LogMiddleware::class,
            'active' => \App\Http\Middleware\ActiveMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'token' => \App\Http\Middleware\TokenMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
