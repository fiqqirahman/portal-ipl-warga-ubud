<?php

namespace App\Traits;

use App\Services\PengalamanKerjaService;
use Exception;
use Throwable;

trait HasPengalamanKerja
{
	/**
	 * @throws Exception
	 */
	public function upsertPengalamanKerja(array $files): bool
	{
		try {
			PengalamanKerjaService::upsert($this, $files);
			
			return true;
		} catch (Throwable $th) {
			throw new Exception($th->getMessage());
		}
    }
}