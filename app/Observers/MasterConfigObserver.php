<?php

namespace App\Observers;

use App\Helpers\CacheForeverHelper;
use App\Models\Utility\MasterConfig;
use Exception;

class MasterConfigObserver
{
	/**
	 * Handle the MasterConfig "updated" event.
	 * @throws Exception
	 */
	public function updated(MasterConfig $masterConfig): void
	{
		CacheForeverHelper::syncMasterConfig();
		if(in_array($masterConfig->key, MasterConfig::isConfig())){
			\Artisan::call('config:cache');
		}
	}
}
