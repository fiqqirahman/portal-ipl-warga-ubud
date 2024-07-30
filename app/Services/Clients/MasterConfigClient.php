<?php

namespace App\Services\Clients;

use App\Helpers\CacheForeverHelper;
use App\Models\Utility\MasterConfig;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class MasterConfigClient
{
	public function handle(Request $request): JsonResponse
	{
		try {
			$keys = $request->keys;
			if($keys && count($keys) > 0){
				dispatch(function (){
					CacheForeverHelper::syncMasterConfig();
				});
				if(!empty(array_intersect($keys, MasterConfig::isConfig()))){
					dispatch(function (){
						Artisan::call('config:cache');
					});
				}
				return response()->json([
					'success' => true,
					'message' => 'Success sync Master Config'
				]);
			}
			return response()->json([
				'success' => false,
				'message' => 'Failed sync Master Config. Empty Keys!'
			], 400);
		} catch (Exception $e) {
			Log::error('[API] Sync Master Config : ' . $e->getMessage());
			
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
