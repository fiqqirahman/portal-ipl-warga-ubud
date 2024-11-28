<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteExpiredUsers extends Command
{
    protected $signature = 'users:delete-expired';
    protected $description = 'Delete users whose activation tokens have expired';

    public function handle(): void
    {
        $expiredUsers = User::where('is_activated', false)
            ->where('created_at', '<', Carbon::now()->subMinutes(60)) // Token valid 60 menit
            ->whereIn('vendor_type', ['company', 'individual']) // Nilai string langsung
            ->get();

        $this->info("Expired users count: " . $expiredUsers->count());
        foreach ($expiredUsers as $user) {
            $this->info("Deleting User: {$user->name}, Created At: {$user->created_at}");
            $user->delete();
        }

        $this->info(count($expiredUsers) . ' expired users deleted.');
    }

}

