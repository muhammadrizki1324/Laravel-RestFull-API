<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'profile'])->name('profile');
    Route::patch('/profiles', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/profiles/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

//Authentication
Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::delete('/logout', LogoutController::class)->name('logout')->middleware('auth:sanctum');
