<?php

namespace App\Helpers;

use App\Enums\MasterConfigKeyEnum;
use App\Models\Utility\MasterConfig;
use Illuminate\Support\Facades\Cache;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Psr\SimpleCache\InvalidArgumentException;

class CacheForeverHelper
{
	public static string $defaultModelKey = 'master_config';
	
	/**
	 * Fetch single Cached Key ($key) by $modelKey
	 *
	 * @param string $key
	 * @param string|null $modelKey
	 * @return string|NULL
	 */
	public static function getSingle(string $key, string|null $modelKey = null): ?string
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if($modelKey === self::$defaultModelKey
				AND !Cache::driver(self::getDriver())->has(self::$defaultModelKey)) {
				if(MasterConfig::query()->exists()){
					self::syncMasterConfig();
				} else {
					if($key === MasterConfigKeyEnum::SecuritySessionLifetime->value){
						return 120;
					}
				}
			}
			
			if(Cache::driver(self::getDriver())->has($modelKey)){
				return Cache::driver(self::getDriver())
					->get($modelKey)
					->where('key', $key)
					->first()->value ?? NULL;
			}
			
			return NULL;
		} catch (InvalidArgumentException|Exception $e) {
			return NULL;
		}
	}
	
	/**
	 * Fetch all Cached Key Value by $modelKey
	 *
	 * @param string|null $modelKey
	 * @return Collection
	 */
	public static function getAll(string|null $modelKey = null): Collection
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if($modelKey === self::$defaultModelKey
				AND !Cache::driver(self::getDriver())->has(self::$defaultModelKey)) {
				if(MasterConfig::query()->exists()){
					self::syncMasterConfig();
				} else {
					return collect([]);
				}
			}
			
			if(Cache::driver(self::getDriver())->has($modelKey)){
				return Cache::driver(self::getDriver())->get($modelKey);
			}
			
			return collect([]);
		} catch (InvalidArgumentException|Exception $e) {
			return collect([]);
		}
	}
	
	/**
	 * Store Collection to Cache
	 *
	 * @param Collection $collection
	 * @param string|null $modelKey
	 * @param bool $destroyOld
	 * @return bool
	 * @throws Exception
	 */
	public static function store(Collection $collection, string|null $modelKey = null, bool $destroyOld = true): bool
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if($destroyOld){
				self::destroy($modelKey);
			}
			
			$store = Cache::driver(self::getDriver())->forever($modelKey, $collection);
			if(!$store){
				throw new Exception('Failed store cache key ['.  $modelKey .']');
			}
			
			return true;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Destroy Cache
	 *
	 * @param string|null $modelKey
	 * @return bool
	 * @throws Exception
	 */
	public static function destroy(string|null $modelKey = null): bool
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if(Cache::driver(self::getDriver())->has($modelKey)){
				$destroy = Cache::driver(self::getDriver())->delete($modelKey);
				if(!$destroy){
					throw new Exception('Failed destroy cache key ['.  $modelKey .']');
				}
			}
			
			return true;
		} catch (InvalidArgumentException|Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Sync Master Config rows to Cache
	 * @throws Exception
	 */
	public static function syncMasterConfig(): void
	{
		self::store(MasterConfig::select(['key','value'])->get());
	}
	
	private static function getDriver(): string
	{
		return config('cache.default');
	}
}