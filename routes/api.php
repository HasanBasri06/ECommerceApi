<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->group(function() {
        Route::controller(LoginController::class)
        ->group(function () {
            Route::post('login', 'store');
        });
    
        Route::get('/users', fn() => User::all());
        
        Route::get('/categories', [CategoryController::class, 'getCategories']);
    });



