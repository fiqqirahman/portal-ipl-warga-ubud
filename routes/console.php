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

Artisan::command('trigger:retry-fail-jobs', function () {
    Artisan::call('queue:retry all');
})->purpose('Retry All Fail Jobs')->everyMinute();