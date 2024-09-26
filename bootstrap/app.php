<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Faculty;
use App\Http\Middleware\Scholar;
use App\Http\Middleware\Staff;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'admin' =>  Admin::class,
            'staff' =>  Staff::class,
            'faculty' =>  Faculty::class,
            'scholar' =>  Scholar::class,
        ]);
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
