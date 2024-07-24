<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\Clients\SSOClient;
use App\Models\Master\UnitKerja;

class DailyUnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssoClient = new SSOClient();
        $data = $ssoClient->getUnitKerja();
        $newData = [];
        if ($data['status']) {
            foreach ($data['result'] as $v) {
                $newData[] = [
                    'id_unit_kerja' => $v['id_unit_kerja'] ?? 0,
                    'nama' => $v['nama_unit_kerja'] ?? '',
                    'kode_branch_induk' => $v['kode_branch_induk'] ?? 0,
                    'kode_branch' => $v['kode_branch'] ?? 0,
                    'kategori_unit_kerja' => $v['kategori_unit_kerja'] ?? 0,
                    'status_data' => $v['status_data'] ?? 0
                ];
            }
        }
        UnitKerja::upsert($newData, ['id_unit_kerja'], ['nama', 'kode_branch_induk', 'kode_branch', 'kategori_unit_kerja', 'status_data']);
    }
}
