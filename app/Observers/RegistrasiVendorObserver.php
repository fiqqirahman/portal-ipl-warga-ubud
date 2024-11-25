<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class RegistrasiVendorObserver
{
	public function creating(Model $model): void
	{
		$model->fill([
			'no_vendor' => generateNumberVendor()
		]);
    }
}
