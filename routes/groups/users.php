<?php

use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->prefix('v1/users')->group(function () {
    Route::get('/freelancers', 'receive')->name('receive_user');
});
