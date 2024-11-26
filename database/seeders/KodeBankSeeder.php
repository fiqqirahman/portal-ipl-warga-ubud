<?php

namespace Database\Seeders;

use App\Enums\JenisInventarisEnum;
use App\Enums\KodeBankEnum;
use App\Models\Master\JenisInventaris;
use App\Models\Master\KodeBank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodeBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => KodeBankEnum::BCA,
                'kode' => '01',
            ],
            [
                'nama' => KodeBankEnum::Mandiri,
                'kode' => '02',
            ],
            [
                'nama' => KodeBankEnum::DKI,
                'kode' => '03',
            ],
            [
                'nama' => KodeBankEnum::BNI,
                'kode' => '04',
            ],
            [
                'nama' => KodeBankEnum::BSI,
                'kode' => '05',
            ],
            [
                'nama' => KodeBankEnum::BTN,
                'kode' => '06',
            ],
        ];

        collect($collections)->each(function ($data) {
            KodeBank::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
