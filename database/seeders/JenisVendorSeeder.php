<?php

namespace Database\Seeders;

use App\Models\Master\JenisVendor;
use App\Models\Menu;
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
            ['kode' => \App\Statics\Master\JenisVendor::$DISTRIBUTOR, 'nama' => 'Distributor', 'keterangan' => 'Distributor', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\JenisVendor::$PABRIKAN, 'nama' => 'Pabrikan', 'keterangan' => 'Pabrikan', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\JenisVendor::$PRINSIPAL, 'nama' => 'Prinsipal', 'keterangan' => 'Prinsipal', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\JenisVendor::$UNIVERSITAS, 'nama' => 'Universitas', 'keterangan' => 'Universitas', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\JenisVendor::$LEMBAGA_NEGARA, 'nama' => 'Lembaga Negara', 'keterangan' => 'Lembaga Negara', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\JenisVendor::$JASA, 'nama' => 'Jasa', 'keterangan' => 'Jasa', 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            JenisVendor::query()->updateOrCreate(['kode' => $data['kode']],$data);

        });
    }
}
