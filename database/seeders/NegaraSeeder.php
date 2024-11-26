<?php

namespace Database\Seeders;

use App\Models\Master\Negara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = [
            ['kode' => 'AUS', 'nama' => 'AUSTRALIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'BLH', 'nama' => 'BANGLADESH', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'BRD', 'nama' => 'BRUNEI', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'CND', 'nama' => 'CANADA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'FDR', 'nama' => 'JERMAN', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'HKG', 'nama' => 'HONGKONG', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'IND', 'nama' => 'INDIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'IRQ', 'nama' => 'IRAK', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'ITL', 'nama' => 'ITALIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'JPN', 'nama' => 'JEPANG', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'MAS', 'nama' => 'MALAYSIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'NLD', 'nama' => 'BELANDA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'NZD', 'nama' => 'SELANDIA BARU', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'PAK', 'nama' => 'PAKISTAN', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'PHI', 'nama' => 'FILIPINA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'PRC', 'nama' => 'RRC', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'RDK', 'nama' => 'KOREA UTARA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'ROC', 'nama' => 'TAIWAN', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'ROK', 'nama' => 'KOREA SELATAN', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'RSA', 'nama' => 'SAUDI ARABIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'SIN', 'nama' => 'SINGAPURA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'SWE', 'nama' => 'SWEDIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'THA', 'nama' => 'THAILAND', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'UKD', 'nama' => 'INGGRIS', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'USA', 'nama' => 'AMERIKA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'USR', 'nama' => 'RUSIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()],
            ['kode' => 'ID', 'nama' => 'INDONESIA', 'status_data' => 1, 'created_by' => 1, 'created_at' => now()]
        ];

        collect($collections)->each(function ($data) {
            Negara::updateOrCreate(['kode' => $data['kode']], $data);
        });
    }
}
