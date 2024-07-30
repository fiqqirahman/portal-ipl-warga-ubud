<?php

namespace App\Providers;

use App\Models\Utility\MasterConfig;
use App\Services\MenuService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
	    if(empty(config('session.lifetime'))) {
		    if(MasterConfig::query()->exists()) {
			    Artisan::call('optimize');
		    }
	    }
		
        Paginator::useBootstrap();

        view()->composer('layouts.navbar', function ($view) {
            $roles = Auth::user()->roles->pluck('id')->toArray();

            $menus = MenuService::getMenus(0, $roles);

            $view->with('menus', $menus);
        });
	    
	    if ($this->app->isLocal()) {
		    $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
	    }
    }
}
