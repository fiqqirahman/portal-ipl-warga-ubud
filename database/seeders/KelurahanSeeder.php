<?php

namespace Database\Seeders;

use App\Services\Clients\MasterDataClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new MasterDataClient())->masterDataKelurahan();
    }
}
