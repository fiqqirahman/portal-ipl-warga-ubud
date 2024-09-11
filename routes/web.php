<?php

use App\Enums\MasterConfigKeyEnum;
use App\Enums\PermissionEnum;
use App\Helpers\CacheForeverHelper;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Utility\MasterConfigController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;

$SSOIsLocal = (boolean) CacheForeverHelper::getSingle(MasterConfigKeyEnum::SSOIsLocal);
	// login
Route::name('auth.')->middleware('guest')->group(function () use($SSOIsLocal) {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
	if($SSOIsLocal){
		Route::post('/login-submit', [AuthController::class, 'loginViaLocalSSO'])->name('login-submit');
	} else {
		Route::post('/login-submit', [AuthController::class, 'loginViaPublicSSO'])->name('login-submit');
		Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
		Route::post('/forgot-password-validate', [AuthController::class, 'forgotPasswordValidate'])->name('forgot-password-validate');
	}
	Route::get('/login-sso/{email}/{username}/{kode_aplikasi}/{time}', [AuthController::class, 'loginViaPortalSSO'])->name('login-via-portal-sso');
});

Route::middleware('auth')->group(function () use($SSOIsLocal) {
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth.session-browser')->group(function () use($SSOIsLocal) {
	    
	    if(!$SSOIsLocal){
		    // authentication
		    Route::name('auth.')->group(function () {
			    // ganti password
			    Route::post('/change-password/proses', [AuthController::class, 'changePasswordSubmit'])->name('change-password-submit');
			    
			    // form expired password
			    Route::get('/expired-password', [AuthController::class, 'expiredPassword'])->name('expired-password');
		    });
	    }
	    
	    Route::middleware('auth.check-users-expired')->group(function () use($SSOIsLocal) {
		    if(!$SSOIsLocal){
		        // form ganti password
		        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
			}
			
	        // dashboard
	        Route::redirect('/', '/dashboard');
	        Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
			
			Route::prefix('/utility')
				->as('utility.')
				->middleware(PermissionMiddleware::using(PermissionEnum::UtilityAccess->value))
				->group(function (){
					Route::resource('/master-config', MasterConfigController::class)
						->middleware(PermissionMiddleware::using(PermissionEnum::MasterConfigAccess->value))
						->only(['edit', 'index', 'update']);
			});
			
			// another menus here
        });
    });
});
