<?php

namespace App\Services;

use App\Enums\StatusRegistrasiEnum;
use App\Jobs\StatusRegistrasi\AnalysisJob;
use App\Jobs\StatusRegistrasi\ApprovedJob;
use App\Jobs\StatusRegistrasi\RejectedJob;
use App\Models\RegistrasiVendor;
use Exception;

class StatusRegistrasiService
{
	/**
	 * @throws Exception
	 */
	public static function handle(RegistrasiVendor $registrasiVendor): void
	{
		switch ($registrasiVendor->status_registrasi){
			case StatusRegistrasiEnum::Analysis:
				self::analysis($registrasiVendor);
				break;
			case StatusRegistrasiEnum::Approved:
				self::approved($registrasiVendor);
				break;
			case StatusRegistrasiEnum::Rejected:
				self::rejected($registrasiVendor);
				break;
			default:
		}
	}
	
	private static function analysis(RegistrasiVendor $registrasiVendor): void
	{
		dispatch(new AnalysisJob($registrasiVendor));
	}
	
	private static function approved(RegistrasiVendor $registrasiVendor): void
	{
		dispatch(new ApprovedJob($registrasiVendor));
	}
	
	private static function rejected(RegistrasiVendor $registrasiVendor): void
	{
		dispatch(new RejectedJob($registrasiVendor));
	}
}
