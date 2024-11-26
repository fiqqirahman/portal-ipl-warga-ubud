<?php

namespace Database\Seeders;

use App\Enums\JenisMerkInventarisEnum;
use App\Models\Master\JenisMerkInventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisMerkInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            [
                'nama' => JenisMerkInventarisEnum::HpColorLaser,
                'kode' => '01',
            ],
            [
                'nama' => JenisMerkInventarisEnum::EpsonL355,
                'kode' => '02',
            ],
            [
                'nama' => JenisMerkInventarisEnum::EpsonL3210,
                'kode' => '03',
            ],
            [
                'nama' => JenisMerkInventarisEnum::AsusVivobook,
                'kode' => '04',
            ],
            [
                'nama' => JenisMerkInventarisEnum::BeseusOrangeDotWireless,
                'kode' => '05',
            ],
            [
                'nama' => JenisMerkInventarisEnum::EpsonEBX500,
                'kode' => '06',
            ],
        ];

        collect($collections)->each(function ($data) {
            JenisMerkInventaris::query()->updateOrCreate(['nama' => $data['nama']], $data);
        });
    }
}
