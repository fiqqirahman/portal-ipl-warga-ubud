<?php

namespace App\Services;

use App\Models\RegistrasiVendor;
use Arr;
use Auth;

class PengalamanKerjaService
{
	public static function upsert(RegistrasiVendor $model, ?array $request = []): void
	{
		if($request && count($request) > 0) {
			$model->pengalamanPekerjaan()->where('kodefikasi_tab', Arr::first($request)['kodefikasi_tab'])->delete();
			$authId = Auth::user()->id;
			foreach ($request as $key => $value) {
				$model->pengalamanPekerjaan()->create([
					...$value,
					'created_by' => $authId
				]);
			}
		}
	}
}
