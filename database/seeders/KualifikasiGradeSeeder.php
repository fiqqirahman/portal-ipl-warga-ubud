<?php

namespace Database\Seeders;

use App\Enums\JenisJabatanVendorEnum;
use App\Enums\KualifikasiGradeEnum;
use App\Models\Master\JabatanVendor;
use App\Models\Master\KualifikasiGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KualifikasiGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => KualifikasiGradeEnum::TidakDikualifikasikan,
                'kode' => '01',
            ],
            [
                'nama' => KualifikasiGradeEnum::Menengah,
                'kode' => '02',
            ],
        ];

        collect($collections)->each(function ($data) {
            KualifikasiGrade::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
