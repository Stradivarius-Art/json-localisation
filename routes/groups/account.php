<?php

use App\Http\Controllers\Api\v1\AccountController;
use Illuminate\Support\Facades\Route;

Route::controller(AccountController::class)->prefix('v1/account')->group(function () {
    Route::post('create', 'create');
    // Route::post('sign-in', 'signIn');
    // Route::get('', 'account');
});
