<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Database\QueryException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => true,
                'message' => 'Recurso no encontrado'
            ], 404);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => true,
                'message' => 'Ruta no encontrada'
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => $exception->errors(),
                'message' => 'Hay un error en los datos',
            ], 422);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'error' => true,
                'message' => 'No está autenticado'
            ], 401);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'error' => true,
                'message' => 'No está autorizado para ejecutar esta acción'
            ], 403);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => true,
                'message' => 'Método no permitido'
            ], 405);
        }

        if ($exception instanceof HttpException) {
            return response()->json([
                'error' => true,
                'message' => 'api.errors.'.$exception->getMessage()
            ], $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'error' => true,
                'message' => 'Error en query'
            ], 409);

        }

        if ($exception instanceof TokenMismatchException) {
            return redirect()->back()->withInput($request->input());
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

    }
}
