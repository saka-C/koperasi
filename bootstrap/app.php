<?php

use App\Http\Middleware\Access;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Access' => Access::class,
            'Excel' => Maatwebsite\Excel\Facades\Excel::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
