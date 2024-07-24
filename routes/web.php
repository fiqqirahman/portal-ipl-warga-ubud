<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// login
Route::name('auth.')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
	Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
	Route::post('/forgot-password-validate', [AuthController::class, 'forgotPasswordValidate'])->name('forgot-password-validate');
	Route::get('/login-via-portal-sso/{email}/{username}/{kode_aplikasi}/{time}', [AuthController::class, 'loginViaPortalSSO'])->name('login-via-portal-sso');
});

Route::middleware('auth')->group(function () {
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth.session-browser')->group(function () {
        // authentication
        Route::name('auth.')->group(function () {
            // ganti password
            Route::post('/change-password/proses', [AuthController::class, 'changePasswordSubmit'])->name('change-password-submit');

            // form expired password
            Route::get('/expired-password', [AuthController::class, 'expiredPassword'])->name('expired-password');
        });
	    
	    Route::middleware('auth.check-users-expired')->group(function () {
	        // form ganti password
	        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
	
	        // dashboard
	        Route::redirect('/', '/dashboard');
	        Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
			
			// another menus here
        });
    });
});
