<?php

namespace App\Services;

use App\Enums\DocumentForEnum;
use App\Models\Master\Dokumen;
use App\Models\Master\DokumenVendor;
use App\Models\RegistrasiVendor;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class PengalamanKerjaService
{
	public static function upsert(RegistrasiVendor $model, ?array $request = []): void
	{
		if($request) {
			$model->pengalamanPekerjaan()->where('kodefikasi_tab', $request[0]['kodefikasi_tab'])->delete();
			foreach ($request as $key => $value) {
				$model->pengalamanPekerjaan()->create($value);
			}
		}
	}
}
