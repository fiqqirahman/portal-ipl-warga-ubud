<?php

namespace Database\Seeders;

use App\Enums\DocumentForEnum;
use App\Enums\JenisIdentitasEnum;
use App\Models\Master\Dokumen;
use App\Models\Master\JenisIdentitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisIdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => JenisIdentitasEnum::Ktp,
                'kode' => '01',
            ],
            [
                'nama' => JenisIdentitasEnum::Npwp,
                'kode' => '02',
            ],
            [
                'nama' => JenisIdentitasEnum::Passport,
                'kode' => '03',
            ],
        ];

        collect($collections)->each(function ($data) {
            JenisIdentitas::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
