<?php

namespace Database\Seeders;

use App\Enums\JenisInventarisEnum;
use App\Enums\JenisJabatanVendorEnum;
use App\Models\Master\JabatanVendor;
use App\Models\Master\JenisInventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => JenisInventarisEnum::PrinterLaserjet,
                'kode' => '01',
            ],
            [
                'nama' => JenisInventarisEnum::PrinterAllInOne,
                'kode' => '02',
            ],
            [
                'nama' => JenisInventarisEnum::NotebookPc,
                'kode' => '03',
            ],
            [
                'nama' => JenisInventarisEnum::WirelessPresenter,
                'kode' => '04',
            ],
            [
                'nama' => JenisInventarisEnum::Proyektor,
                'kode' => '05',
            ],
            [
                'nama' => JenisInventarisEnum::Monitor,
                'kode' => '06',
            ],
        ];

        collect($collections)->each(function ($data) {
            JenisInventaris::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
