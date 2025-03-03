<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)
    ->group(function () {
        Route::post('login', 'store');
    });

Route::get('/users', fn() => User::all());