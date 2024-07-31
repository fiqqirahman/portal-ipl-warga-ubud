<?php

namespace App\Observers;

use App\Enums\MasterConfigKeyEnum;
use App\Helpers\CacheForeverHelper;
use App\Models\Utility\MasterConfig;
use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class MasterConfigObserver
{
	/**
	 * Handle the MasterConfig "updated" event.
	 * @throws Exception
	 */
	public function updated(MasterConfig $masterConfig): void
	{
		CacheForeverHelper::syncMasterConfig();
		
		if($masterConfig->key === MasterConfigKeyEnum::SecuritySessionLifetime->value){
			if (File::exists(base_path('bootstrap/cache/config.php'))) {
				dispatch(function (){
					Artisan::call('config:cache');
				});
			} else {
				config(['session.lifetime' => (int) $masterConfig->value]);
			}
		}
	}
}
