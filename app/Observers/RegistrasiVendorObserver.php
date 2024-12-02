<?php

namespace App\Observers;

use App\Enums\StatusRegistrasiEnum;
use App\Models\RegistrasiVendor;
use App\Services\StatusRegistrasiService;
use Exception;
use Illuminate\Database\Eloquent\Model;

class RegistrasiVendorObserver
{
	public function creating(Model $model): void
	{
		$model->fill([
			'no_vendor' => generateNumberVendor()
		]);
    }
	
	/**
	 * @throws Exception
	 */
	public function updated(RegistrasiVendor $registrasiVendor): void
	{
		if($registrasiVendor->isDirty('status_registrasi')){
			StatusRegistrasiService::handle($registrasiVendor);
		}
	}
}
