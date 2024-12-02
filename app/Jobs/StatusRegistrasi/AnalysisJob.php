<?php

namespace App\Jobs\StatusRegistrasi;

use App\Enums\MasterConfigKeyEnum;
use App\Helpers\CacheForeverHelper;
use App\Mail\StatusRegistrasi\AnalysisMail;
use App\Models\RegistrasiVendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class AnalysisJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public RegistrasiVendor $registrasiVendor)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
	    Mail::to(CacheForeverHelper::getSingle(MasterConfigKeyEnum::EmailPICNotification))->send(
			new AnalysisMail($this->registrasiVendor)
	    );
    }
}
