<?php

use App\Http\Controllers\Api\v1\ProjectController;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/projects', ProjectController::class)
    ->middleware('auth:sanctum');
