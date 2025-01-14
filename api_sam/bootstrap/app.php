<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api:  __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (Throwable $e, Request $request) {
            
            report($e);

            if ($e instanceof ValidationException) {
                return response()->json(['errors' => $e->errors()], 400);
            } else if ($e instanceof AuthorizationException) {
                return response()->json(['message' => 'Você não tem permissão para acessar este recurso.'], 403);
            } else if ($e instanceof NotFoundHttpException) {
                return response()->json(['message' => 'Recurso não encontrado.'], 404);
            } else {
                return response()->json(['message' => 'Erro interno: '.$e->getMessage()], 500);
            }
        });
        
    })->create();
