<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use App\Models\Master\KategoriVendor;
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
            ['id' => \App\Statics\Master\KategoriVendor::$IT, 'nama' => 'IT', 'keterangan' => 'IT', 'kode' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\KategoriVendor::$NON_IT, 'nama' => 'Non IT', 'keterangan' => 'Non IT', 'kode' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\KategoriVendor::$KONTRUKSI, 'nama' => 'Kontruksi', 'keterangan' => 'Kontruksi', 'kode' => 3, 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            KategoriVendor::updateOrCreate($data);
        });
    }
}
