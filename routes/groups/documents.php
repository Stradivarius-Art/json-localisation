<?php

use App\Http\Controllers\Api\v1\DocumentController;
use Illuminate\Support\Facades\Route;

Route::controller(DocumentController::class)->middleware('auth:sanctum')->prefix('v1/documents')->group(function () {
    Route::post('/', 'add')
        ->name('documents.add')
        ->middleware('document.add.access');

    Route::get('/', 'list')
        ->name('documents.list')
        ->middleware('documents.list');
    Route::delete('/{document}', 'destroy')
        ->name('documents.destroy')
        ->middleware('documents.access');
});
