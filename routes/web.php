<?php

use App\Enums\MasterConfigKeyEnum;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Helpers\CacheForeverHelper;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IplPaymentController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Master\BankController;
use App\Http\Controllers\Master\BentukBadanUsahaController;
use App\Http\Controllers\Master\DokumenController;
use App\Http\Controllers\Master\JabatanVendorController;
use App\Http\Controllers\Master\JenisIdentitasController;
use App\Http\Controllers\Master\JenisInventarisController;
use App\Http\Controllers\Master\JenisMerkInventarisController;
use App\Http\Controllers\Master\JenisVendorController;
use App\Http\Controllers\Master\KategoriVendorController;
use App\Http\Controllers\Master\KualifikasiGradeController;
use App\Http\Controllers\Master\StatusPerusahaanController;
use App\Http\Controllers\Master\SubBidangUsahaController;
use App\Http\Controllers\OperatorVendorController;
use App\Http\Controllers\ParametersController;
use App\Http\Controllers\RegistrasiVendorController;
use App\Http\Controllers\RegistrasiVendorPerusahaanController;
use App\Http\Controllers\Utility\MasterConfigController;
use App\Models\Master\JenisInventaris;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;

$SSOIsLocal = (boolean) CacheForeverHelper::getSingle(MasterConfigKeyEnum::SSOIsLocal);

	// landing-page
Route::name('landing-page.')->middleware('guest')->group(function () {
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
                // bank
                Route::resource('/bank', BankController::class, ['parameters' => ['bank' => 'id']])->except(['show', 'destroy']);
                Route::get('/bank/{id}/nonaktif', [BankController::class, 'nonaktif'])->name('bank.nonaktif');
                Route::get('/bank/{id}/aktif', [BankController::class, 'aktif'])->name('bank.aktif');
                // Sub Bidang Usaha
                Route::resource('/sub-bidang-usaha', SubBidangUsahaController::class, ['parameters' => ['sub-bidang-usaha' => 'id']])->except(['show', 'destroy']);
                Route::get('/sub-bidang-usaha/{id}/nonaktif', [SubBidangUsahaController::class, 'nonaktif'])->name('sub-bidang-usaha.nonaktif');
                Route::get('/sub-bidang-usaha/{id}/aktif', [SubBidangUsahaController::class, 'aktif'])->name('sub-bidang-usaha.aktif');
                // kualifiaksi Grade
                Route::resource('/kualifikasi-grade', KualifikasiGradeController::class, ['parameters' => ['kualifikasi-grade' => 'id']])->except(['show', 'destroy']);
                Route::get('/kualifikasi-grade/{id}/nonaktif', [KualifikasiGradeController::class, 'nonaktif'])->name('kualifikasi-grade.nonaktif');
                Route::get('/kualifikasi-grade/{id}/aktif', [KualifikasiGradeController::class, 'aktif'])->name('kualifikasi-grade.aktif');
                // jenis identitas
                Route::resource('/jenis-identitas', JenisIdentitasController::class, ['parameters' => ['jenis-identitas' => 'id']])->except(['show', 'destroy']);
                Route::get('/jenis-identitas/{id}/nonaktif', [JenisIdentitasController::class, 'nonaktif'])->name('jenis-identitas.nonaktif');
                Route::get('/jenis-identitas/{id}/aktif', [JenisIdentitasController::class, 'aktif'])->name('jenis-identitas.aktif');
                // jabatan vendor
                Route::resource('/jabatan-vendor', JabatanVendorController::class, ['parameters' => ['jabatan-vendor' => 'id']])->except(['show', 'destroy']);
                Route::get('/jabatan-vendor/{id}/nonaktif', [JabatanVendorController::class, 'nonaktif'])->name('jabatan-vendor.nonaktif');
                Route::get('/jabatan-vendor/{id}/aktif', [JabatanVendorController::class, 'aktif'])->name('jabatan-vendor.aktif');
                // jenis inventaris
                Route::resource('/jenis-invetaris', JenisInventarisController::class, ['parameters' => ['jenis-invetaris' => 'id']])->except(['show', 'destroy']);
                Route::get('/jenis-invetaris/{id}/nonaktif', [JenisInventarisController::class, 'nonaktif'])->name('jenis-invetaris.nonaktif');
                Route::get('/jenis-invetaris/{id}/aktif', [JenisInventarisController::class, 'aktif'])->name('jenis-invetaris.aktif');
                // jenis merk inventaris
                Route::resource('/jenis-merk-inventaris', JenisMerkInventarisController::class, ['parameters' => ['jenis-merk-inventaris' => 'id']])->except(['show', 'destroy']);
                Route::get('/jenis-merk-inventaris/{id}/nonaktif', [JenisMerkInventarisController::class, 'nonaktif'])->name('jenis-merk-inventaris.nonaktif');
                Route::get('/jenis-merk-inventaris/{id}/aktif', [JenisMerkInventarisController::class, 'aktif'])->name('jenis-merk-inventaris.aktif');
				
                // dokumen
                Route::resource('/dokumen', DokumenController::class)
	                ->middleware(PermissionMiddleware::using(PermissionEnum::MasterDokumenAccess->value))
	                ->parameters(['dokumen' => 'dokumen'])
	                ->except(['show', 'destroy']);
				Route::middleware(PermissionMiddleware::using(PermissionEnum::MasterDokumenEdit->value))->group(function (){
	                Route::get('/dokumen/{dokumen}/nonaktif', [DokumenController::class, 'nonaktif'])->name('dokumen.nonaktif');
	                Route::get('/dokumen/{dokumen}/aktif', [DokumenController::class, 'aktif'])->name('dokumen.aktif');
				});
            });
		    
		    // operator
		    Route::prefix('menu/operator')
			    ->as('menu.operator.')
		        ->middleware(RoleMiddleware::using(RoleEnum::OperatorVendorManajemen->value))->group(function (){
				    Route::get('/registrasi-vendor', [OperatorVendorController::class, 'index'])
					    ->name('registrasi-vendor.index');
					Route::get('/registrasi-vendor/approval/{registrasi_vendor}', [OperatorVendorController::class, 'show'])
					    ->name('registrasi-vendor.show');
					Route::post('/registrasi-vendor/submit/{registrasi_vendor}', [OperatorVendorController::class, 'submit'])
					    ->name('registrasi-vendor.submit');
		    });

            Route::prefix('menu')
	            ->middleware([RoleMiddleware::using(RoleEnum::Vendor->value), 'vendor.registration-type'])
	            ->name('menu.')
	            ->group(function () {
	                // registrasi vendor perorangan
	                Route::resource('/registrasi-vendor', RegistrasiVendorController::class)
		                ->except(['destroy']);
	                Route::delete('/registrasi-vendor/remove-document/{dokumen_vendor}', [RegistrasiVendorController::class, 'removeDocument'])
		                ->name('registrasi-vendor.remove-document');
					
		            // registrasi vendor perorangan
	                Route::resource('/registrasi-vendor-perusahaan', RegistrasiVendorPerusahaanController::class)
		                ->parameters(['registrasi-vendor-perusahaan' => 'registrasi-vendor'])
		                ->except(['destroy']);
					Route::delete('/registrasi-vendor-perusahaan/remove-document/{dokumen_vendor}', [RegistrasiVendorPerusahaanController::class, 'removeDocument'])
		                ->name('registrasi-vendor-perusahaan.remove-document');
					Route::delete('/registrasi-vendor-perusahaan/remove-path-file-proof-inventaris/{registrasi_vendor}/{path}', [RegistrasiVendorPerusahaanController::class, 'removePathFileProofInventaris'])
		                ->name('registrasi-vendor-perusahaan.remove-path-file-proof-inventaris');
	            });
		    
		    Route::prefix('menu')->name('menu.')->group(function () {
				    Route::get('/getKabKotaByProvinsi', [ParametersController::class, 'getKabKotaByProvinsi'])->name('getKabKotaByProvinsi');
				    Route::get('/getKecamatanByKabKota', [ParametersController::class, 'getKecamatanByKabKota'])->name('getKecamatanByKabKota');
				    Route::get('/getKelurahanByKecamatan', [ParametersController::class, 'getKelurahanByKecamatan'])->name('getKelurahanByKecamatan');

                    //pembayaran IPL
                     Route::resource('/pembayaran-ipl', IplPaymentController::class, ['parameters' => ['pembayaran-ipl' => 'id']])->except(['show', 'destroy']);
            });
        });
    });
});
