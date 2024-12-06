<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
use App\Models\Master\StatusPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['kode' => \App\Statics\Master\KategoriVendor::$IT, 'nama' => 'IT', 'keterangan' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\KategoriVendor::$NON_IT, 'nama' => 'Non IT', 'keterangan' => 'Non IT', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\KategoriVendor::$KONTRUKSI, 'nama' => 'Kontruksi', 'keterangan' => 'Kontruksi', 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            KategoriVendor::query()->updateOrCreate(['kode' => $data['kode']], $data);
        });
    }
}
