<?php

use App\Enums\MasterConfigKeyEnum;
use App\Enums\PermissionEnum;
use App\Helpers\CacheForeverHelper;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Master\BentukBadanUsahaController;
use App\Http\Controllers\Master\DokumenController;
use App\Http\Controllers\Master\JenisVendorController;
use App\Http\Controllers\Master\KategoriVendorController;
use App\Http\Controllers\Master\StatusPerusahaanController;
use App\Http\Controllers\RegistrasiVendorController;
use App\Http\Controllers\RegistrasiVendorPerusahaanController;
use App\Http\Controllers\Utility\MasterConfigController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;

$SSOIsLocal = (boolean) CacheForeverHelper::getSingle(MasterConfigKeyEnum::SSOIsLocal);

	// landing-page
Route::name('landing-page.')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('index');
    Route::get('/registrasi', [LandingPageController::class, 'registrasi'])->name('registrasi');
    Route::post('/register', [LandingPageController::class, 'registerVendor'])->name('register-submit');
    Route::post('/login-submit-vendor', [LandingPageController::class, 'loginSubmitVendor'])->name('login-submit-vendor');
    Route::get('/activate/{token}', [LandingPageController::class, 'activateAccount'])->name('user.activate');

    //reset password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

	
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
	    
	    Route::middleware(['auth.check-users-expired','activated'])->group(function () use($SSOIsLocal) {
		    if(!$SSOIsLocal){
		        // form ganti password
		        Route::get('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');
			}
			
	        // dashboard
	        Route::get('/dashboard', [HomeController::class, 'index'])->name('index');
			
			Route::prefix('/utility')
				->as('utility.')
				->middleware(PermissionMiddleware::using(PermissionEnum::UtilityAccess->value))
				->group(function (){
					Route::resource('/master-config', MasterConfigController::class)
						->middleware(PermissionMiddleware::using(PermissionEnum::MasterConfigAccess->value))
						->only(['edit', 'index', 'update']);
			});

            Route::prefix('master')->name('master.')->group(function () {
                // jenis vendor
                Route::resource('/jenis-vendor', JenisVendorController::class, ['parameters' => ['jenis-vendor' => 'id']])->except(['show', 'destroy']);
                Route::get('/jenis-vendor/{id}/nonaktif', [JenisVendorController::class, 'nonaktif'])->name('jenis-vendor.nonaktif');
                Route::get('/jenis-vendor/{id}/aktif', [JenisVendorController::class, 'aktif'])->name('jenis-vendor.aktif');
                // bentuk badan usaha
                Route::resource('/bentuk-badan-usaha', BentukBadanUsahaController::class, ['parameters' => ['bentuk-badan-usaha' => 'id']])->except(['show', 'destroy']);
                Route::get('/bentuk-badan-usaha/{id}/nonaktif', [BentukBadanUsahaController::class, 'nonaktif'])->name('bentuk-badan-usaha.nonaktif');
                Route::get('/bentuk-badan-usaha/{id}/aktif', [BentukBadanUsahaController::class, 'aktif'])->name('bentuk-badan-usaha.aktif');
                // status perusahaan
                Route::resource('/status-perusahaan', StatusPerusahaanController::class, ['parameters' => ['status-perusahaan' => 'id']])->except(['show', 'destroy']);
                Route::get('/status-perusahaan/{id}/nonaktif', [StatusPerusahaanController::class, 'nonaktif'])->name('status-perusahaan.nonaktif');
                Route::get('/status-perusahaan/{id}/aktif', [StatusPerusahaanController::class, 'aktif'])->name('status-perusahaan.aktif');
                // status perusahaan
                Route::resource('/kategori-vendor', KategoriVendorController::class, ['parameters' => ['kategori-vendor' => 'id']])->except(['show', 'destroy']);
                Route::get('/kategori-vendor/{id}/nonaktif', [KategoriVendorController::class, 'nonaktif'])->name('kategori-vendor.nonaktif');
                Route::get('/kategori-vendor/{id}/aktif', [KategoriVendorController::class, 'aktif'])->name('kategori-vendor.aktif');
                // dokumen
                Route::resource('/dokumen', DokumenController::class, ['parameters' => ['dokumen' => 'id']])->except(['show', 'destroy']);
                Route::get('/dokumen/{id}/nonaktif', [DokumenController::class, 'nonaktif'])->name('dokumen.nonaktif');
                Route::get('/dokumen/{id}/aktif', [DokumenController::class, 'aktif'])->name('dokumen.aktif');
            });

            Route::prefix('menu')->name('menu.')->group(function () {
                // registrasi vendor
                Route::resource('/registrasi-vendor', RegistrasiVendorController::class, ['parameters' => ['registrasi-vendor' => 'id']])->except(['show', 'destroy']);
                Route::resource('/registrasi-vendor-perusahaan', RegistrasiVendorPerusahaanController::class, ['parameters' => ['registrasi-vendor-perusahaan' => 'id']])->except(['show', 'destroy']);
                Route::get('/getKabKotaByProvinsi', [RegistrasiVendorController::class, 'getKabKotaByProvinsi'])->name('getKabKotaByProvinsi');
                Route::get('/getKecamatanByKabKota', [RegistrasiVendorController::class, 'getKecamatanByKabKota'])->name('getKecamatanByKabKota');
                Route::get('/getKelurahanByKecamatan', [RegistrasiVendorController::class, 'getKelurahanByKecamatan'])->name('getKelurahanByKecamatan');
            });
        });
    });
});
