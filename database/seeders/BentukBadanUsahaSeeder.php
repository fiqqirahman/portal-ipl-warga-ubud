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
            ['id' => \App\Statics\Master\BentukBadanUsaha::$CV, 'nama' => 'CV', 'keterangan' => 'CV', 'kode' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$FA, 'nama' => 'FA', 'keterangan' => 'FA', 'kode' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$KOPERASI, 'nama' => 'Koperasi', 'keterangan' => 'Koperasi', 'kode' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PK, 'nama' => 'PK', 'keterangan' => 'PK', 'kode' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PMA, 'nama' => 'PMA', 'keterangan' => 'PMA', 'kode' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PMDN, 'nama' => 'PMDN', 'keterangan' => 'PMDN', 'kode' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PERSEKUTUAN_PERDATA, 'nama' => 'Persekutuan Perdata', 'keterangan' => 'Persekutuan Perdata', 'kode' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PERUSAHAAN_UMUM_PERUM, 'nama' => 'Perusahaan Umum (PERUM)', 'keterangan' => 'Perusahaan Umum (PERUM)', 'kode' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PERUSAHAAN_JAWATAN_PERJAN, 'nama' => 'Perusahaan Jawatan (PERJAN)', 'keterangan' => 'Perusahaan Jawatan (PERJAN)', 'kode' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$PT, 'nama' => 'PT', 'keterangan' => 'PT', 'kode' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$UD, 'nama' => 'UD', 'keterangan' => 'UD', 'kode' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$YAYASAN, 'nama' => 'Yayasan', 'keterangan' => 'Yayasan', 'kode' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$LTD, 'nama' => 'LTD', 'keterangan' => 'LTD', 'kode' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$CORP, 'nama' => 'CORP', 'keterangan' => 'CORP', 'kode' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$AG, 'nama' => 'AG', 'keterangan' => 'AG', 'kode' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$SA, 'nama' => 'SA', 'keterangan' => 'SA', 'kode' => 16, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$CO_LTD, 'nama' => 'CO. LTD', 'keterangan' => 'CO. LTD', 'kode' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$S_R_L, 'nama' => 'SRL', 'keterangan' => 'SRL', 'kode' => 18, 'created_at' => now(), 'updated_at' => now()],
            ['id' => \App\Statics\Master\BentukBadanUsaha::$S_P_A, 'nama' => 'SPA', 'keterangan' => 'SPA', 'kode' => 19, 'created_at' => now(), 'updated_at' => now()],
        ];

        collect($collections)->each(function ($data) {
            BentukBadanUsaha::query()->updateOrCreate(['id'=>$data['id']], $data);
        });
    }
}
