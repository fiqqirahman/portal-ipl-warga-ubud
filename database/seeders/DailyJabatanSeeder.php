<?php

namespace Database\Seeders;

use App\Services\Clients\SSOClient;
use App\Models\Master\Jabatan;
use Illuminate\Database\Seeder;

class DailyJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ssoClient = new SSOClient();
        $data = $ssoClient->getJabatan();
        $newData = [];
        if ($data['status']) {
            foreach ($data['result'] as $v) {
                $newData[] = ['id_jabatan' => $v['id_jabatan'] ?? 0, 'nama_jabatan' => $v['nama_jabatan'] ?? '', 'status_data' => $v['status_data'] ?? 0];
            }
        }
        Jabatan::upsert($newData, ['id_jabatan'], ['nama_jabatan', 'status_data']);
    }
}
