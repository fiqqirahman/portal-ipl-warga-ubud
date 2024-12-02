<?php

namespace App\Jobs\StatusRegistrasi;

use App\Mail\StatusRegistrasi\ApprovedMail;
use App\Models\RegistrasiVendor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class ApprovedJob implements ShouldQueue
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
	    Mail::to($this->registrasiVendor->createdBy->email)->send(
			new ApprovedMail($this->registrasiVendor)
	    );
    }
}
