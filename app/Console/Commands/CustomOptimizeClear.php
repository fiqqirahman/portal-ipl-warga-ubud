<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\OptimizeClearCommand;
use Illuminate\Support\Facades\Artisan;
use Throwable;

class CustomOptimizeClear extends OptimizeClearCommand
{
	public function handle(): void
	{
		try {
			parent::handle();
			
			$this->info('Running master-config:sync...');
			Artisan::call('master-config:sync');
			$this->info('Done.');
		} catch (Throwable $th) {
			$this->error('Error : ' . $th->getMessage());
		}
	}
}

