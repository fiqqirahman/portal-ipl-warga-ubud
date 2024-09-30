<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use App\Models\Master\StatusPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['id' => \App\Statics\Master\StatusPerusahaan::$PUSAT, 'nama' => 'Pusat', 'keterangan' => 'Pusat', 'kode' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\StatusPerusahaan::$CABANG, 'nama' => 'Cabang', 'keterangan' => 'Cabang', 'kode' => 2, 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            StatusPerusahaan::updateOrCreate($data);
        });
    }
}
