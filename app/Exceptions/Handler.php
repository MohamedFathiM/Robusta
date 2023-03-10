<?php

namespace App\Exceptions;

use App\Support\Traits\ApiResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, $exception)
    {
        if ($request->expectsJson()) {
            return match (true) {
                $exception instanceof PostTooLargeException =>  $this->apiResource(code: 400, status: false, message: $exception->getMessage()),
                $exception instanceof AuthenticationException =>  $this->apiResource(code: 401, status: false, message: $exception->getMessage()),
                $exception instanceof ThrottleRequestsException =>  $this->apiResource(code: 429, status: false, message: $exception->getMessage()),
                $exception instanceof ModelNotFoundException ||
                    $exception instanceof NotFoundHttpException  =>  $this->apiResource(code: 404, status: false, message: $exception->getMessage()),
                $exception instanceof ValidationException =>  $this->invalidJson($request, $exception),
                default => $this->apiResource(code: 500, status: false, message: $exception->getMessage() . " in " . $exception->getFile() . " at line " . $exception->getLine())
            };
        }

        return parent::render($request, $exception);
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return $this->errorResponse(data: $exception->validator?->errors()?->toArray(), code: $exception->status, message: $exception->validator?->messages()->first());
    }
}
