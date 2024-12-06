<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use App\Models\Master\Negara;
use App\Models\Master\StatusPerusahaan;
use App\Models\Master\SubBidangUsaha;
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
            ['kode' => \App\Statics\Master\StatusPerusahaan::$PUSAT, 'nama' => 'Pusat', 'keterangan' => 'Pusat', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\StatusPerusahaan::$CABANG, 'nama' => 'Cabang', 'keterangan' => 'Cabang', 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            StatusPerusahaan::query()->updateOrCreate(['kode' => $data['kode']], $data);

        });
    }
}
