<?php

namespace App\Helpers;

use App\Enums\MasterConfigKeyEnum;
use App\Models\Utility\MasterConfig;
use Illuminate\Support\Facades\Cache;
use Exception;
use Illuminate\Support\Collection;
use Throwable;

/**
 * Class CacheForeverHelper
 *
 * This class provides various helper functions for handling
 * caching using Laravel's cache facade. It supports fetching,
 * storing, and destroying cached data.
 *
 * @package App\Helpers
 */
class CacheForeverHelper
{
	/**
	 * @var string $defaultModelKey The default model key used for caching.
	 */
	private static string $defaultModelKey = 'master_config';
	
	/**
	 * Fetch single Cached Key ($key) by $modelKey.
	 *
	 * @param string|object $key The key to fetch from the cache.
	 * @param string|null $modelKey The model key, default is `master_config`.
	 * @return string|null The cached value, or NULL if not found.
	 */
	public static function getSingle(string|object $key, string|null $modelKey = null): ?string
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if($key instanceof MasterConfigKeyEnum){
				$key = $key->value;
			}
			
			return Cache::driver(self::getDriver())
				->get($modelKey)
				->where('key', $key)
				->first()->value ?? NULL;
		} catch (Throwable $e) {
			return NULL;
		}
	}
	
	/**
	 * Fetch all Cached Key Value by $modelKey.
	 *
	 * @param string|null $modelKey The model key, default is `master_config`.
	 * @return Collection The collection of cached values.
	 */
	public static function getAll(string|null $modelKey = null): Collection
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if($modelKey === self::$defaultModelKey AND !Cache::driver(self::getDriver())->has(self::$defaultModelKey)){
				return collect([]);
			}
			
			if(Cache::driver(self::getDriver())->has($modelKey)){
				return Cache::driver(self::getDriver())->get($modelKey) ?? collect([]);
			}
			
			return collect([]);
		} catch (Throwable $e) {
			return collect([]);
		}
	}
	
	/**
	 * Store Collection to Cache.
	 *
	 * @param Collection $collection The collection to store.
	 * @param string|null $modelKey The model key, default is `master_config`.
	 * @param bool $destroyOld Flag to destroy old cache, default is true.
	 * @return bool True on success, throws Exception on failure.
	 * @throws Exception If storing to cache fails.
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
				throw new Exception('Failed store cache key [' . $modelKey . ']');
			}
			
			return true;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Destroy Cache.
	 *
	 * @param string|null $modelKey The model key, default is `master_config`.
	 * @return bool True on success.
	 * @throws Exception If destroying the cache fails.
	 */
	public static function destroy(string|null $modelKey = null): bool
	{
		try {
			if(empty($modelKey)){
				$modelKey = self::$defaultModelKey;
			}
			
			if(Cache::driver(self::getDriver())->has($modelKey)){
				$destroy = Cache::driver(self::getDriver())->forget($modelKey);
				if(!$destroy){
					throw new Exception('Failed destroy cache key [' . $modelKey . ']');
				}
			}
			
			return true;
		} catch (Throwable $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	/**
	 * Sync Master Config rows to Cache.
	 *
	 * @return Collection The collection of synchronized master config rows.
	 * @throws Exception If synchronization fails.
	 */
	public static function syncMasterConfig(): Collection
	{
		self::store(MasterConfig::select(['key','value'])->get());
		
		return self::getAll();
	}
	
	/**
	 * Get the cache driver from configuration.
	 *
	 * @return string The cache driver.
	 */
	private static function getDriver(): string
	{
		return config('cache.default');
	}
}