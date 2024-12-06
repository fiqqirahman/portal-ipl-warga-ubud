<?php

namespace Database\Seeders;

use App\Models\Master\BentukBadanUsaha;
use App\Models\Master\JenisVendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BentukBadanUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$CV, 'nama' => 'CV', 'keterangan' => 'CV', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$FA, 'nama' => 'FA', 'keterangan' => 'FA', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$KOPERASI, 'nama' => 'Koperasi', 'keterangan' => 'Koperasi', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PK, 'nama' => 'PK', 'keterangan' => 'PK', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PMA, 'nama' => 'PMA', 'keterangan' => 'PMA', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PMDN, 'nama' => 'PMDN', 'keterangan' => 'PMDN', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PERSEKUTUAN_PERDATA, 'nama' => 'Persekutuan Perdata', 'keterangan' => 'Persekutuan Perdata', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PERUSAHAAN_UMUM_PERUM, 'nama' => 'Perusahaan Umum (PERUM)', 'keterangan' => 'Perusahaan Umum (PERUM)', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PERUSAHAAN_JAWATAN_PERJAN, 'nama' => 'Perusahaan Jawatan (PERJAN)', 'keterangan' => 'Perusahaan Jawatan (PERJAN)', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$PT, 'nama' => 'PT', 'keterangan' => 'PT', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$UD, 'nama' => 'UD', 'keterangan' => 'UD', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$YAYASAN, 'nama' => 'Yayasan', 'keterangan' => 'Yayasan', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$LTD, 'nama' => 'LTD', 'keterangan' => 'LTD', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$CORP, 'nama' => 'CORP', 'keterangan' => 'CORP', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$AG, 'nama' => 'AG', 'keterangan' => 'AG', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$SA, 'nama' => 'SA', 'keterangan' => 'SA', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$CO_LTD, 'nama' => 'CO. LTD', 'keterangan' => 'CO. LTD', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$S_R_L, 'nama' => 'SRL', 'keterangan' => 'SRL', 'created_at' => now(), 'updated_at' => now()],
            ['kode' => \App\Statics\Master\BentukBadanUsaha::$S_P_A, 'nama' => 'SPA', 'keterangan' => 'SPA', 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            BentukBadanUsaha::query()->updateOrCreate(['kode'=>$data['kode']], $data);
        });
    }
}
