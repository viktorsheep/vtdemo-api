<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // Auth | Guest
    Route::middleware('guest')->prefix('auth')->controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
    }); // e.o Auth | Guest

    // Sanctum
    Route::middleware('auth:sanctum')->group(function () {
        // Auth
        Route::prefix('auth')->controller(AuthController::class)->group(function () {
            Route::post('logout', 'logout');
        }); // e.o Auth

        // Users
        Route::prefix('users')->controller(UserController::class)->group(function () {
            Route::get('me', function (Request $request) {
                return auth()->user();
            });
        }); // e.o Users

        // Contacts
        Route::prefix('contacts')->controller(ContactController::class)->group(function () {
            Route::get('all', 'all');
            Route::get('/browse', 'browse');
            Route::post('/add', 'add');

            Route::prefix('{id}')->group(function () {
                Route::put('/edit', 'edit');
                Route::get('/view', 'view');
                Route::delete('/delete', 'delete');
            });
        }); // e.o Contacts

    }); // e.o Sanctum
}); // e.o v1
