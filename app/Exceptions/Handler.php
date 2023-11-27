<?php

namespace App\Exceptions;

use App\Exceptions\Account\InvalidDataException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $this->renderable(function (InvalidDataException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e, )
    {
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Project not found',
            ], 404);
        }
    }
}
