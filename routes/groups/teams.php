<?php

use App\Http\Controllers\Api\v1\TeamController;
use Illuminate\Support\Facades\Route;

Route::controller(TeamController::class)->prefix('v1/team')->group(function () {
    Route::post('/assign-performer', 'performCreate')->name('assign-performer')->middleware('auth:sanctum');
    Route::get('/projects', 'performShow')->name('assign-performer-show')->middleware('auth:sanctum');
});
