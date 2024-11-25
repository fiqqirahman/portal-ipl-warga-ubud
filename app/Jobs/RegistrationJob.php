<?php

namespace App\Jobs;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class RegistrationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public string $password, public string $activationToken)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
	    Mail::to($this->user->email)->send(new RegistrationMail($this->user, $this->password, $this->activationToken));
    }
}
