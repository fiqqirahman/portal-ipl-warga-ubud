<?php

use App\Http\Controllers\API\MasterConfigController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['throttle:30,1','api.validate-token'])->group(function () {
	Route::post('/utility/master-config/sync', MasterConfigController::class)
		->name('api.utility.master-config.sync');
});