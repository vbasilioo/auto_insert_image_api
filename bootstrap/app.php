<?php

use App\Builder\ReturnApi;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api/index.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e) {
            return ReturnApi::error('Rota não encontrada.', $e->getMessage());
        });
        $exceptions->renderable(function (ValidationException $e, $request) {
            return ReturnApi::error($e->validator->errors()->first(), $e->validator->errors()->toArray());
        });
        $exceptions->renderable(function (MethodNotAllowedException $e) {
            return ReturnApi::error('Método não permitido.' . $e->getMessage());
        });
        $exceptions->renderable(function (BadMethodCallException $e) {
            return ReturnApi::error('Método não permitido.' . $e->getMessage());
        });
        $exceptions->renderable(function (AccessDeniedHttpException $e) {
            return ReturnApi::error('Acesso negado.', $e->getMessage(), $e->getStatusCode());
        });
        $exceptions->render(function (Throwable $e) {
            return ReturnApi::error('Erro inesperado na API.', $e->getMessage());
        });
    })->create();
