<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	/**
	 * Override php artisan optimize:clear with custom command
	 * @return void
	 */
	protected function boot(): void
	{
		$this->app->bind('command.optimize:clear', \App\Console\Commands\CustomOptimizeClear::class);
	}
	
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
		$schedule->command('telescope:prune --hours=72')->daily();
        $schedule->command('users:delete-expired')->everyMinute();
    }
	
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
