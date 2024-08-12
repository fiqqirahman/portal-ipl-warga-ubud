<?php

namespace App\Services\Clients;

use App\Enums\MasterConfigKeyEnum;
use App\Helpers\CacheForeverHelper;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class MasterConfigClient
{
	public function handle(Request $request): JsonResponse
	{
		try {
			$key = $request->key;
			if($key){
				CacheForeverHelper::syncMasterConfig();
				if($key === MasterConfigKeyEnum::SecuritySessionLifetime->value){
					if (File::exists(base_path('bootstrap/cache/config.php'))) {
						dispatch(function (){
							Artisan::call('config:cache');
						});
					} else {
						config(['session.lifetime' => (int) CacheForeverHelper::getSingle(MasterConfigKeyEnum::SecuritySessionLifetime->value)]);
					}
				}
				return response()->json([
					'success' => true,
					'message' => 'Success sync Master Config'
				]);
			}
			return response()->json([
				'success' => false,
				'message' => 'Failed sync Master Config. Empty Key!'
			], 400);
		} catch (Exception $e) {
			logException('[handle] MasterConfigClient', $e);
			
			if (App::environment(['local', 'development'])) {
				return response()->json([
					'success' => false,
					'message' => $e->getMessage()
				], 500);
			}
			
			return response()->json([
				'success' => false,
				'message' => 'Terjadi Kesalahan, hubungi Administrator!'
			], 500);
		}
    }
}
