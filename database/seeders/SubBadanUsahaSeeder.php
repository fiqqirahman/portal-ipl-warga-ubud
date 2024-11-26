<?php

namespace Database\Seeders;

use App\Enums\JenisJabatanVendorEnum;
use App\Enums\SubBadanUsahaEnum;
use App\Models\Master\JabatanVendor;
use App\Models\Master\SubBidangUsaha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubBadanUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => SubBadanUsahaEnum::Konsultasi,
                'kode' => '01',
            ],
        ];

        collect($collections)->each(function ($data) {
            SubBidangUsaha::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
