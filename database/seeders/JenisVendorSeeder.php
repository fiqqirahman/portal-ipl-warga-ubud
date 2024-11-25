<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['id' => \App\Statics\Master\JenisVendor::$DISTRIBUTOR, 'nama' => 'Distributor', 'keterangan' => 'Distributor', 'kode' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\JenisVendor::$PABRIKAN, 'nama' => 'Pabrikan', 'keterangan' => 'Pabrikan', 'kode' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\JenisVendor::$PRINSIPAL, 'nama' => 'Prinsipal', 'keterangan' => 'Prinsipal', 'kode' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\JenisVendor::$UNIVERSITAS, 'nama' => 'Universitas', 'keterangan' => 'Universitas', 'kode' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\JenisVendor::$LEMBAGA_NEGARA, 'nama' => 'Lembaga Negara', 'keterangan' => 'Lembaga Negara', 'kode' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\JenisVendor::$JASA, 'nama' => 'Jasa', 'keterangan' => 'Jasa', 'kode' => 6, 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            JenisVendor::updateOrCreate($data);
        });
    }
}
