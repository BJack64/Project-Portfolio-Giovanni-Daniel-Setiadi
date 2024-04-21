<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\eduController;
use App\Http\Controllers\expController;
use App\Http\Controllers\authController;
use App\Http\Controllers\pageController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\frontController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\settingsController;

Route::get('/', [frontController::class, "index"]);

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);

Route::prefix('dashboard')->middleware('auth')->group(
    function() {
        Route::get('/',[pageController::class, 'index']);
        Route::resource('page', pageController::class);
        Route::resource('experience', expController::class);
        Route::resource('education', eduController::class);
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        Route::get('settings', [settingsController::class, "index"])->name('settings.index');
        Route::post('settings', [settingsController::class, "update"])->name('settings.update');
    }
);