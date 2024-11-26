<?php

namespace App\Traits;

use App\Services\InventarisService;
use Exception;
use Throwable;

trait HasInventaris
{
	/**
	 * @throws Exception
	 */
	public function storeInventaris(?array $request = []): bool
	{
		try {
			InventarisService::store($this, $request);
			
			return true;
		} catch (Throwable $th) {
			throw new Exception($th->getMessage());
		}
    }
	
	/**
	 * @throws Exception
	 */
	public function updateInventaris(?array $request = []): bool
	{
		try {
			InventarisService::update($this, $request);
			
			return true;
		} catch (Throwable $th) {
			throw new Exception($th->getMessage());
		}
    }
}