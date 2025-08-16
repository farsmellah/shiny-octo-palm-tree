<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware)
    {
        $middleware->api(prepend: [
            HandleCors::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions)
    {
        $exceptions->render(function (\Illuminate\Validation\ValidationException $e,)
        {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors'  => $e->errors(),
            ], 422);
        });

        $exceptions->render(function (NotFoundHttpException $e, Request $request)
        {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        });
    })->create();
