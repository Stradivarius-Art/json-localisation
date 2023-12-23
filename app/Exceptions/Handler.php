<?php

namespace App\Exceptions;

// use App\Exceptions\Account\InvalidDataException;
// use App\Exceptions\Account\NoAccessToOperationException;
use App\Exceptions\Account\InvalidCredentialsException;
use App\Exceptions\Account\NoAccessToOperationException;
use App\Exceptions\Project\InvalidLanguageException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
        $this->renderable(function (InvalidCredentialsException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exception.{$e->getMessage()}"),
            ], 401);
        });

        $this->renderable(function (NoAccessToOperationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exception.{$e->getMessage()}"),
            ], 403);
        });

        $this->renderable(function (InvalidLanguageException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => __("exception.{$e->getMessage()}"),
            ], 400);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }

}