<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
	
Artisan::command('logs:clear {date?}', function ($date = null) {
	if($date){
		if(File::exists(storage_path('logs/laravel-'. $date .'.log'))){
			exec('echo "-----CLEAR at '. now()->format('d-m-Y H:i:s') .'-----" > ' .
				storage_path('logs/laravel-'. $date .'.log'));
			$this->info('Logs have been cleared ' . $date);
		} else {
			$this->error('Logs ' . $date . ' not found!');
		}
	} else {
		exec('echo "-----CLEAR at '. now()->format('d-m-Y H:i:s') .'-----" > ' .
			storage_path('logs/laravel.log'));
		$this->info('Logs have been cleared');
	}
})->purpose('Clear log files');

Artisan::command('master-config:get {key?}', function ($key = null) {
	try {
		if($key !== NULL){
			$this->info(\App\Helpers\CacheForeverHelper::getSingle($key));
		} else {
			$this->info(\App\Helpers\CacheForeverHelper::getAll());
		}
		
		$this->info('Success get Master Config stored Cache');
	} catch (Exception $e) {
		$this->error('Failed get Master Config stored Cache : ' . $e->getMessage());
	}
})->purpose('Get Master Config stored Cache');

Artisan::command('master-config:sync', function () {
	try {
		$this->info(\App\Helpers\CacheForeverHelper::syncMasterConfig());
		
		$this->info('Success synchronize Master Config to Cache');
	} catch (Exception $e) {
		$this->error('Failed synchronize Master Config to Cache : ' . $e->getMessage());
	}
})->purpose('Synchronize Master Config to Cache');

Artisan::command('master-config:clear', function () {
	try {
		\App\Helpers\CacheForeverHelper::destroy();
		
		$this->info(\App\Helpers\CacheForeverHelper::getAll());
		
		$this->info('Success clear Master Config Cache');
	} catch (Exception $e) {
		$this->error('Failed clear Master Config Cache : ' . $e->getMessage());
	}
})->purpose('Clear Master Config Cache');