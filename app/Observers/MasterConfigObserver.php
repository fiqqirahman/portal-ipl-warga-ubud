<?php

namespace App\Observers;

use App\Enums\MasterConfigKeyEnum;
use App\Helpers\CacheForeverHelper;
use App\Models\Utility\MasterConfig;
use Exception;
use Illuminate\Support\Facades\Artisan;

class MasterConfigObserver
{
	/**
	 * Handle the MasterConfig "updated" event.
	 * @throws Exception
	 */
	public function updated(MasterConfig $masterConfig): void
	{
		CacheForeverHelper::syncMasterConfig();
		if(in_array($masterConfig->key, MasterConfigKeyEnum::isConfig())){
			dispatch(function (){
				Artisan::call('optimize');
			});
		}
	}
}
