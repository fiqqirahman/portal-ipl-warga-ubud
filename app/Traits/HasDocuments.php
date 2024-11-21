<?php

namespace App\Traits;

use App\Services\DocumentService;
use Exception;
use Throwable;

trait HasDocuments
{
	/**
	 * @throws Exception
	 */
	public function storeDocuments(array $files): bool
	{
		try {
			DocumentService::store($this, $files);
			
			return true;
		} catch (Throwable $th) {
			throw new Exception($th->getMessage());
		}
    }
}