<?php

namespace Database\Seeders;

use App\Enums\JenisIdentitasEnum;
use App\Enums\JenisJabatanVendorEnum;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisIdentitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisJabatanVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => JenisJabatanVendorEnum::KomisarisUtama,
                'kode' => '01',
            ],
            [
                'nama' => JenisJabatanVendorEnum::Komisaris,
                'kode' => '02',
            ],
            [
                'nama' => JenisJabatanVendorEnum::DirekturUtama,
                'kode' => '03',
            ],
            [
                'nama' => JenisJabatanVendorEnum::Direktur,
                'kode' => '04',
            ],
        ];

        collect($collections)->each(function ($data) {
            JabatanVendor::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
